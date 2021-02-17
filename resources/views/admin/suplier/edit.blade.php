@extends('admin.layouts.template')

@section('title')
Edit Data Suplier
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
            <form class="form-horizontal" method="post" action="{{ route('admin.suplier.update',$data->id_suplier) }}">
                @method('patch')
              @csrf
              <div class="box-body">

                  <div class="form-group">
                      <label for="nama_suplier" class="col-sm-2 control-label">Nama Suplier Material</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_suplier" name="nama_suplier" value=" {{ old('nama_suplier') ?? $data->nama_suplier }} ">
                      </div>
                    </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>
</div>
@endsection
