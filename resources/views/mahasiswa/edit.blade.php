<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Data Mahasiswa</title>
  </head>
  <body>
        <div class="container mt-5">
            <h1 class="text-center mb-5">Edit Data Mahasiswa</h1>
            <a href="{{ route ('mahasiswa.index') }}" class="btn btn-success mb-3">< Kembali</a>
            <div class="card">
                <div class="card-body">
                <form  action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" value="{{ $mahasiswa->nim }}" id="nim">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->nama }}" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jk" value="{{ $mahasiswa->jk }}" id="jk">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="{{ $mahasiswa->jurusan }}" id="jurusan">
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Simpan</button>
                    </form>
                 </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>