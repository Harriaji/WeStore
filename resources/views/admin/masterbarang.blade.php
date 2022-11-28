@extends('admin.app')
@section('SB ADMIN' , 'Pegawai')
@section('title' , 'Master Barang')
@section('content-title', 'Master Barang')
@section('main')


<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No</th>                         
                        <th>Nama Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 1     ?>
                        @foreach ($data as $item)
                        <tr>
                            <th>{{$i++}}</th>                             
                            <td>{{$item->item_name}}</td>
                            <td>{{$item->item_desc}}</td>
                            <td>{{$item->item_qtt}}</td>
                            <td>
                                <a href="masterbarang/{{$item->id}}/edit" class="btn btn-warning btn-circle btn-sm"> <i class="fas fa-edit"></i></a>    
                                <a href="" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-trash"></i></a>    
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{$data->links()}}
            </div>

        </div>
    </div>
</div>

@endsection