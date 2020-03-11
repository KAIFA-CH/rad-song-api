<?php
$station = $_GET['station'];
error_reporting(0);
header('Content-Type: application/json');
if($station === "TRAP.FM"){
    $page = file_get_contents('https://trap.fm/pages/side_tracklist.php');
    $doc = new DOMDocument;
    $doc->loadHTML($page);
    $title = $doc->getElementById('current_song');
    $output['title'] = $title->childNodes->item(3)->nodeValue;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "1LiveDiggi"){
    $text = file_get_contents('https://www.wdr.de/radio/radiotext/streamtitle_1live_diggi.txt');
    $output['title'] = $text;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "JAM.FM"){
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
}elseif($station === "Anison.FM"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://feed.tunein.com/profiles/s185342/nowPlaying');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $output['title'] = $obj['Header']['Subtitle'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "TruckersFM"){
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
}elseif($station === "ILoveMashup"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://www.ilovemusic.de/typo3conf/ext/ep_channel/Scripts/playlist.php');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $tna = $obj['channel-5']['artist']." - ".$obj['channel-5']['title'];
    $output['title'] = $tna;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "bigFM"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://api.radio.de/info/v2/search/nowplaying?_=1583622313369&apikey=d0c95d28a9a899c628c35fa959e9e0ee3c1b924c&numberoftitles=1&station=1444');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $output['title'] = $obj[0]['streamTitle'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "bigFMMashup"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://api.radio.de/info/v2/search/nowplaying?_=1583623209134&apikey=d0c95d28a9a899c628c35fa959e9e0ee3c1b924c&numberoftitles=1&station=38268');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$output['title'] = $obj[0]['streamTitle'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "RadioRur"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://api-prod.nrwlokalradios.com/playlist/current?station=7');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$tna = $obj['artist']." - ".$obj['title'];
    $output['title'] = $tna;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "Dubplate.fm"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://dubplate.fm/stats.az.php');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $output['title'] = $obj[0]['text'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "HappyFMNC"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://api.laut.fm/station/happyfmnightscore/current_song');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$tna = $obj['artist']['name']." - ".$obj['title'];
    $output['title'] = $tna;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "Rock95"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://feed.tunein.com/profiles/s24756/nowPlaying');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$output['title'] = $obj['Header']['Subtitle'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "101.1BigFM"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://globalnewselection.s3.amazonaws.com/fm-playlist/results/CIQBFM_np.js');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$tna = $obj['artist_name']." - ".$obj['song_name'];
	$output['title'] = $tna;
    echo json_encode($output, JSON_PRETTY_PRINT);
}else{
    $output['title'] = $station;
    echo json_encode($output, JSON_PRETTY_PRINT);
}