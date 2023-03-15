@extends('layout.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Grafik</h4>
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
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Engagement</a>
                    </li>
                </ul>
            </div>
            <div class="row">

            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"><i class="fa fa-bars"></i> Data Engagement</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddGrafik">
                                    <i class="fa fa-plus"></i>
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Content</th>
                                        <th>Level Content</th>
                                        <th>Viewers</th>
                                        <th>Like</th>
                                        <th>Comment</th>
                                        <th>Tanggal Upload</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($grafik as $row)

                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ App\Models\Content::find($row->nama_content)->nama_content}}</td>
                                        <td>{{ App\Models\Marketing::find($row->level_content)->level_content}}</td>
                                        <td>{{ $row->view }} </td>
                                        <td>{{ $row->like }} </td>
                                        <td>{{ $row->comment }} </td>
                                        <td>{{ $row->tanggal }} </td>
                                        <td>
                                            <a href="#modalEditGrafik{{ $row->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="#modalHapusGrafik{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Marketing -->
<div class="modal fade" id="modalAddGrafik" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/grafik/store">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama_content">Nama Content</label>
                        <select name="nama_content" class="form-control">
                            @foreach($content as $item)
                            <option value="{{$item->id}}">{{$item->nama_content}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="level_content">Level Content</label>
                        <select name="level_content" class="form-control">
                            @foreach($marketing as $item)
                            <option value="{{$item->id}}">{{$item->level_content}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Viewers</label>
                        <input type="number" class="form-control" name="view" placeholder="Viewers ..." required>
                    </div>

                    <div class="form-group">
                        <label>Like</label>
                        <input type="number" class="form-control" name="like" placeholder="Like ..." required>
                    </div>

                    <div class="form-group">
                        <label>Comment</label>
                        <input type="number" class="form-control" name="comment" placeholder="Comment ..." required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Upload</label>
                        <input type="date" class="form-control" name="tanggal" placeholder="Tanggal Upload ..." required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Marketing -->
@foreach ($grafik as $d )
<div class="modal fade" id="modalEditGrafik{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/grafik/{{ $d->id }}/update">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <label for="nama_content">Nama Content</label>
                        {{--<input type="text" class="form-control" id="marketing_id" name='marketing_id'>--}}
                        <select name="nama_content" class="form-control">
                            @foreach($content as $item)
                            <option value="{{$item->id}}">{{$item->nama_content}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="level_content">Level Content</label>
                        {{--<input type="text" class="form-control" id="marketing_id" name='marketing_id'>--}}
                        <select name="level_content" class="form-control">
                            @foreach($marketing as $item)
                            <option value="{{$item->id}}">{{$item->level_content}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Viewers</label>
                        <input type="number" value="{{ $d->view }}" class="form-control" name="view" required>
                    </div>

                    <div class="form-group">
                        <label>Like</label>
                        <input type="number" value="{{ $d->like }}" class="form-control" name="like" required>
                    </div>

                    <div class="form-group">
                        <label>Comment</label>
                        <input type="number" value="{{ $d->comment }}" class="form-control" name="comment" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" value="{{ $d->tanggal }}" class="form-control" name="tanggal" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Hapus User -->
@foreach ($grafik as $g )
<div class="modal fade" id="modalHapusGrafik{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="get" enctype="multipart/form-data" action="/grafik/{{ $d->id }}/destroy">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Batal</button>

                    <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endforeach
@endsection