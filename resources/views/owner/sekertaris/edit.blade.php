@extends('owner.layouts.template')

@section('title')
Edit Data Sekertaris
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
            <form class="form-horizontal" method="post" action="{{  route('owner.sekertaris.update', $data->id_sekertaris) }}">
                @method('patch')
              @csrf
              <div class="box-body">

                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') ?? $data->username }}" placeholder="Isi Username">
                  </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="nama_admin" class="col-sm-2 control-label">Nama Sekertaris</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_sekertaris" name="nama_sekertaris" value=" {{ old('nama_sekertaris') ?? $data->nama_sekertaris }} ">
                      </div>
                    </div>

                      <div class="form-group">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="alamat_sekertaris" name="alamat_sekertaris">{{ old('alamat_sekertaris') ?? $data->alamat_sekertaris }}</textarea>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="no_telfon_admin" class="col-sm-2 control-label">No Telepon</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="no_telfon_owner" name="no_telfon_sekertaris" value="{{ old('no_telfon_sekertaris') ?? $data->no_telfon_sekertaris }}">
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
