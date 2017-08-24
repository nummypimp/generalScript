<!doctype html>
<html>
<head>
<meta charset="utf-8">
<base href="http://www.hdwallpapers.in/">
<title>Untitled Document</title>

</head>

<body>

<?
$age = rand(15,30);
$sex = rand(0,1);
?>


<input name="get" type="button" value="get" onClick="cleardata();">
<input name="page" type="text" value="1" id="page"><input name="call" type="button" value="call" onClick="calldata();">

<div id="div1"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){

	var ab = [];
var g = $('#div1').load("http://localhost/plugin/_curl/curl1.php img", function(a,b,c) {
	
	//console.log(a+b+c);
	
	});

	
	
});

function calldata() {
	console.log('start');
	var p = $("#page").val();
	$( "#div1" ).load("curl1.php?page="+p+" tr.odd, tr.event", function(a,b,c) {
		if ( b == "error" ) {
			
		location.reload();
		
		}
	});
	
	
	setTimeout(function(){
		cleardata();
		
		},4000);
		
		$("#page").val(parseInt(p)+1);
	}

function cleardata() {
	
var p = $("#page").val();
$("#div1 tr").each(function(index, element) {
	console.log($(this).length);
	
	
	$(this).children('td:first-child').each(function(index, element) {
		
		 var a = $(this).text();
		 var b = Math.floor((Math.random() * 70) + 10);
		 var c = Math.floor((Math.random() * 2) + 1)-1;
		 
	senddata(a,b,c);
	
	//console.log(a);
		});
  
	
});	
console.log('complete');

//setTimeout(calldata(),3000);
setTimeout(function(){
		calldata();
		
		},4000);	
	
}
function senddata (n,g,x) {
	
	var a = {name:n,age:g,sex:x}; 
	console.log(a);
	
$.post( "jquery.post.receive.php", a)
  .done(function( data ) {
   
  });	
}

 

</script>
</body>
</html>