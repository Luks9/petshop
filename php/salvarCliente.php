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
                    $pdo_insere = $conexao_pdo->prepare('INSERT INTO clientes (nome, cpf, telefone, telefone_2, endereco, cidade) VALUES (?, ?, ?, ?, ?, ?)');
                    $pdo_insere->execute( array($nome, $CPF, $telefone, $telefone2, $endereco, $cidade) );
                    $return = true;
                    echo $return;
        }
?>