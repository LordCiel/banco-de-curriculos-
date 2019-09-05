<?php session_start();
include_once'includes/header.php';
include_once'includes/nav.php';
?>
<title>ACIJ LOGIN</title>

<main>
  <center>
    <img class="responsive-img" style="width: 250px;" src="img/LOGO ACIJ.png" />
    <div class="section"></div>

    <?php 
                    if(isset($_SESSION['msg'])):
                        echo $_SESSION['msg'];
                        session_unset();
                    endif;                
                ?>
    <div class="container">
      <div class="z-depth-1 grey lighten-4 row"
        style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
        <!-- FORM DE LOGIN ADM -->
        <form class="col s12" action="controller/login.php" method="POST">
          <div class='row'>
            <div class='col s12'>
            </div>
          </div>
          <div class='row'>
            <div class='input-field col s12'>
              <input class='validate' type='text' name='usuario' id='usuario' />
              <label for='usuario'>Entre com seu email</label>
            </div>
          </div>
          <div class='row'>
            <div class='input-field col s12'>
              <input class='validate' type='password' name='senha' id='senha' />
              <label for='senha'>Entre com sua senha</label>
            </div>
            <label style='float: right;'>
              <a class='grey-text text-lighten-3' href='#!'><b>Esqueceu a senha?</b></a>
            </label>
          </div>
          <br />
          <center>
            <div class='row'>
              <button type='submit' class='col s12 btn btn-large waves-effect indigo'>Login</button>
            </div>
          </center>
        </form>
      </div>
    </div>
  </center>
</main>
<?php  include_once'includes/footer.php' ?>