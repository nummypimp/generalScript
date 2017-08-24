<?
if (isset($_POST['file']) && $_POST['file']!='') {
	print_r($_POST);
	$imagename= basename($_POST['file']);
	$path = urldecode($_POST['path']).'/';
	$path2 = $path.'thumbnail/';
	@unlink($path.$imagename);
	@unlink($path2.$imagename);
}
?>