<?php
        require('../conectarBD.php');
        if ( isset( $_POST )) {
		// Cria as variáveis
			foreach ( $_POST as $chave => $valor ) {
				$$chave = $valor;
			}

				// Se o usuário não existir, return false pro ajax
				//} else {
				$pdo_insere = $conexao_pdo->prepare("DELETE FROM clientes WHERE ID ='$a1';");
				$pdo_insere->execute();

			echo true;
	}
?>