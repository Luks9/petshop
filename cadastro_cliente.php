<?php
  include ('_top.php');
?>
<body>

	<div class="container">
  		<div class="panel panel-default">
		  	<!-- Default panel contents -->
		  	<div class="panel-heading"> Cadastro de Clientes</div>
		  	<p> </p>
		  	<form class="form-horizontal" id="form_cliente">
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="nome">Nome</label>  
			  <div class="col-md-4">
			  <input id="nome" name="nome" type="text" placeholder="Nome e Sobrenome" class="form-control input-md" required="">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="CPF">CPF</label>  
			  <div class="col-md-2">
			  <input id="CPF" name="CPF" type="text" placeholder="CPF" class="form-control input-md cpf">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="Telefone">Telefone</label>  
			  <div class="col-md-2">
			  <input id="telefone" name="telefone" type="text" placeholder="Telefone" class="form-control input-md telefone" required="">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="elefone2">Telefone 2</label>  
			  <div class="col-md-2">
			  <input id="telefone2" name="telefone2" type="text" placeholder="Telefone 2" class="form-control input-md telefone">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="Endereço">endereço</label>  
			  <div class="col-md-4">
			  <input id="endereco" name="endereco" type="text" placeholder="Endereço" class="form-control input-md">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="Cidade">Cidade</label>  
			  <div class="col-md-4">
			  <input id="cidade" name="cidade" type="text" placeholder="Cidade" class="form-control input-md">
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
<script src="http://digitalbush.com/wp-content/uploads/2014/10/jquery.maskedinput.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function () {
  //Script para logar via ajax
  $('#form_cliente').validate({
    submitHandler: function( form ){
      var dados = $( form ).serialize();
      $.ajax({
        type: "POST",
        url: "/petshop/php/salvarCliente.php",
        data: dados,
        success: function( data ) {
          console.log(dados);
          if (data == true) {
            jQuery.gritter.add({
              title: 'Salvo com Sucesso !',
              text: 'Aguarde...',
              class_name: 'growl-success',
              image: 'img/shield-ok-icon.png',
              sticky: false,
              time: '5000',
            });
            window.setTimeout("location.href='./cadastro_cliente.php'",1000);
          }else if(data == false) {
            jQuery.gritter.add({
              title: 'Erro no Formulario',
              text: 'Erro!',
              class_name: 'growl-danger',
              image: '../dist/img/shield-error-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='./cadastro_cliente.php'",1000);
          }
        }
      });
      return false;
    }
  });
});


	jQuery("input.telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
    });

    jQuery("input.cpf")
        .mask("999.999.999-99")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
                element.mask("999.999.999-99");  
    });    
</script>