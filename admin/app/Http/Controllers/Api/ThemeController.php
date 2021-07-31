<?php
namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Entity\Theme;
use App\Lib\upload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Components\Controller;
use App\Entity\Category;

class ThemeController extends Controller
{
    public function ThemeAll(Request $request){
            $theme=DB::select('select * from theme');
            return $theme;
    }
    public function CategoryAll(Request $request){
        $category=Category::all();
        return $category;
    }
    public function Theme(Request $request,$id){
        $product=Theme::where('id',$id)->first();
        return $product;
}
public function ThemeCategory(Request $request,$id){
        $theme=DB::select('select * from theme where category_id=?',[$id]);
        return $theme;

}
public function ThemeNew(Request $request){
        $res = DB::select('select * from theme order by create_time desc limit 6');
        return $res;
}
}
?>