<?php
namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Entity\Store;
use App\Lib\upload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Components\Controller;
use App\Entity\Category;

class StoreController extends Controller
{
public function StoreGet(Request $request){
        $res = DB::select('select * from store limit 8');
        return $res;
}
public function StoreList(Request $request){
    $res=DB::select('select * from store');
    return $res;
}
public function Store(Request $request,$id){
    $res=Store::where('lo_id',$id)->first();
    return $res;
}
}
?>