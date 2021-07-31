<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Entity\Theme;
use App\Lib\upload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Components\Controller;
use App\Entity\Category;

class ThemeController extends Controller
{
    public function toTheme(Request $request){
        $theme=Theme::select(DB::raw('theme.*,category.category_name,category.category_id'))
            ->leftjoin('category','theme.category_id','=','category.category_id')->paginate(10);
        return $this->render('theme.theme', [
            'theme' => $theme,
        ]);
    }
    public function addTheme(Request $request){
        $category=Category::all();
        return $this->render('theme.theme_add', [
            'category' => $category,
        ]);
    }
    public function ThemeImg(Request $request)
    {
        $file = $request->file('file');
        $upload_path = public_path() . '\upload';
        $extension  =  strtolower($file->getClientOriginalExtension())  ?:  'png';
        $filename = time() . rand(100000, 999999) . '.' . $extension;
        $file->move($upload_path, $filename);
        return $this->renderJson([
                "code" => 200,
                "msg" => "上传成功",
                "data" => [
                    'src' =>  'http://localhost:8088/admin/public/upload/' . $filename,
                    'value' => 'http://localhost:8088/admin/public/upload/' . $filename,
                ]
            ]);
    }
    public function Save(Request $request){
        $theme=new Theme();
        $theme->name=$request->name;
        $theme->deposit=$request->deposit;
        $theme->price=$request->price;
        $theme->category_id=$request->category_id;
        $theme->image=$request->image;
        $theme->create_time=date('Y:m:d H:i:s');
        $theme->save();
    }
    public function ToThemeEdit(Request $request){
        $id = $request->input('id', '');
        $theme=Theme::where('id',$id)->first();
        $category = Category::where('category_id',$theme->category_id)->first();
        $categories = Category::all();
        return $this->render('theme.theme_edit', [
            'theme' => $theme,
            'categories' => $categories,
            'category' => $category,
        ]);
    }
    public function ThemeEdit(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name', '');
        $price = $request->input('price', '');
        $deposit=$request->input('deposit','');
        $category_id = $request->input('category_id', '');
        $image = $request->input('image');
        $time = date('Y-m-d H:i:s',time());
        $theme = Theme::where('id',$id)->first();
        $theme->id = $id;
        $theme->name = $name;
        $theme->deposit=$deposit;
        $theme->price = $price;
        $theme->category_id = $category_id;
        $theme->image = $image;
        $theme->update_time = $time;
        $res = $theme->save();
    }
    public function ThemeDel(Request $request){
        $id = $request->input('id');
        $del = DB::delete('delete from theme where id=?',[$id]);
        return $del;
    }
}
?>