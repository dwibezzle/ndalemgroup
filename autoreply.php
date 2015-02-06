<?php

// list var
$host = 'localhost';

// $user = 'endsrezw_db';
// $pass = 'abstraxerz27';
// $db = 'endsrezw_db';

$user = 'root';
$pass = 'root';
$db = 'endsrezw_db';

$userkey = "mn9134a";
$passkey = "dx5wt4gvvr5";


// sample hasil arraynya 



function baca_sms($con, $userkey, $passkey){
	// $sms_unread_xml = simplexml_load_file("http://ekobudiprase.zenziva.com/api/readsms.php?userkey=$userkey&passkey=$passkey");
	$sms_unread_xml = simplexml_load_file("http://ekobudiprase.zenziva.com/api/inboxgetall.php?userkey=$userkey&passkey=$passkey");
	
	$json = json_encode($sms_unread_xml);
	$dec_sms_unread = json_decode($json,TRUE);
	
	/*$dec_sms_unread = array(
	    "message" => array(
            "id" => "20",
            "waktu" => "2015-02-06 15:53:46",
            "isiPesan" => "Info piutang",
            "dari" => "+6285743901609"
        )
	);*/

	/*$dec_sms_unread = array(
	    "message" => array(
            array(
                "id" => "11",
                "waktu" => "2015-02-06 14:39:36",
                "isiPesan" => "Lalala",
                "dari" => "+6285743901609"
            ),
            array(
                "id" => "12",
                "waktu" => "2015-02-06 14:39:41",
                "isiPesan" => "tmuj",
                "dari" => "+6285743901609"
            )
	    )
	);*/

	echo '<pre>'; print_r($dec_sms_unread); echo '</pre>';
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

	if (!empty($sms_unread)) {	
		foreach ($sms_unread['message'] as $key => $value) {
			$id = $value['id'];
			$datetime = $value['waktu'];
			$isi = strtoupper($value['isiPesan']);
			$sender = $value['dari'];
			if ( preg_match('[^\+62|62]', $value['dari']) ) {
				$sender = str_replace('+62', '0', $value['dari']);
			}

			$pecah = explode(" ",$isi);
			if ($pecah[0] == "INFO" && $pecah[1] == "PIUTANG")
			{
				$result = cek_user_by_hp($con, $sender);
				if (!empty($result)) {
					$pemesan = $result[0]["pemesan"];
					$total = $result[0]["hargasepakat"];
					$reply = "Halo $pemesan anda telah memesan rumah seharga $total.";
				}else{
					$reply = "Anda tidak terdaftar";
				}
			}else{
				$reply = "Maaf perintah salah";
			}

			// $return = sms($userkey,$passkey,$sender,$reply);
			// $returnd = hapus_sms($userkey,$passkey,$id);

			// echo '<pre>'; print_r($return); echo '</pre>';
			// echo '<pre>'; print_r($returnd); echo '</pre>';
		}
	}


}

function cek_user_by_hp($con, $hp){        
    $sql = "
        SELECT
			pp.`idppjb`,
			pemesan,
			namasertifikat,
			hargasepakat,
			hp,
			carabayar,
			pp.tanggal,
			administrasi,
			pimpinan
		FROM `pembayaran_ppjb` p 
		LEFT JOIN `ppjb` pp ON p.`idppjb` = pp.`idppjb`
		LEFT JOIN `data_perumahan` dp ON pp.`idperum` = dp.`idperum`
		LEFT JOIN `data_kavling` dk ON pp.`idkavling`= dk.`idkavling`
		WHERE pp.`status` =  'dom'
		AND pp.`pimpinan` != 'menunggu'
		AND pp.hp = '$hp'
		GROUP BY pp.`idppjb`
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

function hapus_sms($userkey,$passkey,$id){
	$curlHandle = curl_init();
	curl_setopt($curlHandle, CURLOPT_URL, "http://ekobudiprase.zenziva.com/api/inboxdelete.php?");
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
    baca_sms($con, $userkey, $passkey);

    $con = null;
} catch(PDOException $e) {
    die('Could not connect: ' . $e);
}


?>