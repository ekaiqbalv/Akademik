<?php
include 'fuseki.php';
include 'Controllers/DosenController.php';

$dosen = new DosenController();
$result = $dosen->getAllDosen();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="Assets/script.js"></script>
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
    <div class="container content">
        <div class="header-section">List Data Dosen</div>
        <label class="input-group">
            <input id="filter" type="text" class="form-control" placeholder="Cari data dosen...">
        </label>
    </div>
    <div class="container">
        <table class="table" id="data">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Ruang Kerja</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col">Mengajar Mata Kuliah</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ((array)$result as $index=>$loop) {
                    echo "<tr>";
                    echo "<td>" . ($index+1) . "</td>";
                    echo "<td>" . $dosen->readable($loop['nip']['value']) . "</td>";
                    echo "<td>" . $dosen->readable($loop['nama']['value']) . "</td>";
                    echo "<td>" . $dosen->readable($loop['umur']['value']) . "</td>";
                    echo "<td>" . $dosen->readable($loop['ruang_kerja']['value']) . "</td>";
                    echo "<td>" . $dosen->readable($loop['tahun_masuk']['value']) . "</td>";
                    echo "<td>" . "<form action='mata-kuliah/detail-mata-kuliah.php' method='post'>
                        <input type='hidden' name='jenis' value='dosen'/>
                        <input type='hidden' name='data_Id' value='".$dosen->readable($loop['data']['value'])."'/>
                        <input type='hidden' name='nama' value='".$dosen->readable($loop['nama']['value'])."'/>
                        <button type='submit' class='btn btn-primary btn-lihat-matkul' name='submit_button'>Lihat</button>
                    </form>" . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="position-fixed" style="font-size: 40px;right: 24px;bottom: 24px">
        <a href="dosen/tambah.php"><i class="fas fa-plus-circle fa-lg" style="color:#ff8720"></i></a>
    </div>
</body>

</html>