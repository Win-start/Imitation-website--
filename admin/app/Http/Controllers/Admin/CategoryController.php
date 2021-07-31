<?php
namespace App\Http\Controllers\Admin;

use App\Entity\Category;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Components\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller{
    public function toCategory(Request $request){
        $category=Category::all();
        return $this->render('category.category', [
            'category' => $category,
        ]);
    }
    public function ToCategoryAdd(Request $request){
       return view('category.category_add');
    }
    public function SaveCategory(Request $request){
        $category=new Category();
        $category->category_name=$request->name;
        $category->image=$request->image;
        $category->update_time=date('Y-m-d H:i:s');;
        $category->save();
    }
    public function ToCategoryEdit(Request $request){
        $category_id = $request->input('category_id', '');
        //$category = DB::select('select * from category where category_id=?',[$category_id]);
        $category=Category::where('category_id',$category_id)->first();
        return $this->render('category.category_edit', [
            'category' => $category,
            'id' => $category_id
        ]);
    }
    public function CategoryEdit(Request $request){
        $id = $request->input('id');
        $name = $request->input('name', '');
        $slider = $request->input('image');
        $time = date('Y-m-d H:i:s');
        $category = Category::where('category_id',$id)->first();
        var_dump($category);
        $category->category_id = $id;
        $category->category_name = $name;
        $category->image = $slider;
        $category->update_time = $time;
        $res = $category->save();
        return $res;
    }
    public function CategoryDel(Request $request){
        $id = $request->input('id');
        $del = DB::delete('delete from category where category_id=?',[$id]);
        return $del;
    }
}