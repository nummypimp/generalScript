<?
@session_start();
 require_once('../../class/pdodb.php');
if (isset($_GET['be']) && $_GET['be']!='') {
session_unset();
$_SESSION['username'] = $_GET['be']; 
$_SESSION['username2'] = $_GET['name']; 	
	
}
if (isset($_GET['logout']) && $_GET['logout']!='') {
session_unset();
session_destroy();	
header("location: ".$_SERVER['PHP_SELF']."");
}
if($_SERVER['HTTP_HOST']=='localhost') {
$host = array("localhost","root","","test");
} else {
$host = array("localhost","numwkcom_web","pppppp","numwkcom_web");	
}

$db = new pdodb;
$pdo = $db->connect_pdo($host[0], $host[1], $host[2], $host[3]);

?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style>
body {
	background-color: #eeeeee;
	padding:0;
	margin:0 auto;
	padding-top:20px;
	
}
.right {
	text-align:right;	
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

<?
if (isset($_POST['username']) && $_POST['username']!='') {
	@session_unset();
	print_r($_POST);
	print_r($_SESSION);	
$sql = "CALL select_or_insert2('".$_POST["username"]."')";	
$insert = "INSERT INTO users (name) values ('".$_POST["username"]."')";
//$ii= $db->query($sql);
$db->pdo_query($sql);
print_r($ii);
// $result = $ii->setFetchMode(PDO::FETCH_ASSOC); 
 $result = $ii->fetchAll();
print_r($result);
$_SESSION['username'] = $result[0]['id']; 
$_SESSION['username2'] = $_POST['username']; // Must be already set

print_r($_SESSION['username'].$_SESSION['username2']);
}
?>
<div style="width:40%; margin-left:auto; margin-right:auto;" >
<form action="" method="post">
<div>Login First</div>
<input name="username" type="text">
<input name="" type="submit">
</form>
</div>
<? 
$user = array(1=>'abc', 2=>'	def',
3=>'something',
4=>'nummy',
5=>'nummy2',
6=>'hen',
7=>'commy',
8=>'kkk',
9=>'kkk2',
10=>'gon',
11=>'tom',
12=>'joe',
13=>'bird',
14=>'bobby');
if (isset($_SESSION['username']) && $_SESSION['username']!='') {
	
	echo 'YOUR NAME IS  '. $_SESSION['username2'].' id ='.$_SESSION['username'].'<br>';
foreach ($user as $k => $v) {
echo '<button type="button" onclick="clickandrun(\''.$k.'\',\''.$v.'\')">Chat With '.$v.'</button><br>';
}
echo '<a href="?logout=1" >LogOUT</a><br>';
} else {
foreach ($user as $k => $v) {	
echo '<a href="?be='.$k.'&name='.$v.'" >Login '.$v.'</a><br>';

}
}
?>


<!-- YOUR BODY HERE -->

</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat3.js"></script>
<script>

function clickandrun(a,b){
	var c = [a,b];
	
	chatWith(c);
	
}
</script>

</body>
</html>