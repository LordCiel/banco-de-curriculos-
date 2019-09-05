<?php session_start();
include_once('controller/conexao.php');
#include('verifica_login.php');
include_once('includes/header.php');
include_once('includes/nav.php');?>
<title>Painel de Usuário</title>
<div class="nav-wrapper container">
<div class="section"></div>
<a class="waves-effect waves-light btn right" href="controller/logout.php">Sair do sistema</a>
<a class="waves-effect waves-light btn left" href="#">Baixar Currículo</a>
<div class="section"><br></div>
</div>
<?php  include_once'includes/footer.php' ?>