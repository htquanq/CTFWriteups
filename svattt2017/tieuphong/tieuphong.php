<?php

$SECRET_ENCRYPT = 'ItsHardToBeliefs_ENCRYPT';

$SECRET_HMAC = 'ItsHardToBelief_HMAC';


$sSecretKey =$SECRET_ENCRYPT;

function fnDecrypt($sValue, $sSecretKey)
{
	        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256,MCRYPT_MODE_ECB);
		$value = base64_decode($sValue);
		return rtrim(
			     mcrypt_decrypt(
					MCRYPT_RIJNDAEL_256,
					$sSecretKey,
					substr($value, $iv_size),
					MCRYPT_MODE_ECB,
					substr($value, 0, $iv_size)
					), "\0" );
}
function fnEncrypt($value, $sSecretKey)
{
	        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256,MCRYPT_MODE_ECB);

		return base64_encode(
			     mcrypt_encrypt(
					MCRYPT_RIJNDAEL_256,
					$sSecretKey,
					substr($value, $iv_size),
					MCRYPT_MODE_ECB)
		);
}
$a = fnEncrypt("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaTieuPhong:abcd1234",$sSecretKey);
// $a = mwP2X7MQx10YfrzFqXvAwjGdNDuP9y3CqrVjRWXocUzsAbXYMuDmSimD5HPPgLkPR+VUjK92TAOwiol7WnxrSQ==
 echo $a;
echo "</br>";
$a = "mwP2X7MQx10YfrzFqXvAwjGdNDuP9y3CqrVjRWXocUzsAbXYMuDmSimD5HPPgLkPRVUjK92TAOwiol7WnxrSQ==";

echo $a;
echo "</br>";

$raw_auth = fnDecrypt($a,$sSecretKey);
echo $raw_auth;
echo "</br>";
$info = explode(":", $raw_auth);
$username = $info[0];
if($username === "TieuPhong"){
    echo "DONE</br>";
    }

?>
