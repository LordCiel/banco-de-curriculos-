<?php session_start();
include_once('controller/conexao.php');
include_once('includes/header.php');
include_once('includes/nav.php');?>
<title>Edição de Empresa</title>

<div class="row container">
    <div class="col s12">
        <h5 class="light">Edição de Empresa</h5><hr>
    </div>
</div>
<?php
include_once 'controller/conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = $link -> query("select * from tb_empresa where id_empresa = '$id'");

while($registros = $query -> fetch_assoc()):
    $idj = $registros['id_empresa'];
    $razao = $registros['razao'];
    $senha = $registros['senha'];
    $emailj = $registros['email'];    
    $enderecoj = $registros['endereco'];
    $cidadej= $registros['id_cidade'];
    $telefonej= $registros['telefone'];
    $razao = utf8_encode($razao);
endwhile;
?>
<!-- Formulário de Cadastro -->
<div class="row container">
  <p>&nbsp;</P>
  <form method="post" action="controller/updateempresa.php" class="col s12" enctype="multipart/form-data">
    <fieldset class="formulario">
        <h5 class="light center">Cadastro de Empresa</h5>
      <!-- Campo Razão Social -->
      <div class="input-field col s12">
        <i class="material-icons prefix">account_circle</i>
        <input type="text" name="razaopj" id="razao" maxlength="60" value="<?php echo $razao; ?>" required autofocus>
        <label for="razao">Razão Social</label>
      </div>
      <!-- Campo senha -->
      <div class="input-field col s12">
        <i class="material-icons prefix">lock</i>
        <input type="password" name="senhapj" id="senha" maxlength="60" value="<?php echo $senha; ?>" required>
        <label for="senha">Senha</label>
      </div>
      <!-- Campo email -->
      <div class="input-field col s12">
        <i class="material-icons prefix">mail</i>
        <input type="email" name="emailpj" id="email" maxlength="50" value="<?php echo $emailj; ?>" required>
        <label for="email">E-mail</label>
      </div>
      <!-- Campo telefone -->
      <div class="input-field col s12">
        <i class="material-icons prefix">local_phone</i>
        <input type="tel" name="telefonepj" id="telefone" maxlength="50" value="<?php echo $telefonej; ?>" required>
        <label for="telefone">Telefone</label>
      </div>
      <!-- Campo endereço -->
      <div class="input-field col s12">
        <i class="material-icons prefix">map</i>
        <input type="text" name="enderecopj" id="endereco" maxlength="40" value="<?php echo $enderecoj; ?>" required>
        <label for="endereco">Endereço</label>
      </div>
      <!-- Campo estado -->
      <div class="input-field col s12">
        <select class="browser-default" name="estado">
          <option value="" disabled selected>Escolha o seu estado</option>
          <?php 
                        $estados = "select * from estado";
                        #$idestado = mysqli_query("select id_estado from estado");
                        $resultadoEstado=mysqli_query($link, $estados);
                        
                        while($row_estado = mysqli_fetch_assoc($resultadoEstado)){?>
          <option value="<?php  echo $row_estado['id_estado']?>"><?php echo $row_estado['uf'];?>
          </option><?php 
                                    }
                        ?>
        </select>
      </div>
      <!-- Campo cidade -->
      <div class="input-field col s12">
        <select class="browser-default" name="cidade">
          <option value="" disabled selected>Escolha a sua cidade</option>
          <?php 
                        $cidades = "select * from cidade";
                        $resultadoCidade=mysqli_query($link, $cidades);
                        while($row_cidade = mysqli_fetch_assoc($resultadoCidade)){?>
          <option value="<?php echo $row_cidade['id_cidade']?>"><?php echo $row_cidade['nome'];?>
          </option><?php 
                                     }
                        ?>
        </select>
      </div>
      <!-- Termos de USO -->
      <div class="input-field col s12">
        <input type="checkbox" required checked="checked" />
        <span>Eu aceito os <a href="termos.php">termos de uso</a>.</span>
        </label>
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