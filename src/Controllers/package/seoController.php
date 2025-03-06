<?php

namespace Awaistech\Larpack\Controllers\package;

use Awaistech\Larpack\Controllers\Controller;
use Awaistech\Larpack\Models\seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class seoController extends Controller
{
    public function seodashboard()
    {
        $seos = seo::all();
        return view('full-Admin-Panel.backend.seo.dashboard', compact('seos'));
    }
    public function add()
    {
        return view('full-Admin-Panel.backend.seo.addseo');
    }
    public function addpost(request $request)
    {
        $extension = "";
        $path = "";
        $seo = new seo;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $path = "upload/seo/";
            $file->move($path, $filename);
            $seo->ogimage = $path . $filename;
        }
        $seo->title = $request->seotitle;
        $seo->description = $request->seodescription;
        $seo->keyword = $request->seokeyword;
        $seo->save();
        return redirect()->route('seodashboard')->with('message', 'Meta Has been inserted');
    }
    public function Delete($id)
    {
        $seo = seo::find($id);
        $seo->delete();
        return redirect()->back()->with('message', 'Meta Has been deleted');
    }
    public function update($id)
    {
        $seos = seo::where('id', $id)->get();
        return view('full-Admin-Panel.backend.seo.seoupdate', compact('seos'));
        // return redirect()->back()->with('message','seo Has been deleted');
    }
    public function updatepost(request $request, $id)
    {
        $extension = "";
        $path = "";
        $seo = seo::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $path = "upload/seo/";
            $file->move($path, $filename);
            $seo->ogimage = $path . $filename;
        }
        $seo->title = $request->seotitle;
        $seo->description = $request->seodescription;
        $seo->keyword = $request->seokeyword;
        $seo->update();
        return redirect()->route('seodashboard')->with('message', 'Meta Has been Updated');
    }
}
