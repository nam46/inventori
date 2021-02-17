@extends('owner.layouts.template')

@section('title')
Data Material Masuk
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
                <form method="get" action="{{ route('owner.laporanmasuk.index') }}">
                    <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tanggal Awal:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="start" class="form-control pull-right" id="datepicker" value="{{ Request::get('start') }}" required>
                              </div>
                          </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tanggal Akhir:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="end" class="form-control pull-right" id="datepicker2" value="{{ Request::get('end') }}" required>
                              </div>
                          </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Kode Transaksi :</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="kode" class="form-control pull-right"  value="{{ Request::get('kode') }}">
                              </div>
                          </div>
                    </div>

                    <div class="col-md-1">
                        <label style="opacity:0;">Sub</label>
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Tampilkan</button>
                    </div>

                    {{-- &kode={{ Request::get('kode') }} --}}
                    <div class="col-md-1">
                        <label style="opacity:0;">Sub</label>
                        @if (Request::get('end')!=null || Request::get('start')!=null)
                        <a class="btn btn-primary" href="{{ route('owner.laporanmasuk.cetak') }}?start={{ Request::get('start') }}&end={{ Request::get('end') }}&kode={{ Request::get('kode') }}" style="background-color: #c0392b;border:none;"><i class="fa fa-download"></i> Cetak PDF</a>
                        @else
                        <a class="btn btn-primary" href="{{ route('owner.laporanmasuk.cetak') }}" style="background-color: #c0392b;border:none;"><i class="fa fa-download"></i> Cetak PDF</a>
                        @endif

                    </div>
                </div>
                </form>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>KD Transaksi</th>
                        <th>Tgl Masuk</th>
                        <th>Suplier</th>
                        <th>Nama Material</th>
                        <th>Kategori Material</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->kode_transaksi_masuk }}</td>
                        <td>{{ \Carbon\Carbon::parse($d->waktu_entri)->format('d F Y') }}</td>
                        <td>{{ $d->nama_suplier }}</td>
                        <td>{{ $d->nama_material }}</td>
                        <td>{{ $d->nama_kategori }}</td>
                        <td>@uang($d->harga_satuan)</td>
                        <td>{{ $d->jumlah_material_masuk }}</td>
                        <td>@uang($d->jumlah_material_masuk*$d->harga_satuan)</td>
                      </tr>
                    @endforeach

                  </tbody>

                </table>
              </div>
          </div>
        </div>
</div>
@endsection
