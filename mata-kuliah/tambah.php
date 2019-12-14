<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="../Assets/script.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md sticky-top mb-4">
        <div class="container">
            <div class="navbar-logo">Akademik</div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="/akademik" class="nav-item nav-link menu">Dosen</a>
                    <a href="/akademik/mahasiswa" class="nav-item nav-link menu">Mahasiswa</a>
                    <a href="/akademik/mata-kuliah" class="nav-item nav-link menu">Mata Kuliah</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="header-section mb-4">Tambah Data Mata Kuliah</div>
        <form action="../controllers/TambahMataKuliahController.php" method="post">
            <div class="form-group row mb-4">
                <label class="col-sm-2">Jenis Mata Kuliah</label>
                <div class="col-sm-5">
                    <select class="form-control" name="jenis" required>
                        <option disabled selected>Pilih Jenis Mata Kuliah</option>
                        <option value="MataKuliahWajib">Mata Kuliah Wajib</option>
                        <option value="MataKuliahKeminatan">Mata Kuliah Keminatan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-sm-2">Kode</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Mata Kuliah"
                        required>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-sm-2">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Mata Kuliah"
                        required>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-sm-2">SKS</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="sks" placeholder="Masukkan Jumlah SKS" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    </div>
</body>

</html>