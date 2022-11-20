<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">Data Mahasiswa</h1>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        <a href="{{ route ('mahasiswa.create') }}" class="btn btn-success mb-3">+ Tambah Data</a>
        <div class="card">
            <div class="card-body">
            <table class="table">
                <thead>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>JENIS KELAMIN</th>
                    <th>JURUSAN</th>
                    <th>AKSI</th>
                </thead>
                <tbody>
                  @if ($mahasiswa->count() > 0)
                  @foreach ($mahasiswa as $no => $hasil)
                  <tr>
                      <th>{{ $no+1 }}</th>
                      <td>{{ $hasil->nim }}</td>
                      <td>{{ $hasil->nama }}</td>
                      <td>{{ $hasil->jk }}</td>
                      <td>{{ $hasil->jurusan }}</td>
                      <td>
                          <form action="{{ route('mahasiswa.destroy', $hasil->id) }}" method="POST">
                              @csrf
                              @method('delete')
                              <a href="{{ route('mahasiswa.edit', $hasil->id) }}" class="btn btn-info btn-sm">Edit</a>
                              <button class="btn btn-danger btn-sm">Delete</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach        
                  @else
                  <tr>
                    <td colspan='10' align="center">Tidak Ada Data</td>
                  </tr>
                  @endif
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>