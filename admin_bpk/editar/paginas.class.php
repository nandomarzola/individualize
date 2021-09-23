<?php
	class Paginas {

		# Variáveis
		public $tabela, $titulo, $campoID, $campos, $aviso = false;

		# Paginas do Menu sem nível de acesso
		public $paginas_menu = array(
			array('Catálogo', 'i9_categorias','i9_subcategorias','i9_glossario','i9_formulas', 'i9_veiculos'),
			'i9_medicos','i9_area_atuacao',
			array('Institucional', 'i9_institucional','i9_parceiros'),
			'i9_impressoes',
			'adm_usuarios'
		);

		# PÁGINAS POR NÍVEL DE ACESSO
		// public $paginas_menu;
		// function setPaginasMenu($array){
		// 	$this->paginas_menu = $array;
		// }

		# Páginas
		function __construct($pagina){

			# PÁGINAS POR NÍVEL DE ACESSO
			// $nivel = $_SESSION['usuarioNivel'];
			// if($nivel==0):
			// 	$this->setPaginasMenu(array('animes','posts','usuarios','links'));
			// elseif($nivel==1):
			// 	$this->setPaginasMenu(array('animes','posts'));
			// endif;
			switch($pagina):

				# case 'nome_da_tabela':
				# 	$this->tabela = "nome_da_tabela";
				# 	$this->titulo = "Titulo da Tabela";
				# 	$this->campoID = "id";
				#	$this->aviso = array("alerta(sucesso/erro)","Mensagem");
				#	$this->operacoes = array('inserir','listar','editar','deletar');
				#	$this->listar = array('id','campo01','campo02','campo03','select'=>array('tabela','titulo','id'),'acao'=>array('editar'));
				# 	$this->campos = array(
				# 		"input (text)" => array('Nome do Campo:','input',255,'placeholder','type'),
				# 		"select" => array('Nome do Campo:','select','tabela','id','nome'),
				#       "select-multi" => array('Nome do Campo:','select','tabela','id','nome',true),
				# 		"upload-imagem" => array('Logotipo','upload-img','../images/',200,200),
				#		"upload-arquivo" => array('Titulo do Campo','upload-file','../images/'),
				#		"textarea" => array('Titulo do Campo','textarea',1000(ou false=infinito),'placeholder'),
				#		"data" => array('Titulo do Campo','date','placeholder'),
				#		"radiobutton" => array('Nome do Campo:','radio', array('','0' => 'Opção 1', '1' => 'Opção 2', '2' => 'Opção 3', ... )),
				#		"imagem" => array('Imagem','upload-img','../assets/images/uploads/',false,false,'thumb'=>array(270,270,'../assets/images/uploads/','thumb'))
				# 	);
				# break;

				case 'adm_usuarios':
					$this->titulo = "Usuários";
					$this->tabela = "adm_usuarios";
					$this->campoID = "id";
					$this->operacoes = array('inserir','listar','editar');
					$this->listar = array('id','nome','usuario','senha','acao'=>array('editar'));
					$this->campos = array(
						"nome" => array('Nome:','input',255,'Nome:','text'),
						"usuario" => array('Usuário:','input',255,'Usuário:','text'),
						"senha" => array('Senha:','input',255,'Senha:','text')
					);
				break;

				case 'i9_categorias':
					$this->titulo = "Categorias";
					$this->tabela = "i9_categorias";
					$this->campoID = "id";
					$this->operacoes = array('inserir','listar','editar','deletar');
					$this->listar = array('id','nome','acao'=>array('editar','deletar'));
					$this->campos = array(
						"nome" => array('Nome:','input',255,'Nome da Categoria','text'),
						"cor" => array('Cor:','input',255,'Ex. #FFFFFF','text')
					);
				break;

				case 'i9_subcategorias':
					$this->titulo = "Subcategorias";
					$this->tabela = "i9_subcategorias";
					$this->campoID = "id";
					$this->operacoes = array('inserir','listar','editar','deletar');
					$this->listar = array('id','nome','id_categoria'=>array('i9_categorias','nome','id'),'acao'=>array('editar','deletar'));
					$this->campos = array(
						"nome" => array('Nome:','input',255,'Nome da subcategoria','text'),
						"id_categoria" => array('Categoria:','select','i9_categorias','id','nome'),
					);
				break;

				case 'i9_glossario':
					$this->titulo = "Glossário";
					$this->tabela = "i9_glossario";
					$this->campoID = "id";
					$this->operacoes = array('inserir','listar','editar','deletar');
					$this->listar = array('id','nome','descricao','acao'=>array('editar','deletar'));
					$this->campos = array(
						"nome" => array('Nome:','input',255,'','text'),
						"descricao" => array('Descrição:','textarea',255,'')
					);
				break;

				case 'i9_formulas':
					$this->titulo = "Fórmulas";
					$this->tabela = "i9_formulas";
					$this->campoID = "id";
					$this->operacoes = array('inserir','listar','editar','deletar');
					$this->listar = array('id','nome','id_categoria'=>array('i9_categorias','nome','id'),'id_subcategoria'=>array('i9_subcategorias','nome','id'),'acao'=>array('editar','deletar'));
					$this->campos = array(
						"nome" => array('Nome:','input',255,'','text'),
						"descricao" => array('Descrição','textarea',false,''),
						"id_categoria" => array('Categoria:','select','i9_categorias','id','nome'),
						"id_subcategoria" => array('Subcategoria:','select','i9_subcategorias','id','nome'),
						"formulacao" => array('Formulação sugerida:','input',255,'','text'),
						"fabricar" => array('Como fabricar:','textarea',false,''),
						"veiculo" => array('Veículo:','input',255,'','text'),
						"veiculo2" => array('Veículo:','select','i9_veiculos','id','nome'),
						"ativo1" => array('Ativo 1:','select','i9_glossario','id','nome'),
						"composicaoativo1" => array('Concentração:','input',255,'','text'),
						"ativo2" => array('Ativo 2:','select','i9_glossario','id','nome'),
						"composicaoativo2" => array('Concentração:','input',255,'','text'),
						"ativo3" => array('Ativo 3:','select','i9_glossario','id','nome'),
						"composicaoativo3" => array('Concentração:','input',255,'','text'),
						"ativo4" => array('Ativo 4:','select','i9_glossario','id','nome'),
						"composicaoativo4" => array('Concentração:','input',255,'','text'),
						"ativo5" => array('Ativo 5:','select','i9_glossario','id','nome'),
						"composicaoativo5" => array('Concentração:','input',255,'','text'),
						"ativo6" => array('Ativo 6:','select','i9_glossario','id','nome'),
						"composicaoativo6" => array('Concentração:','input',255,'','text'),
						"ativo7" => array('Ativo 7:','select','i9_glossario','id','nome'),
						"composicaoativo7" => array('Concentração:','input',255,'','text'),
						"ativo8" => array('Ativo 8:','select','i9_glossario','id','nome'),
						"composicaoativo8" => array('Concentração:','input',255,'','text'),
						"ativo9" => array('Ativo 9:','select','i9_glossario','id','nome'),
						"composicaoativo9" => array('Concentração:','input',255,'','text'),
						"ativo10" => array('Ativo 10:','select','i9_glossario','id','nome'),
						"composicaoativo10" => array('Concentração:','input',255,'','text'),
						"ativo11" => array('Ativo 11:','select','i9_glossario','id','nome'),
						"composicaoativo11" => array('Concentração:','input',255,'','text'),
						"ativo12" => array('Ativo 12:','select','i9_glossario','id','nome'),
						"composicaoativo12" => array('Concentração:','input',255,'','text'),
						"ativo13" => array('Ativo 13:','select','i9_glossario','id','nome'),
						"composicaoativo13" => array('Concentração:','input',255,'','text'),
						"ativo14" => array('Ativo 14:','select','i9_glossario','id','nome'),
						"composicaoativo14" => array('Concentração:','input',255,'','text'),
						"ativo15" => array('Ativo 15:','select','i9_glossario','id','nome'),
						"composicaoativo15" => array('Concentração:','input',255,'','text'),
						"ativo16" => array('Ativo 16:','select','i9_glossario','id','nome'),
						"composicaoativo16" => array('Concentração:','input',255,'','text'),
						"ativo17" => array('Ativo 17:','select','i9_glossario','id','nome'),
						"composicaoativo17" => array('Concentração:','input',255,'','text'),
						"ativo18" => array('Ativo 18:','select','i9_glossario','id','nome'),
						"composicaoativo18" => array('Concentração:','input',255,'','text'),
						"ativo19" => array('Ativo 19:','select','i9_glossario','id','nome'),
						"composicaoativo19" => array('Concentração:','input',255,'','text'),
						"ativo20" => array('Ativo 20:','select','i9_glossario','id','nome'),
						"composicaoativo20" => array('Concentração:','input',255,'','text'),
						"ativo" => array('Fórmula visível?:','radio', array('','1' => 'Sim', '2' => 'Não'))
					);
				break;

				case 'i9_veiculos':
					$this->titulo = "Veículos";
					$this->tabela = "i9_veiculos";
					$this->campoID = "id";
					$this->operacoes = array('inserir','listar','editar','deletar');
					$this->listar = array('id','nome','id_categoria'=>array('i9_categorias','nome','id'),'id_subcategoria'=>array('i9_subcategorias','nome','id'),'acao'=>array('editar','deletar'));
					$this->campos = array(
						"nome" => array('Nome:','input',255,'','text'),
						"descricao" => array('Descrição','textarea',false,''),
						"id_categoria" => array('Categoria:','select','i9_categorias','id','nome'),
						"id_subcategoria" => array('Subcategoria:','select','i9_subcategorias','id','nome'),
						"formulacao" => array('Formulação sugerida:','input',255,'','text'),
						"fabricar" => array('Como fabricar:','textarea',false,''),
						"excipiente1" => array('Excipiente 1:','select','i9_glossario','id','nome'),
						"composicaoexcipiente1" => array('Concentração:','input',255,'','text'),
						"excipiente2" => array('Excipiente 2:','select','i9_glossario','id','nome'),
						"composicaoexcipiente2" => array('Concentração:','input',255,'','text'),
						"excipiente3" => array('Excipiente 3:','select','i9_glossario','id','nome'),
						"composicaoexcipiente3" => array('Concentração:','input',255,'','text'),
						"excipiente4" => array('Excipiente 4:','select','i9_glossario','id','nome'),
						"composicaoexcipiente4" => array('Concentração:','input',255,'','text'),
						"excipiente5" => array('Excipiente 5:','select','i9_glossario','id','nome'),
						"composicaoexcipiente5" => array('Concentração:','input',255,'','text'),
						"excipiente6" => array('Excipiente 6:','select','i9_glossario','id','nome'),
						"composicaoexcipiente6" => array('Concentração:','input',255,'','text'),
						"excipiente7" => array('Excipiente 7:','select','i9_glossario','id','nome'),
						"composicaoexcipiente7" => array('Concentração:','input',255,'','text'),
						"excipiente8" => array('Excipiente 8:','select','i9_glossario','id','nome'),
						"composicaoexcipiente8" => array('Concentração:','input',255,'','text'),
						"excipiente9" => array('Excipiente 9:','select','i9_glossario','id','nome'),
						"composicaoexcipiente9" => array('Concentração:','input',255,'','text'),
						"excipiente10" => array('Excipiente 10:','select','i9_glossario','id','nome'),
						"composicaoexcipiente10" => array('Concentração:','input',255,'','text'),
						"excipiente11" => array('Excipiente 11:','select','i9_glossario','id','nome'),
						"composicaoexcipiente11" => array('Concentração:','input',255,'','text'),
						"excipiente12" => array('Excipiente 12:','select','i9_glossario','id','nome'),
						"composicaoexcipiente12" => array('Concentração:','input',255,'','text'),
						"excipiente13" => array('Excipiente 13:','select','i9_glossario','id','nome'),
						"composicaoexcipiente13" => array('Concentração:','input',255,'','text'),
						"excipiente14" => array('Excipiente 14:','select','i9_glossario','id','nome'),
						"composicaoexcipiente14" => array('Concentração:','input',255,'','text'),
						"excipiente15" => array('Excipiente 15:','select','i9_glossario','id','nome'),
						"composicaoexcipiente15" => array('Concentração:','input',255,'','text'),
						"excipiente16" => array('Excipiente 16:','select','i9_glossario','id','nome'),
						"composicaoexcipiente16" => array('Concentração:','input',255,'','text'),
						"excipiente17" => array('Excipiente 17:','select','i9_glossario','id','nome'),
						"composicaoexcipiente17" => array('Concentração:','input',255,'','text'),
						"excipiente18" => array('Excipiente 18:','select','i9_glossario','id','nome'),
						"composicaoexcipiente18" => array('Concentração:','input',255,'','text'),
						"excipiente19" => array('Excipiente 19:','select','i9_glossario','id','nome'),
						"composicaoexcipiente19" => array('Concentração:','input',255,'','text'),
						"excipiente20" => array('Excipiente 20:','select','i9_glossario','id','nome'),
						"composicaoexcipiente20" => array('Concentração:','input',255,'','text'),
						"ativo" => array('Veículo visível?:','radio', array('','1' => 'Sim', '2' => 'Não'))
					);
				break;

				case 'i9_medicos':
					$this->titulo = "Médicos";
					$this->tabela = "i9_medicos";
					$this->campoID = "id";
					$this->operacoes = array('inserir','listar','editar','deletar');
					$this->listar = array('id','nome','empresa','email','acao'=>array('editar','deletar'));
					$this->campos = array(
						"nome" => array('Nome:','input',255,'Nome da Categoria','text'),
						"empresa" => array('Empresa:','input',255,'','text'),
						"tipo_identificacao" => array('Tipo de identificacao:','input',255,'','text'),
						"identificacao" => array('Número identificacao:','input',255,'','text'),
						"segmento" => array('Área de atuação:','input',255,'','text'),
						"telefone" => array('Telefone:','input',255,'','text'),
						"endereco" => array('Endereço:','input',255,'','text'),
						"email" => array('E-mail:','input',255,'','text'),
						"senha" => array('Senha:','input',255,'','text'),
						"logo" => array('Logotipo:','upload-img','../assets/img/uploads/',false,false),
						"tipo" => array('Tipo de Cadastro:','radio', array('','1' => 'Médico', '2' => 'Farmacêutico')),
						"status" => array('Status:','radio', array('','1' => 'Habilitado', '2' => 'Desabilitado'))
					);
				break;

				case 'i9_area_atuacao':
					$this->titulo = "Médicos Por Área de Atuação";
					$this->tabela = "i9_area_atuacao";
					$this->campoID = "id";
					$this->operacoes = array('listar');
					$this->listar = array('nome', 'tipo_identificacao', 'identificacao', 'segmento');
					$this->campos = array('');
					break;

				case 'i9_institucional':
					$this->titulo = "Institucional";
					$this->tabela = "i9_institucional";
					$this->campoID = "id";
					$this->operacoes = array('listar','editar');
					$this->listar = array('id','descricao_rapida','acao'=>array('editar'));
					$this->campos = array(
						"titulo_site" => array('Título:','input',255,'','text'),
"banner0_img" => array('Banner imagem 0:','upload-img','../assets/img/uploads/',false,false),
						"banner0_texto" => array('Banner texto 0:','input',255,'','text'),
						"banner0_btn" => array('Banner botão 0 - link:','input',255,'','text'),
						"banner1_img" => array('Banner imagem 1:','upload-img','../assets/img/uploads/',false,false),
						"banner1_texto" => array('Banner texto 1:','input',255,'','text'),
						"banner1_btn" => array('Banner botão 1 - link:','input',255,'','text'),
						"banner2_img" => array('Banner imagem 2:','upload-img','../assets/img/uploads/',false,false),
						"banner2_texto" => array('Banner texto 2:','input',255,'','text'),
						"banner2_btn" => array('Banner botão 2 - link:','input',255,'','text'),
						"banner3_img" => array('Banner imagem 3:','upload-img','../assets/img/uploads/',false,false),
						"banner3_texto" => array('Banner texto 3:','input',255,'','text'),
						"banner3_btn" => array('Banner botão 3 - link:','input',255,'','text'),
						"titulo" => array('Título:','input',255,'','text'),
						"texto_cadastro" => array('Texto de cadastro:','input',255,'','text'),
						"texto_login" => array('Texto de login:','input',255,'','text'),
						"rodape" => array('Rodapé:','input',255,'','text'),
						"descricao_rapida" => array('Descrição:','input',255,'','text'),
						"manipular_1" => array('Quando manipular - Esquerda','textarea',false,''),
						"manipular_2" => array('Quando manipular - Direita','textarea',false,''),
						"diferenciais_1" => array('Diferenciais - Esquerda','textarea',false,''),
						"diferenciais_2" => array('Diferenciais - Direita','textarea',false,''),
						"ecocert_1" => array('Ecocert/Cosmos - Esquerda','textarea',false,''),
						"ecocert_2" => array('Ecocert/Cosmos - Direita','textarea',false,''),
						"ecocert_selo" => array('Selo Ecocert:','upload-img','../assets/img/uploads/',false,false),
					);
				break;

				case 'i9_parceiros':
					$this->titulo = "Parceiros";
					$this->tabela = "i9_parceiros";
					$this->campoID = "id";
					$this->operacoes = array('inserir','listar','editar','deletar');
					$this->listar = array('id','imagem','acao'=>array('editar','deletar'));
					$this->campos = array(
						"imagem" => array('Logotipo:','upload-img','../assets/img/uploads/',false,false),
						"nome" => array('Nome:','input',255,'','text'),
						"link" => array('Link:','input',255,'','text'),
						"descricao" => array('Descrição','textarea',false,''),
					);
				break;

				case 'i9_impressoes':
					$this->titulo = "Histórico de Impressões";
					$this->tabela = "i9_impressoes";
					$this->campoID = "id";
					$this->operacoes = array('listar','editar');
					$this->listar = array('id','id_medico'=>array('i9_medicos','nome','id'),'id_formula'=>array('i9_formulas','nome','id'),'hora','acao'=>array('editar'));
					$this->campos = array(
						"id_medico" => array('Médico:','select','i9_medicos','id','nome'),
						"id_formula" => array('Fórmula:','select','i9_formulas','id','nome'),
						"posologia" => array('Posologia:','input',255,'','text'),
						"quantidade" => array('Quantidade da formulação:','input',255,'','text'),
						"paciente" => array('Paciente:','input',255,'','text'),
						"cidade" => array('Cidade:','input',255,'','text'),
						"hora" => array('Data e hora:','input',255,'','text'),
					);
				break;

			endswitch;
		}
	}
?>
