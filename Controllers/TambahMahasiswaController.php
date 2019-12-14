<?php
    require_once "./EasyRdf.php";
    $endpoint = new EasyRdf_Sparql_Client('http://localhost:3030/akademik/update');

    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $prodi = $_POST["prodi"];
    $semester = $_POST["semester"];
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
            krs:$nim a owl:NamedIndividual, krs:Mahasiswa;
            krs:mempelajari krs:$matkul;
            krs:nim \"$nim\"^^xsd:integer;
            krs:nama \"$nama\";
            krs:umur \"$umur\"^^xsd:integer;
            krs:prodi \"$prodi\";
            krs:semester \"$semester\"^^xsd:integer;
            krs:tahun_masuk \"$tahunMasuk\"^^xsd:integer.
            krs:$matkul krs:dipelajari krs:$nim.
        }"
    );
    header('Location: /akademik/mahasiswa');   
?>
