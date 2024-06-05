<html>
<head>
<title>Relatório de Matrículas</title>
<?php include ('conectaBD.php');  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="cursalst.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td align="center">Relatório de Matrículas</td>
  </tr>
  <tr>
    <td width="9%" align="right">Nome Aluno:</td>
    <td width="30%"><input type="text" name="nomea"  /></td>
    <td width="12%" align="right">Nome Disciplina:</td>
    <td width="26%"><input type="text" name="nomed" size="3" /></td>
    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
  </tr>
</table>
</form>

<?php if (@$_POST['botao'] == "Gerar") { ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <th width="25%">Nome do Aluno</th>
    <th width="20%">Nome da Disciplina</th>
    <th width="10%">Nota 1º Bimestre</th>
    <th width="10%">Nota 2º Bimestre</th>
    <th width="10%">Média</th>
    <th width="20%=">Status</th>  
  </tr>

<?php
$nomea = $_POST['nomea'];
$nomed = $_POST['nomed'];

$query = "SELECT nomea,nomed,nota1,nota2,format((nota1+nota2)/2,1) as media
          FROM aluno inner join cursa on aluno.matricula=cursa.matricula
          inner join disciplina on disciplina.codigo=cursa.codigo 
          WHERE aluno.matricula > 0 ";
$query .= ($nomea ? " AND nomea LIKE '%$nomea%' " : "");
$query .= ($nomed ? " AND nomed LIKE '%$nomed%' " : "");
$query .= " ORDER by aluno.matricula";
$result = mysqli_query($mysqli, $query);

while ($coluna=mysqli_fetch_array($result)) 
{
$media = $coluna['media'];

if ($media >=70) {
 $status = "Aprovado";
} else {
 $status = "Reprovado";


}
    
?>
<tr>
  <th width="25%"><?php echo $coluna['nomea']; ?></th>
  <th width="20%"><?php echo $coluna['nomed']; ?></th>
  <th width="10%"><?php echo $coluna['nota1']; ?></th>
  <th width="10%"><?php echo $coluna['nota2']; ?></th>
  <th width="10%"><?php echo $coluna['media']; ?></th>
  <th width="20%"><?php echo $status;?> </th>
  </tr>
<?php

} // fim while
?>
</table>
<?php	
}
?>
<a href="index.html" >Home </a>
