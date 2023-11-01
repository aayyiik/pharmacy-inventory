<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function supplier() {
        $supplier = Supplier::all();
        return view('pegawai.supplier',['supplier' => $supplier]);
    }
    
    public function create_supplier(){
        return view('pegawai.supplier-create');
    }

    public function store_supplier(Request $request){
 
        //insert ke table user
        Supplier::create([
            'name_supplier' => request('name_supplier'),
            'address_supplier' => request('address_supplier'),
       ]);
      
      return redirect ('/supplier')->with('sukses','Data Berhasil Diinput');
    }
    public function edit_supplier ($id){
        $supplier = \App\Models\Supplier::find($id);
        return view('pegawai.supplier-edit',['supplier' => $supplier]);
    }
  
    public function update_supplier (Request $request,$id){
        $supplier = \App\Models\Supplier::find($id);
        $supplier->update($request->all());
        return redirect('/supplier')->with('sukses','Data Berhasil diupdate');
    }
  
    public function delete_supplier ($id){
        $supplier = \App\Models\Supplier::find($id);
        $supplier->delete($supplier);
        return redirect('/supplier')->with('sukses','Data Berhasil dihapus');
    }
  
}
