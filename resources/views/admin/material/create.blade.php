@extends('admin.layouts.template')

@section('title')
Tambah Data Material
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">

          <div class="box-body">
              @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
          @if(Session::has('pesan'))
              <div class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</div>
          @endif
          <form class="form-horizontal" method="post" action="{{  route('admin.material.store') }}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                  <label for="nama_material" class="col-sm-2 control-label">Nama Material</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_material" name="nama_material" value="{{ old('nama_material') }}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="kd_kategori" class="col-sm-2 control-label">Kategori Material</label>
                  <div class="col-sm-10">
                    <select name="kategori_id" id="kategori_id" class="form-control">
                      @foreach($kategori as $d)
                        <option value="{{ $d->id_kategori }}">{{ $d->nama_kategori }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="harga" class="col-sm-2 control-label">Harga Material</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan') }}">
                  </div>
                </div>



                <div class="form-group">
                    <label for="harga" class="col-sm-2 control-label">Stok Material</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="stok_material" name="stok_material" value="{{ old('stok_material') }}">
                    </div>
                  </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>
</div>
@endsection
