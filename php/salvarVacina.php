<?php
        require('../conectarBD.php');

        // Verifica se algo foi postado para publicar ou editar
        if ( isset( $_POST ) && ! empty( $_POST ) ) {
                // Cria as variáveis
                foreach ( $_POST as $chave => $valor ) {
                        $$chave = $valor;
                }
                    if ($status=='on'){$status = true;}else{$status = false;}

                    $pdo_insere = $conexao_pdo->prepare('INSERT INTO vacinas (nome_vacina, data, obs, id_pet, status) VALUES (?, ?, ?, ?, ?)');
                    $pdo_insere->execute( array($nome, $data, $obs, $pet, $status) );
                    $return = true;
                    echo $return;
        }
?>