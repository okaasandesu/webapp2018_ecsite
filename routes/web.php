<?php
use Illuminate\Support\Facades\Auth;


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


Route::get('/ECsite', function () {
    $items = DB::select("SELECT * FROM items");
    return view("ECsite",[
        "items" => $items
      ]);
});

Route::get("/item/{id}",function($id){
    $items = DB::select("SELECT * FROM items where id = ?",[$id]);
    if(count($items) > 0){
        return view("item_detail",[
          "item" => $items[0]
        ]);    
    }else{
        return abort(404);
    }    
});

Route::get("/cart/list",function(){
    // セッションからカートの情報を取り出す
    $cartItems = session()->get("CART_ITEMS",[]);
    return view("cart_list", [
        "cartItems" => $cartItems
    ]);
});

Route::post("/cart/add",function(){
    // フォームから IDを読み込みDBへ問い合わせる
    $id = request()->get("item_id");
    $items = DB::select("SELECT * FROM items where id = ?",[$id]);
    $flag=false;
    $amount=intval(request()->get("amount"));
    
    if(count($items) > 0){
        // セッションにデータを追加して格納

        $cartItems = session()->get("CART_ITEMS",[]);
        
        //カートに追加する商品と同じものがあるか探す
        foreach($cartItems as $array=>$value){ 
            
            if($value['item']->id==$items[0]->id){
                $flag=true;
            } 
        }
        
        if($flag==false){
            $cartItems[] = [
                "item" => $items[0],
                "amount" => $amount
            ];
        }else{
            foreach($cartItems as $array=>$value){ 
                
                if($value['item']->id==$items[0]->id){
                    
                    $cartItems[$array]['amount'] = (int)($amount+$cartItems[$array]['amount']);
                    
                } 
            }
        }
        session()->put("CART_ITEMS",$cartItems);
        return redirect("/cart/list");    
    }else{
        return abort(404);
    }        
});

Route::post("/cart/clear",function(){
    // カートを空にする
    session()->forget('CART_ITEMS');
    return redirect("/cart/list");    
});

Route::post("/cart/clear_details",function(){
    // 一つの商品を空にする

    $id = request()->get("item_id");
    $cartItems = session()->get("CART_ITEMS",[]);
    $i=0;
    foreach($cartItems as $array=>$value){ 
                
        if($value['item']->id==$id){
            array_splice($cartItems,$i,1);
            //$cartItems[$array]['amount'] = (int)($amount+$cartItems[$array]['amount']);
            
        } 
        $i++;
    }
    
    session()->put("CART_ITEMS",$cartItems);
    return redirect("/cart/list");    
});

Route::get("/order",function(){
    
    $user = Auth::user();
    $cartItems = session()->get("CART_ITEMS",[]);
    $total=0;

    foreach($cartItems as $array=>$value){ 
        $total+=(($value['item']->price)*($value['amount']));
    }

    if(empty($user)){
        return view("auth/login");
    }else{
        return view("order",[
            "user" => $user,
            "total"=>$total
        ]
    
    );
    }
    return view("order");
});

Route::post("/order",function(){


    $user = Auth::user();
    $cartItems = session()->get("CART_ITEMS",[]);
    $total=0;

    foreach($cartItems as $array=>$value){ 
        $total+=(($value['item']->price)*($value['amount']));
    }
    // ここで カートの中身をDBに保存する    
    DB::insert("INSERT into orders (name,zip_code,address,price,email,orders) VALUES (?,?,?,?,?,?)",[
        $user->name,
        $user->zip_code,
        $user->address,
        $total,
        $user->email,
        json_encode(session()->get("CART_ITEMS"))
    ]);
    
    session()->forget("CART_ITEMS"); // ここでカートを空に
   
    return redirect("/order/thanks");
});

Route::get("/order/thanks",function(){
    return view("thanks");
});
Auth::routes();


/* Route::post('/logout',function(){
    return redirect("/ECsite");
}); */

Route::get('/home', 'HomeController@index')->name('home');
Route::post('register/pre_check', 'Auth\RegisterController@pre_check')->name('register.pre_check');
Route::get('register/verify/{token}', 'Auth\RegisterController@showForm');
Route::post('register/main_check', 'Auth\RegisterController@mainCheck')->name('register.main.check');
Route::post('register/main_register', 'Auth\RegisterController@mainRegister')->name('register.main.registered');
