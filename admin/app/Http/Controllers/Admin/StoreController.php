<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Entity\Theme;
use App\Lib\upload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Components\Controller;
use App\Entity\Order;
use App\Entity\Store;

class StoreController extends Controller{
    public function toStore(Request $request){
       $store=Store::paginate(10);
        return $this->render('store.store', [
            'store' => $store,
        ]);
    }
    public function ToStoreAdd(Request $request){
        return view('store.store_add');
    }
    public function SaveStore(Request $request){
        $store=new Store();
        $store->lo_name=$request->name;
        $store->lo_phone=$request->phone;
        $store->lo_address=$request->address;
        $store->image=$request->image;
        $store->save();
    }
    public function ToStoreEdit(Request $request){
        $id = $request->input('id', '');
        $store=Store::where('lo_id',$id)->first();
        return $this->render('store.store_edit', [
            'store' => $store,
        ]);
    }
    public function StoreEdit(Request $request){
        $id = $request->input('id');
        $lo_name = $request->input('name', '');
        $phone = $request->input('phone', '');
        $address=$request->input('address','');
        $image = $request->input('image');
        $store = Store::where('lo_id',$id)->first();
        $store->id = $id;
        $store->lo_name = $lo_name;
        $store->phone=$phone;
        $store->address = $address;
        $store->image = $image;
        $res = $store->save();
    }
}
?>