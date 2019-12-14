<?php
    require_once "./EasyRdf.php";
    $endpoint = new EasyRdf_Sparql_Client('http://localhost:3030/akademik/update');
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $ruangKerja = $_POST["ruang_kerja"];
    $tahunMasuk = $_POST["tahunMasuk"]; 
    $matkul = $_POST["matkul"];       
    $result = $endpoint->update("
        PREFIX family: <http://www.semanticweb.org/prasiman/family#>
        PREFIX owl: <http://www.w3.org/2002/07/owl#>
        PREFIX rdf:<http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX rdfs:<http://www.w3.org/2000/01/rdf-schema#>
        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
        PREFIX krs:<http://www.semanticweb.org/ekaiq/ontologies/175150201111072/krs#>
        INSERT DATA
        { 
            krs:$nip a owl:NamedIndividual, krs:Dosen;
            krs:mengajar krs:$matkul;
            krs:nip \"$nip\"^^xsd:integer;
            krs:nama \"$nama\";
            krs:umur \"$umur\"^^xsd:integer;
            krs:ruang_kerja \"$ruangKerja\";
            krs:tahun_masuk \"$tahunMasuk\"^^xsd:integer.
            krs:$matkul krs:diajar krs:$nip.
        }"
    );
    header('Location: /akademik');   
?>
