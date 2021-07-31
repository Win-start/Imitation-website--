<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Lib\upload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Components\Controller;
use App\Entity\Admin;


class IndexController extends Controller{
    public function toLogin(Request $request){
        return view('login');
    }
    public function login(Request $request)
    {

        $user_name = $request->input('user_name', '');
        $password = $request->input('password', '');

        $admin = Admin::where('user_name', $user_name)->where('password', $password)->first();
        if (!$admin) {
            $res = array('status' => 2,'message' => '帐号或密码错误!');
            return response()->json($res);
        } else {
            $res = array('status' => 0,'message' => '登录成功!');
            $request->session()->put('admin', $admin);
            return response()->json($res);

        }
    }
    public function toExit(Request $request)
    {
        $request->session()->put('admin', null);
        return $this->redirect('/admin/login');
    }

}
?>