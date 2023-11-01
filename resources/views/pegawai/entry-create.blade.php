@extends('templates.master')
@section('content')
<form class="form-horizontal" action="/entry/store" method="POST">
    @csrf
    <div class="card-body">
        <h4 class="card-title">Tambah Barang Masuk</h4>
        <div class="form-group row">
            <label for="kategori" class="col-sm-3 text-end control-label col-form-label">Nama Obat</label>
            <div class="col-sm-9">
                <select class="form-select" id="kategori" name="pharmacy_id">
                    @foreach ($pharmacy as $p)
                        <option value="{{ $p->id }}">
                            {{ $p->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="kategori" class="col-sm-3 text-end control-label col-form-label">Supplier</label>
            <div class="col-sm-9">
                <select class="form-select" id="kategori" name="supplier_id">
                    @foreach ($supplier as $supp)
                        <option value="{{ $supp->id }}">
                            {{ $supp->name_supplier }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Jumlah</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="qty" placeholder="First Name Here">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Tanggal Masuk</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="fname" name="date_input" placeholder="First Name Here" value="0">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Nama Pegawai</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="user_id" value="{{ auth()->user()->name }}" disabled>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="kategori" class="col-sm-3 text-end control-label col-form-label">Nama Pegawai</label>
        <div class="col-sm-9">
            <select class="form-select" id="kategori" name="user_id">
                @foreach ($user as $us)
                    <option value="{{ $us->id }}">
                        {{ $us->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
    
@endsection