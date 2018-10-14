<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
  <style>
      #fondo{
         background-image: url("../images/office.jpg");
         /*https://obs-educom.cdnstatics.com/sites/default/files/wp-content/uploads/sites/3/2015/08/Gesti%C3%B3n-del-Portafolio-de-proyectos.jpg*/
         background-repeat: no-repeat;
         /* La imagen se fija en la ventana de visualización para que la altura de
          la imagen no supere a la del contenido */
         background-attachment: fixed;
         /* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */
         background-size: cover;
         background-position: center center;
        }
</style>

<body class="hold-transition login-page" id="fondo">
<div class="login-box">
  
  	<div class="login-box-body">

    <div class="login-logo">
      <b>Login</b>
    </div>


    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Input Username" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Input Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i>        Acceder</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>