<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    public function index(){
        $data['blogs'] = Blog::all();
        return view('admin.blog.index',$data);
    }
    public function create(){
        $data['add'] = true;
        return view('admin.blog.add',$data);

    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'picture' => 'required',
        ]);
        try {
           
            $blog = new Blog;
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->content = $request->content;
            if ($request->hasFile('picture')) {
                $folder = "blog/";
                $pictureinfo = $request->file("picture");
                $file_name = "blog-" . time() . ".". $pictureinfo->getClientOriginalExtension();
                $pictureinfo->move(public_path($folder), $file_name);
                $picture_url = $folder . $file_name;
                $blog->picture = $picture_url;
            }
            $blog->save();
            return redirect()->route('blogs.index')->with('success', 'blog created successfully');
        } catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            // Handle the exception as needed
            $response = [
                'error' => $err_message,
            ];
            return redirect()->route('blogs.create')->with('error', $err_message)->withInput();
        }
    }
    public function edit($id){
        $data['edit'] = true;
        $data['single'] = blog::find(decrypt($id));
        return view('admin.blog.add',$data);

    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'content' => 'required',
        ]);
        try {
            $blog = Blog::findOrFail($id);
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->content = $request->content;
            if ($request->hasFile('picture')) {
                $folder = "blog/";
                $pictureinfo = $request->file("picture");
                $file_name = "blog-" . time() . ".". $pictureinfo->getClientOriginalExtension();
                $pictureinfo->move(public_path($folder), $file_name);
                $picture_url = $folder . $file_name;
                $blog->picture = $picture_url;
            }
            $blog->update();
            return redirect()->route('blogs.index')->with('success', 'blog created successfully');
        } catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            // Handle the exception as needed
            $response = [
                'error' => $err_message,
            ];
            return redirect()->route('blogs.edit')->with('error', $err_message)->withInput();
        }
    }

    public function destroy(Request $request){
        try {
            $blog = Blog::findOrFail(decrypt($request->id));
            $path = $blog->picture;
            $blog->delete();
            return redirect()->route('blogs.index')->with('success', 'blog deleted successfully');
        }catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return redirect()->route('blogs.index')->with('error', $err_message);
        }
    }

}//apartmentController
