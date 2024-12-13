<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index(){
        $data['get_all'] = Category::get();
        return view('admin.category.view', $data);
    }

    public function create(){
        $data['add'] = TRUE;
        return view('admin.category.add', $data);
    }

    public function store(Request $request){
        //return $request->all();

        $this->validate($request, [
            'name' => 'required',
        ]);
        try {
            $category = new Category;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->status = $request->status ? "1": "0";
            $category->save();
            toastr()->success('Data has been saved successfully!');
           return redirect(route('categories.index'));

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return redirect(route('categories.create'));
        }
    }

    public function edit($id){
        $data['edit'] = TRUE;
        $data['single'] = Category::findOrFail($id);
        return view('admin.category.add', $data);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',

        ]);
        try {
            $category = Category::findOrFail($id);
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->status = $request->status ? "1": "0";
            $category->update();
            toastr()->success('Data has been Updated successfully!');
            return redirect(route('categories.index'));

        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            toastr()->warning('Not success!');
            return back();
        }
    }

    public function destroy($id){

        try {
            $category = Category::findOrFail($id);
            $path = $category->photo;
            $category->delete();
            toastr()->success('Data has been Deleted successfully!');
            return back();
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            toastr()->warning('Not success!');
            return back();
        }
    }

}//categoryController
