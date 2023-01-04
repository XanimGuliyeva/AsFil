<?php

namespace App\Http\Controllers\Main;

use App\Address\Address;
use App\Companies\Companies;
use App\Agents\Agents;
use App\Http\Controllers\Controller;

use App\Category\Category;
use App\Comments\Comments;
use App\Filters\Filters;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\AgentRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Order_products\Order_products;
use App\Orders\Orders;
use App\Producers\Producers;
use App\Products\Products;
use App\User;
use App\Wishlists\Wishlist;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;
use PhpParser\Comment;

use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class MainController extends Controller
{
    public function edit_product($id)
    {
        $producers = Producers::all();
        $category = Category::all();
        $filters = Filters::all();
        $products = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->where('products.id', $id)
            ->get();
        return view('Admin.edit_product', ['products' => $products, 'category' => $category, 'filters' => $filters, 'producers' => $producers,]);
    }

    public function single($id)
    {
        if (isset($_COOKIE['products'])) {
            $cookie_id = $_COOKIE['products'];
        } else {
            $cookie_id = ['545854'];
        }
        $cart_id = [];
        if (isset($_COOKIE['cart'])) {
            foreach ($_COOKIE['cart'] as $name => $value) {
                $name = htmlspecialchars($name);
                array_push($cart_id, $name);
            }
        } else {
            $cart_id = ['545854'];
        }
        $cart_products = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->whereIn('products.id', $cart_id)->get();
        $cookie_products = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->whereIn('products.id', $cookie_id)->get();
        $edit = Products::find($id);
        $edit->baxis++;
        $edit->save();

        $products = Products::where('id', $id)->get();

        foreach ($products as $product) {
            $filtr = $product->filtr;
        }
        $filtr = strval($filtr);
        $category_products = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->where('filtr', $filtr)
            ->get()
            ->take(8);
        $producers = Producers::all();
        $comments = Comments::where('mehsul_id', $id)->orderBy('id', 'desc')->get();

        $products = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->where('products.id', $id)->get();

        return view('esas.single', [
            'products' => $products, 'producers' => $producers, 'cookie_products' => $cookie_products, 'category_products' => $category_products, 'comments' => $comments, 'cart_products' => $cart_products
        ]);
    }

    public function category($filter)
    {
        if(session()->exists('brand')){
            $producers = Producers::all();
            $category = Category::all();
            $filters = Filters::all();
            if (substr('' . $filter . '', 0, 4) == 'all_') {
                $filter = strtolower(substr('' . $filter . '', 4));
                $filter_array = explode(" ", $filter);
                $ids = [];
                for($i = 0; $i < count($filter_array); $i++){
                    if ($i == 0){
                        $products = Products::query()
                            ->where('ad', 'like', '%' . $filter_array[$i] . '%')
                            ->get();
                    }
                    else{
                        $products = Products::query()
                            ->whereIn('id',$ids)
                            ->where('ad', 'like', '%' . $filter_array[$i] . '%')
                            ->get();
                    }
                    foreach ($products as $product){
                        array_push($ids, $product->id);
                    }
                }

                $cat_products = Products::query()
                    ->join('filters','products.filtr', 'filters.id')
                    ->join('category','products.teyinat', 'category.id')
                    ->join('producers','products.istehsalci', 'producers.id')
                    ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                    ->whereIn('products.id', $ids)
                    ->orderBy('products.id', 'DESC')
                    ->paginate(9);

                $cat_count = Products::query()
                    ->join('filters','products.filtr', 'filters.id')
                    ->join('category','products.teyinat', 'category.id')
                    ->join('producers','products.istehsalci', 'producers.id')
                    ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                    ->whereIn('products.id', $ids)
                    ->orderBy('products.id', 'DESC')
                    ->count();
                $cat_type = 'Filterlər';
            }
            else {
                $cat_products = Products::query()
                    ->join('filters','products.filtr', 'filters.id')
                    ->join('category','products.teyinat', 'category.id')
                    ->join('producers','products.istehsalci', 'producers.id')
                    ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                    ->where(function($q)  use($filter){
                        $q->where('filters.filter', 'like', '%' . $filter . '%')
                        ->orWhere('category.teyinat', 'like', '%' . $filter . '%')
                        ->orWhere('producers.istehsalci', 'like', '%' . $filter . '%');
                    })
                    ->where('products.istehsalci', session()->get('brand'))
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                $cat_count = Products::query()
                    ->where('products.istehsalci', session()->get('brand'))
                    ->join('filters','products.filtr', 'filters.id')
                    ->join('category','products.teyinat', 'category.id')
                    ->join('producers','products.istehsalci', 'producers.id')
                    ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                    ->where(function($q)  use($filter){
                        $q->where('filters.filter', 'like', '%' . $filter . '%')
                        ->orWhere('category.teyinat', 'like', '%' . $filter . '%')
                        ->orWhere('producers.istehsalci', 'like', '%' . $filter . '%');
                    })
                    ->where('products.istehsalci', session()->get('brand'))
                    ->count();
                if (strlen($cat_products[0])){
                    $cat_type = $cat_products[0]->filtr;
                }
                else{
                    $cat_type = 'Filterlər';
                }
            }
            $products = Products::query()
                ->join('filters','products.filtr', 'filters.id')
                ->join('category','products.teyinat', 'category.id')
                ->join('producers','products.istehsalci', 'producers.id')
                ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                ->get();
            if (isset($_COOKIE['products'])) {
                $cookie_id = $_COOKIE['products'];
            } else {
                $cookie_id = ['545854'];
            }
            $cookie_products = Products::query()
                ->join('filters','products.filtr', 'filters.id')
                ->join('category','products.teyinat', 'category.id')
                ->join('producers','products.istehsalci', 'producers.id')
                ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                ->whereIn('products.id', $cookie_id)->get();
        }
        else{
            $producers = Producers::all();
            $category = Category::all();
            $filters = Filters::all();
            if (substr('' . $filter . '', 0, 4) == 'all_') {
                $filter = strtolower(substr('' . $filter . '', 4));
                $filter_array = explode(" ", $filter);
                $ids = [];
                for($i = 0; $i < count($filter_array); $i++){
                    if ($i == 0){
                        $products = Products::query()
                            ->where('ad', 'like', '%' . $filter_array[$i] . '%')
                            ->get();
                    }
                    else{
                        $products = Products::query()
                            ->whereIn('id',$ids)
                            ->where('ad', 'like', '%' . $filter_array[$i] . '%')
                            ->get();
                    }
                    foreach ($products as $product){
                        array_push($ids, $product->id);
                    }
                }

                $cat_products = Products::query()
                    ->join('filters','products.filtr', 'filters.id')
                    ->join('category','products.teyinat', 'category.id')
                    ->join('producers','products.istehsalci', 'producers.id')
                    ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                    ->whereIn('products.id', $ids)
                    ->orderBy('products.id', 'DESC')
                    ->paginate(9);

                $cat_count = Products::query()
                    ->join('filters','products.filtr', 'filters.id')
                    ->join('category','products.teyinat', 'category.id')
                    ->join('producers','products.istehsalci', 'producers.id')
                    ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                    ->whereIn('products.id', $ids)
                    ->orderBy('products.id', 'DESC')
                    ->count();
                $cat_type = 'Filterlər';
            }
            else {
                $cat_products = Products::query()
                    ->join('filters','products.filtr', 'filters.id')
                    ->join('category','products.teyinat', 'category.id')
                    ->join('producers','products.istehsalci', 'producers.id')
                    ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                    ->where('filters.filter', 'like', '%' . $filter . '%')
                    ->orWhere('category.teyinat', 'like', '%' . $filter . '%')
                    ->orWhere('producers.istehsalci', 'like', '%' . $filter . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                $cat_count = Products::query()
                    ->join('filters','products.filtr', 'filters.id')
                    ->join('category','products.teyinat', 'category.id')
                    ->join('producers','products.istehsalci', 'producers.id')
                    ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                    ->where('filters.filter', 'like', '%' . $filter . '%')
                    ->orWhere('category.teyinat', 'like', '%' . $filter . '%')
                    ->orWhere('producers.istehsalci', 'like', '%' . $filter . '%')
                    ->count();
                if (strlen($cat_products[0])){
                    $cat_type = $cat_products[0]->filtr;
                }
                else{
                    $cat_type = 'Filterlər';
                }
            }
            $products = Products::query()
                ->join('filters','products.filtr', 'filters.id')
                ->join('category','products.teyinat', 'category.id')
                ->join('producers','products.istehsalci', 'producers.id')
                ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                ->get();
            if (isset($_COOKIE['products'])) {
                $cookie_id = $_COOKIE['products'];
            } else {
                $cookie_id = ['545854'];
            }
            $cookie_products = Products::query()
                ->join('filters','products.filtr', 'filters.id')
                ->join('category','products.teyinat', 'category.id')
                ->join('producers','products.istehsalci', 'producers.id')
                ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
                ->whereIn('products.id', $cookie_id)->get();
        }
        return view('esas.category', ['producers' => $producers, 'cat_products' => $cat_products, 'cat_count' => $cat_count, 'category' => $category, 'filters' => $filters, 'cookie_products' => $cookie_products, 'products' => $products, 'cat_type' => $cat_type]);
    }

    public function category_filter(Request $request)
    {

        $appointment = json_decode($request->appointment);
        $filter = json_decode($request->filter);
        $brand = json_decode($request->brand);
        $categories = [];

        foreach ($appointment as $a) {
            $cat_c_id = Products::all();
            foreach ($cat_c_id as $cat_c) {
                if (str_replace(' ', '', $cat_c->teyinat) == $a) {
                    array_push($categories, $cat_c->id);
                }
            }
        }
        $filtrs = [];
        foreach ($filter as $f) {
            $cat_f_id = Products::query()->whereIn('id', $categories)->get();
            foreach ($cat_f_id as $cat_f) {
                if (str_replace(' ', '', $cat_f->filtr) == $f) {
                    array_push($filtrs, $cat_f->id);
                }
            }
        }
        $brands = [];
        foreach ($brand as $b) {
            $cat_b_id = Products::query()->whereIn('id', $filtrs)->get();
            foreach ($cat_b_id as $cat_b) {
                if (str_replace(' ', '', $cat_b->istehsalci) == $b) {
                    array_push($brands, $cat_b->id);
                }
            }
        }

        $cat_products = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->whereIn('products.id', $brands)
            ->where('products.status', '=', 1)
            ->orderBy('id', 'DESC')
            ->paginate(45);
        $cat_count = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->whereIn('products.id', $brands)
            ->where('products.status', '=', 1)
            ->orderBy('id', 'DESC')
            ->count();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'cat_products' => $cat_products,
            'cat_count' => $cat_count
        ]);
    }

    public function add_to_cart(Request $request)
    {
        $id = $request->id;
        $say = $request->say;
        setcookie('cart[' . $id . ']', $say, time() + 86400);
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function remove_cart(Request $request)
    {
        $id = $request->id;
        setcookie('cart[' . $id . ']', $id, time() - 86400);
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
    public function decrease (Request $request){
        $quantity = $request->quantity;
        $id = $request->id;
        setcookie('cart[' . $id . ']', $quantity, time() + 86400);
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
    public function increase (Request $request){
        $quantity = $request->quantity;
        $id = $request->id;
        setcookie('cart[' . $id . ']', $quantity, time() + 86400);
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function add_cookie(Request $request)
    {
        $id = $request->id;
        setcookie('products[' . $id . ']', $id, time() + 86400);
    }

    public function add_comment(CommentRequest $request)
    {
        $add = new Comments();
        $add->mehsul_id = $request->input('id');
        $add->ad = $request->input('name');
        $add->email = $request->input('email');
        $add->basliq = $request->input('title');
        $add->movzu = $request->input('subject');
        $add->reytinq = $request->input('rating');
        $add->save();
        $id = $request->input('id');
        $ratings = Comments::where('mehsul_id', $id)->select('reytinq')->get();
        $sum = 0;
        foreach ($ratings as $key => $rating) {
            $say = $key + 1;
            $sum += $rating->reytinq;
        }
        $average = round($sum / $say, 1);
        $edit = Products::find($id);
        $edit->reytinq = $average;
        $edit->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function add_wishlist(Request $request)
    {
        $id = $request->id;
        $add_wishlist = new Wishlist();
        $found = Wishlist::where('product_id', '=', $id)->count();
        if ($found == 0) {
            $add_wishlist->product_id = $id;
            $add_wishlist->user_id = Auth::id();
            $add_wishlist->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function delete_wish(Request $request)
    {
        $id = $request->id;
        $delete_wish = Wishlist::find($id);
        $delete_wish->delete();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function add_user(UserRequest $request)
    {
        $name = $request->name;
        $surname = $request->surname;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $add_user = new User();
        $add_user->name = $name;
        $add_user->surname = $surname;
        $add_user->phone = $phone;
        $add_user->email = $email;
        $add_user->category = 'normal';
        $add_user->password = Hash::make($password);
        $add_user->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function add_company(CompanyRequest $request)
    {
        $name = $request->name;
        $surname = $request->surname;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $add_user = new User();
        $add_user->name = $name;
        $add_user->surname = $surname;
        $add_user->phone = $phone;
        $add_user->email = $email;
        $add_user->category = 'company';
        $add_user->password = Hash::make($password);
        $add_user->save();
        $id = $add_user->id;

        $company_name = $request->company_name;
        $company_address = $request->company_address;
        $company_voen = $request->company_voen;
        $company_leader = $request->company_leader;
        $company_leader_ns = $request->company_leader_ns;

        $add_company = new Companies();
        $add_company->user_id = $id;
        $add_company->name = $company_name;
        $add_company->address = $company_address;
        $add_company->voen = $company_voen;
        $add_company->leader = $company_leader;
        $add_company->leader_ns = $company_leader_ns;
        $add_company->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function add_agent(AgentRequest $request)
    {
        $name = $request->name;
        $surname = $request->surname;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $add_user = new User();
        $add_user->name = $name;
        $add_user->surname = $surname;
        $add_user->phone = $phone;
        $add_user->email = $email;
        $add_user->category = 'agent';
        $add_user->password = Hash::make($password);
        $add_user->save();
        $id = $add_user->id;

        $agent_name = $request->agent_name;
        $agent_cat = $request->agent_cat;
        $agent_address = $request->agent_address;
        $agent_voen = $request->agent_voen;
        $agent_leader = $request->agent_leader;
        $agent_leader_ns = $request->agent_leader_ns;
        $agent_bank = $request->agent_bank;
        $agent_h_account = $request->agent_h_account;
        $agent_m_account = $request->agent_m_account;

        $add_agent = new Agents();
        $add_agent->user_id = $id;
        $add_agent->name = $agent_name;
        $add_agent->category = $agent_cat;
        $add_agent->address = $agent_address;
        $add_agent->voen = $agent_voen;
        $add_agent->leader = $agent_leader;
        $add_agent->leader_ns = $agent_leader_ns;
        $add_agent->bank = $agent_bank;
        $add_agent->h_account = $agent_h_account;
        $add_agent->m_account = $agent_m_account;
        $add_agent->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function cabinet(Request $request)
    {
        $id = Auth::id();
        $users = User::where('id', '=', $id)->get();
        $agents = Agents::leftjoin('users', 'agents.user_id', '=', 'users.id')->where('user_id', '=', $id)->select('users.id as user_id', 'agents.id as agent_id', 'users.name as user_name', 'agents.name as agent_name', 'surname', 'phone', 'email', 'points', 'users.category as user_category', 'agents.category as agent_category', 'address', 'voen', 'leader', 'leader_ns', 'bank', 'h_account', 'm_account')->get();
        $companies = Companies::leftjoin('users', 'companies.user_id', '=', 'users.id')->where('user_id', '=', $id)->select('users.id as user_id', 'companies.id as company_id', 'users.name as user_name', 'companies.name as company_name', 'surname', 'phone', 'email', 'points', 'category', 'address', 'voen', 'leader', 'leader_ns')->get();
        $orders = Order_products::leftjoin('products' , 'order_products.product_id', '=','products.id')->where('user_id' , '=' , Auth::id())->select('order_products.quantity','order_products.price','order_products.created_at','products.ad')->get();
        $address = Address::where('user_id' , $id)->first();
        return view('esas.cabinet',
            ['users' => $users, 'agents' => $agents, 'companies' => $companies , 'orders'=>$orders , 'address'=>$address]
        );
    }
    public function order(OrderRequest $request)
    {
        if (Auth::id()) {
            $request->flash();
            $user_id = Auth::id();
            $name = Auth::user()->name;
            $surname = Auth::user()->surname;
            $email = Auth::user()->email;
            $phone = Auth::user()->phone;
        } else {
            $request->has('name');
            $name = $request->name;
            $surname = $request->surname;
            $email = $request->email;
            $phone = $request->number;
        }
        $order_token = $request->order_token;
        $city = $request->city;
        $country = $request->country;
        $address = $request->address;
        $post_code = $request->post_code;
        $reciever = $request->reciever;
        $payment = $request->payment;
        $products = json_decode($request->products, true);
        $points = $request->points;
        $add = new Orders();
        if (Auth::id()){
            $add->user_id = $user_id;
        }
        $add->order_token = $order_token;
        $add->name = $name;
        $add->surname = $surname;
        $add->email = $email;
        $add->phone_number = $phone;
        $add->address = $address;
        $add->city = $city;
        $add->country = $country;
        $add->post_code = $post_code;
        $add->reciever = $reciever;
        $add->payment = $payment;
        $add->save();

        foreach ($products as $key => $value) {
            $add1 = new Order_products();
            $add1->order_token = $order_token;
            if (Auth::id()){
                $add1->user_id = $user_id;
            }
            $add1->price = $products[$key]['qiymet'];
            $add1->product_id = $products[$key]['id'];
            setcookie('cart['.$products[$key]['id'].']', $products[$key]['say'],time() - 86400);
            $add1->quantity = $products[$key]['say'];
            $add1->save();
        }
        if (Auth::id()){
            $edit = User::find(Auth::id());
            $old_points = $edit->points;
            $new_points = $old_points + $points;
            $edit->points = $new_points;
            $edit->save();
        }



        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function update_company(UpdateCompanyRequest $request)
    {
        $user_id = $request->user_id;
        $company_id = $request->company_id;
        $update_user = User::find($user_id);
        $update_user->name = $request->name;
        $update_user->surname = $request->surname;
        $password = $request->password;
        if ($update_user->password != $password){
            $update_user->password = Hash::make($password);
        }
        $update_user->save();

        $update_company = Companies::find($company_id);
        $update_company->name = $request->company_name;
        $update_company->address = $request->company_address;
        $update_company->voen = $request->company_voen;
        $update_company->leader = $request->company_leader;
        $update_company->leader_ns = $request->company_leader_ns;
        $update_company->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }

    public function update_agent(UpdateAgentRequest $request)
    {
        $user_id = $request->user_id;
        $agent_id = $request->agent_id;
        $update_user = User::find($user_id);
        $update_user->name = $request->name;
        $update_user->surname = $request->surname;
        $password = $request->password;
        if ($update_user->password != $password){
            $update_user->password = Hash::make($password);
        }

        $update_user->save();
        $update_agent = Agents::find($agent_id);
        $update_agent->name = $request->agent_name;
        $update_agent->address = $request->agent_address;
        $update_agent->voen = $request->agent_voen;
        $update_agent->voen = $request->agent_voen;
        $update_agent->leader = $request->agent_leader;
        $update_agent->leader_ns = $request->agent_leader_ns;
        $update_agent->bank = $request->agent_bank;
        $update_agent->h_account = $request->agent_h_account;
        $update_agent->m_account = $request->agent_m_account;
        $update_agent->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }

    public function update_user(UpdateUserRequest $request)
    {
        $user_id = $request->user_id;
        $update_user = User::find($user_id);
        $update_user->name = $request->name;
        $update_user->surname = $request->surname;
        $password = $request->password;
        if ($update_user->password != $password){
            $update_user->password = Hash::make($password);
        }

        $update_user->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }
    public function address(AddressRequest $request)
    {
        $user_id = Auth::id();
        $addres = $request->input('unvan');
        $city = $request->input('seher');
        $country = $request->input('olke');
        $post_code = $request->input('poct');
        $reciever = $request->input('sexs');
        $add = Address::where('user_id' , $user_id)->first();
        if (!$add){
            $add = new Address();
        }
        $add->user_id = $user_id;
        $add->address = $addres;
        $add->city = $city;
        $add->country = $country;
        $add->post_code = $post_code;
        $add->reciever = $reciever;
        $add->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }

    public function session(Request $request)
    {
        $brand = $request->brand;
        $request->session()->put('brand',$brand);
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }

    public function forget_session(Request $request)
    {
        session()->flush();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }
}
