<?php
  include ('_top.php');
?>
<style type="text/css">
	.tabelaEditavel .celulaEmEdicao input[type=text]{
    width:100%;
    border:0;
    background-color:rgb(255,253,210);  
}
</style>
  <body>
  	<div class="container">
  		<div class="panel panel-primary">
		  	<!-- Default panel contents -->
		  	<div class="panel-heading"> Vacinas Agendadas </div>
		  		<!-- Table -->
			  <table class="table " id="table_1">
			  	<thead>
				  <tr>
				  	<th>Cliente</th>
				  	<th>cidade</th>
				  	<th>Telefone</th>
				  	<th>Telefone 2</th>
				  	<th>Pet</th>
				  	<th>Vacina</th>
				  	<th>Data da Vacina</th>
				  	<th>Ver</th>
				  </tr>
				</thead>
				<tbody>  
			  <?php  
			  	include ('conectarBD.php');
				$stmt = $conexao_pdo->prepare("SELECT * FROM vacinas, clientes, pet WHERE status = true and pet.id_cliente=clientes.ID AND vacinas.id_pet=pet.id");
                $stmt->execute();
                $cliente = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $cliente = $r;
                  	//$tel = "(".substr($cliente['telefone'],0,2).")".substr($cliente['telefone'],3,4)."-".substr($cliente['telefone'],5);
                  	//$tel2 = "(".substr($cliente['telefone_2'],0,2).")".substr($cliente['telefone_2'],3,4)."-".substr($cliente['telefone_2'],5);
                  $data = explode("-", $cliente['data']);
                  $date = $data[2]."-".$data[1]."-".$data[0];
                  $dataAtual = strtotime(date("Y-m-d")); 
                  $data = strtotime($cliente['data']);
                  if ($dataAtual < $data) {
                    $dataSpan = "<span class='label label-success'>".$date."</span>";
                  }elseif ($dataAtual == $data) {
                      $dataSpan = "<span class='label label-info'>".$date."</span><i class='fa fa-star text-yellow'> </i>";
                  }else{
                    $dataSpan = "<span class='label label-danger'>".$date."</span>";
                  }
              		echo "<tr>";
				  	echo "<td>".$cliente['nome'] ."</td>";
				  	echo "<td>".$cliente['cidade'] ."</td>";
				  	echo "<td>".$cliente['telefone'] ."</td>";
				  	echo "<td>".$cliente['telefone_2'] ."</td>";
				  	echo "<td>".$cliente['nome_pet'] ."</td>";
				  	echo "<td>".$cliente['nome_vacina'] ."</td>";
				  	echo "<td>".$dataSpan."</td>";
				  	echo "<td><button type='button' class='btn btn-default' data-toggle='modal' data-target='.bd-example-modal-lg' onclick='idfunction(\"" . $cliente['id'] . "\", 
                  \"" .$cliente['nome']. "\",
                  \"" . $cliente['cidade'] . "\",
                  \"" . $cliente['telefone'] . "\",
                  \"" . $cliente['telefone_2'] . "\",
                  \"" . $cliente['nome_pet'] . "\",
                  \"" . $cliente['nome_vacina'] . "\",
                  \"" . $cliente['data'] . "\",
                  \"" . $cliente['id_vacina']. "\",
                  \"" . $cliente['obs']. "\",
                  \"" . $cliente['status']. "\");'><span class='glyphicon glyphicon-search edit' aria-hidden='true'></span></button></td>";
			  		echo "</tr>";
                  }			  	

			  ?>
			  </tbody>
			  </table>
		  	</div> 
		  	<br>
	    <div class="panel panel-success">
		  <!-- Default panel contents -->
		  <div class="panel-heading"> CLIENTES </div>
			  
			  <!-- Table -->
			  <table class="table" id="table_2">
			  <thead>
			  <tr>
          <th name="celId">ID</th>
			  	<th>Nome</th>
			  	<th>CPF</th>
			  	<th>Telefone</th>
			  	<th>Telefone 2</th>
			  	<th>Endereço</th>
			  	<th>Cidade</th>
			  	<th>Editar</th>
          <th>Excluir</th>
			  </tr>
			  </thead>
			  <tbody>
			  <?php  
				$stmt = $conexao_pdo->prepare("SELECT * FROM clientes");
                $stmt->execute();
                $cliente = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $cliente = $r;
              		echo "<tr>";
            echo "<td name= 'celId'>".$cliente['ID'] ."</td>";
				  	echo "<td>".$cliente['nome'] ."</td>";
				  	echo "<td>".$cliente['cpf'] ."</td>";
				  	echo "<td>".$cliente['telefone'] ."</td>";
				  	echo "<td>".$cliente['telefone_2'] ."</td>";
				  	echo "<td>".$cliente['endereco'] ."</td>";
				  	echo "<td>".$cliente['cidade'] ."</td>";
				  	echo "<td><button type='button' id='edit' class='btn btn-default'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></td>";
            echo "<td><button type='button' id='erase' class='btn btn-default'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button></td>";
			  		echo "</tr>";
                  }			  	

			  ?>
			  </tbody>
			  </table>
			
	</div>
	<footer class="main-footer">
      	<div class="container">
        	<p class="text-muted"><b>L</b>ucas<b>A</b>lves -<i> Desenvolvimento FreeLance. </i><a href="https://www.facebook.com/lucasjalves" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></p>

      	</div>
	</footer>	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="components/Gritter-master/js/jquery.gritter.js"></script>
    
  </body>
  <form method="POST" id="formAux">
  	<input type="hidden" name="a1" id="a1">
  	<input type="hidden" name="a2" id="a2">
  	<input type="hidden" name="a3" id="a3">
  	<input type="hidden" name="a4" id="a4">
  	<input type="hidden" name="a5" id="a5">
  	<input type="hidden" name="a6" id="a6">
    <input type="hidden" name="a7" id="a7">
  </form>
</html>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">INFORMAÇÕES DA VACINA</h3>
      </div>
      <div class="modal-body">
        <p id="info"></p>
        <form method="POST" id="formModal">  
        <label for="data">VACINA APLICADA?</label>
        <div class="col-md-3">
          <label>DATA DA VACINA:</label>  
        </div>
        <div class="form-group">
            <input type="hidden" name="id_vacina" id="id_vacina">
            <div class="col-md-3">
              <input id="data" name="data" type="date" class="form-control input-md">
            </div>

              <div class="col-md-4">
                <input id="status" type="checkbox" name="status" unchecked>
              </div>
          <br/>
          
        </div>
        <div class="form-group">

        </div>
        
      </div>
      <br/>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="components/switch/dist/js/bootstrap-switch.min.js"></script>
<script src="components/dist/jquery.validate.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $("[name='status']").bootstrapSwitch();
    $("[name='status']").bootstrapSwitch('onText', 'SIM');
    $("[name='status']").bootstrapSwitch('offText', 'NÃO');
  	$('.dropdown-toggle').dropdown();
  	$(document).ready(function(){
  		$('#table_1').DataTable();
    	$('#table_2').DataTable();
	});

	$('.edit').on('click', function(){
      var nome = $(this).data('1'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
      var id = $(this).data('id');
       // vamos buscar o valor do atributo data-id
      $('span.nome').text(nome+ ' (id = ' +id+ ')'); // inserir na o nome na pergunta de confirmação dentro da modal
      $('a.delete-yes').attr('href', 'apagar.php?id=' +id); // mudar dinamicamente o link, href do botão confirmar da modal
      $('#editCliente').modal('show'); // modal aparece
	});

$(function () {
    $("#table_2 td").dblclick(function () {
        var name = $(this).attr("name");
        if (name !='celId') { //não deixa editar o ID
          var conteudoOriginal = $(this).text();
          
          $(this).addClass("celulaEmEdicao");
          $(this).html("<input type='text' value='" + conteudoOriginal + "' />");
          $(this).children().first().focus();

          $(this).children().first().keypress(function (e) {
              if (e.which == 13) {
                  var novoConteudo = $(this).val();
                  $(this).parent().text(novoConteudo);
                  $(this).parent().removeClass("celulaEmEdicao");
              }
          });
  		
  	      $(this).children().first().blur(function(){
  		      $(this).parent().text(conteudoOriginal);
  		      $(this).parent().removeClass("celulaEmEdicao");
  	      });
        }     
    });

    
});
function idfunction(id, nome, cidade, tel, tel2, pet, vacina, data, id_vacina, obs){
  var text = "<h4>Informações do Cliente <br/></h4>";
  text += "_____________________________________<br/>";
  text += "<b>CLIENTE: </b>"+nome+"<br/>";
  text += "<b>CIDADE: </b>"+cidade+"<br/>";
  text += "<b>TELEFONE: </b>"+tel+" | "+tel2+"<br/><br/>"
  text += "<h4>Informações do Animal </h4>";
  text += "_____________________________________<br/>";
  text += "<b>NOME DO ANIMAL: </b>"+pet+"<br/>";
  text += "<b>VACINA: </b>"+vacina+"<br/>";
  text += "<b>OBSERVAÇÃO: </b>"+obs+"<br/>";
  $("#data").val(data);
  $("#info").html(text);
  $("#id_vacina").val(id_vacina);
  //console.log(id_vacina);
}
$("#table_2 button").click(function(){
  var id = $(this).attr("id"); 
    if (id == 'edit') {
    	
      var linha=[];
    	for (var i = 1; i < 8; i++) { //pegar elementos das linhas da tabela
    		linha[i]  = $(this)                       // $(this) representa a celula
                            .parent()               // Navega para o elemento pai (td)
                            .parent()              // Navega para o pai de td (tr)
                            .find(':nth-child('+i+')') // Encontra o elemento do seletor
                            .html();  
             $("#a"+i).val("");
             $("#a"+i).val(linha[i]);
    	}

    	var dados = $("#formAux").serialize();
      //console.log(dados);
    	$.ajax({
        type: "POST",
        url: "/petshop/php/editCliente.php",
        data: dados,
        success: function( data ) {
          if (data){
            $.gritter.add({
              // (string | mandatory) the heading of the notification
              title: 'Ok',
              // (string | mandatory) the text inside the notification
              text: 'Usuario editado com sucesso!',
              // (string | optional) the image to display on the left
              image: 'img/shield-ok-icon.png',
              // (bool | optional) if you want it to fade out on its own or just sit there
              sticky: false,
              // (int | optional) the time you want it to be alive for before fading out
              time: '',
              class_name: 'gritter-blue'
            });
            window.setTimeout('location.reload()', 2000);
          }
        }
      });
      //apagar cliente
    }else if (id == "erase") {
      var apagar = confirm("Você deseja realmente apagar esse cliente?");
      if (apagar) {
        var linha=[];
        for (var i = 1; i < 8; i++) { //pegar elementos das linhas da tabela
          linha[i]  = $(this)                       // $(this) representa a celula
                              .parent()               // Navega para o elemento pai (td)
                              .parent()              // Navega para o pai de td (tr)
                              .find(':nth-child('+i+')') // Encontra o elemento do seletor
                              .html();  
               $("#a"+i).val("");
               $("#a"+i).val(linha[i]);
        }
        var dados = $("#formAux").serialize();
        $.ajax({
          type: "POST",
          url: "/petshop/php/apagar_cliente.php",
          data: dados,
          success: function( data ) {
            if (data){
              $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'Apagado',
                // (string | mandatory) the text inside the notification
                text: 'Usuario apagado com sucesso!',
                // (string | optional) the image to display on the left
                image: 'img/shield-ok-icon.png',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (int | optional) the time you want it to be alive for before fading out
                time: '',
                class_name: 'gritter-blue'
              });
              window.setTimeout('location.reload()', 2000);
            }
          }
        });
      }
    }
  });

jQuery(document).ready(function () {
  //Script para logar via ajax
  $('#formModal').validate({
    submitHandler: function( form ){
      var dados = $( form ).serialize();
      $.ajax({
        type: "POST",
        url: "/petshop/php/editVacina.php",
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
            window.setTimeout("location.href='./index.php'",1000);
          }else if(data == false) {
            jQuery.gritter.add({
              title: 'Erro no Formulario',
              text: 'Erro!',
              class_name: 'growl-danger',
              image: '../dist/img/shield-error-icon.png',
              sticky: false,
              time: '2000',
            });
            window.setTimeout("location.href='./index.php'",1000);
          }
        }
      });
      return false;
    }
  });
});
</script>