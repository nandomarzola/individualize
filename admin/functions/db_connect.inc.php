<?php
	//Verifica se consegue se conectar ao banco de dados
	$mysqli = new mysqli($servidor, $usuario, $password, $dbname);

	// Checa se a conexão é valida
	if ($mysqli->connect_error) {
		die("Não conseguimos connectar com o banco de dados: " . $mysqli->connect_error);
	}

	# Codifica todos os dados que recebe ou insere no banco de dados como UTF-8
	ini_set('default_charset','UTF-8');
	mysqli_set_charset('utf8');
	
	# Função que previne SQL Injection
	function _antiSqlInjection($Target){
		$sanitizeRules = array('FROM','SELECT','INSERT','DELETE','WHERE','DROP TABLE','SHOW TABLES');
		foreach($Target as $key => $value):
			if(is_array($value)): $arraSanitized[$key] = _antiSqlInjection($value);
			else:
				$arraSanitized[$key] = (!get_magic_quotes_gpc()) ? addslashes(str_ireplace($sanitizeRules,"",$value)) : str_ireplace($sanitizeRules,"",$value);
			endif;
		endforeach;
		return @$arraSanitized;
	}

	# Aplica a função para os dados recebidos por GET e POST
	$_GET = _antiSqlInjection($_GET);
	$_POST = _antiSqlInjection($_POST);
	
	# Enquanto você está programando o site, é bom você vizualizar estes erros que dão, por isso você deixa esta linha comentada.
	//error_reporting(0);
?>

