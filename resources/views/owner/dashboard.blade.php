@extends('owner.layouts.template')
@section('title')
    Dashboard Owner
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('chartjs/Chart.min.css') }}" />
<script src="{{ asset('chartjs/Chart.min.js') }}"></script>
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-person-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Stok Material</span>
                    <span class="info-box-number">{{ $material }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-list-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Material Masuk</span>
                    <span class="info-box-number">{{ $detailMaterialMasuk }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Material Keluar</span>
                    <span class="info-box-number">{{ $detailMaterialKeluar }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Pendapatan</span>
                    <span class="info-box-number">@uang($total)</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <!-- /.col -->
              </div>
            </div>
          </div>
        </div>
</div>


<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                   Grafik Penjualan
            </div>
            <div class="box-body">
                  <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
</div>

@endsection
