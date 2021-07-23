<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once '../../include/auto_load_path_2.php';
$paciente = new PacienteInstance();
$pacienteBean = new PacienteBean();

$acao =(isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0);
$codigo =(isset($_POST['id'])) ? $_POST["id"] : ((isset($_GET["id"])) ? $_GET["id"] : 0); 

if($codigo > 0){
     $pacienteBean = $paciente->c_buscar_paciente_por_codigo($codigo);  
}

if($acao != ""){
    if($acao == "incluir"){
        $paciente->c_gravar_paciente();
        header("Location:ConsultarPaciente.php");
    }
     if ($acao == "alterar") {
        $paciente->c_alterar_paciente();
        header("Location:ConsultarPaciente.php");
    }
    if ($acao == "excluir") {
        $paciente->c_excluir_paciente();
        header("Location:ConsultarPaciente.php");
    }
}
?>
<html lang="pt_Br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Fábio Soares">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="../../util/jquery/jquery-3.2.1.min.js"     type="text/javascript"></script>
    <script src="../../util/jquery/jquery.mask.min.js"      type="text/javascript"></script>
   
</head>
<body>
    <div id="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cadastro de Pacientes
                    </div>
                    <div class="panel-body">
                        <div class="row">                              
                            <form role="form" id="cad_pacientes">

                                <div class="form-group col-md-1">
                                    <label for="disabledSelect">Código:</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo">
                                </div>     

                                <div class="form-group col-md-7">
                                    <label>Nome:</label>
                                    <input type="text" class="form-control" id="nome" placeholder="Digite o nome do usuário" name="name">
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label>CPF: </label> <span id="resultadoCpf"></span>
                                    <input required type="text" name="cpf" id="usu_cpf" class="form-control" data-mask="000.000.000-00" value="<?php ?>" placeholder="000.000.000-00"/>
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label>RG:</label>
                                    <input required type="text" name="rg" class="form-control" id="celular" data-mask="(00)0 0000-0000" value="<?php  ?>"  placeholder="(00)0 0000-0000"  autocomplete="off">                                   
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label>Telefone: </label> <span id="resultadoEmail"></span>
                                    <input required type="text" name="telefone" id="usu_email" class="form-control" value="<?php ?>"/>                                        
                                    
                                </div>
                                
                                <div class="form-group col-md-5">
                                    <label>Email:</label>
                                    <input required type="text" name="email" class="form-control" value="<?php  ?>" id="inputError1">                                
                                </div>
                                
                                  <div class="form-group col-md-4">
                                    <label>Data Nascimento: </label> <span id="resultadoEmail"></span>
                                    <input required type="text" name="data_nascimento" id="usu_email" class="form-control" value="<?php ?>"/>                                        
                                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Idade:</label>
                                    <input required type="text" name="idade" class="form-control" value="<?php  ?>" id="inputError1">                                
                                </div><!-- comment -->
                                
                             
                                <div class="form-group col-md-4">
                                    <label>Estado Civil:</label>
                                    <select class="form-control"   name="estado_civil" >              
                                        <option  value="S" > Solteiro</option>
                                        <option  value="C" > Casado</option>
                                        <option  value="V" > Viúvo</option>
                                    </select>                                           
                                </div>  
                                
                                <div class="form-group col-md-4">
                                    <label>Sexo:</label>
                                    <select class="form-control"   name="sexo" >              
                                        <option  value="M" > Masculino</option>
                                        <option  value="F" > Feminio</option>
                                    </select>                                           
                                </div>  
                                
                                
                                
                                <div class="form-group col-md-12">
                                    <label>Endereço:</label>
                                    <input required type="text" name="usu_senha" class="form-control" value="<?php  ?>" id="inputError1">                                
                                </div><!-- comment -->
                                <div class="form-group col-md-12">
                                    <label>OBS:</label>
                                    <input required type="text" name="usu_senha" class="form-control" value="<?php  ?>" id="inputError1">                                
                                </div>
                                
                                <br>
                                <br>
                                <div class="col-md-12">   
                                    <button type="submit" class="<?php echo ($codigo > 0) ? "btn btn-warning" : "btn btn-success" ?>">
                                                       <i class="<?php echo ($codigo > 0) ? "fa fa-pencil" : "fa fa-floppy-o" ?>"></i> 
                                                                 <?php echo ($codigo > 0) ? " Alterar" : " Salvar" ?></button>   

                                    <a target="Frame1"  href="./home.php"></a>
                                    <a target="Frame1" href="ConsultarUsuario.php" class="btn btn-danger"><i class="glyphicon glyphicon-refresh" aria-hidden="true"></i>&nbsp;Cancelar</a>
                                </div>
                            </form>                                                                                                                                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="Clientes.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   
</body>
</html>