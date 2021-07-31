<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Entity\Theme;
use App\Lib\upload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Components\Controller;
use App\Entity\Order;

class OrderController extends Controller{
    public function toOrder(Request $request){
        $order=Order::select(DB::raw('order.user_id,`order`.product_id,order.state,order.create_time,theme.name,theme.deposit,theme.price'))
            ->join('theme','theme.id','=','order.product_id')
           ->paginate(10);
        return $this->render('order.order', [
            'order' => $order,
        ]);

    }
    public function editOrder (Request $request){
        return view('order.order_edit');
    }
}
?>