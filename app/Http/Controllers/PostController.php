<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post,Auth;
use App\Http\Requests\AddPostRequest;
use App\Http\Requests\EditPostRequest;
use Illuminate\Validation\Rule;
use DB;
class PostController extends Controller
{
    public function index()
    {
    	$data = Post::latest('id')->paginate(10);
    	return view('admin.manage-post',['data' => $data]);
    }
    public function getAllIndex()
    {
      $data = Post::latest('id')->paginate(10);
      $setting = [
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
      return view('site',['data' => $data,'setting' => $setting]);
    }
    public function getAdd()
    {
    	return view('admin.add-post');
    }
    public function postAdd(AddPostRequest $rq)
    {
      $post = new Post();
      $post->title = $rq->txtTitle;
      $post->slug = str_slug($rq->txtTitle);
      $post->content = $rq->txtContent;
      $post->date_post = date('Y-m-d');
      $post->user_id = Auth::id();
      $check = Post::where('slug','=',$post->slug)->get()->first();
      if(!is_null($check['id']))
        return redirect()->route('getAddPost')
      ->with('success','Không thể thêm do đã tồn tại!')->withInput();
      else
        {$post->save();
        return redirect()->route('getAddPost')
      ->with('success','Bạn đã thêm thành công!')->withInput();}
    }
    public function getEdit($id)
    {
      $data = Post::find($id)->toArray();
      return view('admin.edit-post')->with('data',$data);
    }
    public function postEdit(EditPostRequest $rq,$id)
    {
      $post = Post::find($id);
      $post->title = $rq->txtTitle;
      $post->slug = str_slug($rq->txtTitle);
      $post->content = $rq->txtContent;
      $post->user_id = Auth::id();

      $count = Post::where('slug','=',$post->slug)->count();
      if($count >= 2)
        return redirect('admin/manage-post/edit/'.$post->id)->with('success','Sửa không thành công do trùng tiêu đề!');
      else if($count == 1){
        $check = Post::where('slug','=',$post->slug)->get()->first();
        if($check['id'] == $post->id){
            $post->save();
          return redirect('admin/manage-post/edit/'.$post->id)->with('success','Bạn đã sửa thành công!');
        }else{
          return redirect('admin/manage-post/edit/'.$post->id)->with('success','Sửa không thành công do trùng tiêu đề!');
        }
      }else{
        $post->save();
        return redirect('admin/manage-post/edit/'.$post->id)->with('success','Bạn đã sửa thành công!');
      }
    }
    public function delete($id)
    {
      Post::find($id)->delete();
      return back()->with('deldone',"Bạn đã xóa thành công!");
    }
    public function bv($slug)
    {
      $data = Post::where('slug','=',$slug)->first()->toArray();
      $setting = [
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
      return view('single',['data'=>$data,'setting'=>$setting]);
    }
}
