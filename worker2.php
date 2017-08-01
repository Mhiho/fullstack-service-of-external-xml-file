<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit', '256M');
$cache = '/opt/lampp/htdocs/zadanie/produkty-wszystkie.xml';

$dailyupdate = 86400; //24 godziny
if (!file_exists($cache) || filemtime($cache) > time() + $dailyupdate) { //kod ponizej tworzy cache w razie gdy nie ma na dysku pliku

    $xmlroot = fopen("http://somedata", "r");

    file_put_contents($cache, $xmlroot);
    echo 'sciaga plik';
    fclose($xmlroot);
    chmod($cache, 0777);
} else {
    $xml = simplexml_load_file($cache);
}


class  Property {
        public $xmlClass;
        public $elemClass = '';
        public $first_array = array();
        public $result_array = array();
        public $data = '';
        public $data2 ='';
  public function __construct($xml,$elem) {
        $this->xmlClass=$xml;
        $this->elemClass=$elem;

        foreach($xml->xpath('//*[@baza]') as $key=> $val) { //check $key here
      //$this->first_array[] = $val; not needed
      foreach($val->ksiazka as $value){
        $data = $value->$elem->__toString();
        $this->result_array[$key][] = $data; // add $key hear
      }
  }

  }
  public function getResult() {
        return $this->result_array;
  }
}


$result_autor = new Property($xml,'autor');
$result_tytul = new Property($xml, 'tytul');
// $result_znizka = new Property($xml,'znizka');



$autor = $result_autor->getResult();
$tytul = $result_tytul->getResult();
$znizka = $result_znizka->getResult();

$final = array(
     'autor' => array($autor),
     'tytul' => array($tytul),
     'znizka'=> array($znizka)
 );


$json_result = '/opt/lampp/htdocs/zadanie/baza.json';

$json       = json_encode($final_array, JSON_FORCE_OBJECT);
$createjson = fopen($json_result, 'w');
fwrite($createjson, $json);
fclose($createjson);
chmod($json_result, 0777);
