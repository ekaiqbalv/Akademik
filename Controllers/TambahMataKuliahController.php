<?php
    require_once "./EasyRdf.php";
    $endpoint = new EasyRdf_Sparql_Client('http://localhost:3030/akademik/update');

    $jenis = $_POST["jenis"];
    $kode = $_POST["kode"];
    $nama = $_POST["nama"];
    $sks = $_POST["sks"];
    $result = $endpoint->update("
        PREFIX family: <http://www.semanticweb.org/prasiman/family#>
        PREFIX owl: <http://www.w3.org/2002/07/owl#>
        PREFIX rdf:<http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX rdfs:<http://www.w3.org/2000/01/rdf-schema#>
        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
        PREFIX krs:<http://www.semanticweb.org/ekaiq/ontologies/175150201111072/krs#>
        INSERT DATA
        { 
            krs:$kode a owl:NamedIndividual, krs:$jenis;
            krs:kode_matakuliah \"$kode\";
            krs:nama \"$nama\";
            krs:sks_matakuliah \"$sks\"^^xsd:integer.            
        }"
    );
    header('Location: /akademik/mata-kuliah');   
?>
