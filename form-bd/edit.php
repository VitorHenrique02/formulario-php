<?php
	include_once('form-bd.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM cliente WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome_completo'];
                $senha = $user_data['senha'];
                $email = $user_data['email'];
                $telefone = $user_data['telefone'];
                $sexo = $user_data['sexo'];
                $data_nasc = $user_data['data_nasc'];
                $cidade = $user_data['cidade'];
                $estado = $user_data['estado'];
                $endereco = $user_data['endereco'];
				$senha = $user_data['senha'];
            }
        }
        else
        {
            header('Location: sistema.php');
        }
    }
    else
    {
        header('Location: sistema.php');
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body{
			font-family: Arial, Helvetica, sans-serif;
			background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
		}

		.box{
			color: white;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: rgba(0, 0, 0, 0.8);
			padding: 15px;
			border-radius: 15px;
			width:25%;
		}

		fieldset{
			border: 3px solid dodgerblue;
		}

		.inputBox{
			position: relative;
		}

		.inputUser{
			background: none;
			border: none;
			border-bottom: 1px solid white;
			outline: none;
			color: white;
			font-size: 15px;
			width: 50%;
			letter-spacing: 2px;
		}

		legend{
			border: 1px solid dodgerblue;
			padding: 10px;
			text-align: center;
			background-color: dodgerblue;
			border-radius: 8px;
		}
		.labelInput{
			position: absolute;
			top: 0px;
			left: 0px;
			pointer-events: none;
			transition: .5s;
		}

		.inputUser:focus ~ .labelInput, .inputUser:valid ~ .labelInput{
			top: -20px;
			font-size: 12px;
			color: dodgerblue;
		}

		#data_nascimento{
			border: none;
			padding: 1px;
			border-radius: 10px;
			outline: none;
			font-size: 15px;
		}

		#submit{
			background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
			width: 100%;
			border: none;
			padding: 15px;
			color: white;
			font-size: 15px;
			cursor:pointer ;
			border-radius: 15px;
		}
		#submit:hover{
			background-image: linear-gradient(to right, rgb(0,80,172), rgb(80,19,195));
		}
	</style>
</head>
<body>
	<a href="sistema.php">Voltar</a>
<div class="box">
	<form action="saveEdit.php" method="POST">
		<fieldset>
			<legend><b>Formulário de Clientes</b></legend>
			<br>
			<div class="inputBox">
				<input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
				<label for="nome" class="labelInput">Nome completo</label>
			</div>
			<br><br>
			<div class="inputBox">
				<input type="e-mail" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
				<label for="email" class="labelInput">E-mail</label>
			</div>
			<br><br>
			<div class="inputBox">
				<input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>" required>
				<label for="telefone" class="labelInput">Telefone</label>
			</div>
			<br><br>
			<p>Sexo</p>
			<input type="radio" name="genero" value="feminino" <?php echo ($sexo == 'feminino') ? 'checked' : '' ?> required>
			<label for="">Feminino</label><br>
			<input type="radio" name="genero" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : '' ?> required>
			<label for="">Masculino</label><br>
			<input type="radio" name="genero" value="outros" <?php echo ($sexo == 'outros') ? 'checked' : '' ?> required>
			<label for="">Outros</label>
			<br><br>
				<label for="data_nascimento"><b>Data de Nascimento:</b></label>
				<input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento ?>" required>			
			<br><br>
			<div class="inputBox">				
				<input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade ?>" required>
				<label for="cidade" class="labelInput">Cidade</label>				
			</div>
			<br><br>
			<div class="inputBox">				
				<input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado ?>" required>
				<label for="estado" class="labelInput">Estado</label>				
			</div>
			<br><br>
			<div class="inputBox">				
				<input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>" required>
				<label for="endereco" class="labelInput">Endereço</label>				
			</div>
			<br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" value="<?php echo $email ?>" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
				<input type="hidden" name="id" value=<?php echo $id;?>>
			<input type="submit" name="update" id="submit">
			
		</fieldset>
	</form>

</div>
<form>
	
</form>


</body>
</html>