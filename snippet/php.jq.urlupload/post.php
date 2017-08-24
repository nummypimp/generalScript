<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?
$url[] = 'http://www.hdwallpapers.in/thumbs/2017/audi_tt_rs_coupe_2018_4k-t1.jpg';
$url[] = 'http://www.hdwallpapers.in/thumbs/2017/2017_bentley_continental_24_gt3_special_edition_4k-t1.jpg';
$url[] = 'http://www.hdwallpapers.in/thumbs/2017/vulture_spiderman_homecoming_4k-t1.jpg';
$url[] = 'http://www.hdwallpapers.in/thumbs/2017/enchantress_cara_delevingne_hd_5k-t1.jpg';
$url[] = 'http://www.hdwallpapers.in/thumbs/2017/destiny_2_game_4k-t1.jpg';

?>
<form action="index.php" method="post">
<?
foreach($url as $v) {
echo '<input name="url[]" type="text" value="'.$v.'">';	
}
?>

<input name="path" type="text" value="tmp">
<button type="submit">submit</button>
</form>


</body>
</html>