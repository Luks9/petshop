<?php
include ('conectarBD.php');
	$result = array();
    $dataAtual = date("Y-m-d");
    $dataAtual = strtotime($dataAtual);
    $p=0; $h=0; $f=0;
	$stmt = $conexao_pdo->prepare("SELECT * FROM vacinas, clientes, pet WHERE status = true and pet.id_cliente=clientes.ID AND vacinas.id_pet=pet.id");
    $stmt->execute();
    while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $data = strtotime($r['data']);
      if($dataAtual>$data){
      	$p++;
      }elseif ($dataAtual==$data) {
      	$h++;
      }else{
      	$f++;
      }
      $result[] = $r;
    }
     $result[] = $p;
     $result[] = $f;
     $result[] = $h; 
    echo (json_encode($result));
?>