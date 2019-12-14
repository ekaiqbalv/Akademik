<?php
class MahasiswaController{
    public function homeUrl()
    {
        return 'http://localhost/akademik/';
    }
    public function prefixes()
    {
        $prefix = "PREFIX family: <http://www.semanticweb.org/prasiman/family#>
        PREFIX owl: <http://www.w3.org/2002/07/owl#>
        PREFIX rdf:<http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX rdfs:<http://www.w3.org/2000/01/rdf-schema#>
        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
        PREFIX krs:<http://www.semanticweb.org/ekaiq/ontologies/175150201111072/krs#>";
        return $prefix;
    }

    public function readable($text)
    {
        return ucfirst(str_replace('_', ' ', str_replace('http://www.semanticweb.org/ekaiq/ontologies/175150201111072/krs#', '', $text)));
    }

    public function getAllMahasiswa()
    {
        $request = new Fuseki('http://localhost:3030', 'akademik');
        $sparql = "
        SELECT DISTINCT ?data?nim?nama?umur?prodi?semester?tahun_masuk
        WHERE { 
            ?data a krs:Mahasiswa.
            ?data krs:nim ?nim.
            ?data krs:nama ?nama.
            ?data krs:umur ?umur.
            ?data krs:prodi ?prodi.
            ?data krs:semester ?semester.
            ?data krs:tahun_masuk ?tahun_masuk.
        }
        order by ?nim";
        $request->setSparQl($this->prefixes() . $sparql);
        $result = $request->sendRequest();
        return $result;
    }
}
