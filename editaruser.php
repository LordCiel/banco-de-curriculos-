<?php session_start();
include_once('controller/conexao.php');
include_once('includes/header.php');
include_once('includes/nav.php');?>
<title>Edição de Usuário</title>

<div class="row container">
    <div class="col s12">
        <h5 class="light">Edição de Usuário</h5><hr>
    </div>
</div>
<?php
include_once 'controller/conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = $link -> query("select * from tb_usuario where id_usuario = '$id'");

while($registros = $query -> fetch_assoc()):
    $id=$registros['id_usuario'];
    $nome=$registros['nome'];
    $senha = $registros['senha'];
    $email=$registros['email'];
    $exp=$registros['experiencia'];
    $endereco=$registros['endereco'];
    $sexo=$registros['sexo'];
    $nasc=$registros['dataNasc'];
    $formacao=$registros['formacao'];
    $telefone=$registros['telefone'];
    $idcidade=$registros['id_cidade'];
endwhile;
?>


<!-- Formulário de Cadastro -->
<div class="row container">
    <p>&nbsp;</P>
    <form method="post" action="controller/updateusuario.php" class="col s12" enctype="multipart/form-data">
        <fieldset class="formulario">
            <h5 class="light center">Alteração</h5>
            <!-- Campo nome -->
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="nome" id="nome" maxlength="60" value="<?php echo $nome; ?>" required autofocus>
                <label for="nome">Nome completo</label>
            </div>
            <!-- Campo senha -->
            <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input type="password" name="senha" id="senha" value="<?php echo $senha; ?>" maxlength="60" required>
                <label for="senha">Senha</label>
            </div>
            <!-- Campo email -->
            <div class="input-field col s12">
                <i class="material-icons prefix">mail</i>
                <input type="email" name="email" id="email" maxlength="50" value="<?php echo $email; ?>" required>
                <label for="email">E-mail</label>
            </div>
            <!-- Campo telefone -->
            <div class="input-field col s12">
                <i class="material-icons prefix">local_phone</i>
                <input type="tel" name="telefone" id="telefone" maxlength="50" value="<?php echo $telefone; ?>"required>
                <label for="telefone">Telefone</label>
            </div>
            <!-- Campo endereço -->
            <div class="input-field col s12">
                <i class="material-icons prefix">map</i>
                <input type="text" name="endereco" id="endereco" value="<?php echo $endereco; ?>" maxlength="40" required>
                <label for="endereco">Endereço</label>
            </div>
            <!-- Campo experiencia -->
            <div class="input-field col s12">
                <i class="material-icons prefix">work</i>
                <input type="text" name="experiencia" id="experiencia" value="<?php echo $exp; ?>" maxlength="400">
                <label for="experiencia">Experiência</label>
            </div>
            <!-- Campo formação -->
            <div class="input-field col s12">
                <select class="browser-default" name="formacao" value="<?php echo $formacao; ?>">
                    <option value="" disabled selected>Formação</option>
                    <option id="ensinoFundamental" value="Ensino Fundamental">Ensino Fundamental</option>
                    <option id="ensinoMedio" value="Ensino Medio">Ensino Médio</option>
                    <option id="ensinoTecninco" value="Ensino Tecnico">Ensino Técnico</option>
                    <option id="ensinoSuperior" value="Ensino Superior">Ensino Superior</option>
                </select>
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
            <!-- Campo sexo -->
            <div class="input-field col s12">
                <p>Sexo</p>
                <p>
                    <label>
                        <input name="sexo" type="radio" id="masculino" value="masculino" checked />
                        <span>Masculino</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input name="sexo" type="radio" id="feminino" value="feminino" />
                        <span>Feminino</span>
                    </label>
                </p>
            </div>
            <!-- Campo data de Nascimento -->
            <div class="input-field col s12">
                <i class="material-icons prefix">date_range</i>
                <input type="date" name="datanasc" id="datanasc" maxlength="11" required>
                <label for="formacao">Data de Nascimento</label>
            </div>

            <!-- Termos de USO -->
            <div class="input-field col s12">
                <input type="checkbox" required checked />
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