<?php session_start();
include_once('controller/conexao.php');
include('controller/verifica_login.php');
include_once('includes/header.php');
include_once('includes/nav.php');?>
<title>Painel de ADMINISTRADOR</title>
<div class="nav-wrapper container">
<div class="section"></div>
<a class="waves-effect waves-light btn right" href="controller/logout.php">Sair do sistema</a>
<a class="waves-effect waves-light btn left" href="cadastrarvaga.php">Cadastrar Vaga</a>
<div class="section"><br></div>

<div class="row container">
<div class="col s12">
<h4 class="light">Vagas cadastrados <?php echo $_SESSION['usuario']?></h4>
<hr>

<?php 
$querySelect= $link->query("select * from tb_vaga");
while($registros = $querySelect->fetch_assoc()):
$idvaga =$registros['id_vaga'];
$idempresa =$registros['id_empresa'];
$idd = (int) $idempresa;
$user = $_SESSION['usuario'];

$idv = $registros['id_vaga'];
$nomev = $registros['nomeVaga'];
$descv = $registros['descricao'];
$xpv = $registros['experiencia'];
$salariov = $registros['salario'];
$escolaridadev= $registros['escolaridade'];
$periodo= $registros['periodo'];
$tipoc= $registros['tipoContrato'];

endwhile;
echo $user;
$idcerto = $link -> query("select * from tb_empresa where email = '$user'");
$row= mysqli_fetch_array($idcerto);
$result=$row['id_empresa'];
$innerjoin = $link -> query("select * from tb_vaga v inner join tb_empresa e on v.id_empresa = e.id_empresa where e.id_empresa = '$result'");
$row= mysqli_fetch_array($innerjoin);
    $result=$row['id_vaga'];
    $vagaok = $result;


echo "<table class='striped'>";
echo"<thead>";
echo"<tr>";
echo"<th>Nome</th>";
    echo"<th>Descrição</th>";
    echo"<th>Experiência</th>";
    echo"<th>Escolaridade</th>";
    echo" <th>Salário</th>";
    echo "<th>Periódo</th>";
    echo"<th>Tipo de contrato</th>";
    echo"</thead>";
    echo"<tbody>";
    echo" </tbody>";
    
echo"<td>$nomev</td><td>$descv</td><td>$xpv</td><td>$escolaridadev</td><td>R$ $salariov</td><td>$periodo</td><td>$tipoc</td>
<td><a href='editarvaga.php?id=$idv'><i class='material-icons'>edit</i></td>
<td><a href='controller/deletevaga.php?id=$idv'><i class='material-icons'>delete</i></td>";
echo"</tr>";
echo"</table>";
?>



    
</div>
</div>
<div class="section"><br></div>
</div>
<?php  include_once'includes/footer.php' ?>