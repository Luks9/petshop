<?php
  include ('_top.php');
?>
<body>
	<div class="container">
  		<div class="panel panel-default">
		  	<!-- Default panel contents -->
		  	<div class="panel-heading"> Cadastrar Pet</div>
		  	<p> </p>
		  	<form class="form-horizontal" id="form_pet">
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="nome">Nome Pet</label>  
			  <div class="col-md-4">
			  <input id="nome_pet" name="nome_pet" type="text" placeholder="Nome do Animal" class="form-control input-md" required="">
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="Cliente">Tipo</label>  
			  <div class="col-md-4">
			  <select name="tipo_animal" id="tipo_animal" class="js-example-basic-single col-xs-6">
			  		<option selected="" disabled="">Tipo Animal</option>
  					<?php
  					include ('conectarBD.php');
					$stmt = $conexao_pdo->prepare("SELECT * FROM tipo_animais");
	                $stmt->execute();
	                $pet = array();
	                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
	                  	$pet = $r;
  						echo "<option value=".$pet['tipo_animal'].">".$pet['tipo_animal']."</option>";
  					}
  					?>
				</select>
			  </div>
			</div>

      			<!-- Text input-->
      			<div class="form-group">
              <label class="col-md-4 control-label" for="Cliente">Cliente</label>  
              <div class="col-md-6">
              <select name="id_cliente" id="id_cliente" class="js-example-basic-single col-xs-6">
                  <option selected="" disabled="">Cliente...</option>
                  <?php
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

<script type="text/javascript">
	$(".js-example-basic-single").select2();
</script>

<script type="text/javascript">
	jQuery(document).ready(function () {
  //Script para logar via ajax
  $('#form_pet').validate({
    submitHandler: function( form ){
      var dados = $( form ).serialize();
      $.ajax({
        type: "POST",
        url: "/petshop/php/salvarPet.php",
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
            window.setTimeout("location.href='./cadastro_pet.php'",1000);
          }else if(data == false) {
            jQuery.gritter.add({
              title: 'Erro no Formulario',
              text: 'Erro!',
              class_name: 'growl-danger',
              image: '../dist/img/shield-error-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='./cadastro_pet.php'",1000);
          }
        }
      });
      return false;
    }
  });
});
</script>