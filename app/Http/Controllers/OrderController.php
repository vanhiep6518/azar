<?php

namespace App\Http\Controllers;

use App\Helpers\CollectionHelpers;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCat;
use Brian2694\Toastr\Facades\Toastr;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public $productCats;
    public function __construct()
    {
        $this->productCats = ProductCat::all();
    }

    public function index(){
        $products = Product::paginate(15);
        $productCats = $this->productCats;
//        dd($productCats);
        return view('orders.index',compact('products','productCats'));
    }

    public function cat($slug){
        $productCat = ProductCat::with('recursiveProducts')->where('slug',$slug)->first();
        $productCats = $this->productCats;
        $productCat->recursiveProducts = CollectionHelpers::paginate($productCat->recursiveProducts, 15 );
//        dd($productCat);
        return view('orders.cat',compact('productCat','productCats'));
    }

    public function detailProduct($cat_slug,$product_slug,$id){
        $product = Product::find($id);
        $relativeProduct = Product::where([
            ['cat_id',$product->cat_id],
            ['id','!=',$id]
        ])->get();
        $productCats = $this->productCats;
//        dd($relativeProduct);
        if($product){
            return view('orders.detail-product',compact('product','productCats','relativeProduct'));
        }
    }

    public function addToCart($id,Request $request){

        $product = Product::findOrFail($id);
        $qty = 1;
        if ($request->getMethod() == 'POST') {
            $qty = $request->num_order;
        }
        $cartItem = Cart::add($id, $product->name, $qty, $product->price);

        Cart::associate($cartItem->rowId, 'App\Models\Product');
        $count = Cart::count();

        echo json_encode(['status'=>'ok','num_order'=>$count]);
    }

    public function buyNow($id,Request $request){

        $product = Product::findOrFail($id);
        $qty = 1;
        if ($request->getMethod() == 'POST') {
            $qty = $request->num_order;
        }
        $cartItem = Cart::add($id, $product->name, $qty, $product->price);

        Cart::associate($cartItem->rowId, 'App\Models\Product');

        return redirect()->route('cart.cart');
    }

    public function delete($rowId){
        Cart::remove($rowId);
        return redirect()->route('cart.cart');
    }

    public function deleteAll(){
        Cart::destroy();
        return redirect()->route('cart.cart');
    }

    public function update(Request $request){
        $cartItem = Cart::update($request->rowId, ['qty' => $request->qty]);
        echo json_encode(array('rowId' => $cartItem,'sub_total'=>$cartItem->qty * $cartItem->price,'total'=>Cart::subtotal(0)));
    }

    public function cart(){
        $cartItems = Cart::content();

        return view('orders.cart',compact('cartItems'));
    }

    public function checkout(){
        $cartItems = Cart::content();
//                dd($cartItems);
        return view('orders.checkout',compact('cartItems'));
    }

    public function order(Request $request){
        DB::beginTransaction();
        try {
            $messages = [
                'required' => ':attribute không được để trống',
            ];
            $customAttr = [
                'fullname' => 'Họ và tên',
                'email' => 'Email',
                'address' => 'Địa chỉ',
                'phone' => 'Số điện thoại',
                'payment_method' => 'Phương thức thanh toán',
            ];
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string',
                'email' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string',
                'payment_method' =>'required|string',
            ],$messages,$customAttr);

            if ($validator->fails()) {
//                dd($validator->errors());
                return redirect()->back()->withInput()
                    ->withErrors($validator->errors());
            }

            //save  customer info
            $customer = Customer::create([
                'name' => $request->fullname,
                'phone_number' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'note' => $request->note ?? '',
            ]);

            //save order
            $order = Order::create([
                'customer_id' => $customer->id,
                'payment_type' => $request->payment_method,
                'order_number' => (int)Cart::count(),
                'total_price' => intval(str_replace(",","",Cart::subtotal())),
                'status' => 1,
            ]);

            $cartContent = Cart::content();
//            dd($cartContent);
            foreach($cartContent as $item){
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'price' => $item->price,
                    'quantity' => $item->qty
                ]);
            }

            Cart::destroy();

            DB::commit();
            return redirect()->route('home');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
