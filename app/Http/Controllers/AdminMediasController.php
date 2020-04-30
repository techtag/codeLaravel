<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Photo;
class AdminMediasController extends Controller
{
    public function index(){
    	$photos=Photo::all();
    	return view('admin.media.index',compact('photos'));
    }
    public function create(){
    	return view('admin.media.create');
    }
    public function store(Request $request){
    	$file=$request->file('file');
    	$name=time().$file->getClientOriginalName();
    	$file->move('images',$name);
    	Session::flash('media_form_message','Image have been uploaded');
    	Photo::create(['file'=>$name]);
    }
    public function destroy($id){
    	$photo=Photo::findOrFail($id);
    	unlink(public_path().$photo->file);    	
    	Session::flash('media_form_message','Image '. $photo->id . ' has been deleted');
    	$photo->delete();
	   	return redirect('/admin/media');
    }

    public function deleteMedia(Request $request)
    {
        if(isset($request->delete_all) && !empty($request->checkBoxArray)){
            $photos=Photo::findOrFail($request->checkBoxArray);
            foreach($photos as $photo){
                unlink(public_path().$photo->file);
                $photo->delete();
            }            
            Session::flash('media_form_message','Selected images have been deleted');
            return redirect()->back();
        }else{
            Session::flash('media_form_message','Something went wrong...');
            return redirect()->back();    
        }
        
    }
}
