<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/icon3.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Acompanhamento de Vacinas</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="components/Gritter-master/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="components/select2-4.0.3/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="components/switch/dist/css/bootstrap3/bootstrap-switch.min.css" />
    <link rel="stylesheet" type="text/css" href="components/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="components/dist/css/AdminLTE.min.css" />
    <link rel="stylesheet" type="text/css" href="components/notifications/dist/stylesheets/bootstrap-notifications.min.css" />

    <nav class="navbar navbar-light" style="background-color: #7db6e0;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Controle de Vacinas</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Inicio <span class="sr-only">(current)</span></a></li> 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastro_cliente.php">Cliente</a></li>
            <li><a href="cadastro_pet.php">Pet</a></li>
            <li><a href="cadastroVacina.php">Vacina</a></li>
          </ul>
        </li>


        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="total">0</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Suas Notidicações</li>
            <li>
              <ul class="menu">
                <li><a href="#">
                    <i class="fa fa-calendar-times-o text-red" id="vPassadas"></i>
                  </a>
                </li>
                <li><a href="#">
                    <i class="fa fa-calendar-check-o text-green" id="vAtual"></i>
                  </a>
                </li>
                <li><a href="#">
                    <i class="fa fa-child text-aqua" id="vDia"></i>
                </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
      
      <!--
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Procurar Cliente">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  </head>
<script type="text/javascript" src="components/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$(function () {
        $.getJSON('solicitacoes.ajax.php?search=',{
            ajax: 'relatorio'}, 
          function(chamado){
            console.log(chamado)
            var tam = chamado.length;
            var data = new Date(chamado[tam-1]);
            var h = chamado[tam-1];
            var f = chamado[tam-2];
            var p = chamado[tam-3];
            var total = p+f+h;
            var tex1 = " Existem "+p+" vacinas para remarcar!";
            var tex2 = " Existem "+f+" vacinas marcadas!";
            var tex3 = " Existem "+h+" vacinas para hoje!";
            $("#vPassadas").text(tex1);
            $("#vAtual").text(tex2);
            $("#vDia").text(tex3);
            $("#total").text(total);
          });
});
</script>