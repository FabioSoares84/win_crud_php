<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../../include/auto_load_path_2.php';
$paciente = new PacienteInstance();
$pacienteBean = new PacienteBean();

$pagina = (isset($_GET['p'])) ? $_GET['p'] :1;
$pacienteBean = $paciente->c_buscar_todos_pacientes();

$total = count($pacienteBean);
$registros_por_pagina = 50000;
$numPaginas = ceil($total / $registros_por_pagina);
$inicio = ($registros_por_pagina * $pagina) - $registros_por_pagina;
?>
<!DOCTYPE html>
<html lang="pt_Br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Fábio Soares">
         
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">   
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Consultar Paciente
                        </div>
                        <div class="col-lg-12">
                            <h5>  
                               <a target="Frame1"  href="./home.php"></a>
                               <a target="Frame1" href="CadastrarPaciente.php" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nova Paciente</a>
                            </h5>                                                                                         
                        </div>
                        <br>
                        <div class="panel-body">
                            <br>
                            <div class="row">
                                <div id="list" class="row">
                                    <div class="table-responsive col-md-12">
                                        <table id="table_paciente" class="display nowrap" style="width:100%" >
                                            <thead>
                                                <tr>
                                                    <th>ID:</th>
                                                    <th>NOME:</th>
                                                    <th>EMAIL:</th>
                                                    <th>CELULAR:</th>
                                                    <th>CPF:</th>  
                                                    <th>SEXO:</th>  
                                                    <th>AÇÃO:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $pacienteBean = $paciente->c_paginacao_paciente($inicio, $registros_por_pagina);
                                                    $count = count($pacienteBean);
                                                    foreach ($pacienteBean as $pacient) {
                                                  
                                                ?>
                                                    <tr class="odd gradeA">
                                                        <td style="width: 30px"><?php echo $pacient->getId() ?></td>
                                                        <td><?php echo $pacient->getPac_nome() ?></td>
                                                        <td><?php echo $pacient->getPac_email()?></td>
                                                        <td><?php echo $pacient->getPac_telefone() ?></td> 
                                                        <td><?php echo $pacient->getPac_cpf() ?></td>  
                                                        <td><?php echo $pacient->getPac_sexo() ?></td> 
                                                         
                                                        <td style="width: 100px">
                                                            <a class="btn btn-info" title="Editar" href="CadastrarPaciente.php?id=<?php echo $pacient->getId()?>"><i  class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-danger" title="Excluir" href="javascript:if(confirm('Deseja mesmo excluir o Paciente? <?php echo $pacient->getPac_nome() ?>')) {location='CadastrarPaciente.php?acao=excluir&id=<?php echo $pacient->getId()?>';}"><i  class="fa fa-trash"></i></a>                                                                                                                                  
                                                        </td> 
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>                                                           
                                   </div>
                                </div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script>
     $(document).ready(function () {
	var data = [];
        for ( var i=0 ; i<50000 ; i++ ) {
            data.push( [ i, i, i, i, i] );
        }		

            $('#table_paciente').DataTable({
                 language:{
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });
        });
    </script>
    
    </body>
</html>    