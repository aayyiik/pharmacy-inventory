<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        return view('templates.master');
    }

    public function user() {
        $users = User::all();
        return view('admin.user',['users' => $users]);
    }
    
    public function create(){
        return view('admin.user-create');
    }
    public function store(Request $request){
 
        //insert ke table user
        User::create([
            'name' => request('name'),
            'address' => request('address'),
            'no_telp' => request('no_telp'),
            'email' => request('email'),    
            'password'=>bcrypt('rahasia'),
            'role' => request('role'),
            'status' => 1,
       ]);
      
      return redirect ('/users')->with('sukses','Data Berhasil Diinput');
    }
    public function edit ($id){
        $users = \App\Models\User::find($id);
        return view('admin.user-edit',['users' => $users]);
    }
  
    public function update (Request $request,$id){
        $user = \App\Models\User::find($id);
        $user->update($request->all());
        return redirect('/users')->with('sukses','Data Berhasil diupdate');
    }
  
    public function delete ($id){
        $user = \App\Models\User::find($id);
        $user->delete($user);
        return redirect('/users')->with('sukses','Data Berhasil dihapus');
    }
  
    public function trash(){
      $user = User::onlyTrashed()->get();
      return view('users.trash',['user' => $user]);
  }
  
  public function restore($id_user = null){
      if($id_user != null){
          $user = User::onlyTrashed()
          ->where('id_user', $id_user)
          ->restore();
      }
      return redirect('users/trash')->with('sukses','Data Berhasil direstore');
  }
  
  public function forceDelete($id_user = null){
      if($id_user != null){
          $user = User::onlyTrashed()
          ->where('id_user', $id_user)
          ->forceDelete();
      }
      return redirect('users/trash')->with('sukses','Data Berhasil dihapus permanen');
  }
}
