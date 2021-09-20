<!DOCTYPE HTML>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="editor.js"></script>
		<script>
			$(document).ready(function() {
				$("#txtEditor").Editor();
				$('#btn-enviar').click(function(e){
				e.preventDefault();
				$('#txtEditor').text($('#txtEditor').Editor('getText'));
				$('#frm-noticia').submit();				
			});
			});
		</script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="editor.css" type="text/css" rel="stylesheet"/>
		<title>LineControl | v1.1.0</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<h2 class="demo-text">LineControl Demo</h2>
				<div class="container">
					<div class="row">
						<?php
						if(!empty($_POST['texto'])){
							echo $_POST['texto'];
						}


						?>
						<form action="demo.php" id="frm-noticia" method="POST">
						<div class="col-lg-12 nopadding">
							<textarea id="txtEditor" name="texto"></textarea> 
						</div>
						 <input type="button" id="btn-enviar" class="btn btn-success" value="Salvar"/>
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid footer">
			<p class="pull-right">&copy; Suyati Technologies <script>document.write(new Date().getFullYear())</script>. All rights reserved.</p>
		</div>
	</body>
</html>
