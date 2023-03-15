<!DOCTYPE html>
<html>

<head>
  <title>Laporan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <style type="text/css">
    table tr td,
    table tr th {
      font-size: 9pt;
    }
  </style>
  <center>
    <h4>LAPORAN DATA ENGAGEMENT</h4>
  </center>

  <table class='table table-bordered'>
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
      @if (count($laporan) == 0)
      <div class="alert alert-danger">Data Tidak Di Temukan</div>

      @elseif (!empty($laporan))
      <?php
      $i = 1;
      ?>
      @foreach ($laporan as $no => $item)
      <tr>
        <th scope="row">{{$i++}}</th>
        <<td>{{ App\Models\Content::find($item->nama_content)->nama_content}}</td>
          <td>{{ App\Models\Marketing::find($item->level_content)->level_content}}</td>
          <td>{{ $item->view}}</td>
          <td>{{ $item->like}}</td>
          <td>{{ $item->comment}}</td>
          <td>{{ $item->tanggal}}</td>
      </tr>
      @endforeach
      @endif
    </tbody>
    </tbody>
  </table>

</body>

</html>