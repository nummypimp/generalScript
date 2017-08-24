<?php
session_start();
$_SESSION['username'] = "1232"; // Must be already set
$_SESSION['username2'] = "babydoe"; // Must be already set
echo 'this is '.$_SESSION['username'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd" >

<html>
<head>
<title>Sample Chat Application</title>
<style>
body {
	background-color: #eeeeee;
	padding:0;
	margin:0 auto;
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:11px;
}
.right { text-align:right;

}
</style>

<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->

</head>
<body>
<div id="main_container">

<a href="javascript:void(0)" onclick="javascript:chatWith('122232')">Chat With Jane Doe</a>
<a href="javascript:void(0)" onclick="javascript:chatWith('123')">Chat With John Doe</a>
<!-- YOUR BODY HERE -->

</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat2.js"></script>

</body>
</html>