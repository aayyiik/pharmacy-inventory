@extends('templates.master')
@section('content')
<form class="form-horizontal" action="/category/store" method="POST">
    @csrf
    <div class="card-body">
        <h4 class="card-title">Tambah Kategori</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Nama Kategori</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="name_category" placeholder="First Name Here">
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