<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use View;
use Storage;

class ItemController extends Controller
{
    public function index(){

        return View::make('item.index');
    }

    public function getItem(Request $request, $id){
        $item = Customer::where('id',$id)->first();
             return response()->json($item);
    }

    public function getItemAll(Request $request){

        $items = Item::orderBy('item_id', 'ASC')->get();
        return response()->json($items);

    }

    public function store(Request $request){

        $item = new Item;
        $item->description = $request->description;
        $item->title = $request->title;
        $item->cost_price = $request->cost_price;
        $item->sell_price = $request->sell_price;

        $files = $request->file('uploads');

        $item->imagePath = 'images/'.$files->getClientOriginalName();
        $item->save();

        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "item created successfully.", "item" => $item, "status" => 200]);

    }

    public function edit(Request $request, $id){

        
        $item = Item::findOrFail($id);
        $item = $item->update($request->all());

        $item = Item::findOrFail($id);
        return response()->json($item);
    }

    public function postCheckout(Request $request){

        // $items = json_decode($request->json()->all());
        $items = json_decode($request->getContent(),true);
        // Log::info(print_r($request->getContent()));
        Log::info(print_r($items, true));
          try {
              DB::beginTransaction();
              $order = new Order();
              $customer =  Customer::find(3);
              // dd($cart->items);
            $customer->orders()->save($order);
              // dd($cart->items);
            // Log::info(print_r($order->orderinfo_id, true));
            foreach($items as $item) {
              // Log::info(print_r($item, true));
               $id = $item['item_id'];
               // Log::info(print_r($, true));
               $order->items()->attach($order->orderinfo_id,['quantity'=> $item['quantity'],'item_id'=>$id]);
               // Log::info(print_r($order, true));
               $stock = Stock::find($id);
               $stock->quantity = $stock->quantity - $item['quantity'];
               $stock->save();
            }
            
          }
          catch (\Exception $e) {
              DB::rollback();
              return response()->json(array('status' => 'Order failed','code'=>409,'error'=>$e->getMessage()));
              }
      
          DB::commit();
          return response()->json(array('status' => 'Order Success','code'=>200,'order id'=>$order->orderinfo_id));
      
          }//end postcheckout
//   }

    // public function update(Request $request, $id){

    //     $item = Item::find($id);
    //     $item = $item->update($request->all());

    //     $item = Item::find($id);
    //     return response()->json($item);

    // }
}
