<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pharmacy;
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
  

    // pharmacy

    public function pharmacy() {
        $pharmacy = Pharmacy::all();
        return view('pegawai.pharmacy',['pharmacy' => $pharmacy]);
    }
    
    public function create_pharmacy(){
        $category = Category::all();
        return view('pegawai.pharmacy-create', compact('category'));
    }

    public function store_pharmacy(Request $request){
 
        //insert ke table user
        pharmacy::create([
            'kode' => request('kode'),
            'name' => request('name'),
            'merk' => request('merk'),
            'category_id' => request('category_id'),
            'stok' => 0,
       ]);
      
      return redirect ('/pharmacy')->with('sukses','Data Berhasil Diinput');
    }

    public function edit_pharmacy ($id){
        $pharmacy = \App\Models\Pharmacy::find($id);
        $category = Category::all();
        return view('pegawai.pharmacy-edit',compact('pharmacy','category'));
    }
  
    public function update_pharmacy (Request $request,$id){
        $pharmacy = \App\Models\Pharmacy::find($id);
        $pharmacy->update($request->all());
        return redirect('/pharmacy')->with('sukses','Data Berhasil diupdate');
    }
  
    public function delete_pharmacy ($id){
        $pharmacy = \App\Models\Pharmacy::find($id);
        $pharmacy->delete($pharmacy);
        return redirect('/pharmacy')->with('sukses','Data Berhasil dihapus');
    }
}
