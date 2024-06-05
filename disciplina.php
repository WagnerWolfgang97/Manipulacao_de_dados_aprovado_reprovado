<html>

<head>
<title>Cadastro de Disciplinas</title>

<?php include ('conectaBD.php'); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="disciplina.php" method="post" name="aluno">
<table width="200" border="1">
  <tr>
    <td colspan="2">Cadastro de Disciplinas</td>
  </tr>
  <tr>
    <td>Nome:</td>
    <td><input type="text"  name="nome" ></td>
  </tr>
    <td colspan="2" align="right"><input type="submit" value="Gravar" name="botao"></td>
    </tr>	
</table>
</form>
<?php
if (@$_POST['botao'] == "Gravar") 
	{
    
		$nome = $_POST['nome'];
		
		$insere = "INSERT into disciplina (nomed) VALUES ('$nome')";
		mysqli_query($mysqli, $insere) or die ("Não foi possivel inserir os dados");
	}
?>
<a href="index.html" >Home </a>
</body>
</html>
