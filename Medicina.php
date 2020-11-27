<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>JesterBee CO</title>
<link rel="stylesheet" href="js/bootstrap.min.js">
</head>
<body style="background-color: gray;">
<?php
	$Link=mysqli_connect("localhost","root","","bd_veterdeseo");
	//$Link=mysqli_connect("Localhost","jesterbee","k2KYjHjaTR1O83xP","test");
	
	$pass=$_POST["pas"];
	

	$primera=md5($pass);
	$segunda=sha1($primera);

	$name=$_POST["name"];
	$ap=$_POST["ap"];
	$cel=$_POST["cel"];
	$mail=$_POST["mail"];
	$nick=$_POST["nick"];
	$tip=$_POST["tip"];
	$acs=$_POST["acs"];
	
	$time=date('Y-m-d');
    

    $row=mysqli_query($Link,"Select * From tb_usuario");
    $cont=mysqli_num_rows($row);
    $auto=$cont+1;
	if($pass=="" || $name=="" || $ap=="" || $cel=="" || $mail=="" || $nick=="" || $tip=="" || $acs==""){
		echo("no se admite valores vacios");
	}else{
		$consulta=mysqli_query($Link,"Insert Into tb_usuario Values ('$auto', '$name','$ap','$mail','$cel','$nick','$segunda','$tip', '$time','$acs')");
		echo('<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header bg-success">
					<h5 class="modal-title" id="exampleModalLabel">Information</h5>					
				  </div>
				  <div class="modal-body">
					Himself I believe the user correctly!.
				  </div>
				  <div class="modal-footer">
				    <a href="../adm/CreateCount.php" class="btn btn-success">Ok</a>		  
				  </div>
				</div>
			  </div>
			</div>
		');
	}
mysqli_close($Link);	
?>
	<script src="../../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
			<script>
				$(document).ready(function(){
					$('#exampleModal').modal('show');
				});
			</script>
</body>
</html>