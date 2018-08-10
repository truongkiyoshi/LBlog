<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    //
    public function getList()
    {
    	$data = User::paginate(10);
    	return view('admin.manage-user',['data' => $data]);
    }
    public function getAdd()
    {
    	return view('admin.add-user');
    }
    public function postAdd(AddUserRequest $request)
    {
		User::create([
			'name' => $request->username,
	        'email' => $request->email,
	        'password' => Hash::make($request->pass1),
	        'level' => (int) $request->get('cbadmin', 0),
	    ]);
		return redirect('admin/manage-user/add')->with('success','Bạn đã thêm thành công!');
    }
    public function getEdit($id)
    {
    	$objUser = new User();
    	$getUserById = $objUser->find($id)->toArray();
    	return view('admin.edit-user')->with(['getUserById' => $getUserById, 'id' => $id]);
    }
    public function postEdit(EditUserRequest $request,$id)
    {
    	$user = User::find($id);
    	$user->name = $request->username;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->pass1);
    	$user->level = $request->get('cbadmin',0);
    	$user->save();
    	return redirect('admin/manage-user/edit/'.$user->id)->with('success','Sửa thành công!');
    }
    public function delete($id)
    {
    	User::find($id)->delete();
    	return redirect('admin/manage-user')->with('deldone',"Bạn đã xóa thành công!");
    }
}
