<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="view/paciente/ConsultarPaciente.php?=buscar">Buscar</a>
        <a href="view/paciente/CadastrarPaciente.php?=cadastrar">Cadastrar</a>
        <br/>
        <?php 
            $valor = @$_GET['p'];
            if($valor == 'buscar')   {require_once 'ConsultarPaciente.php';}
            if($valor == 'cadastrar'){require_once 'CadastrarPaciente.php';}
        ?>
      
    </body>
</html>
