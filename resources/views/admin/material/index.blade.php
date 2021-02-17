@extends('admin.layouts.template')

@section('title')
Data Material
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
                <a class="btn btn-primary btn-sm" href="{{  route('admin.material.create') }}" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Material</th>
                    <th>Harga Material</th>
                    <th>Kategori Material</th>
                    <th>Jumlah Stok Material</th>
                    <th>Created By</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $d)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_material }}</td>
                        <td>@uang( $d->harga_satuan )</td>
                        <td>{{ $d->nama_kategori }}</td>
                        <td>{{ $d->stok_material }}</td>
                        <td>{{ $d->nama_admin }}</td>
                        <td>
                            <form method="post" action="{{ route('admin.material.destroy',$d->id_material) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.material.edit',$d->id_material) }}"><i class="fa fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
