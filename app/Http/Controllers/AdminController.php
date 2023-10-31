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
        return view('users.index',['users' => $users], compact('kotas','roles'));
    }
    
    public function create(Request $request){
 
        //insert ke table user
        User::create([

            'id_kota' => request('id_kota'),
            'id_role' => request('id_role'),
            'nama_user' => request('nama_user'),
            'alamat' => request('alamat'),
            'telp' => request('telp'),
            'email' => request('email'),    
            'password'=>bcrypt('rahasia'),
            'remember_token' => Str::random(10),
       ]);
      
      return redirect ('/users')->with('sukses','Data Berhasil Diinput');
    }
    public function edit ($id_user){
        $users = \App\Models\User::find($id_user);
        return view('users/edit',['users' => $users]);
    }
  
    public function update (Request $request,$id_user){
        $user = \App\Models\User::find($id_user);
        $user->update($request->all());
        return redirect('/users')->with('sukses','Data Berhasil diupdate');
    }
  
    public function delete ($id_user){
        $user = \App\Models\User::find($id_user);
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
