@extends('templates.master')
@section('content')

<!-- Button trigger modal -->
  <a href="/out/create" class="btn btn-primary">Tambah Barang Keluar</a>
  <br>
  <br>
<div class="table-responsive">
    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
    <div class="row"><div class="col-sm-12"><table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
        <thead>
            <tr role="row">
                <th>Nama Obat</th>
                <th>Jumlah</th>
                <th>Tanggal Masuk</th>
                <th>Deskripsi</th>
                <th>PIC</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($out as $item)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{$item->pharmacy->name}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->date_output}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>
                            <a href="out/edit/{{$item->id}}"><i class=" fas fa-pencil-alt"></i> Edit</a>
                            <a href="out/delete/{{$item->id}}"><i class=" fas fa-trash"></i> Delete</a>
                        </td>
                </tr>
        @endforeach
        </tbody>
        
    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero_config_paginate"></div></div></div></div>
</div>

@endsection
