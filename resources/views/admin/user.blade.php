@extends('templates.master')
@section('content')

<!-- Button trigger modal -->
  <a href="/users/create" class="btn btn-primary">Tambah</a>
  <br>
  <br>
<div class="table-responsive">
    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
    <div class="row"><div class="col-sm-12"><table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
        <thead>
            <tr role="row">
                <th>Name</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $item)
             <tr role="row" class="odd">
                <td class="sorting_1">{{$item->name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->role}}</td>
                <td>{{$item->status}}</td>
                <td>
                    <a href="users/edit/{{$item->id}}"><i class=" fas fa-pencil-alt"></i> Edit</a>
                    <a href="users/delete/{{$item->id}}"><i class=" fas fa-trash"></i> Delete</a>
                </td>
        </tr>
        @endforeach
        </tbody>
        
    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero_config_paginate"></div></div></div></div>
</div>

@endsection
