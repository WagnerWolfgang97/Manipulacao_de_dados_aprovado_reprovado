<html>
<head>
<title>Matrícula de Alunos</title>
<?php include ('conectaBD.php');  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form action="cursa.php" method="post" name="aluno">
<table width="200" border="1">
  <tr>
    <td colspan="2">Matrícula de Alunos</td>
  </tr>
  <tr>
    <td>Data Matrícula:</td>
    <td><input type="date" name="data" ></td>
  </tr>
  <tr>
    <td>Nota 1:</td>
    <td><input type="numeric" name="nota1" ></td>
  </tr>
  <tr>
    <td>Nota 2:</td>
    <td><input type="numeric" name="nota2" ></td>
  </tr>
  <tr>
    <td>Matrícula Aluno:</td>
    <td><input type="int" name="matricula" ></td>
  </tr>
  <tr>
    <td>Turma:</td>
    <td><input type="int" name="turma" ></td>
  </tr>
  <tr>
    <td>Código Disciplina:</td>
    <td><input type="int" name="codigo" ></td>
  </tr>
  
    <td colspan="2" align="right"><input type="submit" value="Gravar" name="botao"></td>
    </tr>	
</table>
</form>
<?php
if (@$_POST['botao'] == "Gravar") 
	{
    
    $data = $_POST['data'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $matricula = $_POST['matricula'];
    $codigo = $_POST['codigo'];
    $turma = $_POST['turma'];
		
    $nralunoturma = "select turma from cursa where turma='$turma'";
    $turmas = mysqli_query($mysqli, $nralunoturma);
    $totalalunos = mysqli_num_rows($turmas);

    if ($totalalunos > 5) {
      echo "TURMA LOTADA";
    
    }
    else{
    $insere = "INSERT into cursa(data_matricula,nota1,nota2,matricula,codigo, turma) 
VALUES ('$data','$nota1','$nota2','$matricula','$codigo', '$turma')";

    mysqli_query($mysqli, $insere) or die ("Não foi possivel inserir os dados");
    }
  }
?>
<br><br>
<a href="index.html" >Home </a>
</body>
</html>
