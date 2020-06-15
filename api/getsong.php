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
}elseif($station === "AsiaDreamJHits"){
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'http://player.abovecast.com/streamdata.php?h=bluford.torontocast.com&p=8526&i=1&https=0&f=v2&c=900613');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$output['title'] = $obj['song'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "Y100WNCY"){
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://api.tunegenie.com/v1/brand/nowplaying/?apiid=m2g_bar&b=wncy&count=1');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$output['title'] = $obj['response'][0]['artist'] . " - " . $obj['response'][0]['song'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "Q102"){
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://live.wkrq.com/wp-content/plugins/hubbard-listen-live/api/hll_cues_get.php');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$tna = $obj['data']['response'][0]['data']['artist']." - ".$obj['data']['response'][0]['data']['description'];
    $output['title'] = $tna;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "VIBEROOM"){
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://user8017.a7.radioheart.ru/api/json/?userlogin=user8017&api=lasttrack&count=1');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $output['title'] = $obj[0]['name'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "Gensokyo"){
	$xml=simplexml_load_file("https://gensokyoradio.net/xml/") or die("Error: Cannot create object");
	$output['title'] = $xml->SONGINFO->ARTIST . " - " . $xml->SONGINFO->TITLE;
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "freshsound"){
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://feed.tunein.com/profiles/s278846/nowPlaying');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $output['title'] = $obj['Header']['Subtitle'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "ILoveRadio"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://www.ilovemusic.de/typo3conf/ext/ep_channel/Scripts/playlist.php');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $tna = $obj['channel-1']['artist']." - ".$obj['channel-1']['title'];
    $output['title'] = $tna;
	echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "ILoveHipHop"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://www.ilovemusic.de/typo3conf/ext/ep_channel/Scripts/playlist.php');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $tna = $obj['channel-4']['artist']." - ".$obj['channel-4']['title'];
    $output['title'] = $tna;
	echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "EuropaFM"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://www.europafm.ro/track_info.json');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $tna = $obj['songs'][0]['artist']." - ".$obj['songs'][0]['track'];
    $output['title'] = $tna;
	echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "VirginRadioRO"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://virginradio.ro/track_info.json');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $tna = $obj['songs'][0]['artist']." - ".$obj['songs'][0]['track'];
    $output['title'] = $tna;
	echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "ProFMRO"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://www.profm.ro/api-current-song/2918');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $output['title'] = $obj['songs'][0]['song'];
	echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "Trancebase"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://api.tb-group.fm/v1/tracklist/5?count=1');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $tna = $obj[0]['a']." - ".$obj[0]['t'];
    $output['title'] = $tna;
	echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "GAYFM"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: HMAC radiogermany_web:-SqSQ1jGtA0HPocn_XGUJW7ACOtLhRA-gcg4MNB92Bc'));
    curl_setopt($ch, CURLOPT_URL, 'http://metadata-api.mytuner.mobi/api/v1/metadata-api/web/song-history?app_codename=radiogermany_web&radio_id=410270&time=1589704011993');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
    $output['title'] = $obj['song_history'][19]['metadata'];
	echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "OpenFMKlub"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://prod.radio-api.net/stations/now-playing?stationIds=openfmklub90');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$output['title'] = $obj[0]['title'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "KISSFMCB"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://prod.radio-api.net/stations/now-playing?stationIds=kissfmberlinclubsets');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$output['title'] = $obj[0]['title'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "1LIVE"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://prod.radio-api.net/stations/now-playing?stationIds=1live');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$output['title'] = $obj[0]['title'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}elseif($station === "NRJFrenchHits"){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://www.nrj.fr/onair');
    $result = curl_exec($ch);
    curl_close($ch);
    $obj = json_decode($result, true);
	$output['title'] = $obj[0]['playlist'][0]['song']['artist'] + ' - ' + $obj[0]['playlist'][0]['song']['title'];
    echo json_encode($output, JSON_PRETTY_PRINT);
}else{
    $output['title'] = "No Data Available";
    echo json_encode($output, JSON_PRETTY_PRINT);
}