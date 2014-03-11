<?php
/******************************************************************************
* @name: hashID.php
* @author: c0re <https://psypanda.org/>							
* @date: 2013/03/08
* @copyright: <https://www.gnu.org/licenses/gpl-3.0.html>
******************************************************************************/
$version = "v2.3.8";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>hashIdentifier</title>
</head>
<body>

<h1>hashIdentifier</h1>
<h4>[analyze your hash]</h4>

<!-- begin form -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<input type="text" name="hash" size="100" />
	<input type="submit" name="submit" value="submit" />
</form>
<!-- end form -->

<?php

function IdentifyHash($str)
{
	//set the hash array
	$hashes = array
	(
		'/^[a-f0-9]{4}$/i' => 'CRC-16,CRC-16-CCITT,FCS-16',
		'/^[a-f0-9]{8}$/i' => 'Adler-32,CRC-32,CRC-32B,FCS-32,GHash-32-3,GHash-32-5,FNV-132,Fletcher-32,Joaat,ELF-32,XOR-32',
		'/^\+[a-z0-9\/\.]{12}$/i' => 'Blowfish(Eggdrop)',
		'/^[a-z0-9\/\.]{13}$/i' => 'DES(Unix),Traditional DES,DEScrypt',
		'/^[a-f0-9]{16}$/i' => 'MySQL323,DES(Oracle),VNC,Half MD5,FNV-164,CRC-64',
		'/^[a-z0-9\/\.]{16}$/i' => 'Cisco-PIX(MD5)',
		'/^\\([a-z0-9\+\/]{20}\)$/i' => 'Lotus Domino',
		'/^_[a-z0-9\/\.]{19}$/i' => 'BSDi Crypt',
		'/^[a-f0-9]{24}$/i' => 'CRC-96(ZIP)',
		'/^[a-z0-9\/\.]{24}$/i' => 'Crypt16',
		'/^[0-9a-f]{32}$/i' => 'MD5,MD4,MD2,NTLM,LM,RAdmin v2.x,RIPEMD-128,Haval-128,Tiger-128,Snefru-128,MD5(ZipMonster),DCC,DCC v2,Skein-256(128),Skein-512(128)',
		'/^{SHA}[a-z0-9\/\+]{27}=$/i' => 'SHA-1(Base64),Netscape LDAP SHA,nsldap',
		'/^\$1\$[a-z0-9\/\.]{0,8}\$[a-z0-9\/\.]{22}$/i' => 'MD5(Unix),Cisco-IOS(MD5),FreeBSD MD5,md5crypt',
		'/^0x[a-f0-9]{32}$/i' => 'Lineage II C4',
		'/^\$H\$[a-z0-9\/\.]{31}$/i' => 'MD5(phpBB3),PHPass\' Portable Hash',
		'/^\$P\$[a-z0-9\/\.]{31}$/i' => 'MD5(Wordpress),PHPass\' Portable Hash',
		'/^[a-f0-9]{32}\:[a-z0-9]{2}$/i' => 'osCommerce,xt:Commerce',
		'/^\$apr1\$[a-z0-9\/\.]{0,8}\$[a-z0-9\/\.]{22}$/i' => 'MD5(APR),Apache MD5',
		'/^{smd5}[a-z0-9\.\$]{31}$/i' => 'AIX(smd5)',
		'/^[a-f0-9]{32}:[a-f0-9]{32}$/i' => 'WebEdition CMS',
		'/^[a-f0-9]{32}\:.{5}$/i' => 'IP.Board v2+,MyBB v1.2+',
		'/^[a-z0-9]{34}$/i' => 'CryptoCurrency(Adress)',
		'/^[a-f0-9]{40}$/i' => 'SHA-1,SHA-1(MaNGOS),SHA-1(MaNGOS2),SHA-1(LinkedIn),RIPEMD-160,Haval-160,Tiger-160,HAS-160,Skein-256(160),Skein-512(160)',
		'/^\*[a-f0-9]{40}$/i' => 'MySQL5.x,MySQL4.1',
		'/^[a-z0-9]{43}$/i' => 'Cisco-IOS(SHA256)',
		'/^{SSHA}([a-z0-9\+\/]{40}|[a-z0-9\+\/]{38}==)$/i' => 'SSHA-1(Base64),Netscape LDAP SSHA,nsldaps',
		'/^[a-z0-9]{47}$/i' => 'Fortigate(FortiOS)',
		'/^[a-f0-9]{48}$/i' => 'Haval-192,Tiger-192,SHA-1(Oracle),OSX v10.4,OSX v10.5,OSX v10.6',
		'/^[a-f0-9]{51}$/i' => 'Palshop CMS',
		'/^[a-z0-9]{51}$/i' => 'CryptoCurrency(PrivateKey)',
		'/^{ssha1}[a-z0-9\.\$]{47}$/i' => 'AIX(ssha1)',
		'/^0x0100[a-f0-9]{48}$/i' => 'MSSQL(2005),MSSQL(2008)',
		'/^(\$md5,rounds=[0-9]+\$|\$md5\$rounds=[0-9]+\$|\$md5\$)[a-z0-9\/\.]{0,16}(\$|\$\$)[a-z0-9\/\.]{22}$/i' => 'MD5(Sun)',
		'/^[a-f0-9]{56}$/i' => 'SHA-224,Haval-224,Keccak-224,Skein-256(224),Skein-512(224)',
		'/^(\$2a|\$2y|\$2)\$[0-9]{0,2}?\$[a-z0-9\/\.]{53}$/i' => 'Blowfish(OpenBSD)',
		'/^[a-f0-9]{40}\:[a-f0-9]{16}$/i' => 'Samsung Android Password/PIN',
		'/^[a-f0-9]{32}\:[0-9]{32}\:[0-9]{2}$/i' => 'MD5(Chap),iSCSI CHAP Authentication',
		'/^S\:[a-f0-9]{60}$/i' => 'Oracle 11g',
		'/^\$bcrypt-sha256\$.{5}\$[a-z0-9\/\.]{22}\$[a-z0-9\/\.]{31}$/i' => 'BCrypt(SHA256)',
		'/^[a-f0-9]{32}:[0-9]{3}$/i' => 'vBulletin <v3.8.5',
		'/^[a-f0-9]{32}\:[a-z0-9]{30}$/i' => 'vBulletin >=v3.8.5',
		'/^[a-f0-9]{64}$/i' => 'SHA-256,RIPEMD-256,Haval-256,Snefru-256,GOST R 34.11-94,Keccak-256,Skein-256,Skein-512(256),Ventrilo',
		'/^[a-f0-9]{32}\:[a-z0-9]{32}$/i' => 'Joomla',
		'/^[a-f-0-9]{32}\:[a-f-0-9]{32}$/i' => 'SAM(LM_Hash:NT_Hash)',
		'/^\$episerver\$\*0\*[a-z0-9=\*+]{52}$/i' => 'EPiServer 6.x <v4',
		'/^{ssha256}[a-z0-9\.\$]{63}$/i' => 'AIX(ssha256)',
		'/^[a-f0-9]{80}$/i' => 'RIPEMD-320',
		'/^\$episerver\$\*1\*[a-z0-9=\*+]{68}$/i' => 'EPiServer 6.x >v4',
		'/^0x0100[a-f0-9]{88}$/i' => 'MSSQL(2000)',
		'/^[a-f0-9]{96}$/i' => 'SHA-384,Keccak-384,Skein-512(384),Skein-1024(384)',
		'/^{SSHA512}[a-z0-9\+\/]{96}={0,2}$/i' => 'SSHA-512(Base64),LDAP(SSHA512)',
		'/^{ssha512}[a-z0-9\.\$]{107}$/i' => 'AIX(ssha512)',
		'/^[a-f0-9]{128}$/i' => 'SHA-512,Whirlpool,Salsa10,Salsa20,Keccak-512,Skein-512,Skein-1024(512)',
		'/^[a-f0-9]{136}$/i' => 'OSX v10.7',
		'/^0x0200[a-f0-9]{136}$/i' => 'MSSQL(2012)',
		'/^\$ml\$.+$/i' => 'OSX v10.8,OSX v10.9',
		'/^[a-f0-9]{256}$/i' => 'Skein-1024',
		'/^grub\.pbkdf2\.sha512\..+$/i' => 'GRUB 2',
		'/^sha1\$[a-z0-9\/\.]{1,12}\$[a-f0-9]{40}$/i' => 'SHA-1(Django)',
		'/^[a-f0-9]{49}$/i' => 'Citrix Netscaler',
		'/^\$S\$[a-z0-9\/\.]{52}$/i' => 'Drupal7',
		'/^\$5\$(rounds=[0-9]+\$)?[a-z0-9\/\.]{0,16}\$[a-z0-9\/\.]{43}$/i' => 'SHA-256(Unix),sha256crypt',
		'/^0x[a-f0-9]{4}[a-f0-9]{16}[a-f0-9]{64}$/i' => 'Sybase ASE',
		'/^\$6\$.{0,22}\$[a-z0-9\/\.]{86}$/i' => 'SHA-512(Unix)',
		'/^\$sha\$[a-z0-9]{1,16}\$[a-f0-9]{64}$/i' => 'Minecraft(AuthMe Reloaded)',
		'/^sha256\$[a-z0-9\/\.]{1,12}\$[a-f0-9]{64}$/i' => 'SHA-256(Django)',
		'/^sha384\$[a-z0-9\/\.]{1,12}\$[a-f0-9]{96}$/i' => 'SHA-384(Django)',
		'/^crypt1:[a-z0-9\+\=]{12}:[a-z0-9\+\=]{12}$/i' => 'Clavister Secure Gateway',
		'/^[a-f0-9]{112}$/i' => 'Cisco VPN Client (PCF-File)',
		'/^[a-f0-9]{1329}$/i' => 'Microsoft MSTSC (RDP-File)',
		#'/^[^\\\/\:\*\?\"\<\>\|]{1,15}\:\:[^\\\/\:\*\?\"\<\>\|]{1,15}\:[a-f0-9]{48}\:[a-f0-9]{48}\:[a-f0-9]{16}$/i' => 'NetNTLMv1-VANILLA / NetNTLMv1+ESS',
		#'/^[^\\\/\:\*\?\"\<\>\|]{1,15}\:\:[^\\\/\:\*\?\"\<\>\|]{1,15}\:[a-f0-9]{16}\:[a-f0-9]{32}\:[a-f0-9]+$/i' => 'NetNTLMv2',
		'/^\$krb5pa\$.+$/i' => 'Kerberos 5 AS-REQ Pre-Auth',
		'/^\$scram\$[0-9]+\$[a-z0-9\/\.]{16}\$sha-1=[a-z0-9\/\.]{27},sha-256=[a-z0-9\/\.]{43},sha-512=[a-z0-9\/\.]{86}$/i' => 'SCRAM Hash',
		'/^[a-f0-9]{40}:[a-f0-9]{0,32}$/i' => 'Redmine Project Management Web App',
		'/^[0-9]{12}\$[a-f0-9]{40}$/i' => 'SAP CODVN F/G (PASSCODE)',
		'/^[0-9]{12}\$[a-f0-9]{16}$/i' => 'SAP CODVN B (BCODE)',
		'/^[a-z0-9\/\.]{30}(:.+)?$/i' => 'Juniper Netscreen/SSG (ScreenOS)',
		'/^0x[a-f0-9]{60}\s0x[a-f0-9]{40}$/i' => 'EPi',
		'/^[a-f0-9]{40}:[^*]{1,25}$/i' => 'SMF >= v1.1'
	);
	
	//initialize the array
	$possibleHashes = array();
	$nextHash = array();
	
	//loop and find matches
	foreach($hashes as $key => $value) {
		if(preg_match($key, $str)) {
		//explode the hashlist
			$nextHash = explode(",", $value);
			foreach($nextHash as $newVal) {
				//append to array
				array_push($possibleHashes, $newVal);
			}
		}
	}
     
	//no hash found
	if(empty($possibleHashes)) {
		return $possibleHashes = array('Unknown Hash');
	}
	//return the array
	else {
		return $possibleHashes;
	}
}
     
//check if the form got submitted
if(isset($_POST['submit']))
{
	//save it in a variable
	$hash = $_POST['hash'];
     
	//trim possible whitespaces
	$hash = trim($hash);
           
	//check if empty form submitted
	if(empty($hash) && !is_numeric($hash)) {
		die('<script type="text/javascript">alert("no input detected!")</script>');
	}
           
	//save the array
	$hashes = IdentifyHash($hash);
	//print the result
	echo "<br />".implode("<br />",$hashes)."<br /><br />";
}

?>

</body>
</html>