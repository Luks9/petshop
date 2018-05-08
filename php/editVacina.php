<?php
        require('../conectarBD.php');
        if ( isset( $_POST )) {
		// Cria as variáveis
			foreach ( $_POST as $chave => $valor ) {
				$$chave = $valor;
			}

			if (isset($status)){
				$status = false;
			}else{
				$status = true;
			}
				// Se o usuário não existir, return false pro ajax
				//} else {
				$pdo_insere = $conexao_pdo->prepare("UPDATE vacinas SET data = ?, status = ? WHERE id_vacina ='$id_vacina';");
				$pdo_insere->execute( array($data, $status) );

			echo true;
	}
?>