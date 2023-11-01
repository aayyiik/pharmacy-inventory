<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Entry;
use App\Models\Out;
use App\Models\Pharmacy;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

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
        // return view('pegawai.pharmacy',['pharmacy' => $pharmacy]);

        return response()->json( [
            "message" => "Successfully fetched user.",
            "data" => $pharmacy
        ], Response::HTTP_OK);
    }
    
    public function create_pharmacy(){
        $category = Category::all();
        return view('pegawai.pharmacy-create', compact('category'));
    }

    public function store_pharmacy(Request $request){
        
        $validator = Validator::make($request->all(), [
            "kode" => "required",
            "name" => "required",
            "merk" => "required",
            "category_id" => "required",
            "stok" => "required"
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "message" => "Failed creating a new Product Pharmacy",
                "errors" => $validator->errors()->all()
            ], Response::HTTP_NOT_ACCEPTABLE);
        }

        $validated = $validator->validated();

        try{
            $createdproduct = Pharmacy::create($validated);
        }catch (\Exception $e){
            return response()->json([
                "message" => "Failed creating a new product",
                "error" => $e->getMessage()
            ]);
        }

        return response()->json([
            "message" => "Successfully creating a new product",
            "data" => $createdproduct
        ]);

        //insert ke table user
    //     pharmacy::create([
    //         'kode' => request('kode'),
    //         'name' => request('name'),
    //         'merk' => request('merk'),
    //         'category_id' => request('category_id'),
    //         'stok' => 0,
    //    ]);
      
    //   return redirect ('/pharmacy')->with('sukses','Data Berhasil Diinput');
    
    }

    public function edit_pharmacy ($id){
        // $pharmacy = \App\Models\Pharmacy::find($id);
        // $category = Category::all();
        // return view('pegawai.pharmacy-edit',compact('pharmacy','category'));

        $pharmacy = Pharmacy::findOrFail($id);
        return response()->json([
            "message" => "Successfully updated a new product",
            "data" => $pharmacy
        ]);
    }
  
    public function update_pharmacy (Request $request,$id){
        // $pharmacy = \App\Models\Pharmacy::find($id);
        // $pharmacy->update($request->all());
        // return redirect('/pharmacy')->with('sukses','Data Berhasil diupdate');

        $validator = Validator::make($request->all(), [
            "kode" => "string",
            "name" => "string",
            "merk" => "string",
            "category_id" => "string",
            "stok" => "string"
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "message" => "Failed creating a new Product Pharmacy",
                "errors" => $validator->errors()->all()
            ], Response::HTTP_NOT_ACCEPTABLE);
        }

        $validated = $validator->validated();

        try{
            $pharmacy = Pharmacy::findOrFail($id);
            $pharmacy->update($validated);
        }catch (\Exception $e){
            return response()->json([
                "message" => "Failed creating a new product",
                "error" => $e->getMessage()
            ]);
        }

        return response()->json([
            "message" => "Successfully updated a new product",
            "data" => $pharmacy
        ]);

    }
  
    public function delete_pharmacy ($id){
        // $pharmacy = \App\Models\Pharmacy::find($id);
        // $pharmacy->delete($pharmacy);
        // return redirect('/pharmacy')->with('sukses','Data Berhasil dihapus');


        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->delete();

        return response()->json([
            "message" => "Successfully deleted a new product",
            "data" => $pharmacy
        ]);

        
    }

    // barang masuk

    public function entry(){
        $entry = Entry::all();
        $pharmacy = Pharmacy::all();
        $supplier = Supplier::all();
        $user = User::all();

        return view('pegawai.entry', compact('entry', 'pharmacy', 'supplier', 'user'));
    }

    public function entry_create(){
        $pharmacy = Pharmacy::all();
        $supplier = Supplier::all();
        $user = User::all();

        return view('pegawai.entry-create', compact('pharmacy','supplier','user'));
    }

    public function store_entry(Request $request){
        $validatedData = $request->validate([
            'pharmacy_id' => 'required',
            'supplier_id' => 'required',
            'user_id' => 'required',
            'qty' => 'required',
            'date_input' => 'required|date',
        ]);
    
        $transaksi = Entry::create($validatedData);
    
        // Update stok barang yang sesuai
        $barang = Pharmacy::where('id', $transaksi->pharmacy_id)->first();
        if ($barang) {
            $barang->update([
                'stok' => $barang->stok + $transaksi->qty
            ]);
        }
    
        return redirect('/entry')->with('success', 'Transaksi berhasil disimpan.');
    }


    //barang keluar

    public function out(){
        $out = Out::all();
        $pharmacy = Pharmacy::all();
        $user = User::all();

        return view('pegawai.out', compact('out', 'pharmacy', 'user'));
    }

    public function out_create(){
        $pharmacy = Pharmacy::all();
        $user = User::all();

        return view('pegawai.out-create', compact('pharmacy','user'));
    }


    public function store_out(Request $request){
        $validatedData = $request->validate([
            'pharmacy_id' => 'required',
            'user_id' => 'required',
            'qty' => 'required',
            'date_output' => 'required|date',
            'description' => 'required'
        ]);
    
        $transaksi = Out::create($validatedData);
    
        // Update stok barang yang sesuai
        $barang = Pharmacy::where('id', $transaksi->pharmacy_id)->first();
        if ($barang) {
            $barang->update([
                'stok' => $barang->stok - $transaksi->qty
            ]);
        }
    
        return redirect('/out')->with('success', 'Transaksi berhasil disimpan.');
    }

}
