<?php session_start();
include_once('controller/conexao.php');
include('controller/verifica_login.php');
include_once('includes/header.php');
include_once('includes/nav.php');?>
<title>Painel de ADMINISTRADOR</title>
<div class="nav-wrapper container">
<div class="section"></div>
<a class="waves-effect waves-light btn right" href="controller/logout.php">Sair do sistema</a>
<div class="row container">
<div class="col s12">
<h4 class="light">Consultas -> Usuarios cadastrados</h4>
<hr>
<table class="striped">
    <thead>
    <th>Nome</th>
    <th>Email</th>
    <th>Expêriencia</th>
    <th>Endereço</th>
    <th>Cidade</th>
    <th>Sexo</th>
    <th>Data Nasc.</th>
    <th>Formação</th>
    <th>Telefone</th>
    </thead>
    <tbody>
    <?php
    include_once'controller/readuser.php';
    ?>
    </tbody>
</table>
</div>
</div>
<br>
<!-- EMPRESAS -->
<div class="row container">
<div class="col s12">
<h4 class="light">Consultas -> Empresas cadastrados</h4>
<hr>
<table class="striped">
    <thead>
    <th>Razão</th>
    <th>Email</th>
    <th>Endereço</th>
    <th>Cidade</th>
    <th>Telefone</th>
    </thead>
    <tbody>
    <?php
    include_once'controller/readempre.php';
    ?>
    </tbody>
</table>
</div>
</div> 
<!-- VAGAS -->
<div class="row container">
<div class="col s12">
<h4 class="light">Consultas ->Vagas cadastrados</h4>
<hr>
<table class="striped">
    <thead>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Experiência</th>
    <th>Escolaridade</th>
    <th>Salário</th>
    <th>Periódo</th>
    <th>Tipo de contrato</th>
    </thead>
    <tbody>
    <?php
    include_once'controller/readvagas.php';
    ?>
    </tbody>
</table>
</div>
</div>
</div>



</div>
<?php  include_once'includes/footer.php' ?>