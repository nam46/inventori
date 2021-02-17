@extends('owner.layouts.template')

@section('title')
Data Owner
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @if(Session::has('pesan'))
                    <div class="alert alert-{{ Session::get('jenis') }}">{{ Session::get('pesan') }}</div>
                @endif
                {{-- <a class="btn btn-primary btn-sm" href="{{ route('owner.owner.create') }}" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a> --}}
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $d)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_owner }}</td>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->alamat_owner }}</td>
                        <td>{{ $d->no_telfon_owner }}</td>
                        <td>
                            <form method="post" action="{{ route('owner.owner.destroy',$d->id_owner) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning btn-sm" href="{{ route('owner.owner.edit',$d->id_owner) }}"><i class="fa fa-pencil"></i></a>
                                {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> --}}
                              </form>
                        </td>
                      </tr>
                      @endforeach

                  </tbody>

                </table>
              </div>
          </div>
        </div>
</div>
@endsection
