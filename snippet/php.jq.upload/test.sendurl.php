<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?

function addToFiles($key, $url)
{
    $tempName = tempnam('/tmp', 'php_files');
    $originalName = basename(parse_url($url, PHP_URL_PATH));

    $imgRawData = file_get_contents($url);
    file_put_contents($tempName, $imgRawData);
    $_FILES[$key] = array(
        'name' => $originalName,
        'type' => mime_content_type($tempName),
        'tmp_name' => $tempName,
        'error' => 0,
        'size' => strlen($imgRawData),
    );
	return $_FILES;
}


$url[] = 'http://www.hdwallpapers.in/thumbs/2017/audi_tt_rs_coupe_2018_4k-t1.jpg';
$url[] = 'http://www.hdwallpapers.in/thumbs/2017/2017_bentley_continental_24_gt3_special_edition_4k-t1.jpg';
$url[] = 'http://www.hdwallpapers.in/thumbs/2017/vulture_spiderman_homecoming_4k-t1.jpg';
$url[] = 'http://www.hdwallpapers.in/thumbs/2017/enchantress_cara_delevingne_hd_5k-t1.jpg';
$url[] = 'http://www.hdwallpapers.in/thumbs/2017/destiny_2_game_4k-t1.jpg';

?>
<form id="fileupload" action="server/php/" method="POST" enctype="multipart/form-data">
   <?
foreach($url as $v) {
$vs = addToFiles('image', $v);	
echo '<input name="files[]" type="file" value="'.$vs['image']['tmp_name'].'">';	
}
?>
<button type="submit">submit</button>
</form>

<script src="../../../script/jquery.min.js"></script>
<script src="js/vendor/jquery.ui.widget.js"></script>
<script src="js/jquery.iframe-transport.js"></script>
<script src="js/jquery.fileupload.js"></script>
<script src="js/jquery.fileupload-process.js"></script>
<script src="js/jquery.fileupload-image.js"></script>
<script src="js/jquery.fileupload-audio.js"></script>
<script src="js/jquery.fileupload-video.js"></script>
<script src="js/jquery.fileupload-validate.js"></script>
<script src="js/jquery.fileupload-ui.js"></script>

<script>
$(document).ready(function(e) {
    var file = []; 

file[0] = 'http://www.hdwallpapers.in/thumbs/2017/audi_tt_rs_coupe_2018_4k-t1.jpg';
file[1] = 'http://www.hdwallpapers.in/thumbs/2017/2017_bentley_continental_24_gt3_special_edition_4k-t1.jpg';
file[2] = 'http://www.hdwallpapers.in/thumbs/2017/vulture_spiderman_homecoming_4k-t1.jpg';
file[3] = 'http://www.hdwallpapers.in/thumbs/2017/enchantress_cara_delevingne_hd_5k-t1.jpg';
file[4] = 'http://www.hdwallpapers.in/thumbs/2017/destiny_2_game_4k-t1.jpg';

var formData = $('form').serializeArray();
console.log(formData);

	
	$('#fileupload').bind('fileuploadsubmit', function (e, data) {
    // The example input, doesn't have to be part of the upload form:
    var input = $('#input');
    data.formData = {example: input.val()};
    if (!data.formData.example) {
      data.context.find('button').prop('disabled', false);
      input.focus();
      return false;
    }
});
	
 $.ajax({
            
            url: 'server/php',
            dataType: 'json',
			data: {files:file},
			method :'post'
			
            
        }).done(function (r) {
			
           console.log(r);
        });
		
});


</script>
</body>
</html>