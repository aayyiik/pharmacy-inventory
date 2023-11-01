@extends('templates.master')
@section('content')
<form class="form-horizontal" action="/pharmacy/store" method="POST">
    @csrf
    <div class="card-body">
        <h4 class="card-title">Tambah Obat</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Kode Obat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="kode" placeholder="First Name Here">
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name Obat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="name" placeholder="First Name Here" >
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Merk Obat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="merk" placeholder="First Name Here">
            </div>
        </div>
        <div class="form-group row">
            <label for="kategori" class="col-sm-3 text-end control-label col-form-label">Kategori Obat</label>
            <div class="col-sm-9">
                <select class="form-select" id="kategori" name="category_id">
                    @foreach ($category as $kategori)
                        <option value="{{ $kategori->id }}">
                            {{ $kategori->name_category }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Stok Obat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="stok" placeholder="First Name Here" value="0" disabled>
            </div>
        </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
    
@endsection