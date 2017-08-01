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

class Property
{
    public $xmlClass;
    public $elemClass = '';
    public $result_array = array();
    public $data = '';
    public function __construct($xml, $elem) //to konstruktor którzy tworzy całą arajke
    {
        $this->xmlClass  = $xml;
        $this->elemClass = $elem;

        foreach ($xml->lista->ksiazka as $value) {
            $data                 = $value->$elem->__toString(); //tu moja magiczna metoda
            $this->result_array[] = $data;
        }

    }
    public function getResult()
    {
        return $this->result_array; //tu mam zwracam wartość z konstruktora
    }
}


$result_autor  = new Property($xml, 'autor');
$result_tytul  = new Property($xml, 'tytul');
$result_znizka = new Property($xml, 'znizka');


$autor  = $result_autor->getResult();
$tytul  = $result_tytul->getResult();
$znizka = $result_znizka->getResult();

$length = count($autor); //tu by sie przydala jakas zreczna klasa                                                                                             // orgazm moim zdaniem :)
for ($i = 0; $i < $length; $i++) { //zeby nie musiec tego za kazdym razem zmieniac tylko podkladac dane
    $final_array[] = array(
        'autor' => $autor[$i],
        'tytul' => $tytul[$i],
        'znizka' => $znizka[$i]
    );
}
;

//poniżej mam wziętą pod uwagę baze księgarń, json wychodzi 8 razy większy bo ma jakieś 9 mega,
//ale nie potrafię zrobić uchywtów - nazwać wartości i kluczy, żeby sprawnie to obrobić w AJAXie

// class  Property {
//         public $xmlClass;
//         public $elemClass = '';
//         public $first_array = array();
//         public $result_array = array();
//         public $data = '';
//         public $data2 ='';
//   public function __construct($xml,$elem) {
//         $this->xmlClass=$xml;
//         $this->elemClass=$elem;
//
//         foreach($xml->xpath('//*[@baza]') as $key=> $val) { //check $key here
//       //$this->first_array[] = $val; not needed
//       foreach($val->ksiazka as $value){
//         $data = $value->$elem->__toString();
//         $this->result_array[$key][] = $data; // add $key hear
//       }
//   }
//
//   }
//   public function getResult() {
//         return $this->result_array;
//   }
// }
//
//
// $result_autor = new Property($xml,'autor');
// $result_tytul = new Property($xml, 'tytul');
// // $result_znizka = new Property($xml,'znizka');
//
//
//
// $autor = $result_autor->getResult();
// $tytul = $result_tytul->getResult();
// $znizka = $result_znizka->getResult();
//
// $final = array(
//      'autor' => array($autor),
//      'tytul' => array($tytul),
//      'znizka'=> array($znizka)
//  );


$json_result = '/opt/lampp/htdocs/zadanie/baza.json';

$json       = json_encode($final_array, JSON_FORCE_OBJECT);
$createjson = fopen($json_result, 'w');
fwrite($createjson, $json);
fclose($createjson);
chmod($json_result, 0777);
