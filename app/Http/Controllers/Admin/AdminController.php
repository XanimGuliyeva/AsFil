<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\News\NewsRequest;
use App\Http\Requests\News\EditNewsRequest;
use App\News\News;
use App\Reklam2\Reklam2;
use App\Imports\ProductsImport;
use App\Reklam1\Reklam1;
use App\Reklam3\Reklam3;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\DiscountEdit;
use App\Http\Requests\DiscountRequest;
use App\Http\Requests\EditOrder;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\ProducerRequest;
use App\Http\Requests\ProductRequest;
use App\Aboutus\Aboutus;
use App\Category\Category;
use App\Filters\Filters;
use App\Orders\Orders;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Order_products\Order_products;
use App\Producers\Producers;
use App\Products\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function delete_product(Request $request){
        $id = $request -> id;
        $product = Products::find($id);
        if ($product->sekil1 != 'default.png'){
            $image_path = app_path("../images/{$product->sekil1}");
            unlink($image_path);
        }
        if ($product->sekil2 != 'default.png'){
            $image_path2 = app_path("../images/{$product->sekil2}");
            unlink($image_path2);
        }
        if ($product->sekil3 != 'default.png'){
            $image_path3 = app_path("../images/{$product->sekil3}");
            unlink($image_path3);
        }
        $product->delete();
        setcookie('cart[' . $id . ']', $id, time() - 86400);
        return response()->json([
            'status' =>true,
            'message' => 'success'
        ]);
    }
    public function add_product(ProductRequest $products){
        $add = new Products();
        $add->ad = $products->input('ad');
        $add->ambar_kodu = $products->input('ambar_kodu');
        $add->istehsalci_kodu = $products->input('istehsalci_kodu');
        $add->haqqinda = $products->input('haqqinda');
        $add->filtr = $products->input('filtr');
        $add->teyinat = $products->input('teyinat');
        $add->qiymet = $products->input('qiymet');
        $add->istehsalci = $products->input('istehsalci');
        if ($products->hasfile('sekil1')){
            $file1 = $products->file('sekil1');
            $extension1 = $file1->getClientOriginalExtension();
            $filename1 = time().'.'.$extension1;
            $file1->move('images/', $filename1);
            $add->sekil1 = $filename1;
        }
        else{
            $add->sekil1 = 'default.png';
            $filename1 = 'default.png';
        }
        if ($products->hasfile('sekil2')){
            $file2 = $products->file('sekil2');
            $extension2 = $file2->getClientOriginalExtension();
            $filename2 = (time()+1).'.'.$extension2;
            $file2->move('images/', $filename2);
            $add->sekil2 = $filename2;
        }
        else{
            $add->sekil2 = 'default.png';
        }
        if ($products->hasfile('sekil3')){
            $file3 = $products->file('sekil3');
            $extension3 = $file3->getClientOriginalExtension();
            $filename3 = (time()+2).'.'.$extension3;
            $file3->move('images/', $filename3);
            $add->sekil3 = $filename3;
        }
        else{
            $add->sekil3 = 'default.png';
        }
        $add->save();
        return response()->json([
            'status' => $filename1,
            'message' => 'success',
            'id' => $add->id
        ]);
    }

    public function edit_products(ProductRequest $products)
    {
        $id = $products->id;
        $edit = Products::find($id);
        $edit->ad = $products->ad;
        $edit->ambar_kodu = $products->ambar_kodu;
        $edit->istehsalci_kodu = $products->istehsalci_kodu;
        $edit->haqqinda = $products->haqqinda;
        $edit->filtr = $products->filtr;
        $edit->teyinat = $products->teyinat;
        $edit->qiymet = $products->qiymet;
        $edit->endirim = $products->endirim;
        $edit->istehsalci = $products->istehsalci;
        $edit->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }

    public function edit_images(Request $request){
        $id = $request->id;
        $edit = Products::find($id);
        if ($request->hasfile('sekil1')){
            if($edit->sekil1 != 'default.png'){
                $image_path1 = app_path("../images/{$edit->sekil1}");
                unlink($image_path1);
            }
            $file1 = $request->file('sekil1');
            $extension1 = $file1->getClientOriginalExtension();
            $filename1 = time().'.'.$extension1;
            $file1->move('images/', $filename1);
            $edit->sekil1 = $filename1;
        }

        if ($request->hasfile('sekil2')){
            if($edit->sekil2 != 'default.png'){
                $image_path2 = app_path("../images/{$edit->sekil2}");
                unlink($image_path2);
            }
            $file2 = $request->file('sekil2');
            $extension2 = $file2->getClientOriginalExtension();
            $filename2 = (time()+1).'.'.$extension2;
            $file2->move('images/', $filename2);
            $edit->sekil2 = $filename2;
        }

        if ($request->hasfile('sekil3')){
            if($edit->sekil3 != 'default.png'){
                $image_path3 = app_path("../images/{$edit->sekil3}");
                unlink($image_path3);
            }
            $file3 = $request->file('sekil3');
            $extension3 = $file3->getClientOriginalExtension();
            $filename3 = (time()+2).'.'.$extension3;
            $file3->move('images/', $filename3);
            $edit->sekil3 = $filename3;
        }
        $edit->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }

    public function delete_image1(Request $request){
        $id = $request -> id;
        $product = Products::find($id);

        if ($product->sekil1 != 'default.png'){
            $image_path = app_path("../images/{$product->sekil1}");
            unlink($image_path);
        }

        $product->sekil1 = 'default.png';
        $product->save();
        return response()->json([
            'status' =>true,
            'message' => 'success'
        ]);
    }

    public function delete_image2(Request $request){
        $id = $request -> id;
        $product = Products::find($id);
        if ($product->sekil2 != 'default.png') {
            $image_path = app_path("../images/{$product->sekil2}");
            unlink($image_path);
        }
        $product->sekil2 = 'default.png';
        $product->save();
        return response()->json([
            'status' =>true,
            'message' => 'success'
        ]);
    }

    public function delete_image3(Request $request){
        $id = $request -> id;
        $product = Products::find($id);

        if ($product->sekil3 != 'default.png') {
            $image_path = app_path("../images/{$product->sekil3}");
            unlink($image_path);
        }

        $product->sekil3 = 'default.png';
        $product->save();
        return response()->json([
            'status' =>true,
            'message' => 'success'
        ]);
    }
    public function add_filter(FilterRequest $request)
    {
        $filter = new Filters();
        $filter->filter = $request->input('filter');
        $filter->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
    public function about_us(Request $request)
    {
        if (Aboutus::find(1)){
            $content = Aboutus::find(1);
        }else{
            $content = new Aboutus();
        }
        $content->content = $request->mycontent;
        $content->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
    public function reklam1(Request $request)
    {
        if (Reklam1::find(1)){
            $content = Reklam1::find(1);
        }else{
            $content = new Reklam1();
        }
        $content->content = $request->mycontent;
        $content->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
    public function reklam2(Request $request)
    {
        if (Reklam2::find(1)){
            $content = Reklam2::find(1);
        }else{
            $content = new Reklam2();
        }
        $content->content = $request->mycontent;
        $content->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
    public function reklam3(Request $request)
    {
        if (Reklam3::find(1)){
            $content = Reklam3::find(1);
        }else{
            $content = new Reklam3();
        }
        $content->content = $request->mycontent;
        $content->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }


    public function add_category(CategoryRequest $request)
    {
        $category = new Category();
        $category->teyinat = $request->input('teyinat');
        $category->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }


    public function close_existence(Request $request){
        $id = $request->id;
        $close_existence = Products::find($id);
        $close_existence->movcudluq = 0;
        $close_existence->save();

        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }


    public function open_existence(Request $request){
        $id = $request->id;
        $open_existence = Products::find($id);
        $open_existence->movcudluq = 1;
        $open_existence->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function close_status(Request $request){
        $id = $request->id;
        $close_status = Products::find($id);
        $close_status->status = 0;
        $close_status->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function open_status(Request $request){
        $id = $request->id;
        $open_status = Products::find($id);
        $open_status->status = 1;
        $open_status->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function add_producer(ProducerRequest $request){
        $producer = new Producers();
        $producer->istehsalci = $request->istehsalci;
        if ($request->hasfile('sekil')){
            $file4 = $request->file('sekil');
            $extension4 = $file4->getClientOriginalExtension();
            $filename4 = time().'.'.$extension4;
            $file4->move('images/', $filename4);
            $producer->sekil = $filename4;
        }
        else{
            $producer->sekil = 'default.png';
            $filename4 = 'default.png';
        }
        $producer->save();
        return response()->json([
            'status' => $filename4,
            'message' => 'success',
            'id' => $producer->id
        ]);
    }

    public function producer_delete(Request $request){
        $id = $request -> id;
        $producer = Producers::find($id);
        if ($producer->sekil != 'default.png'){
            $image_path = app_path("../images/{$producer->sekil}");
            unlink($image_path);
        }
        $producer->delete();
        return response()->json([
            'status' =>true,
            'message' => 'success'
        ]);
    }
    public function delete_order(Request $request){
        $id = $request -> id;
        $token = $request->token;
        $order = Orders::find($id);
        $order->delete();
        $order_products = Order_products::where('order_token' , $token)->get();
        foreach ($order_products as $value){
            $value->delete();
        }

        return response()->json([
            'status' =>true,
            'message' => 'success'
        ]);
    }
    public function edit_order(EditOrder $request){
        $id = $request -> id;
        $order = Orders::find($id);
        $order->email = $request->email;
        $order->phone_number = $request->number;
        $order->address = $request->address;
        $order->save();
        return response()->json([
            'status' =>true,
            'message' => 'success'
        ]);
    }

    public function edit_producer(ProducerRequest $request){
        $id = $request->id;
        $edit_producer = Producers::find($id);
        if ($request->hasfile('sekil')){
            if($edit_producer->sekil != 'default.png') {
                $image_path = app_path("../images/{$edit_producer->sekil}");
                unlink($image_path);
            }
            $file = $request->file('sekil');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
            $edit_producer->sekil = $filename;
        }
        else{
            $filename = 'default.png';
        }
        $edit_producer->istehsalci = $request->istehsalci;
        $edit_producer->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'file' => $filename
        ]);
    }
    public function edit_category(CategoryRequest $request){
        $id = $request->id;
        $edit_category = Category::find($id);
        $edit_category->teyinat = $request->input('teyinat');
        $edit_category->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }
    public function delete_category(Request $request){
        $id = $request -> id;
        $delete_category = Category::find($id);
        $delete_category->delete();
        return response()->json([
            'status' =>true,
            'message' => 'success'
        ]);
    }
    public function edit_filter(FilterRequest $request){
        $id = $request->id;
        $edit_category = Filters::find($id);
        $edit_category->filter = $request->input('filter');
        $edit_category->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }
    public function edit_discount(DiscountEdit $request){
        $id = $request->id;
        $edit_discount = Products::find($id);
        $edit_discount ->endirim = $request->endirim;
        $edit_discount ->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }
    public function add_discount(DiscountRequest $request){
        $ids = $request->ids;
        $endirim = $request->endirim;
        $add_discount = Products::whereIn('id' , $ids)->get();
        foreach ($add_discount as $value){
            $value ->endirim = $endirim;
            $value->save();
        }
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }
    public function delete_filter(Request $request){
        $id = $request -> id;
        $delete_category = Filters::find($id);
        $delete_category->delete();
        return response()->json([
            'status' =>true,
            'message' => 'success'
        ]);
    }

    public function add_product_excel(Request $request){
        Excel::import(new ProductsImport, $request->file('excel'));
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }

    public function add_news(NewsRequest $request)
    {
        $add_news = new News();
        $add_news->header = $request->header;
        $add_news->content = $request->mycontent;
        if ($request->hasfile('image_')){
            $file = $request->file('image_');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
            $add_news->image = $filename;
        }
        $add_news->save();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }


    public function delete_news(Request $request)
    {
        $id = $request->id;
        $delete_news = News::find($id);
        $file_path = app_path("../images/{$delete_news->image}");
        unlink($file_path);
        $delete_news->delete();
        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function edit_news(EditNewsRequest $request)
    {
        $edit_news = News::find($request->id);
        $edit_news->header = $request->header;
        $edit_news->content = $request->mycontent;
        $filename = 1;
        if ($request->hasfile('image_')){
            $file_path = app_path("../images/{$edit_news->image}");
            unlink($file_path);
            $file = $request->file('image_');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
            $edit_news->image = $filename;
        }
        $edit_news->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'image' => $filename
        ]);
    }

    public function add_admin(Request $request)
    {
        $id = $request->id;
        $add_admin = User::find($id);
        $add_admin->category = 'admin';
        $add_admin->save();
        return response()->json([
            'status' => true,
            'message' => 'success',
        ]);
    }
}
