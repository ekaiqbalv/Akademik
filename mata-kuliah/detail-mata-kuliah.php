<?php
include '../fuseki.php';
include '../Controllers/MataKuliahController.php';

global $id,$nama,$jenis,$kata,$result;

if(isset($_POST['submit_button'])){
    $jenis = $_POST['jenis'];
    $id = $_POST['data_Id'];
    $nama = $_POST['nama'];    
    $mataKuliah = new MataKuliahController();
    if($jenis == "mahasiswa"){
        $kata = "diambil oleh ".$nama;
        $result = $mataKuliah->getMataKuliahByMahasiswa($id);
    }
    else if($jenis == "dosen"){
        $kata = "diajar oleh ".$nama;
        $result = $mataKuliah->getMataKuliahByDosen($id);
    }
}
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
        <div class="header-section">
            <?php
                echo "Berikut merupakan mata kuliah yang ".$kata;
            ?>
        </div>
        <label class="input-group">
            <input id="filter" type="text" class="form-control" placeholder="Cari data mata kuliah...">
        </label>
        <table class="table" id="data">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Jenis</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ((array)$result as $index=>$loop) {
                    echo "<tr>";
                    echo "<td>" . ($index+1) . "</td>";
                    echo "<td>" . $mataKuliah->readable($loop['kode']['value']) . "</td>";
                    echo "<td>" . $mataKuliah->readable($loop['nama']['value']) . "</td>";
                    echo "<td>" . $mataKuliah->readable($loop['sks']['value']) . "</td>";
                    echo "<td>" . $mataKuliah->readable($loop['jenis']['value']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>