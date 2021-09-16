<?php
    require 'editar/configuracoes.inc.php';

    $tema="preto"; // "branco" ou "preto"


    if($tema=="preto"){
    	$css="css/main.css";
    }elseif($tema=="branco"){
    	$css="css/main2.css";
    }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Painel de Gerenciamento de Conteúdo</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="<?=$css;?>">
</head>
<body class="login">
	<div class="form">
		<form method="post" action="valida.php">
			<?php
			if(file_exists($logotipo)){
				echo '
					<a href="<?php echo $url_painel; ?>">
						<img src="'.$logotipo.'" alt="" style="max-width:320px; max-height:100px; margin:10px auto; display:block;" />
					</a>
				';
			}else{
				echo '<div class="title">Painel Admin</div>';
			}
			?>
			
			<input type="text" name="usuario" maxlength="50" placeholder="Digite seu Login"/>
			<input type="password" name="senha" maxlength="50" placeholder="Digite sua Senha"/>
			<input type="submit" value="Entrar" />
		</form>
	</div>
	
</body>
</html>