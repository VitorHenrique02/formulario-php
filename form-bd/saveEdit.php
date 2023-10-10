<?php
    include_once('form-bd.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        $senha = $_POST['senha'];
        
        $sqlInsert = "UPDATE cliente 
        SET nome_completo='$nome',email='$email',telefone='$telefone',sexo='$sexo',data_nasc='$data_nasc',cidade='$cidade',estado='$estado',endereco='$endereco',senha='$senha'
        WHERE idcliente=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistema.php');

?>