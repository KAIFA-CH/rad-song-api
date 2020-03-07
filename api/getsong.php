<?php
$station = $_GET['station'];
error_reporting(0);
header('Content-Type: application/json');
if($station == "TRAP.FM"){
    $page = file_get_contents('https://trap.fm/pages/side_tracklist.php');
    $doc = new DOMDocument;
    $doc->loadHTML($page);
    $title = $doc->getElementById('current_song');
    $output['title'] = $title->childNodes->item(3)->nodeValue;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station == "1LiveDiggi"){
    $text = file_get_contents('https://www.wdr.de/radio/radiotext/streamtitle_1live_diggi.txt');
    $output['title'] = $text;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station == "JAM.FM"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://www.jam.fm/services/program-info/live/jam');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $tna = $obj[1]['playHistories'][0]['track']['artist']." - ".$obj[1]['playHistories'][0]['track']['title'];
    $output['title'] = $tna;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station == "Anison.FM"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://feed.tunein.com/profiles/s185342/nowPlaying');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $output['title'] = $obj['Header']['Subtitle'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station == "Kibo.FM"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://kibo.fm/include/modules/radioinfo.php');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $tna = $obj['interpret']." - ".$obj['titel'];
    $output['title'] = $tna;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station == "TruckersFM"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://panel.truckers.fm/api/song/current');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $tna = $obj['artist']." - ".$obj['title'];
    $output['title'] = $tna;
    echo json_encode($output, JSON_PRETTY_PRINT);
}else{
    $output['title'] = $station;
    echo json_encode($output, JSON_PRETTY_PRINT);
}