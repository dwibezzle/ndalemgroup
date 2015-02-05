<?php

// list var
$host = 'localhost';

$user = 'endsrezw_db';
$pass = 'abstraxerz27';
$db = 'endsrezw_db';

// $user = 'root';
// $pass = '';
// $db = 'endsrezw_dbv2';

$userkey = "mn9134a";
$passkey = "dx5wt4gvvr5";



$con = null;

//sms 
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

	print_r($results);
	curl_close($ch);
	
}

function piutang($con, $userkey,$passkey)
{
	$sql = "
		SELECT 
		      p.idbayar,
		      CONCAT(
		            'Masa jatuh tempo piutang Anda tinggal ',
		            IF(
		                  DATE_ADD(CURDATE(), INTERVAL 30 DAY) = p.tanggal,
		                  '30',
		                  IF(
		                        DATE_ADD(CURDATE(), INTERVAL 14 DAY) = p.tanggal,
		                        '14',
		                        IF(
		                              DATE_ADD(CURDATE(), INTERVAL 7 DAY) = p.tanggal,
		                              '7',
		                              IF(
		                                    DATE_ADD(CURDATE(), INTERVAL 3 DAY) = p.tanggal,
		                                    '3',
		                                    ''
		                              )
		                        )
		                  )
		            ),
		            ' hari lagi'
		      ) AS pesan,
		      hp 
		FROM
		      `pembayaran_ppjb` p 
		      LEFT JOIN `ppjb` pp 
		            ON p.`idppjb` = pp.`idppjb` 
		      LEFT JOIN `data_perumahan` dp 
		            ON pp.`idperum` = dp.`idperum` 
		      LEFT JOIN `data_kavling` dk 
		            ON pp.`idkavling` = dk.`idkavling` 
		WHERE pp.`status` = 'dom' 
		      AND pp.`pimpinan` != 'menunggu' 
		      AND p.`lunas` <> 'lunas' 
		      AND (
		            DATE_ADD(CURDATE(), INTERVAL 30 DAY) = p.tanggal 
		            OR DATE_ADD(CURDATE(), INTERVAL 14 DAY) = p.tanggal 
		            OR DATE_ADD(CURDATE(), INTERVAL 7 DAY) = p.tanggal 
		            OR DATE_ADD(CURDATE(), INTERVAL 3 DAY) = p.tanggal
		      )
	";
	$sq = $con->prepare($sql);
	$sq->execute();
	$result = $sq->fetchAll();
	// echo '<pre>'; print_r($result); echo '</pre>'; exit();
	foreach ($result as $row)
    {
    	// print $row['pesan'] .' - '. $row['hp'] . '<br />';
		sms($userkey,$passkey,$row['hp'],$row['pesan']);
    }

}

function get_user_hutang_pemborong($con, $id_perum){        
    $sql = "
        (
        SELECT 
            u.`realname`,
            u.`telp`,
            r.`judul`   
        FROM adm_user u
        LEFT JOIN adm_role r ON u.`idrole` = r.`idrole`
        WHERE u.`idrole` = '2'
        AND u.`idperum` = '$id_perum'
        AND u.`status` = 'active'
        )
        UNION
        (
        SELECT 
            u.`realname`,
            u.`telp`,
            r.`judul`
        FROM adm_user u
        LEFT JOIN adm_role r ON u.`idrole` = r.`idrole`
        WHERE u.`idrole` = '5'
        AND u.`idperum` = '$id_perum'
        AND u.`status` = 'active'
        )
    ";
    $sq = $con->prepare($sql);
	$sq->execute();
	$result = $sq->fetchAll();

    return $result;
}

function sent_mes_to_managemnt($con, $userkey, $passkey, $id_perum, $jmlhari, $tipe){
	$data = get_user_hutang_pemborong($con, $id_perum);
	$isi_pesan = "hutang $tipe $jmlhari hari lagi segera dilunasi";
	if (!empty($data)) {
		foreach ($data as $a => $item) {
			$realname = $item['realname'];
			$pesan = "Kepada saudara $realname ".$isi_pesan;
			// print $realname .' - '. $tipe .' - '. $pesan .' - '. $item['telp'] . '<br />';
			sms($userkey,$passkey,$item['telp'],$pesan);
		}
	}
}

function piutang_borongan_kavling($con){
	$sql = "
        SELECT 
            k.`idkbk` as id,
            k.`pemesan`,
            dp.judul_perum,
            k.pihakkedua,
            k.hargaborongan,
            k.masapelaksanaan,
            k.mulaipelaksanaan,
            k.akhirpelaksanaan,
            k.tanggal
        FROM `kbk` k
        LEFT JOIN `data_perumahan` dp ON k.`idperum`= dp.`idperum`
    ";
    $sq = $con->prepare($sql);
	$sq->execute();
	$result = $sq->fetchAll();

    return $result;
}

function data_hutang_piutang_borongan_kavling($con, $id){
	$sql = "
        SELECT 
            target AS progres_pembangunan,
            jenisbayar,
            k.`idkbk`,
            p.tanggal,
            p.`jumlah`,
            p.`status`,
			dp.`idperum`,
			DATE_ADD(CURDATE(), INTERVAL 30 DAY) as tgl_jeda_30,
			DATE_ADD(CURDATE(), INTERVAL 14 DAY) as tgl_jeda_14,
			DATE_ADD(CURDATE(), INTERVAL 7 DAY) as tgl_jeda_7,
			DATE_ADD(CURDATE(), INTERVAL 3 DAY) as tgl_jeda_3
        FROM `pembayaran_kbk` p
        LEFT JOIN `kbk` k ON p.`idkbk` = k.`idkbk`
        LEFT JOIN `ppjb` pp ON k.`idppjb` = pp.`idppjb`
        LEFT JOIN `data_kavling` dk ON dk.`idkavling` = k.`idkavling`
        LEFT JOIN `data_perumahan` dp ON dp.`idperum` = dk.`idperum`
        LEFT JOIN `adm_project` ap ON ap.`idproject` = dp.`idproject`
        LEFT JOIN `data_kota` dko ON dko.`idkota` = ap.`idkota`
        WHERE k.`idkbk` =  '$id'
        AND p.`status` =  'hutang'
        ORDER BY p.`target` ASC
    ";
    $sq = $con->prepare($sql);
	$sq->execute();
	$result = $sq->fetchAll();

    return $result;
}

function piutang_borongan_falum($con){
	$sql = "
        SELECT 	
			k.idkbf as id,
			k.`pemesan`,
			k.subkontraktor,
			k.pihakkedua,
			k.hargaborongan,
			k.masapelaksanaan,
			k.mulaipelaksanaan,
			k.akhirpelaksanaan,
			k.tanggal
		FROM `kbf` k
		JOIN `data_perumahan` dp ON k.`idperum` = dp.`idperum`
    ";
    $sq = $con->prepare($sql);
	$sq->execute();
	$result = $sq->fetchAll();

    return $result;
}

function data_hutang_piutang_borongan_falum($con, $id){
	$sql = "
        SELECT
			target AS progres_pembangunan,
			jenisbayar,
			p.idkbf,
			p.`tanggal`,
			p.`jumlah`,
			p.`status`,
			dp.idperum,
			DATE_ADD(CURDATE(), INTERVAL 30 DAY) as tgl_jeda_30,
			DATE_ADD(CURDATE(), INTERVAL 14 DAY) as tgl_jeda_14,
			DATE_ADD(CURDATE(), INTERVAL 7 DAY) as tgl_jeda_7,
			DATE_ADD(CURDATE(), INTERVAL 3 DAY) as tgl_jeda_3
		FROM `pembayaran_kbf` p 
		JOIN `kbf` ON p.`idkbf`=`kbf`.`idkbf`
		JOIN `ppjb` ON `kbf`.`idppjb`=`ppjb`.`idppjb`
		LEFT JOIN `data_kavling` ON `data_kavling`.`idkavling` = `kbf`.`idkavling`
		LEFT JOIN `data_perumahan` dp ON dp.`idperum` = `data_kavling`.`idperum`
		LEFT JOIN `adm_project` ON `adm_project`.`idproject` = dp.`idproject`
		LEFT JOIN `data_kota` ON `data_kota`.`idkota` = `adm_project`.`idkota`
		WHERE `kbf`.`idkbf` =  '$id'
		ORDER BY p.`target` ASC
    ";
    $sq = $con->prepare($sql);
	$sq->execute();
	$result = $sq->fetchAll();

    return $result;
}

function piutang_borongan_lain($con){
	$sql = "
        SELECT 
			h.`id_hutang_lain` AS id,
			h.`ket_biaya`,
			h.`pen_jawab1`,
			h.`pem_hutang`,
			h.`pen_jawab2`,
			h.`total_nilai_hutang`,
			h.`periode_mulai`,
			h.`periode_selesai`,
			h.`tgl_transaksi`,
			dp.`judul_perum`
		FROM `hutang_lain` h
		JOIN `data_perumahan` dp ON h.`id_perum` = dp.`idperum`
    ";
    $sq = $con->prepare($sql);
	$sq->execute();
	$result = $sq->fetchAll();

    return $result;
}

function data_hutang_piutang_borongan_lain($con, $id){
	$sql = "
        SELECT 
			h.`jenis_bayar`,
			h.`tgl_rencana` as tanggal,
			h.`jumlah`,
			h.`status`,
			dp.`idperum`,
			DATE_ADD(CURDATE(), INTERVAL 30 DAY) as tgl_jeda_30,
			DATE_ADD(CURDATE(), INTERVAL 14 DAY) as tgl_jeda_14,
			DATE_ADD(CURDATE(), INTERVAL 7 DAY) as tgl_jeda_7,
			DATE_ADD(CURDATE(), INTERVAL 3 DAY) as tgl_jeda_3
		FROM `pembayaran_hutang_lain` h
		JOIN `hutang_lain` ON h.`id_hutang_lain`=`hutang_lain`.`id_hutang_lain`
		LEFT JOIN `data_perumahan` dp ON dp.`idperum` = `hutang_lain`.`id_perum`
		LEFT JOIN `adm_project` ON `adm_project`.`idproject` = dp.`idproject`
		LEFT JOIN `data_kota` ON `data_kota`.`idkota` = `adm_project`.`idkota`
		WHERE `hutang_lain`.`id_hutang_lain` =  '$id'
		AND h.`status` = 'Hutang'
    ";
    $sq = $con->prepare($sql);
	$sq->execute();
	$result = $sq->fetchAll();

    return $result;
}

function piutang_borongan($con, $userkey, $passkey, $tipe)
{
	if ($tipe == "kavling") {
		$perum = piutang_borongan_kavling($con);
	}elseif ($tipe == "falum") {
		$perum = piutang_borongan_falum($con);		
	}elseif ($tipe == "lain") {
		$perum = piutang_borongan_lain($con);
	}
	
	if (!empty($perum)) {
		foreach ($perum as $key => $value)
	    {
        	$perum[$key]['data_hutang'] = array();
	    	$id = $value["id"];

			if ($tipe == "kavling") {
				$data_hutang = data_hutang_piutang_borongan_kavling($con, $id);
			}elseif ($tipe == "falum") {
				$data_hutang = data_hutang_piutang_borongan_falum($con, $id);
			}elseif ($tipe == "lain") {
				$data_hutang = data_hutang_piutang_borongan_lain($con, $id);
			}
			
			if (!empty($data_hutang)) {
				$perum[$key]['data_hutang'] = $data_hutang;
				foreach ($data_hutang as $a => $item) {
					$tgl_jeda_30 = $item['tgl_jeda_30'];
					$tgl_jeda_14 = $item['tgl_jeda_14'];
					$tgl_jeda_7 = $item['tgl_jeda_7'];
					$tgl_jeda_3 = $item['tgl_jeda_3'];
					if ($item['tanggal'] == $tgl_jeda_30) {
						// echo '<pre>'; print_r($item['tanggal'].' - '.$tgl_jeda_30); echo '</pre>';
						sent_mes_to_managemnt($con, $userkey, $passkey, $item['idperum'], 30, $tipe);
					}elseif($item['tanggal'] == $tgl_jeda_14){
						sent_mes_to_managemnt($con, $userkey, $passkey, $item['idperum'], 14, $tipe);
					}elseif($item['tanggal'] == $tgl_jeda_7){
						sent_mes_to_managemnt($con, $userkey, $passkey, $item['idperum'], 7, $tipe);
					}elseif($item['tanggal'] == $tgl_jeda_3){
						sent_mes_to_managemnt($con, $userkey, $passkey, $item['idperum'], 3, $tipe);
					}					
				}
			}
	    }
	}
}

try {
    $con = new PDO("mysql:host=$host;dbname=$db", $user, $pass);    
	piutang($con, $userkey,$passkey);
	piutang_borongan($con, $userkey, $passkey, "kavling");
	piutang_borongan($con, $userkey, $passkey, "falum");
	piutang_borongan($con, $userkey, $passkey, "lain");

    $con = null;
} catch(PDOException $e) {
    die('Could not connect: ' . $e);
}




?>