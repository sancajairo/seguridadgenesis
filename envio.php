<?php

if (isset ($_POST)){
  foreach ($_POST as $inputName  => $value_){
     $$inputName = $value_;
  }
}else{
  foreach ($HTTP_POST_VARS as $inputName  => $value_){
   $$inputName = $value_;
  }
}
if (isset ($_GET)){
  foreach ($_GET as $inputName  => $value_){
   $$inputName = $value_;
  }
}else{
  foreach ($HTTP_GET_VARS as $inputName  => $value_){
   $$inputName = $value_;
  }
}



$destinatario = "claulsa@hotmail.com"; 
$copiacorreo = "claulsa@hotmail.com"; 
$asunto = "Correo desde Pagina"; 
$Thank = "contacto.html";
$cuerpo = ' 
<html> 
<head> 
   <title>Correo desde Pagina</title> 
</head> 
<body> 
<h1>'.$asunto.'</h1> 
<p> 
<strong>Nombre</strong>: '.$nombre.'<br />
<strong>Direccion</strong>: '.$direccion.'<br />
<strong>Telefono</strong>: '.$telefono.'<br />
<strong>Email</strong>: '.$email.'<br />
</p> 
</body> 
</html> 
'; 


//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Cable Enlace SAS <claulsa@hotmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: ".$email."\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: claulsa@hotmail.com\r\n"; 

//direcciones que recibián copia 
if($copiacorreo != ""){
	$headers .= "Cc: claulsa@hotmail.com\r\n"; 
}

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

if(mail($destinatario,$asunto,$cuerpo,$headers))
  header("Location: $Thank");
  echo("Datos enviados satisfactoriamente :)");


?>