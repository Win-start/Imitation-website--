<?php
namespace App\Http\Controllers\Api;

use App\Entity\Account;
use App\Entity\User;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Components\Controller;
use App\Entity\Collect;

class UserController extends Controller
{
    public function UserAdd(Request $request){
        $phone = $request->phone;
        $user_name = $request->phone;
        $password =$request->password;
        $user=new User();
        $user->phone=$phone;
        $user->user_name=$user_name;
        $user->password=md5($password);
        $user->create_time=date('Y-m-d H:i:s');
        $res=$user->save();
        if($res){
            $res = array('code' => 200,'msg' => '成功');
            return response()->json($res);
        }
    }
    public function Login(Request $request){
        $phone = $request->phone;
        $password =$request->password;
        $res=DB::select('select * from user where phone = ? and password = ?',[$phone,md5($password)]);
        if($res){
            $res = array('code' => 200,'msg' => '成功','data'=>$res);
            return response()->json($res);
        }
    }
    public function GetAccount(Request $request){
        $user_id=$request->user_id;
        $res=DB::select('select sum(money) as money from account where user_id=?',[$user_id]);
        return response()->json($res);
    }
    public function SaveAccount(Request $request){
        $account = new Account();
        $account->user_id=$request->user_id;
        $account->money=$request->money;
        $account->source='充值';
        $account->create_time = date('Y-m-d H:i:s');
        $res=$account->save();
        if ($res){
            $res = array('code' => 200,'msg' => '成功','data'=>$res);
            return response()->json($res);
        }

    }
    public function UpPassword(Request $request){
        $user_id = $request->user_id;
        $password = md5($request->password);
        $repassword = md5($request ->repassword);
        $res=DB::select('select * from user where user_id=?',[$user_id]);
        if ($res[0]->password == $password){
            DB::update('update user set password=? where user_id=?',[$repassword,$user_id]);
        } else{
            $err = array('msg' => '失败');
            return response()->json($err);
        }
    }
    public function UserUpdate(Request $request){
        $user_id = $request->user_id;
        $user_name = $request->user_name;
        $phone = $request ->phone;
        $res=DB::update('update user set user_name=?,phone=? where user_id=?',[$user_name,$phone,$user_id]);
        if ($res){
            $err = array('msg' => '成功');
            return response()->json($err);
        } else{
            $err = array('msg' => '失败');
            return response()->json($err);
        }
    }
    public function AddCollect(Request $request){
        $user_id=$request->user_id;
        $product_id = $request->product_id;
        $sql='select * from collect where user_id=? and product_id=?';
        $res=DB::select($sql,[$user_id,$product_id]);
        if (!$res){
            $collect=new Collect();
            $collect->user_id=$user_id;
            $collect->product_id=$product_id;
            $collect->create_time=date('Y-m-d H:i:s');
            $res=$collect->save();
        }

    }
    public function GetCollect(Request $request){
        $user_id = $request->user_id;
        $product_id=$request->product_id;
        $res=DB::select('select * from collect where user_id=? and product_id=?',[$user_id,$product_id]);
        if (!$res){
            $err = array('msg' => '成功');
            return response()->json($err);
        } else{
            $err = array('msg' => '失败');
            return response()->json($err);
        }
    }
    public function DelCollect(Request $request){
        $user_id=$request->user_id;
        $product_id = $request->product_id;
        $sql='delete from collect where user_id=? and product_id=?';
        $res=DB::delete($sql,[$user_id,$product_id]);
        return $res;
    }
    public function GetCollectUser(Request $request){
        $sql='select theme.*,collect.collect_id from collect inner join theme on theme.id = collect.product_id where user_id=?';
        $res=DB::select($sql,[$request->user_id]);
        return $res;
    }

}