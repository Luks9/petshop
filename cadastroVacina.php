<?php
  include ('_top.php');
?>
<body>
	<div class="container">
  		<div class="panel panel-default">
		  	<!-- Default panel contents -->
		  	<div class="panel-heading"> Cadastrar Vacinas</div>
		  	<p> </p>
		  	<form class="form-horizontal" id="form_vacina">
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="nome">Nome Vacina</label>  
			  <div class="col-md-4">
			  <input id="nome" name="nome" type="text" placeholder="Nome e Sobrenome" class="form-control input-md" required="">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="CPF">Data</label>  
			  <div class="col-md-2">
			  <input id="data" name="data" type="date" class="form-control input-md">
			  </div>
			</div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="Agendado">Agendado</label>  
        <div class="col-md-2">
          <input id="status" type="checkbox" name="status" checked>
        </div>
      </div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="Cliente">Cliente</label>  
			  <div class="col-md-6">
			  <select id="id_cliente" name="id_cliente" class="js-example-basic-single col-xs-6 input-md">
			  		<option selected="" disabled="">Cliente...</option>
  					<?php
  					include ('conectarBD.php');
					$stmt = $conexao_pdo->prepare("SELECT id, nome FROM clientes");
	                $stmt->execute();
	                $cliente = array();
	                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
	                  	$cliente = $r;
  						echo "<option value=".$cliente['id'].">".$cliente['nome']."</option>";
  					}
  					?>
				</select>
			  </div>
			</div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="Pet">Pet</label>  
        <div class="col-md-4">
        <select id="pet" name="pet" class="form-control col-xs-6">
          <option selected="" disabled="">Escolha um Pet</option>
           <script type="text/javascript">
             function carregarPet(cliente){
              var url ="/petshop/php/carregarPet.php?cliente="+cliente; 
              $.ajax({
              type: "GET",
              url: url,
              data: cliente,
              success: function( data ) {
                console.log(data);
                if (data =="vazio") {
                  $('#pet').find('option:not(:first)').remove();
                  jQuery.gritter.add({
                    title: 'ERRO!',
                    text: 'Cadastre um Pet para esse cliente',
                    class_name: 'growl-danger',
                    image: 'img/shield-error-icon.png',
                    sticky: false,
                    time: '4000',
                  });
                }else{
                  var data = JSON.parse(data);
                  var len = data.length;
                  for(i=0; i<len; i++){
                    $('#pet')
                    .append($("<option></option>")
                    .attr("value",data[i].id)
                    .text(data[i].nome_pet)); 
                  }
                }
              }
              });
             }
           </script> 
        </select>
        </div>
      </div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="Endereço">Observação</label>  
			  <div class="col-md-4">
			  <textarea id="obs" name="obs" class="form-control" placeholder="" maxlength="100"></textarea> 
			  </div>
			</div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-edit"></i> Cadastrar
              </button>
            </div>
<br>
			</form>

	  	</div>
	</div>
</body>
<footer class="main-footer">
        <div class="container">
          <p class="text-muted"><b>L</b>ucas<b>A</b>lves -<i> Desenvolvimento FreeLance. </i><a href="https://www.facebook.com/lucasjalves" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></p>

        </div>
  </footer> 

<script src="components/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="components/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="components/Gritter-master/js/jquery.gritter.js"></script>
<script type="text/javascript" src="components/select2-4.0.3/dist/js/select2.min.js"></script>
<script type="text/javascript" src="components/switch/dist/js/bootstrap-switch.min.js"></script>

<script type="text/javascript">
	$(".js-example-basic-single").select2();
  $('#id_cliente').on('change', function() {
    var cliente = $('#id_cliente').val();
    carregarPet(cliente);
  });
  $("[name='status']").bootstrapSwitch();
</script>

<script type="text/javascript">
	jQuery(document).ready(function () {
  //Script para logar via ajax
  $('#form_vacina').validate({
    submitHandler: function( form ){
      var dados = $( form ).serialize();
      console.log(dados);
      $.ajax({
        type: "POST",
        url: "/petshop/php/salvarVacina.php",
        data: dados,
        success: function( data ) {
          console.log(data);
          if (data == true) {
            jQuery.gritter.add({
              title: 'Salvo com Sucesso !',
              text: 'Aguarde...',
              class_name: 'growl-success',
              image: 'img/shield-ok-icon.png',
              sticky: false,
              time: '5000',
            });
            window.setTimeout("location.href='./cadastroVacina.php'",1000);
          }else if(data == false) {
            jQuery.gritter.add({
              title: 'Erro no Formulario',
              text: 'Erro!',
              class_name: 'growl-danger',
              image: '../dist/img/shield-error-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='./cadastroVacina.php'",1000);
          }
        }
      });
      return false;
    }
  });
});
</script>