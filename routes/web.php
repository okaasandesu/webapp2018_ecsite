<?php

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
    $amount=request()->get("");
    if(count($items) > 0){
        // セッションにデータを追加して格納
        $cartItems = session()->get("CART_ITEMS",[]);
        foreach($cartItems as $value){ 
            if($value->id==$items[0]){
                $flag=true;
            } 
        }
        
        if($flag==false){
            $cartItems[] = [
                "item" => $items[0],
                "amount" => $amount
            ];
        }else{
            foreach($cartItems as $value){ 
                if($value->id==$items[0]){
                    "amount" => $amount+$value->amount
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
    session()->forget('CART_ITEMS');
    return redirect("/cart/list");    
});