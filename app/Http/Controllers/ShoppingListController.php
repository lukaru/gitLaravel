<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Helped;
use App\Reciept;
use App\ListItem;

use App\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlockFactoryInterface;

class ShoppingListController extends Controller
{
    public function index(){
        $lists = ShoppingList::with(['helped', 'helper', 'items','reciepts'])->get();
        return $lists;
    }

    public function showAvailable(){
        $lists =  ShoppingList::where('helper_id', NULL)->with(['helped','items','reciepts'])->get();
        return $lists;
    }

    public function showDetail($id){
        $lists = ShoppingList::where('id', $id)->with(['items','reciepts'])->get();
        return $lists;
    }

    public function showMy($id){
        if($id > 2){
            $lists = ShoppingList::where('helped_id', $id)->with(['items','reciepts'])->get();
        } else {
            $lists = ShoppingList::where('helper_id', $id)->with(['items','reciepts'])->get();
        }
        return $lists;
    }

    public function showOwned($id){
        $lists = ShoppingList::where('helped_id', $id)->with(['helped', 'helper', 'items','reciepts'])->get();
        return $lists;
    }

    public function showAccepted($id){
        $lists = ShoppingList::where('helper_id', $id)->with(['helped', 'helper', 'items','reciepts'])->get();
        return $lists;
    }

    public function save(Request $request) : JsonResponse {
        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $list = ShoppingList::create($request->all());

            //save items
            if(isset($request['items'])){
                foreach($request['items'] as $item){
                    $item = ListItem::firstOrNew([
                        'item_name'=>$item['item_name'],
                        'quantity'=>$item['quantity'],
                        'max_price'=>$item['max_price']]);
                    $list->items()->save($item);
                    DB::commit();

                }
            }

            //save images -- whatever
            if(isset($request['images'])){
                $img = $request['images'];
                $reciept = Reciept::firstOrNew([
                    'url'=>$img['url'],
                    'title'=>$img['title']]);
                $list->reciepts()->save($reciept);
                DB::commit();
            }



            DB::commit();
            return response()->json($list,201);
        } catch (\Exception $e){
            DB::rollback();
            return response()->json("saving list failed: ".$e->getMessage(),420);
        }
    }





    public function update(Request $request, $id) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $list = ShoppingList::with(['items'])
                ->where('id', $id)->first();
            if ($list != null) {
                $request = $this->parseRequest($request);
                $list->update($request->all());

                $ids = 0;
                if (isset($request['helper_id']) && $request['helper_id'] != 0) {
                    $ids = $request['helper_id'];
                    $list->helper()->associate($ids);
                }

                if (isset($request['status'])) {
                    $request['status'] = 1;
                    $list->update($request->all());
                }

                $list->save();

            }
            DB::commit();
            $listNew = ShoppingList::with(['items'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($listNew, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating book failed: " . $e->getMessage(), 420);
        }
    }


    private function parseRequest(Request $request):Request {
        //get date and convert it - ISO 8601, e.g., "2020-01-01T21:00:00.000Z"
        $date = new \DateTime($request->due_date);
        $request['due_date'] = $date;
        return $request;
    }


}
