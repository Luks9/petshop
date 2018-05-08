<?php  
	$cliente = $_GET['cliente'];
	include ('../conectarBD.php');
	$stmt = $conexao_pdo->prepare("SELECT * FROM pet WHERE id_cliente = $cliente");
                $stmt->execute();
                $result = array();
                while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;
              	}
      			if (empty($result)) {
              		echo "vazio";
              	}else{
              		echo (json_encode($result));
              	}
?>