<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../../include/auto_load_path_2.php';
$paciente = new FornecedorInstance();
$pacienteBean = new FornecedorBean();

$pagina = (isset($_GET['p'])) ? $_GET['p'] : 1;
$pacienteBean = $paciente->c_buscar_todas_fornecedor();

$total = count($pacienteBean);
$registros_por_pagina = 300;
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
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        style="margin-top: 0px
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Consultar Fornecedor
                        </div>
                        <div class="col-lg-12">
                            <h5>  
                               <a target="Frame1"  href="./home.php"></a>
                               <a target="Frame1" href="CadastrarFornecedor.php" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nova Fornecedor</a>
                            </h5>                                                                                         
                        </div>
                        <br>
                        <div class="panel-body">
                            <br>
                            <div class="row">
                                <div id="list" class="row">
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID:</th>
                                                    <th>NOME:</th>
                                                    <th>EMAIL:</th>
                                                    <th>CELULAR:</th>
                                                    <th>CNPJ:</th>  
                                                    <th>IE:</th>  
                                                    <th>AÇÃO:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $pacienteBean = $paciente->c_paginacao_fornecedor($inicio, $registros_por_pagina);
                                                    $count = count($pacienteBean);
                                                    foreach ($pacienteBean as $forn) {
                                                ?>
                                                    <tr class="odd gradeA">
                                                        <td style="width: 30px"><?php echo $forn->getFor_id() ?></td>
                                                        <td><?php echo $forn->getFor_nome() ?></td>
                                                        <td><?php echo $forn->getFor_email()?></td>
                                                        <td><?php echo $forn->getFor_celular() ?></td> 
                                                        <td><?php echo $forn->getFor_cnpj() ?></td>  
                                                        <td><?php echo $forn->getFor_ie() ?></td> 
                                                         
                                                        <td style="width: 100px">
                                                            <a class="btn btn-info" title="Editar" href="CadastrarFornecedor.php?id=<?php echo $forn->getFor_id()?>"><i  class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-danger" title="Excluir" href="javascript:if(confirm('Deseja mesmo excluir o Fornecedor? <?php echo $forn->getFor_nome() ?>')) {location='CadastrarFornecedor.php?acao=excluir&id=<?php echo $forn->getFor_id()?>';}"><i  class="fa fa-trash"></i></a>                                                                                                                                  
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
            $('#dataTables-example').DataTable({
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