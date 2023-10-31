@extends('templates.master')
@section('content')
<form class="form-horizontal" action="/users/update/{{$users->id}}" method="POST">
    @csrf
    <div class="card-body">
        <h4 class="card-title">Personal Info</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" name="name" placeholder="First Name Here" value="{{$users->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="lname" name="email" placeholder="Last Name Here" value="{{$users->email}}">
            </div>
        </div>
        </div>
        <div class="form-group row">
            <label for="email1" class="col-sm-3 text-end control-label col-form-label">No Telp</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="email1" name="no_telp" placeholder="Company Name Here" value="{{$users->no_telp}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Alamat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="cono1" name="address" placeholder="Contact No Here" value="{{$users->address}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Role</label>
            <div class="col-md-9">
                <select class="select2 form-select shadow-none select2-hidden-accessible" style="width: 100%; height:36px;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="role">
                    <option value="Administrator" <?php if($users == "Admiistrator") echo "selected"; ?>>Administrator</option>
                    <option value="Pegawai" <?php if($users == "Pegawai") echo "selected"; ?>>Pegawai</option>
                </select>
                <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-v637-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
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