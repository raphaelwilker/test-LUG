<?php
include ("conexao.php");
	$nome=$_POST['nome'];
	$valor=$_POST['valor'];
	$tipo=$_POST['tipo'];
	$categoria=$_POST['categoria'];
	$uso=$_POST['uso'];
	$erro = Array();
	foreach($_POST as $chv =>$vlr)
	{
		if($vlr==""){
		$erro[]="O campo ".$chv." está vazio";
		}
	}
 	if(sizeof($erro)== 0){
	 
	 $sql = mysqli_query("INSERT  INTO dados(nome,valor,tipo,categoria,Lug_uso )VALUES('$nome','$valor','$tipo','$categoria','$uso') ")or die(mysqli_error());
	 if($sql===TRUE)
	 {
	 	echo "Dados inserido com sucesso<p>";
	 }else{
		 echo "Ops!Ocorreu um erro<p>";
	 }
	 
	}else{
		foreach($erro as $vlr)
		{
			echo"$vlr<br>";
		}
	}

$fileName = $_FILES['arquivo']['name'];
$tmpName  = $_FILES['arquivo']['tmp_name'];
$fileSize = $_FILES['arquivo']['size'];
$fileType = $_FILES['arquivo']['type'];
$arquivo = $_FILES['arquivo']['file'];
$destino = 'temp/'.$fileName;
foreach($_FILES as $chv =>$vlr)
	{
		if($vlr==""){
		$erro[]="O campo ".$chv." está vazio";
		}
	}
 	if(sizeof($erro)== 0){
	
if(copy($tmpName,$destino))
{
	$sql_query = mysqli_query("SELECT id FROM dados ORDER BY id DESC LIMIT 1");
	$sql_busca = mysqli_fetch_assoc($sql_query);
	$insere = mysqli_query("INSERT INTO imagem(id_dados,temp,tamanho,nome) VALUES ('".$sql_busca['id']."','$destino','$fileSize','$fileName')");
	if($insere===FALSE)
	{
		echo "Ops! Ocorreu um erro".mysqli_error();
	}else{
		echo "Dados inseridos com suscesso";
		header("Location:index.php");
	}
}else{
	echo "Ops! Ocorreu um erro durante a tranferencia da imagem";
}
	}else{
		foreach($erro as $vlr)
		{
			echo"$vlr<br>";
		}
	}

?>