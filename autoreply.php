<?php

// list var
$host = 'localhost';

// $user = 'endsrezw_db';
// $pass = 'abstraxerz27';
// $db = 'endsrezw_db';

$user = 'root';
$pass = '';
$db = 'endsrezw_dbv2';

$userkey = "mn9134a";
$passkey = "dx5wt4gvvr5";

function read_inbox($userkey, $passkey){
	// $sms_unread_xml = simplexml_load_file("http://ekobudiprase.zenziva.com/api/readsms.php?userkey=$userkey&passkey=$passkey");
	// $sms_unread_xml = simplexml_load_file("http://ekobudiprase.zenziva.com/api/inboxgetall.php?userkey=$userkey&passkey=$passkey");
	
	// $dec_sms_unread = object2array($sms_unread_xml);
	
	/*$dec_sms_unread = array(
	    "message" => array(
            "id" => "20",
            "waktu" => "2015-02-06 15:53:46",
            "isiPesan" => "con Info piutang",
            // "isiPesan" => "pbr Info hutang",
            "dari" => "+6285743901609"
        )
	);*/

	$dec_sms_unread = array(
	    "message" => array(
            array(
                "id" => "11",
                "waktu" => "2015-02-06 14:39:36",
                "isiPesan" => "con Info piutang",
                "dari" => "+6285743901609"
            ),
            array(
                "id" => "12",
                "waktu" => "2015-02-06 14:39:41",
                "isiPesan" => "pbr Info hutang",
                "dari" => "+6285743901609"
            ),
            array(
                "id" => "12",
                "waktu" => "2015-02-06 14:39:41",
                "isiPesan" => "pbr Info sd",
                "dari" => "+6285743901609"
            )
	    )
	);

	// echo '<pre>'; print_r($dec_sms_unread); echo '</pre>';

	$sms_unread = array();
	if (!empty($dec_sms_unread['message'])){
		$key = array_keys($dec_sms_unread['message']);
		if ($key[0] === "id") {
			$sms_unread['message'][] = ($dec_sms_unread['message']);
		}elseif ($key[0] === 0){
			$sms_unread = $dec_sms_unread;
		}elseif ($key[0] === "text") {
			$sms_unread = array();
		}
	} 

	echo '<pre>'; print_r($sms_unread); echo '</pre>';
	return $sms_unread;
}

function autoreply($con, $userkey, $passkey){
	$format_sms = array(
    	'kons' => array(
    		"input" => "CON INFO PIUTANG",
    		"output" => "%s, sisa tagihan anda sebesar %s. Angsuran terdekat tanggal %s sebesar %s."
    	),
    	'pbr' => array(
    		"input" => "PBR INFO HUTANG",
    		"output" => "%s, hutang terhadap anda sebesar %s. Angsuran terdekat tanggal %s sebesar %s."
    	)
    );

	$sms_unread = read_inbox($userkey, $passkey);	

	if (!empty($sms_unread)) {	
		foreach ($sms_unread['message'] as $key => $value) {
			
			$sender = $value['dari'];
			if ( preg_match('[^\+62|62]', $value['dari']) ) {
				$sender = str_replace('+62', '0', $value['dari']);
			}

			$param = array(
				'id' => $value['id'],
				'datetime' => $value['waktu'],
				'isi' => strtoupper($value['isiPesan']),
				'sender' => $sender
			);

			reply_sms($con, $param, $format_sms);

			
		}
	}
}

function reply_sms($con, $param, $format_sms){
	if ($param["isi"] == $format_sms["kons"]["input"])
	{
		$format = $format_sms["kons"];
		$result = cek_user_by_hp($con, $param["sender"]);
		$reply = replace_format_sms($con, $param, $format, $result);		
	}
	elseif($param["isi"] == $format_sms["pbr"]["input"])
	{
		$format = $format_sms["pbr"];
		$result = cek_pemborong_by_hp($con, $param["sender"]);
		$reply = replace_format_sms($con, $param, $format, $result);
	}
	else
	{
		$reply = "Maaf perintah tidak terdefinisi.";
	}

	echo '<pre>'; print_r($reply); echo '</pre>';

	// $xml_return = sms($userkey,$passkey,$param["sender"],$reply);

	// $json_xml_return = json_encode($xml_return);
	// $dec_json_xml_return = json_decode($json_xml_return,TRUE);
	// $obj_return = object2array(simplexml_load_string($xml_return));
	// $idoutbox = $obj_return["message"]["messageId"];
	// $returnd = hapus_sms($userkey,$passkey,"outbox",$idoutbox);
	// $returnd = hapus_sms($userkey,$passkey,"inbox", $id);

	// echo '<pre>'; print_r($xml_return); echo '</pre>';
	// echo '<pre>'; print_r($obj_return["message"]["messageId"]); echo '</pre>';
	// echo '<pre>'; print_r($returnd); echo '</pre>';

}

function replace_format_sms($con, $param, $format, $result){
	if (!empty($result)) {
		$nama = $result[0]["nama"];
		$total = $result[0]["total"];
		$bayar_tempo = $result[0]["bayar_tempo"];
		$jatuh_tempo = $result[0]["jatuh_tempo"];
		$reply = vsprintf($format["output"], array($nama, $total, $jatuh_tempo, $bayar_tempo));
	}else{
		$reply = "Maaf nomor Anda tidak terdaftar.";
	}

	return $reply;
}


function object2array($object) { return @json_decode(@json_encode($object),1); } 

function cek_user_by_hp($con, $hp){        
    $sql = "
        SELECT
			pp.`idppjb`,
			pemesan as nama,
			namasertifikat,
			hargasepakat,
			hp,
			carabayar,
			pp.tanggal,
			administrasi,
			pimpinan,
			SUM(p.`jumlah`) AS total,
			p.`jumlah` AS bayar_tempo,
			p.`tanggal` AS jatuh_tempo
		FROM `pembayaran_ppjb` p 
		LEFT JOIN `ppjb` pp ON p.`idppjb` = pp.`idppjb`
		LEFT JOIN `data_perumahan` dp ON pp.`idperum` = dp.`idperum`
		LEFT JOIN `data_kavling` dk ON pp.`idkavling`= dk.`idkavling`
		WHERE pp.`status` =  'dom'
		AND pp.`pimpinan` != 'menunggu'
		AND pp.hp = '$hp'
		AND p.`lunas` <> 'lunas'
		GROUP BY pp.`idppjb`
		ORDER BY p.`tanggal` ASC
    ";
    $sq = $con->prepare($sql);
	$sq->execute();
	$result = $sq->fetchAll();

    return $result;
}

function cek_pemborong_by_hp($con, $hp){        
    $sql = "
        SELECT 
			k.`idkbk` AS id,
			k.`pemesan` as nama,
			dp.judul_perum,
			k.pihakkedua,
			k.hargaborongan,
			k.masapelaksanaan,
			k.mulaipelaksanaan,
			k.akhirpelaksanaan,
			k.tanggal,
			k.`telp2`,
			SUM(pk.`jumlah`) AS total,
			pk.`jumlah` AS bayar_tempo,
			pk.`tanggal` AS jatuh_tempo
		FROM `kbk` k
		LEFT JOIN `data_perumahan` dp ON k.`idperum`= dp.`idperum`
		LEFT JOIN pembayaran_kbk pk ON k.`idkbk` = pk.idkbk
		WHERE pk.`status` =  'hutang'
		AND k.`telp2` = '$hp'
		GROUP BY k.idkbk
		ORDER BY pk.`tanggal` ASC
    ";
    $sq = $con->prepare($sql);
	$sq->execute();
	$result = $sq->fetchAll();

    return $result;
}

function sms($userkey,$passkey,$telepon,$pesan)
{
	$url = "http://ekobudiprase.zenziva.com/apps/smsapi.php?tipe=reguler";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$telepon.'&pesan='.urlencode($pesan));
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT,30);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$results = curl_exec($ch);

	// print_r($results);
	curl_close($ch);

	return $results;
	
}

function hapus_sms($userkey,$passkey,$tipe,$id){
	if ($tipe=="inbox") {
		$url = "http://ekobudiprase.zenziva.com/api/inboxdelete.php?";
	}elseif ($tipe=="outbox") {
		$url = "http://ekobudiprase.zenziva.com/api/outboxdelete.php?";
	}	
	
	$curlHandle = curl_init();
	curl_setopt($curlHandle, CURLOPT_URL, $url);
	curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&id='.$id);
	curl_setopt($curlHandle, CURLOPT_HEADER, 0);
	curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
	curl_setopt($curlHandle, CURLOPT_POST, 1);
	curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, false);
	$results = curl_exec($curlHandle);
	curl_close($curlHandle);

	return $results;
}

try {
    $con = new PDO("mysql:host=$host;dbname=$db", $user, $pass);    

    autoreply($con, $userkey, $passkey);

    $con = null;
} catch(PDOException $e) {
    die('Could not connect: ' . $e);
}


?>