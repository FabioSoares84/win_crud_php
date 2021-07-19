<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once '../../include/auto_load_path_2.php';
$paciente = new FornecedorInstance();
$pacienteBean = new FornecedorBean();

$acao =(isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0);
$codigo =(isset($_POST['id'])) ? $_POST["id"] : ((isset($_GET["id"])) ? $_GET["id"] : 0); 

if($codigo > 0){
     $pacienteBean = $paciente->c_buscar_fornecedor_por_codigo($codigo);  
}

if($acao != ""){
    if($acao == "incluir"){
        $paciente->c_gravar_fornecedor();
        header("Location:ConsultarFornecedor.php");
    }
     if ($acao == "alterar") {
        $paciente->c_alterar_fornecedor();
        header("Location:ConsultarFornecedor.php");
    }
    if ($acao == "excluir") {
        $paciente->c_excluir_fornecedor();
        header("Location:ConsultarFornecedor.php");
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
    
    <script src="../vendor/jquery/jquery-3.2.1.min.js"     type="text/javascript"></script>
    <script src="../vendor/jquery/jquery.mask.min.js"      type="text/javascript"></script>
</head>
<body>
    <div id="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cadastro de Fornecedor
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#geral" aria-controls="waiting" role="tab" data-toggle="tab">Geral</a></li>
                        <li role="presentation"><a href="#tributacao" aria-controls="paid" role="tab" data-toggle="tab">Tributação</a></li>
                    </ul>
                    
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="geral">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <!-- /.panel-heading -->
                                
                                <!-- /.panel-body -->
                            </div>


                        </div>


                        <div role="tabpanel" class="tab-pane" id="tributacao">
                            <div class="form-group col-md-4">
                                <label>CNAE:</label>
                                <input class="form-control" required type="text" name="for_email" id="for_email"  value="<?php echo $pacienteBean->getFor_email()?>"  autocomplete="off">                                        
                            </div>
                            <div class="form-group col-md-4">
                                <label>Regime Tributario:</label>
                                <input  class="form-control" type="text" name="for_site" id="for_site"  value="<?php echo $pacienteBean->getFor_site()?>"  autocomplete="off">                                        
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email Contador:</label>
                                <input  class="form-control" type="text" name="for_site" id="for_site"  value="<?php echo $pacienteBean->getFor_site()?>"  autocomplete="off">                                        
                            </div>


                        </div>


                       

                    </div>
                    
                    <div class="panel-body">
                        <div class="row">                              
                            <form action="CadastrarFornecedor.php" method="post">
                                <input type="hidden" name="acao" id="acao" value="<?php echo($codigo > 0) ? "alterar" : "incluir" ?>"/>
                                <input type="hidden" name="for_id"   id="for_id" value="<?php echo $pacienteBean->getFor_id()?>"/>

                                <div class="form-group col-md-1">
                                    <label for="disabledSelect">Código:</label>
                                    <input class="form-control" disabled type="text" name="for_id"  value="<?php echo $pacienteBean->getFor_id()?>"/>
                                </div> 
                                
                                <div class="form-group col-md-2">
                                    <label>Cnpj:</label> 
                                    <input class="form-control" required type="text" name="for_cnpj"  onblur="checkCnpj(this.value)" data-mask="00.000.000/0000-00" value="<?php echo $pacienteBean->getFor_cnpj() ?>" placeholder="00.000.000/0000-00" autocomplete="off" />
                                </div>

                                <div class="form-group col-md-5">
                                    <label>Nome:</label>
                                    <input class="form-control" required type="text" name="for_nome" id="for_nome"  value="<?php echo $pacienteBean->getFor_nome() ?>"  autocomplete="off" >                                        
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Nome Fantasia:</label>
                                    <input class="form-control" required type="text" name="for_nomeFantasia" id="for_nomeFantasia"  value="<?php echo $pacienteBean->getFor_nomeFantasia()?>"  autocomplete="off" autofocus="on">                                        
                                </div>
                                 <div class="form-group col-md-2">
                                    <label>Inscrição Estadual:</label>
                                    <input class="form-control" required type="text"  name="for_ie" id="for_ie" data-mask="00.000.000-00" value="<?php echo $pacienteBean->getFor_ie()?>"  placeholder="00.000.000-00"  autocomplete="off">                                   
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label>Celular:(Responsável)</label>
                                    <input class="form-control" required type="text" name="for_celular" id="for_celular" data-mask="(00)0 0000-0000" value="<?php echo $pacienteBean->getFor_celular() ?>"  placeholder="(00)0 0000-0000"  autocomplete="off">                                   
                                </div>
                                  
                                <div class="form-group col-md-4">
                                    <label>E-mail:</label>
                                    <input class="form-control" required type="text" name="for_email" id="for_email"  value="<?php echo $pacienteBean->getFor_email()?>"  autocomplete="off">                                        
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Site:</label>
                                    <input  class="form-control" type="text" name="for_site" id="for_site"  value="<?php echo $pacienteBean->getFor_site()?>"  autocomplete="off">                                        
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Cep:</label>
                                    <input class="form-control" required type="text"  name="for_cep" id="for_cep" data-mask="00000-000" value="<?php echo $pacienteBean->getFor_cep()?>"  placeholder="00000-000"  autocomplete="off">                                   
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Logradouro:</label>
                                    <input class="form-control" required type="text" name="for_logradouro" id="for_logradouro" value="<?php echo $pacienteBean->getFor_logradouro()?>">                                   
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Numero:</label>
                                    <input class="form-control" required type="text" name="for_numeroEnd"  id="for_numeroEnd" value="<?php echo $pacienteBean->getFor_numeroEnd()?>" autocomplete="off">                                   
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Bairro:</label>
                                    <input class="form-control" required type="text" name="for_bairro" id="for_bairro" value="<?php echo $pacienteBean->getFor_bairro()?>" autocomplete="off">                                   
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Cidade:</label>
                                    <input class="form-control" required type="text" name="for_municipio" id="for_municipio" value="<?php echo $pacienteBean->getFor_municipio()?>" autocomplete="off">                                   
                                </div>
                                <div class="form-group col-md-2">
                                    <label>UF:</label>
                                    <input class="form-control" required type="text" name="for_uf" id="for_uf" value="<?php echo $pacienteBean->getFor_uf()?>" autocomplete="off">                                   
                                </div>
                                
                                <br>
                                <br>
                                <div class="col-md-12">   
                                    <button type="submit" class="<?php echo ($codigo > 0) ? "btn btn-warning" : "btn btn-success" ?>">
                                                       <i class="<?php echo ($codigo > 0) ? "fa fa-pencil" : "fa fa-floppy-o" ?>"></i> 
                                                                 <?php echo ($codigo > 0) ? " Alterar" : " Salvar" ?></button>   

                                    <a target="Frame1"  href="./home.php"></a>
                                    <a target="Frame1" href="ConsultarFornecedor.php" class="btn btn-danger"><i class="glyphicon glyphicon-refresh" aria-hidden="true"></i>&nbsp;Cancelar</a>
                                </div>
                            </form>                                                                                                                                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/js/sb-admin-2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--<script src="../vendor/jquery/jquery-3.2.1.min.js"     type="text/javascript"></script> -->
    <script src="../vendor/js/jquery.mask.min.js"      type="text/javascript"></script>
    <script src="../../util/validacaoCPF_CNPJ.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
            function checkCnpj(cnpj)
            {
                $.ajax({
                    'url': 'https://www.receitaws.com.br/v1/cnpj/'+cnpj.replace(/[^0-9]+/g, ''),
                    'type': "GET",
                    'dataType': 'jsonp',
                    'success': function(data){
                        if(data.nome == undefined){
                            alert(data.status +''+ data.message)
                        }else{
                            document.getElementById('for_nome').value = data.nome;
                            document.getElementById('for_nomeFantasia').value = data.fantasia;
                            document.getElementById('for_cep').value = data.cep;
                            document.getElementById('for_logradouro').value = data.logradouro;
                            document.getElementById('for_numeroEnd').value = data.numero;
                            document.getElementById('for_bairro').value = data.bairro;
                            document.getElementById('for_municipio').value = data.municipio;
                            document.getElementById('for_uf').value = data.uf;
                        }
                    }
                })
            }
        </script>
</body>
</html>