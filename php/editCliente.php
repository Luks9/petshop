<?php
        require('../conectarBD.php');
        if ( isset( $_POST )) {
		// Cria as variáveis
			foreach ( $_POST as $chave => $valor ) {
				$$chave = $valor;
			}

				// Se o usuário não existir, return false pro ajax
				//} else {
				$pdo_insere = $conexao_pdo->prepare("UPDATE clientes SET nome = ?, cpf = ?, telefone = ?, telefone_2 = ?, endereco =?, cidade =? WHERE ID ='$a1';");
				$pdo_insere->execute( array($a2, $a3, $a4, $a5, $a6, $a7) );

			echo true;
	}
?>