<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use DB;
use Mail;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    //
    function index()
    {
    	$count_user = User::count();
    	$count_post = Post::count();
    	if(Auth::check())
    		return view('admin',['count_user' => $count_user,'count_post'=>$count_post]);
    	else
    		return Redirect::to('/login');
    }
    function getSetting()
    {
    	$data = [
    	    'title' => DB::table('settings')->where('key','=','title')->value('value'),
    	    'avatar' => DB::table('settings')->where('key','=','avatar')->value('value'),
    	    'des' => DB::table('settings')->where('key','=','des')->value('value'),
    	    'address' => DB::table('settings')->where('key','=','address')->value('value'),
    	    'phone' => DB::table('settings')->where('key','=','phone')->value('value'),
    	    'email' => DB::table('settings')->where('key','=','email')->value('value'),
    	    'twitter' => DB::table('settings')->where('key','=','twitter')->value('value'),
    	    'github' => DB::table('settings')->where('key','=','github')->value('value'),
    	    'facebook' => DB::table('settings')->where('key','=','facebook')->value('value'),
    	    'envelope' => DB::table('settings')->where('key','=','envelope')->value('value')
    	];
    	return view('admin.setting')->with('data',$data);
    }
    function postSetting(Request $request)
    {
    	//Kiểm tra file
        if($request->hasFile('fileAvatar')){
          $file = $request->fileAvatar;
          $file->move('uploads/avt',$file->getClientOriginalName());
          $avatar = 'uploads/avt/'.$file->getClientOriginalName();
          DB::table('settings')->where('key','avatar')->update(['value' => $avatar]);
      	}
      	if ($request->has('txtTitle')) {
		    DB::table('settings')->where('key','title')->update(['value' => $request->txtTitle]);
		}
		if ($request->has('txtDes')) {
		    DB::table('settings')->where('key','des')->update(['value' => $request->txtDes]);
		}
		if ($request->has('txtAddress')) {
		    DB::table('settings')->where('key','address')->update(['value' => $request->txtAddress]);
		}
		if ($request->has('txtPhone')) {
		    DB::table('settings')->where('key','phone')->update(['value' => $request->txtPhone]);
		}
		if ($request->has('txtEmail')) {
		    DB::table('settings')->where('key','email')->update(['value' => $request->txtEmail]);
		}
		if ($request->has('txtTwitter')) {
		    DB::table('settings')->where('key','twitter')->update(['value' => $request->txtTwitter]);
		}
		if ($request->has('txtGithub')) {
		    DB::table('settings')->where('key','github')->update(['value' => $request->txtGithub]);
		}
		if ($request->has('txtFacebook')) {
		    DB::table('settings')->where('key','facebook')->update(['value' => $request->txtFacebook]);
		}
		if ($request->has('txtEnvelope')) {
		    DB::table('settings')->where('key','envelope')->update(['value' => $request->txtEnvelope]);
		}
		return redirect('admin/setting')->with('success','Bạn đã sửa thành công!');
    }
    public function addFeedback(Request $request)
    {
        $input = $request->all();
        Mail::send('mailfb', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['message']), function($message){
	        $message->to('antking1109@gmail.com', 'Visitor')->subject('Visitor Feedback!');
	    });

        return back()->with('flash_message','Send message successfully!');
    }
}
