<?php
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];

//inicio do upload
$nomeDoArquivo = $_FILES['foto']['name'];
$partes = explode ("." , $nomeDoArquivo);
$nomeNovo = round(microtime(true)) . "." . end($partes);
$pasta = "img/";
move_uploaded_file($_FILES['foto']['tmp_name'], $pasta . $nomeNovo);
// fim do upload

include "conexao.php";
$sql = "insert into tb_pokemon(nome, tipo, foto) value ('$nome','$tipo','$$nomeNovo')";
mysqli_query($conexao, $sql);

mysqli_close($conexao);

header("location:admin.php");

?>