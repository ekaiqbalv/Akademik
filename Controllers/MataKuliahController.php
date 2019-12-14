<?php
class MataKuliahController{
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

    public function getAllMataKuliah()
    {
        $request = new Fuseki('http://localhost:3030', 'akademik');
        $sparql = "
        SELECT ?jenis?data?kode?nama?sks
        WHERE { 
            ?jenis rdfs:subClassOf* krs:MataKuliah.
            ?data rdf:type ?jenis.
            ?data krs:kode_matakuliah ?kode.
            ?data krs:nama ?nama.
            ?data krs:sks_matakuliah ?sks
        }
        order by ?kode_matakuliah";
        $request->setSparQl($this->prefixes() . $sparql);
        $result = $request->sendRequest();
        return $result;
    }
    public function getMataKuliahByMahasiswa($id)
    {
        $request = new Fuseki('http://localhost:3030', 'akademik');
        $sparql = "
        SELECT ?jenis?data?kode?nama?sks
        WHERE { 
            ?jenis rdfs:subClassOf* krs:MataKuliah.
            ?data rdf:type ?jenis.
            ?data krs:dipelajari krs:$id.
            ?data krs:kode_matakuliah ?kode.
            ?data krs:nama ?nama.
            ?data krs:sks_matakuliah ?sks.
        }
        order by ?kode";
        $request->setSparQl($this->prefixes() . $sparql);
        $result = $request->sendRequest();
        return $result;
    }
    public function getMataKuliahByDosen($id)
    {
        $request = new Fuseki('http://localhost:3030', 'akademik');
        $sparql = "
        SELECT DISTINCT ?jenis?data?kode?nama?sks
        WHERE { 
            ?jenis rdfs:subClassOf* krs:MataKuliah.
            ?data rdf:type ?jenis.
            ?data krs:diajar krs:$id.
            ?data krs:kode_matakuliah ?kode.
            ?data krs:nama ?nama.
            ?data krs:sks_matakuliah ?sks.
        }
        order by ?kode";
        $request->setSparQl($this->prefixes() . $sparql);
        $result = $request->sendRequest();
        return $result;
    }
}
