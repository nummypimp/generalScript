<?php
/*
 * jQuery File Upload Plugin PHP Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
$fd = (isset($_REQUEST['foldername']) && $_REQUEST['foldername']!='') ? $_REQUEST['foldername'] : 'files';
$options = array('upload_dir'=> $fd.'/', 'upload_url'=> dirname($_SERVER['PHP_SELF']).'/'.$fd.'/');
$upload_handler = new UploadHandler($options);
