@extends('layout.master')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"> Laporan Data Engagement</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Laporan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Engagement</a>
                    </li>
                </ul>
            </div>
            <div class="section-body">

                <div class="section-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class=" col-lg-4 col-md-12 col-12 col-sm-12">
                                    <h5>Laporan</h5>
                                    <div class="form-group">
                                        <label for="label">Dari Tanggal</label>
                                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="label">Sampai Tanggal</label>
                                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <a href="" onclick="this.href='/laporan/'+document.getElementById('tgl_awal').value +
                            '/' +document.getElementById('tgl_akhir').value" class="btn btn-info col-md-12"><i class='fas fa-file-alt' style='font-size:15px'></i> Laporan</a>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Laporan Pertanggal</strong><br>
                        <small class="font-weight-bold">{{ $awal }} - {{ $akhir }}</small>
                    </div>
                    <div class="col-md-6 text-right">
                        @if (count($grafik) > 0)
                        <a href="{{ url('cetak_laporan') }}/{{ $awal }}/{{ $akhir }}" class="btn btn-danger" target="_blank"><i class='fas fa-print'></i> Cetak
                            Pdf</a>
                        @endif
                    </div>
                </div>
                <h3>Data Laporan</h3>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Content</th>
                                    <th>Level Content</th>
                                    <th>Viewers</th>
                                    <th>Like</th>
                                    <th>Comment</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($grafik) == 0)
                                <div class="alert alert-danger">Data Tidak Di Temukan</div>
                                {{-- @endif --}}
                                @elseif (!empty($grafik))
                                <?php
                                $i = 1;
                                ?>
                                @foreach ($grafik as $row)
                                <tr>

                                    <th scope="row">{{$i++}}</th>
                                    <<td>{{ App\Models\Content::find($row->nama_content)->nama_content}}</td>
                                        <td>{{ App\Models\Marketing::find($row->level_content)->level_content}}</td>
                                        <td>{{ $row->view}}</td>
                                        <td>{{ $row->like}}</td>
                                        <td>{{ $row->comment}}</td>
                                        <td>{{ $row->tanggal}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>





            </div>
        </div>
    </div>
</div>

@endsection