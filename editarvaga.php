<?php session_start();
include_once('controller/conexao.php');
include_once('includes/header.php');
include_once('includes/nav.php');?>
<title>Edição de Vaga</title>
<div class="row container">
    <div class="col s12">
        <h5 class="light">Edição de Vaga</h5><hr>
    </div>
</div>
<?php
include_once 'controller/conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = $link -> query("select * from tb_vaga where id_vaga = '$id'");

while($registros = $query -> fetch_assoc()):
    $idv = $registros['id_vaga'];
    $nomev = $registros['nomeVaga'];
    $descv = $registros['descricao'];
    $xpv = $registros['experiencia'];
    $salariov = $registros['salario'];
    $escolaridadev= $registros['escolaridade'];
    $periodo= $registros['periodo'];
    $tipoc= $registros['tipoContrato'];
endwhile;
?>

<!-- Formulário de Cadastro -->
<div class="row container">
    <p>&nbsp;</P>
    <form method="post" action="controller/updatevaga.php" class="col s12" enctype="multipart/form-data">
        <fieldset class="formulario">
              <h5 class="light center">Edição de Vagas</h5>
<!-- ######################################################################################################### -->
<select class="browser-default" name="empresa" id="empresaXX">                       
<?php $teste =$_SESSION['usuario'];
$empresa = "select * from tb_empresa where email = '{$teste}'";
$resultadoempresa=mysqli_query($link, $empresa);
while($row_cidade = mysqli_fetch_assoc($resultadoempresa)){?>
<option value="<?php echo $row_cidade['id_empresa']?>"><?php echo utf8_encode ($row_cidade['razao']);?>
<?php }?></select>
<!-- ######################################################################################################### -->
            <!-- Campo nome -->
            <div class="input-field col s12">
                <i class="material-icons prefix">work</i>
                <input type="text" name="nomev" id="nome" maxlength="60" value="<?php echo $nomev; ?>" required autofocus>
                <label for="nome">Nome da vaga</label>
            </div>
              <!-- Campo descrição -->
              <div class="input-field col s12">
                <i class="material-icons prefix">assignment_ind</i>
                <input type="text" name="descv" id="nome" maxlength="60" value="<?php echo $descv; ?>" required autofocus>
                <label for="nome">Descriçao da vaga</label>
            </div>
             <!-- Campo Experiência -->
             <div class="input-field col s12">
                <select class="browser-default" name="xp" required>
                    <option value="" disabled selected>Experiência</option>
                    <option id="xpsim" value="SIM">Sim</option>
                    <option id="NÃO" value="Ensino Superior">Não</option>
                </select>
            </div>
            <!-- Campo salário -->
            <div class="input-field col s12">
                <i class="material-icons prefix">attach_money</i>
                <input type="text" name="salariov" id="nome" maxlength="60" required autofocus>
                <label for="nome">Salário</label>
            </div>
             <!-- Campo escolaridade -->
             <div class="input-field col s12">
                <select class="browser-default" name="escolaridadev" required>
                    <option value="" disabled selected>Escolaridade</option>
                    <option id="ensinoFundamental" value="Ensino Fundamental">Ensino Fundamental</option>
                    <option id="ensinoMedio" value="Ensino Medio">Ensino Médio</option>
                    <option id="ensinoTecninco" value="Ensino Tecnico">Ensino Técnico</option>
                    <option id="ensinoSuperior" value="Ensino Superior">Ensino Superior</option>
                </select>
            </div>
            <!-- Campo escolaridade -->
            <div class="input-field col s12">
                <select class="browser-default" name="periodov" required>
                    <option value="" disabled selected>Periodo</option>
                    <option id="integral" value="Integral">Integral</option>
                    <option id="estagio" value="Estágio">Estágio</option>
                    <option id="noturno" value="Noturno">Noturno</option>
                </select>
            </div>
            <!-- Tipo de contrato -->
            <div class="input-field col s12">
                <select class="browser-default" name="contratov" required>
                    <option value="" disabled selected>Tipo de contrato</option>
                    <option id="clt" value="CLT">CLT</option>
                    <option id="pj" value="PJ">PJ</option>
                    <option id="diaria" value="DIÁRIA">Diária</option>
                </select>
            </div>
                    <!-- Botões -->
                <div class="input-field col s12">
                <input type="submit" value="alterar" class="btn blue">
                <a href="index.php" class="btn red">Cancelar</a>
            </div>

                    
        </fieldset>
        <label>

    </form>
</div>

<?php  include_once'includes/footer.php' ?>