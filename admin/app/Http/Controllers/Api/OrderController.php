<?php
namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Entity\Store;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Components\Controller;
use App\Entity\Order;
use App\Entity\Theme;
use App\Entity\Account;

class OrderController extends Controller
{
    public function ToOrder(Request $request){
        $user_id=$request->user_id;
        $price = Account::where(['user_id' => $user_id])->sum('money');
        if ($price < $request->deposit ){
            $res = array('msg' => '余额不足');
            return response()->json($res);
        }else{
            $order = new Order();
            $order->user_id = $request->user_id;
            $order->product_id = $request->product_id;
//        $order->order_num = $request->order_num;
            $order->state = $request->state;
            $order->create_time=date('Y-m-d H:i:s');
            $order->save();
            $account = new Account();
            $account->user_id=$user_id;
            $account->money=-$request->deposit;
            $account->source='消费';
            $account->create_time=date('Y-m-d H:i:s');
            $account->save();
            $res = array('code' => 200,'msg' => '成功');
            return response()->json($res);
        }
    }
    public function GetOrder(Request $request){
        $sql='select theme.*,`order`.state,`order`.create_time as created,order.id as order_id from theme INNER JOIN `order` on theme.id=`order`.product_id where `order`.user_id=?';
        $res=DB::select($sql,[$request->user_id]);
        return $res;
    }
}