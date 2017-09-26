<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/lug.css" rel="stylesheet" type="text/css" />
<link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="CSS/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="JS/jquery/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="JS/bootstrap/js/bootstrap.min.js"></script>	
<title>Index</title>

</head>
<?php
include ("conexao.php");
?>
<body>
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php
$sql=mysqli_query($conexao,"SELECT * FROM dados");
while($busca= mysqli_fetch_assoc($sql))
{
	echo "<div class='row'>";
	$sql_query = mysqli_query($conexao,"SELECT * FROM imagem WHERE id_dados = '".$busca['id']."'");
	while($buscando = mysqli_fetch_assoc($sql_query))
	{
			echo "<div class='col-lg-12  col-md-12 col-sm-12 col-xs-12'>";
			echo $busca['nome']."<p>";
			echo "<img src='".$buscando['temp']."' id='imagem'/><p>";
			echo number_format(parse_str($busca['valor']),2,',','.')."&nbsp;&nbsp;".$busca['tipo']."<p>";
			echo $busca['categoria']."&nbsp;&nbsp;".$busca['Lug_uso']."<p>";
			echo "</div>";
	}
	echo "</div>";
}
//<img src="temp/My_Logo.png" border="10"/>
?>
		</div>
	</div>
</body>
</html>