<?php

function is_heroic_complete($dts, $instance) {
    foreach($dts as $dt) {
        $completed_instance = $dt->nodeValue;
        if(strpos($completed_instance, $instance)) {
            return trim($dt->nextSibling->nodeValue) != '--';
        }
    }
    return false;
}

function character_incomplete_heroics($region, $server, $character) {
    $all_heroics = array(
        "Gate of the Setting Sun",
        "Mogu'shan Palace",
        "Scarlet Halls",
        "Scarlet Monastery",
        "Scholomance",
        "Shado-Pan Monastery",
        "Siege of Niuzao Temple",
        "Stormstout Brewery",
        "Temple of the Jade Serpent"
        );

    $character_info = file_get_contents("http://".$region.".battle.net/wow/en/character/".$server."/".$character."/statistic/15164");

    $dom = new DomDocument();
    $dom->loadHTML($character_info);
    $xpath = new DomXPath($dom);
    $heroic_dts = $xpath->query("//dt[contains(text(), '(Heroic')]");

    $incomplete = array();
    foreach($all_heroics as $instance) {
        if(!is_heroic_complete($heroic_dts, $instance)) {
            array_push($incomplete, $instance);
        }
    }
    return  json_encode($incomplete);
}

echo character_incomplete_heroics($_GET["region"], $_GET["server"], $_GET["character"]);

?>