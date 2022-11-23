@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Create Barang')
@section('content-title', 'Create Barang')
@section('main')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>@foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                          
                        </ul>
                    </div>
                @endif
                    <form method="POST" enctype="multipart/form-data" action="{{route('masterbarang.store')}}">
                    @csrf
                <div class="input-group mb-3">
                </div>
                <div>
                    <label for="desc_kontak">Nama Barang</label>
                    <input type="text" class="form-control" id="name" name="item_name"  value="{{old('item_name')}}" >
                </div>
              
                <div>
                    <label for="desc_kontak">Jumlah Barang</label>
                    <input type="text" class="form-control" id="qtt" name="item_qtt"  value="{{old('item_qtt')}}" >
                </div>

                <div>
                    <label for="desc_kontak">Deskripsi Barang</label>
                    <input type="text" class="form-control" id="desc" name="item_desc"  value="{{old('item_desc')}}" >
                </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{route('masterbarang.index')}}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection