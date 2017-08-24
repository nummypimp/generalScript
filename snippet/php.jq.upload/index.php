<!DOCTYPE HTML>

<html lang="en">
<head>

<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>jQuery File Upload Demo</title>
<meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>


</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-fixed-top .navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://github.com/blueimp/jQuery-File-Upload">jQuery File Upload</a>
        </div>
        
    </div>
</div>
<div class="container">

    
    <?php
	function dirToArray($dir) { 
   
   $result = array(); 
   $cdir = scandir($dir); 
   foreach ($cdir as $key => $value) 
   { 
   $ex = explode('.',$value);
      if (!in_array($value,array(".","..")) && count($ex)==1) 
      { 
         $result[] = $value; 
      } 
   } 
   
   return $result; 
} 
function issetvar($a,$b) {

$var = (isset($_REQUEST[$a]) && $_REQUEST[$a]!='') ? $_REQUEST[$a] : $b;	
return $var;
}
	$dir    = '../../images/';
	$files1 = scandir($dir);
	//preg_match('/(.)(..)(/^php/)/', $files1, $matches);
	
   $fd = issetvar('fdname','files');
	
	?>
    <select name="folderall">
    <option value="files" selected>select</option>
    <?
	$dir = dirToArray($dir);
	 foreach ($dir as $k => $v) {
		 echo '<option value="'.$v.'">'.$v.'</option>';
	 }
	?>
    </select>
     <input type="text" id="fdname" name="fdname" value="<?=$fd;?>"><button id="gonew" > go</button><br>

     <input name="url[]" type="text" value=""><br>
     <input name="url[]" type="text" value="http://www.hdwallpapers.in/thumbs/2017/enchantress_cara_delevingne_hd_5k-t1.jpg"><br>
     <input name="url[]" type="text" value=""><br>
     <button type="button" id="imageurl">Send pic</button>
    <br>
    <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
      <noscript>
      <input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/">
      </noscript>
<div class="row fileupload-buttonbar">
  <div class="col-lg-7"> <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
    <input type="file" name="files[]" multiple>
    </span>
    <button type="submit" class="btn btn-primary start"> <i class="glyphicon glyphicon-upload"></i> <span>Start upload</span> </button>
    <button type="reset" class="btn btn-warning cancel"> <i class="glyphicon glyphicon-ban-circle"></i> <span>Cancel upload</span> </button>
    <button type="button" class="btn btn-danger delete"> <i class="glyphicon glyphicon-trash"></i> <span>Delete</span> </button>
    <input type="checkbox" class="toggle">
    <span class="fileupload-process"></span> </div>
<div class="col-lg-5 fileupload-progress fade">
  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
  </div>
<div class="progress-extended">&nbsp;</div>
          </div>
      </div>
<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Demo Notes</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>The maximum file size for uploads in this demo is <strong>999 KB</strong> (default file size is unlimited).</li>
                <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).</li>
                <li>Uploaded files will be deleted automatically after <strong>5 minutes or less</strong> (demo files are stored in memory).</li>
                <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage (see <a href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">Browser support</a>).</li>
                <li>Please refer to the <a href="https://github.com/blueimp/jQuery-File-Upload">project website</a> and <a href="https://github.com/blueimp/jQuery-File-Upload/wiki">documentation</a> for more information.</li>
                <li>Built with the <a href="http://getbootstrap.com/">Bootstrap</a> CSS framework and Icons from <a href="http://glyphicons.com/">Glyphicons</a>.</li>
            </ul>
        </div>
    </div>
</div>
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
  <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>

<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}&foldername=<?=$fd;?>"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<script src="../../../script/jquery.min.js"></script>
<script src="js/vendor/jquery.ui.widget.js"></script>
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="js/jquery.iframe-transport.js"></script>
<script src="js/jquery.fileupload.js"></script>
<script src="js/jquery.fileupload-process.js"></script>
<script src="js/jquery.fileupload-image.js"></script>
<script src="js/jquery.fileupload-audio.js"></script>
<script src="js/jquery.fileupload-video.js"></script>
<script src="js/jquery.fileupload-validate.js"></script>
<script src="js/jquery.fileupload-ui.js"></script>
<script src="js/main.script.js"></script>


<script>
$('#imageurl').click(function(e) {
    var b = [];
	var d = $('#fdname').val();
	var a = $('input[name^="url"]').each(function(index, element) {
        b[0] = $(this).val();
		c = {url:b,path:d};
		console.log(c);
		if (b!='') {
	$.post( "../_urlupload/index.php", c)
  .done(function( data ) {
   setTimeout(function(){
	
	
	location.reload();
	},3000);
	
  });
		}
		
    });
	
	
});
</script>



</body>
</html>
