@extends('templates.master')
@section('content')
<form class="form-horizontal" action="/supplier/update/{{$supplier->id}}" method="POST">
    @csrf
    <div class="card-body">
        <h4 class="card-title">Supplier Info</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name Supplier</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="name_supplier" placeholder="First Name Here" value="{{$supplier->name_supplier}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Alamat Supplier</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="name_supplier" placeholder="First Name Here" value="{{$supplier->address_supplier}}">
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