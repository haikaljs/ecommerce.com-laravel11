<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function index(){
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Admin';
        return view('admin.admin.index', $data);
    }

    public function create(){
        $data['header_title'] = 'Create new admin';
        return view('admin.admin.create', $data);
    }

    public function store(Request $request){

        $request->validate([
            'email' => 'required|email|unique:users'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'Admin successfully created');

    }

    public function edit($id){
        $data['header_title'] = 'Edit admin';
        $data['getRecord'] = User::getSingle($id);
        return view('admin.admin.edit', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){

            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->update();

        return redirect()->route('admin.index')->with('success', 'Admin successfully updated');
    }

    public function delete($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect()->route('admin.index')->with('success', 'Admin successfully deleted');

    }
}
