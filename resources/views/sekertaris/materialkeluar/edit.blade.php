@extends('sekertaris.layouts.template')

@section('title')
Edit Material Keluar
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
          <form class="form-horizontal" method="post" action="{{  route('sekertaris.materialkeluar.update', $data->id_material_keluar) }}">
            @method('patch')
            @csrf
            <div class="box-body">
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
                                        <input type="checkbox" name="checklist[]" value="{{ $angka }}"  class="cb-child"
                                        @foreach($detailMaterial as $dm)
                                            @if($d->id_material==$dm->material_id)
                                                checked
                                            @endif

                                            @endforeach
                                            >
                                    </td>
                                  <td>{{ $d->nama_material }}</td>
                                  <td>@uang( $d->harga_satuan )</td>
                                  <td>{{ $d->nama_kategori }}</td>
                                  <td>{{ $d->stok_material }}</td>
                                  <td>
                                    <input type="number" class="form-control" id="jumlah_material" name="jumlah_material[]" style="width:100px;"
                                    @foreach($detailMaterial as $dm)
                                        @if($d->id_material==$dm->material_id)
                                            value ="{{  $dm->jumlah_material_keluar }}"
                                        @endif
                                    @endforeach
                                        >
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
