<?
include_once('class.image.resize.php');
function getimg($url,$name,$path) {         
    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';              
    $headers[] = 'Connection: Keep-Alive';         
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
    $user_agent = 'php';
	$imagename= basename($url);
	
	$name =   $name;   
	
	if (!file_exists($path)) {
    @mkdir($path, 0755, true);
	
}   
 if (!file_exists($path.'thumbnail/')) {
    @mkdir($path.'thumbnail/', 0755, true);
	
}   
	$fp1 = @fopen($path.$name, 'wb');
	
    $process = @curl_init($url);         
	@curl_setopt($process, CURLOPT_FILE, $fp1);
	
    @curl_setopt($process, CURLOPT_HTTPHEADER, $headers);         
    @curl_setopt($process, CURLOPT_HEADER, 0);         
    @curl_setopt($process, CURLOPT_USERAGENT, $user_agent); //check here         
    @curl_setopt($process, CURLOPT_TIMEOUT, 30);         
    @curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);         
    @curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);         
    $return = curl_exec($process);         
    @curl_close($process);    
	@fwrite($fp1, $return);
	
	@fclose($fp1);
	
    return $return;     
} 
print_r($_POST);
$imgurl = 'http://www.foodtest.ru/images/big_img/sausage_3.jpg'; 
$imgurl = 'http://www.hdwallpapers.in/thumbs/2017/audi_r8_v10_2018_4k-t1.jpg';

if (isset($_POST['url']) && $_POST['url']!='' && $_POST['path']!='') {
	foreach ($_POST['url'] as $v) {
	$imagename= basename($v);
	$ext = explode('.',$imagename);	
	$name = str_replace('.', '-', microtime(true)).'.'.$ext[1]; 	
	$imgurl = urldecode($v);	
	$imagename= basename($imgurl);
	$path = urldecode($_POST['path']).'/';
	$path2 = $path.'thumbnail/';
	
	$image = getimg($imgurl,$name,$path); 
	$img = $path.$name;
	
	$image = new ImageResize($img);
	$image->resizeToBestFit(80, 80);
	$image->save($path2.$name);
	}




	
}
//header("Location: post.php");

?>