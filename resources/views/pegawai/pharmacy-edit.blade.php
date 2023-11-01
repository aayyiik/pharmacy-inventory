@extends('templates.master')
@section('content')
<form class="form-horizontal" action="/pharmacy/update/{{$pharmacy->id}}" method="POST">
    @csrf
    <div class="card-body">
        <h4 class="card-title">Obat Info</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Kode Obat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="kode" placeholder="First Name Here" value="{{$pharmacy->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name Obat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="name" placeholder="First Name Here" value="{{$pharmacy->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Merk Obat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="merk" placeholder="First Name Here" value="{{$pharmacy->merk}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="kategori" class="col-sm-3 text-end control-label col-form-label">Kategori Obat</label>
            <div class="col-sm-9">
                <select class="form-select" id="kategori" name="category_id">
                    @foreach ($category as $kategori)
                        <option value="{{ $kategori->id }}" @if ($kategori->id == $pharmacy->category_id) selected @endif>
                            {{ $kategori->name_category }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Stok Obat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="stok" placeholder="First Name Here" value="{{$pharmacy->stok}}" disabled>
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