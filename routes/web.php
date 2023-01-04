<?php

use Illuminate\Support\Facades\Route;
use App\Products\Products;
use App\Producers\Producers;
use App\Wishlists\Wishlist;
use App\Category\Category;
use App\Agents\Agents;
use App\Companies\Companies;
use App\Reklam2\Reklam2;
use App\Reklam1\Reklam1;
use App\Reklam3\Reklam3;
use App\Aboutus\Aboutus;
use App\Address\Address;
use App\Order_products\Order_products;
use App\Orders\Orders;
use App\User;
use App\Filters\Filters;
use App\News\News;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (session()->exists('brand')){
        $products = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->where('products.istehsalci', session()->get('brand'))
            ->get();
        $discount = Products::where('endirim', '>', '0')->count();
        $last_inserted_products = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->where('products.istehsalci', session()->get('brand'))
            ->orderBy('id','DESC')
            ->take(16)
            ->get();
    }
    else{
        $products = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->get();
        $discount = Products::where('endirim', '>', '0')->count();
        $last_inserted_products = Products::query()
            ->join('filters','products.filtr', 'filters.id')
            ->join('category','products.teyinat', 'category.id')
            ->join('producers','products.istehsalci', 'producers.id')
            ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
            ->orderBy('id','DESC')
            ->take(16)
            ->get();
    }
    $producers = Producers::all();
    $news = News::query()->get()->take(3);
    return view('esas.mainpage', [
        'products'=>$products,'last_inserted_products'=>$last_inserted_products,'producers'=>$producers, 'discount'=>$discount, 'news'=>$news
    ]);
});

Route::get('/wishlist', function () {
    $wishlists = Wishlist::query()
        ->join('products', 'wishlist.product_id', '=', 'products.id')
        ->join('producers', 'producers.id', '=', 'products.istehsalci')
        ->where('wishlist.user_id', '=', \Illuminate\Support\Facades\Auth::id())
        ->select('status', 'wishlist.id as id', 'endirim', 'products.id as prod_id', 'sekil1', 'sekil2', 'sekil3', 'producers.istehsalci as istehsalci', 'ad', 'qiymet')
        ->get();
    return view('esas.wishlist', compact('wishlists'));
})->middleware('auth');
Route::get('/index', function () {
    return view('esas.index');
});
View::composer(['esas.index'], function ($view) {
    $producers = Producers::all();
    $categories = Category::all();
    $filters = Filters::all();
    $view->with('producers', $producers);
    $view->with('categories', $categories);
    $view->with('filters', $filters);
});
Route::get('/admin_login', function () {
    return view('auth.admin_login');
})->middleware('guest');


Route::get('/cabinet',[\App\Http\Controllers\Main\MainController::class, 'cabinet'])->middleware('auth');

Route::get('/single', function () {
    return view('esas.single');
});

Route::get('/add_product_excel', function () {
    return view('Admin.add_product_excel');
})->middleware('admin');

Route::get('/checkout', function () {
    $id = [];
    if (isset($_COOKIE['cart'])) {
        foreach ($_COOKIE['cart'] as $name => $value) {
            $name = htmlspecialchars($name);
            array_push($id, $name);
        }
    }
    else{
        $id = ['545854'];
    }
    $products = Products::query()
        ->join('filters','products.filtr', 'filters.id')
        ->join('category','products.teyinat', 'category.id')
        ->join('producers','products.istehsalci', 'producers.id')
        ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
        ->whereIn('products.id' , $id)
        ->get();
    $address = Address::where('user_id' , \Illuminate\Support\Facades\Auth::id())->first();
    return view('esas.checkout',[
        'products'=>$products , 'address'=>$address
        ]);
});
Route::get('/cart', function () {
    $id = [];
    if (isset($_COOKIE['cart'])) {
        foreach ($_COOKIE['cart'] as $name => $value) {
            $name = htmlspecialchars($name);
            array_push($id, $name);
        }
    }
    else{
        $id = ['545854'];
    }
    $products = Products::whereIn('id' , $id)->get();
    return view('esas.cart',[
        'products' =>$products
    ]);
});
Route::get('/categoryy', function () {
    return view('esas.category');
});
Route::get('/table', function () {
    $products = Products::query()
        ->join('filters','products.filtr', 'filters.id')
        ->join('category','products.teyinat', 'category.id')
        ->join('producers','products.istehsalci', 'producers.id')
        ->select('products.id as id','ad','qiymet','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filters.filter as filtr','category.teyinat as teyinat','producers.istehsalci as istehsalci','reytinq','endirim','movcudluq','status','baxis')
        ->orderBy('id' ,'desc')
        ->paginate(50);
    $filters = \App\Filters\Filters::all();
    $categories = \App\Category\Category::all();
    $producers = Producers::all();
    return view('Admin.table', [
        'products'=>$products,'categories'=>$categories,'filters'=>$filters,'producers'=>$producers

    ]);
})->middleware('admin');
Route::get('/discounted_products', function () {
    $products = Products::where( 'endirim' , '!=' , '0')->select('ad' , 'id' , 'sekil1' , 'qiymet' , 'endirim')->orderBy('id' , 'desc')->get();
    return view('Admin.endirimli_mehsullar', [
        'products'=>$products

    ]);
})->middleware('admin');
Route::get('/add_discount', function () {
    $products = Products::where( 'endirim' , '=' , '0')->select('ad' , 'id' , 'sekil1' , 'qiymet')->orderBy('id' , 'desc')->get();
    return view('Admin.add_discount', [
        'products'=>$products

    ]);
})->middleware('admin');
Route::get('/producer_table', function () {
    $producers = Producers::all();
    return view('Admin.producers_table', compact('producers'));
})->middleware('admin');

Route::get('/haqqimizda', function () {
    $aboutus = Aboutus::all();
    return view('Admin.haqqimizda', [
        'aboutus' => $aboutus
    ]);
})->middleware('admin');
Route::get('/reklam1', function () {
    $reklam1 = Reklam1::all();
    return view('Admin.reklam1', [
        'reklam1' => $reklam1
    ]);
})->middleware('admin');
Route::get('/reklam2', function () {
    $reklam2 = Reklam2::all();
    return view('Admin.reklam2', [
        'reklam2' => $reklam2
    ]);
})->middleware('admin');
Route::get('/reklam3', function () {
    $reklam3 = Reklam3::all();
    return view('Admin.reklam3', [
        'reklam3' => $reklam3
    ]);
})->middleware('admin');

Route::get('/add_product_table', function () {
    $producers = Producers::all();
    $categories = Category::all();
    $filters = Filters::all();
    return view('Admin.add_product' , [
        'producers'=>$producers,'categories'=>$categories,'filters'=>$filters
    ]);
})->middleware('admin');

Route::get('/categories_table', function () {
    $categories = Category::all();
    return view('Admin.categories_table' , [
        'categories'=>$categories,
    ]);
})->middleware('admin');

Route::get('/filters_table', function () {
    $filters = Filters::all();
    return view('Admin.filters_table' , [
        'filters'=>$filters,
    ]);
})->middleware('admin');
Route::get('/aboutus', function () {
    $about = Aboutus::all();
    return view('esas.about_us', [
        'about' => $about
    ]);
});
Route::get('/adv1', function () {
    $reklam1 = Reklam1::all();
    return view('esas.reklam1', [
        'reklam1' => $reklam1
    ]);
});
Route::get('/adv2', function () {
    $reklam2 = Reklam2::all();
    return view('esas.reklam2', [
        'reklam2' => $reklam2
    ]);
});
Route::get('/adv3', function () {
    $reklam2 = Reklam2::all();
    return view('esas.reklam2', [
        'reklam2' => $reklam2
    ]);
});
Route::get('/adv4', function () {
    $reklam3 = Reklam3::all();
    return view('esas.reklam4', [
        'reklam3' => $reklam3
    ]);
});

Route::get('/news', function () {
    $news = News::all();
    return view('Admin.news', [
        'news' => $news
    ]);
})->middleware('admin');

Route::get('/add_news', function () {
    return view('Admin.add_news');
})->middleware('admin');

Route::get('/add_admin', function () {
    $users = User::where('category','!=','admin')->get();
    return view('Admin.add_admin',['users'=>$users]);
})->middleware('admin');

Route::get('/edit_news/{id}', function ($id) {
    $new = News::find($id);
    return view('Admin.edit_news',[
        'new' => $new
    ]);
})->middleware('admin');

Route::get('/new/{id}', function ($id) {
    $new = News::find($id);
    return view('esas.new',[
        'new' => $new
    ]);
});

Route::get('/orders', function () {
    $orders = Orders::orderBy('id', 'desc')->get();
    return view('Admin.orders', compact('orders'));
})->middleware('admin');
Route::get('/order_products/{token}', function ($token) {
    if (\Illuminate\Support\Facades\Auth::user()->category=='manager'){
        $edit = Orders::where('order_token' , $token)->first();
        $edit->manager = Auth::user()->name." ".Auth::user()->surname;
        $edit->save();
    }
    $order = Orders::where('order_token' , $token)->first();
    $order_products = Order_products::leftjoin('products' , 'order_products.product_id' , '=' , 'products.id')->where('order_token' , $token)->select('products.id' , 'products.ad' , 'order_products.price' , 'order_products.quantity')->get();
    return view('Admin.order_products', [
        'order'=>$order , 'order_products' => $order_products
    ]);
})->middleware('admin');

Route::post('/session',[\App\Http\Controllers\Main\MainController::class, 'session'])->name( 'session');
Route::post('/forget_session',[\App\Http\Controllers\Main\MainController::class, 'forget_session'])->name( 'forget_session');
Route::post('/delete_product',[\App\Http\Controllers\Admin\AdminController::class, 'delete_product'])->name( 'delete_product');
Route::post('/edit_order',[\App\Http\Controllers\Admin\AdminController::class, 'edit_order'])->name( 'edit_order');
Route::post('/producer_delete',[\App\Http\Controllers\Admin\AdminController::class, 'producer_delete'])->name( 'producer_delete');
Route::post('/delete_order',[\App\Http\Controllers\Admin\AdminController::class, 'delete_order'])->name( 'delete_order');
Route::post('/delete_image1',[\App\Http\Controllers\Admin\AdminController::class, 'delete_image1'])->name( 'delete_image1');
Route::post('/delete_image2',[\App\Http\Controllers\Admin\AdminController::class, 'delete_image2'])->name( 'delete_image2');
Route::post('/delete_image3',[\App\Http\Controllers\Admin\AdminController::class, 'delete_image3'])->name( 'delete_image3');
Route::post('/edit_images',[\App\Http\Controllers\Admin\AdminController::class, 'edit_images'])->name( 'edit_images');
Route::post('/add_product',[\App\Http\Controllers\Admin\AdminController::class, 'add_product'])->name( 'add_product');
Route::post('/edit_products',[\App\Http\Controllers\Admin\AdminController::class, 'edit_products'])->name( 'edit_products');
Route::post('/edit_discount',[\App\Http\Controllers\Admin\AdminController::class, 'edit_discount'])->name( 'edit_discount');
Route::post('/add_filter',[\App\Http\Controllers\Admin\AdminController::class, 'add_filter'])->name( 'add_filter');
Route::post('/add_category',[\App\Http\Controllers\Admin\AdminController::class, 'add_category'])->name( 'add_category');
Route::post('/add_discount',[\App\Http\Controllers\Admin\AdminController::class, 'add_discount'])->name( 'add_discount');
Route::post('/edit_producer',[\App\Http\Controllers\Admin\AdminController::class, 'edit_producer'])->name( 'edit_producer');
Route::post('/edit_category',[\App\Http\Controllers\Admin\AdminController::class, 'edit_category'])->name( 'edit_category');
Route::post('/delete_category',[\App\Http\Controllers\Admin\AdminController::class, 'delete_category'])->name( 'delete_category');
Route::post('/edit_filter',[\App\Http\Controllers\Admin\AdminController::class, 'edit_filter'])->name( 'edit_filter');
Route::post('/delete_filter',[\App\Http\Controllers\Admin\AdminController::class, 'delete_filter'])->name( 'delete_filter');
Route::post('/close_existence',[\App\Http\Controllers\Admin\AdminController::class, 'close_existence'])->name( 'close_existence');
Route::post('/open_existence',[\App\Http\Controllers\Admin\AdminController::class, 'open_existence'])->name( 'open_existence');
Route::post('/open_status',[\App\Http\Controllers\Admin\AdminController::class, 'open_status'])->name( 'open_status');
Route::post('/close_status',[\App\Http\Controllers\Admin\AdminController::class, 'close_status'])->name( 'close_status');
Route::post('/add_producer',[\App\Http\Controllers\Admin\AdminController::class, 'add_producer'])->name( 'add_producer');
Route::post('/delete_wish',[\App\Http\Controllers\Main\MainController::class, 'delete_wish'])->name( 'delete_wish');
Route::post('/about_us',[\App\Http\Controllers\Admin\AdminController::class, 'about_us'])->name( 'about_us');
Route::post('/reklam1',[\App\Http\Controllers\Admin\AdminController::class, 'reklam1'])->name( 'reklam1');
Route::post('/reklam2',[\App\Http\Controllers\Admin\AdminController::class, 'reklam2'])->name( 'reklam2');
Route::post('/reklam3',[\App\Http\Controllers\Admin\AdminController::class, 'reklam3'])->name( 'reklam3');
Route::post('/add_news',[\App\Http\Controllers\Admin\AdminController::class, 'add_news'])->name( 'add_news')->middleware('admin');
Route::post('/edit_news',[\App\Http\Controllers\Admin\AdminController::class, 'edit_news'])->name( 'edit_news')->middleware('admin');
Route::post('/delete_news',[\App\Http\Controllers\Admin\AdminController::class, 'delete_news'])->name( 'delete_news')->middleware('admin');
Route::post('/register',[\App\Http\Controllers\Main\MainController::class, 'register'])->name( 'register');
Route::post('/decrease',[\App\Http\Controllers\Main\MainController::class, 'decrease'])->name( 'decrease');
Route::post('/increase',[\App\Http\Controllers\Main\MainController::class, 'increase'])->name( 'increase');
Route::post('/add_cookie',[\App\Http\Controllers\Main\MainController::class, 'add_cookie'])->name( 'add_cookie');
Route::post('/add_comment',[\App\Http\Controllers\Main\MainController::class, 'add_comment'])->name( 'add_comment');
Route::post('/add_product_excel',[\App\Http\Controllers\Admin\AdminController::class, 'add_product_excel'])->name( 'add_product_excel');

Route::get('/edit_product/{id}',[\App\Http\Controllers\Main\MainController::class, 'edit_product'])->middleware('admin');

Route::get('/single/{id}',[\App\Http\Controllers\Main\MainController::class, 'single']);

Route::get('/category/{filter}',[\App\Http\Controllers\Main\MainController::class, 'category']);

Route::get('/category_filter',[\App\Http\Controllers\Main\MainController::class, 'category_filter'])->name('category_filter');

Route::post('/add_to_cart',[\App\Http\Controllers\Main\MainController::class, 'add_to_cart'])->name( 'add_to_cart');

Route::get('/add_wishlist',[\App\Http\Controllers\Main\MainController::class, 'add_wishlist'])->name( 'add_wishlist');

Route::post('/remove_cart',[\App\Http\Controllers\Main\MainController::class, 'remove_cart'])->name( 'remove_cart');

Route::post('/order',[\App\Http\Controllers\Main\MainController::class, 'order'])->name( 'order');

Route::post('/address',[\App\Http\Controllers\Main\MainController::class, 'address'])->name( 'address');
\Illuminate\Support\Facades\Auth::Routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add_user',[\App\Http\Controllers\Main\MainController::class, 'add_user'])->name( 'add_user');
Route::get('/add_company',[\App\Http\Controllers\Main\MainController::class, 'add_company'])->name( 'add_company');
Route::get('/add_agent',[\App\Http\Controllers\Main\MainController::class, 'add_agent'])->name( 'add_agent');
Route::get('/update_company',[\App\Http\Controllers\Main\MainController::class, 'update_company'])->name( 'update_company');
Route::get('/update_agent',[\App\Http\Controllers\Main\MainController::class, 'update_agent'])->name( 'update_agent');
Route::get('/update_user',[\App\Http\Controllers\Main\MainController::class, 'update_user'])->name( 'update_user');
Route::post('/add_admin',[\App\Http\Controllers\Admin\AdminController::class, 'add_admin'])->name( 'add_admin');
