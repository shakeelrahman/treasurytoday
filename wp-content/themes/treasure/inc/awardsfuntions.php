<?php
function getawardscats(){
    $url = "https://ttapi.imobisoft.uk/api/Category/GetAllCategories";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: text/plain",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp =  json_decode(curl_exec($curl));
curl_close($curl);
//var_dump($resp->result);
$returnstring = '<div class="accordion" id="accordionExample">';
foreach($resp->result as $result){
    $returnstring .= '<div class="accordion-item">';
    $returnstring .= '<h2 class="accordion-header" id="heading'.$result->id.'">';
    $returnstring .= '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$result->id.'" aria-expanded="false" aria-controls="collapse'.$result->id.'">';
    $returnstring .= $result->name;
    $returnstring .= '</button>';
    $returnstring .= '</h2>';
    $returnstring .= '<div id="collapse'.$result->id.'" class="accordion-collapse collapse " aria-labelledby="heading'.$result->id.'" data-bs-parent="#accordionExample">';
    $returnstring .= '<div class="accordion-body">';
    $returnstring .= $result->description;
    $returnstring .= '</div>';
    $returnstring .= '</div>';
    $returnstring .= '</div>';   
}
$returnstring .= '</div>';
return $returnstring;
}

