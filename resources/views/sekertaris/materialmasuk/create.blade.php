@extends('sekertaris.layouts.template')

@section('title')
Tambah Material Masuk
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
          <form class="form-horizontal" method="post" action="{{  route('sekertaris.materialmasuk.store') }}">
            @csrf
            <div class="box-body">

                <div class="form-group">
                  <label for="id_suplier" class="col-sm-2 control-label">Suplier</label>
                  <div class="col-sm-10">
                    <select name="suplier_id" id="suplier_id" class="form-control">
                      @foreach($suplier as $d)
                        <option value="{{ $d->id_suplier }}">{{ $d->nama_suplier }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-grup">
                    <label for="id_suplier" class="col-sm-2 control-label">Material</label>
                    <div class="col-sm-10">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td width="20"><input type="checkbox" id="head-cb"></td>
                              <th>Nama</th>
                              <th>Harga Satuan</th>
                              <th>Kategori</th>
                              <th>Stok</th>
                              <th>Input Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $angka=0;
                                @endphp
                                @foreach ($material as $d)
                                <tr>
                                    <td>
                                        <input type="hidden" name="id[]" value="{{ $d->id_material }}">
                                        <input type="hidden" name="harga_satuan[]" value="{{ $d->harga_satuan }}">
                                        <input type="checkbox" name="checklist[]" value="{{ $angka }}"  class="cb-child">
                                    </td>
                                  <td>{{ $d->nama_material }}</td>
                                  <td>@uang( $d->harga_satuan )</td>
                                  <td>{{ $d->nama_kategori }}</td>
                                  <td>{{ $d->stok_material }}</td>
                                  <td>
                                    <input type="number" class="form-control" id="jumlah_material" name="jumlah_material[]" style="width:100px;">
                                  </td>
                                </tr>
                                @php
                                    $angka++;
                                @endphp
                                @endforeach

                            </tbody>

                          </table>
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
@push('scripts')
    <script>
        $('#head-cb').on('click', function () {
            if($("#head-cb").prop('checked')==true) {
                $(".cb-child").prop('checked', true)
            } else {
                $(".cb-child").prop('checked', false)
            }
        })
    </script>
@endpush
