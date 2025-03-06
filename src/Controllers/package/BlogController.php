<?php

namespace App\Http\Controllers\package;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogdashboard(){
        auth::user()->name;
        if (Auth::user()->role === 'super') {
            // Include soft-deleted records
            $blogs = blog::orderBy('created_at', 'desc')->withTrashed()->get();
        } else {
            $blogs = blog::orderBy('created_at', 'desc')->get();
        }
        $blogs = blog::all();
        return view('full-Admin-Panel.backend.blog.dashboard',compact('blogs'));
    }
    public function add(){
        return view('full-Admin-Panel.backend.blog.addblog');
    }
    public function addpost(request $request){
        $extension="";
        $path="";
        $blog=new blog;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            $path="upload/blog/";
            $file->move($path,$filename);
            $blog->featuredimage= $path.$filename;
        }
        $blog->title= $request->blogtitle;
        $blog->slug= $request->blogslug;
        $blog->description= $request->blogdescription;
        $blog->keyword= $request->blogkeyword;
        $blog->content= $request->content;
        $blog->save();
        return redirect()->route('blogdashboard')->with('message','Blog Has been inserted');
    }
    public function delete($id){
        $blog=blog::find($id);
        $blog->delete();
        return redirect()->back()->with('message','Blog Has been deleted');
    }
    public function update($id){
        $blogs=blog::where('id',$id)->get();
        return view('full-Admin-Panel.backend.blog.blogupdate',compact('blogs'));
    }
    public function updatepost(request $request,$id){
        $extension="";
        $path="";
        $blog=blog::find($id);
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            $path="upload/blog/";
            $file->move($path,$filename);
            $blog->featuredimage= $path.$filename;
        }
        $blog->title= $request->blogtitle;
        $blog->slug= $request->blogslug;
        $blog->description= $request->blogdescription;
        $blog->keyword= $request->blogkeyword;
        $blog->content= $request->content;
        $blog->update();
        return redirect()->route('blogdashboard')->with('message','Blog Has been Updated');
    }
}
