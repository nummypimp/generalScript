<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style type="text/css">
.inbox, .inbox2 {
	width: 250px;
	position: fixed;
	top: 0px;
	right: 0px;
	border: #000 solid 1px;
	word-wrap: break-word;
	margin-left:10px;
	height:100%;
	overflow:scroll;
}
#box,#box2 {
	
	word-wrap: break-word;
	
}

.inbox2 {
	
	
	left: 0px;
	
}
form { border: #000 solid 1px;
}
body{
	margin-left:auto;
	margin-right:auto;
	width:800px;
}

input {
	margin:5px;
}
</style>
</head>

<body>
<?
$input = array(
				array('text','text','this is text'),
				array('email','email','email@email.com'),
				array('number','number','12345'),
				array('text','text','this is text'),
				);

?>
<form action="" method="post">
<div><input name="title" type="text" value="this is tittle" /></div> <button>submit</button><hr>
<input name="email" type="email" value="email@email.com" /><hr>
<input type="number" name="quantity" min="1" max="5" value="2"><hr>
 <input type="number" name="points" min="0" max="100" step="10" value="30" ><hr>
 <input type="range" name="points" min="0" max="10" value="5"><hr>
 <input type="search" name="googlesearch" value="googlesearch"><hr>
 <input type="tel" name="usrtel" value="123456"><hr>
 <input type="time" name="usr_time"><hr>
<input type="url" name="homepage"><hr>
 <input type="week" name="week_year"><hr>


 <input type="radio" name="gender" value="male" > Male<br>
  <input type="radio" name="gender" value="female" checked> Female<br>
  <input type="radio" name="gender" value="other"> Other<hr>
  
<select name="cars">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
</select><hr>
<textarea name="message" rows="10" cols="30">
The cat was playing in the garden.
</textarea><hr>




<input list="browsers">
  <datalist id="browsers">
    <option value="Internet Explorer">
    <option value="Firefox">
    <option value="Chrome">
    <option value="Opera">
    <option value="Safari">
  </datalist> 
  <hr>

  Username: <input type="text" name="user"><hr>

  Encryption: <keygen name="security"><hr>

<button>submit</button><hr>




</form><hr>


<form method="post" action=""  oninput="x.value=parseInt(a.value)+parseInt(b.value)">
  0<br />

  <input type="range"  id="a" name="a" value="50"><br />

  100 +<br />

  <input type="number" id="b" name="b" value="50"><br />

  =
  <output name="x" for="a b"></output>
  <hr><br>
  <input type="submit">
</form><hr>


<form action="" method="post">
  User name:<br>
  <input type="text" name="username"><br>
  User password:<br>
  <input type="password" name="psw"><br />

   <input type="submit">
</form>
<hr>

<form action="" method="post">
  <input type="checkbox" name="vehicle1" value="Bike"> I have a bike<hr>
  <input type="checkbox" name="vehicle2" value="Car"> I have a car <hr>
<input type="color" name="favcolor"><hr>
 <input type="date" name="bday"><hr>
 <input type="datetime-local" name="bdaytime"><hr>

 <input type="submit"><hr>

</form>
<div class="inbox"><div id="box"></div></div>
<div class="inbox2"><div id="box2"></div></div>
<script type="text/javascript" src="../script/jquery.min.js"></script>

<script>

 var old = console.log;
    var logger = document.getElementById('box2');
	
	
var $ints,$input,im, doc;
$(document).ready(function(e) {
	var inp = [];
   $.each($('input,textarea,select,option'),function(k,v){
    $input = $(this);
	    //$ints =  $input.serialize();
	var att = $input[0].attributes;
	var t= [];
	 $.each(att,function(k,v){
		 t.push(['"'+ v.name+'"=>"'+v.value+'"']);
		  console.log(v);
	 })
	 
	
	  t.push(['"value"=>"'+$input.val()+'"']);
	 t.join(",");
t = 'array('+t+')';
		 console.log( att); 
		 $input.attr('data-id','inp'+k);
		 doc = '<br /><span id="inp'+k+'">'+t+'</span>';
	   im = $input.after(doc);
	  inp.push([t]);
	   
	
	  
	   });
	   
	   
	   
	   
	   	 inp.join(",");
inp = 'array('+inp+');';
	 console.log(inp); 
	 // $('#box').prepend(inp); 
});

 $('input,textarea,select,option').on('change',function(){
		  $input = $(this); 
		  $inputdata = $input.attr('data-id'); 
		  $thisspan = $('#'+$inputdata);
		  $thisspan.html('');
		  
		  var att = $input[0].attributes;
	var t= [];
	 $.each(att,function(k,v){
		 t.push(['"'+ v.name+'"=>"'+v.value+'"']);
		  console.log(v);
	 })
	   t.push(['"value"=>"'+$input.val()+'"']);
	 t.join(",");
t = 'array('+t+')';
		 console.log( att); 
		 doc = ''+t+'';
	   im = $thisspan.text(doc);
	  
		  
		  
		  })
		  
		  
 

$.each($('form'),function(k,v){
	
	console.log(v);
	
	var $form = $(this);
	
	
	
	$form.on('submit',function(e){
		$('#box2,#box').html('');
		 e.preventDefault();
		var $det =  $form.serialize();
		$det = $det.replace(/&/g, "& <br />");
		
		$('#box').prepend(decodeURI($det));
		//console.log($det);
		
		var $det2 =  $form.serializeArray();
		//$('#box2').prepend($det2);
		console.log($det2);
		
		 for (var i = 0; i < $det2.length ; i++) {
		if (typeof $det2 == 'object') {
			var abcd = '';
			abcd = (JSON && JSON.stringify ? JSON.stringify($det2[i], undefined, 2) : $det2[i]);
			abcd = abcd.replace(/{/m, " { <br />  &nbsp;  &nbsp; ").replace(/,/m, ", <br />  &nbsp;  &nbsp;").replace(/}/m, "<br />}<br /> ");
			//abcd = abcd.replace(/{/g, "{ <br />");
			//abcd = abcd.replace(/}/g, "} <br />");
			//abcd = abcd;
		
		}
		$('#box2').append(abcd);	
		 }
		
	
    console.log = function () {
		
      for (var i = 0; i < arguments.length; i++) {
        if (typeof arguments[i] == 'object') {
			//newEl += (JSON && JSON.stringify ? JSON.stringify(arguments[i], undefined, 2) : arguments[i]) + '<br />';
	/*		$('#box2').html((JSON && JSON.stringify ? JSON.stringify(arguments[i], undefined, 2) : arguments[i]));
			logger.innerHTML = (JSON && JSON.stringify ? JSON.stringify(arguments[i], undefined, 2) : arguments[i]);
			
			 abcd = abcd.replace(",", ",<br />");
			
			
		logger.innerHTML =	 abcd + '<br>'+logger.innerHTML.replace(",", ",<br />");*/
			 
           /* logger.innerHTML = (JSON && JSON.stringify ? JSON.stringify(arguments[i], undefined, 2) : arguments[i]) 
			+ '<br>'
			+logger.innerHTML;*/
			
			//$('#box2').html()
			
        } else {
			
			//logger.appendChild();
            logger.innerHTML = arguments[i] + '<br />'+logger.innerHTML;
			
        }
		 
      }
	  
	 
    }
	
	
		})
	
	
	
	})
</script>


<script>
/*(function () {
    var old = console.log;
    var logger = document.getElementById('log');
	
    console.log = function () {
		
      for (var i = 0; i < arguments.length; i++) {
        if (typeof arguments[i] == 'object') {
			//newEl += (JSON && JSON.stringify ? JSON.stringify(arguments[i], undefined, 2) : arguments[i]) + '<br />';
			
            logger.innerHTML = (JSON && JSON.stringify ? JSON.stringify(arguments[i], undefined, 2) : arguments[i]) + '<br />'+logger.innerHTML;
			
        } else {
			
			//logger.appendChild();
            logger.innerHTML = arguments[i] + '<br />'+logger.innerHTML;
			
        }
		 
      }
	  
	 
    }
	//
})();*/
</script>
</body>
</html>
