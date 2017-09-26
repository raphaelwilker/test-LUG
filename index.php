<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/lug.css" rel="stylesheet" type="text/css" />
<title>Index</title>

</head>
<?php
include ("conexao.php");
?>
<body>
<?php
$sql=mysqli_query($conexao,"SELECT * FROM dados");
while($busca= mysqli_fetch_assoc($sql))
{
	$sql_query = mysqli_query($conexao,"SELECT * FROM imagem WHERE id_dados = '".$busca['id']."'");
	while($buscando = mysqli_fetch_assoc($sql_query))
	{
			echo $busca['nome']."<p>";
			echo "<img src='".$buscando['temp']."' id='imagem'/><p>";
			echo number_format(parse_str($busca['valor']),2,',','.')."&nbsp;&nbsp;".$busca['tipo']."<p>";
			echo $busca['categoria']."&nbsp;&nbsp;".$busca['Lug_uso']."<p>";
		
	}
}
//<img src="temp/My_Logo.png" border="10"/>
?>

</body>
</html>