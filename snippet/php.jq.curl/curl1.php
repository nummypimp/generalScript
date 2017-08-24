<?php
/*
 *
 *
 *

Supply the parameters and get some content form the other website


 ****************************/
$page = (isset($_GET['page'])) ? $_GET['page'] : 2;
$url = 'http://www.hdwallpapers.in/latest_wallpapers/page/$page';
//unique text to determine start goes here
?>
<head>
<base href="http://www.hdwallpapers.in/">

</head><?


$start = '<div id="clb-shell">';

//insert end text here

$end = "<h1>Welcome!</h1>";

//give credit to the originator

//echo "Courtesy of <a href = \"$url\">$url.</a><br /><br />";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_HEADER, 0);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch) or die("Couldn't connect to $url.");

curl_close($ch);

echo $result;


?>