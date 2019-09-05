<?php session_start();
include_once('controller/conexao.php');
include_once('includes/header.php');
include_once('includes/nav.php');?>
<title>Cadastro de Empresas</title> 

<!-- Formulário de Cadastro -->
<div class="row container">
  <p>&nbsp;</P>
  <form method="post" action="controller/createemp.php" class="col s12" enctype="multipart/form-data">
    <fieldset class="formulario">
      <legend><img src="img/empresa.png" alt="[imagem]" width="100"></legend>
      <h2 class="light center">Cadastro de Empresa</h2>
      <?php 
                    if(isset($_SESSION['msg'])):
                        echo $_SESSION['msg'];
                        session_unset();
                    endif;                
                ?>
      <!-- Campo Razão Social -->
      <div class="input-field col s12">
        <i class="material-icons prefix">account_circle</i>
        <input type="text" name="razaopj" id="razao" maxlength="60" required autofocus>
        <label for="razao">Razão Social</label>
      </div>
      <!-- Campo senha -->
      <div class="input-field col s12">
        <i class="material-icons prefix">lock</i>
        <input type="password" name="senhapj" id="senha" maxlength="60" required>
        <label for="senha">Senha</label>
      </div>
      <!-- Campo email -->
      <div class="input-field col s12">
        <i class="material-icons prefix">mail</i>
        <input type="email" name="emailpj" id="email" maxlength="50" required>
        <label for="email">E-mail</label>
      </div>
      <!-- Campo telefone -->
      <div class="input-field col s12">
        <i class="material-icons prefix">local_phone</i>
        <input type="tel" name="telefonepj" id="telefone" maxlength="50" required>
        <label for="telefone">Telefone</label>
      </div>
      <!-- Campo endereço -->
      <div class="input-field col s12">
        <i class="material-icons prefix">map</i>
        <input type="text" name="enderecopj" id="endereco" maxlength="40" required>
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
        <input type="submit" value="Cadastrar" class="btn blue">
        <input type="reset" value="Limpar" class="btn red">
      </div>


    </fieldset>
    <label>

  </form>
</div>

<?php include_once'includes/footer.php' ?>