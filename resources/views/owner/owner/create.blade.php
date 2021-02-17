@extends('owner.layouts.template')

@section('title')
Tambah Data Owner
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
            <form class="form-horizontal" method="post" action="{{  route('admin.owner.store') }}">
              @csrf
              <div class="box-body">

                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Isi Username">
                  </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="nama_owner" class="col-sm-2 control-label">Nama Owner</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_owner" name="nama_owner" value=" {{ old('nama_owner') }}">
                      </div>
                    </div>

                      <div class="form-group">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="alamat" name="alamat_owner">{{ old('alamat_owner') }}</textarea>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="no_telfon_owner" class="col-sm-2 control-label">No Telepon</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="no_telfon_owner" name="no_telfon_owner" value="{{ old('no_telfon_owner') }}">
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
