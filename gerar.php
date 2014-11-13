<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'ceps');
mysqli_set_charset($conn, 'utf8');
$basePath = dirname(__FILE__);
$qnt = 1;

echo " \n\n ";
$limitStart = 0;
do {
    $queryRes = mysqli_query($conn, "SELECT 
            log_logradouro.log_tipo_logradouro, 
            log_logradouro.log_no as logradouro,
            log_bairro.bai_no as bairro,
            log_localidade.loc_no as cidade,
            log_localidade.ufe_sg as uf,
            log_logradouro.cep
          FROM 
             `log_logradouro`,`log_localidade`,`log_bairro`
          WHERE 
             log_logradouro.loc_nu_sequencial = log_localidade.loc_nu_sequencial
          AND
             log_logradouro.bai_nu_sequencial_ini = log_bairro.bai_nu_sequencial
          LIMIT $limitStart, 100");

    while ($row = mysqli_fetch_array($queryRes)) {
        _do_file_storage($row);
        $last = $row;
    }
    
    echo " \r Cep processando " . $last['cep'] . "";
    $limitStart = $limitStart + 100;
} while (mysqli_num_rows( $queryRes ) > 0 );

function _do_file_storage($row) {
    global $basePath;

    $cepsPath = $basePath . '/public/ceps/';
    $cep = $row['cep'];

    $first_path = substr($cep, 0, 2);
    $second_path = substr($cep, 2, 3);
    $third_path = substr($cep, 5, 3);

    if (!file_exists($cepsPath . $first_path . '/' . $second_path )) {
        mkdir($cepsPath . $first_path . '/' . $second_path, 0777, true);
    }

    $fileWebService = $cepsPath . $first_path . '/' . $second_path . '/' . $third_path;

    $rowArr = array(
        'tipo' => $row[0],
        'logradouro' => $row[1],
        'bairro' => $row[2],
        'cidade' => $row[3],
        'uf' => $row[4],
        'cep' => $row[5],
    );
    file_put_contents($fileWebService . '.json', json_encode($rowArr));
    system( "git add " . $fileWebService . ".json" );
    system( "git commit -m \"cep " . $cep . "\" ");
    system( "git push origin master " );
    echo "\n foi $cep ";

}

function xml_encode($rowArr) {
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><feed/>');
    foreach ($rowArr as $k => $v) {
        $xml->addChild($k, $v);
    }
    return $xml->asXML();
}
