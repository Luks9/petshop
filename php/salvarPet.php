<?php
        require('../conectarBD.php');
        $erro = false;
        // Verifica se algo foi postado para publicar ou editar
        if ( isset( $_POST ) && ! empty( $_POST ) ) {
                // Cria as variáveis
                foreach ( $_POST as $chave => $valor ) {
                        $$chave = $valor;
                        // Verifica se existe algum campo em branco
                }
                    $pdo_insere = $conexao_pdo->prepare('INSERT INTO pet (nome_pet, tipo, id_cliente) VALUES (?, ?, ?)');
                    $pdo_insere->execute( array($nome_pet, $tipo_animal, $id_cliente) );
                    $return = true;
                    echo $return;
        }
?>