<?php


header('X-XSS-Protection: 0');

## OB ##
ob_start();

## Configuracoes ##
require_once("includes/configuracoes.inc.php");

## Classes ##
require_once("includes/database.inc.php");
require_once("class/Consultas.class.php");

## Objetos ##
$c = new Consultas($db);

$institucional = $c->getResult("i9_institucional","WHERE id = '1'");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <base href="<?=BASE_SITE?>" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
    <title>INDIVIDUALIZEJÁ - POLÍTICA DE PRIVACIDADE</title>
    <meta name="author" content="<?=AUTOR_SITE?>">
    <link rel="shortcut icon" href="<?=BASE_SITE;?>assets/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?=BASE_SITE;?>assets/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Owl Carousel -->
    <link href="<?=BASE_SITE;?>assets/js/owl-carousel/css/owl.carousel.css" rel="stylesheet">

    <link rel="stylesheet" href="<?=BASE_SITE;?>assets/css/animate.css">
    <link rel="stylesheet" href="<?=BASE_SITE;?>assets/css/main.css">

    <script src="//code.jivosite.com/widget/YVoQmN8LNo" async></script>

</head>
<body class="_tr">
<div class="wrapper">
    <section class="topo topo-gallery owl-carousel owl-theme">
        <div class="item d-flex align-items-center">
            <div class="col-md-7">
                <div class="topo-imagem" style="background-image: url(<?=BASE_SITE;?>assets/img/uploads/<?php echo $institucional['banner0_img']; ?>);"></div>
            </div>
            <div class="col-md-5">
                <h1><?php echo $institucional['banner0_texto']; ?></h1>
            </div>
        </div>
        <div class="item d-flex align-items-center">
            <div class="col-md-7">
                <div class="topo-imagem" style="background-image: url(<?=BASE_SITE;?>assets/img/uploads/<?php echo $institucional['banner1_img']; ?>);"></div>
            </div>
            <div class="col-md-5">
                <h1><?php echo $institucional['banner1_texto']; ?></h1>
            </div>
        </div>
        <div class="item d-flex align-items-center">
            <div class="col-md-7">
                <div class="topo-imagem" style="background-image: url(<?=BASE_SITE;?>assets/img/uploads/<?php echo $institucional['banner2_img']; ?>);"></div>
            </div>
            <div class="col-md-5">
                <h1><?php echo $institucional['banner2_texto']; ?></h1>
            </div>
        </div>
        <div class="item d-flex align-items-center">
            <div class="col-md-7">
                <div class="topo-imagem" style="background-image: url(<?=BASE_SITE;?>assets/img/uploads/<?php echo $institucional['banner3_img']; ?>);"></div>
            </div>
            <div class="col-md-5">
                <h1><?php echo $institucional['banner3_texto']; ?></h1>
            </div>
        </div>
    </section>
    <div id="container" class="container j-container" style="margin-top: 50px;">
        <div class="row">
            <div id="content" class="col-sm-12">
                <h1 class="heading-title">Política Geral de Privacidade de Dados Pessoais</h1>

                <p style="text-align: justify; ">A presente Política  de Privacidade (“<strong>Política</strong>”) é  disponibilizada pela <strong>i9 Magistral LTDA</strong>., com sede na Alameda dos Maracatins, nº 780, 15º Andar,  Sala 1.502, Indianapolis, CEP: 04089-001, São Paulo/SP, inscrita no CNPJ/ME sob  o nº 24.433.842/0001-03 (“<strong>i9 Magistral</strong>”), para informar e  esclarecer sobre suas práticas relacionadas ao tratamento de dados pessoais. </p>
                <p style="text-align: justify; "><strong><br>Definições<br><br></strong></p>
                <p style="text-align: justify; ">Os termos abaixo elencados terão  os seguintes significados: </p>
                <p style="text-align: justify; "><strong><em><br>“Lei Geral  de Proteção de Dados”</em></strong> ou <strong><em>“LGPD”</em></strong> significa a Lei nº 13.709/2018.<br>
                    <strong><em><br>“Dados  Pessoais”</em></strong> significa quaisquer informações relativas  a uma pessoa física identificada ou identificável, ou que possa ser, direta ou  indiretamente, identificada por meio dessas informações.</p>
                <p style="text-align: justify; "><strong><em><br>“Tratamento”</em></strong> significa toda operação realizada com dados pessoais,  como as que se referem a coleta, produção, recepção, classificação, utilização,  acesso, reprodução, transmissão, distribuição, processamento, arquivamento,  armazenamento, eliminação, avaliação ou controle da informação, modificação,  comunicação, transferência, difusão ou extração.</p>
                <p style="text-align: justify; "><strong><em><br>“Anonimização” </em></strong>significa a utilização de meios técnicos  razoáveis e disponíveis no momento do tratamento, por meio dos quais um dado  perde a possibilidade de associação, direta ou indireta, a um indivíduo.</p><p style="text-align: justify; "><strong><br>1. Considerações iniciais</strong></p><ol>
                </ol>

                <p style="text-align: justify; "><br>A Lei 13.709/2018 (“<strong><u>LGPD</u></strong>”), além de outras normas e leis, estabelece direitos às pessoas em relação ao uso dos  seus dados pelas organizações (“<strong><u>Legislação  Aplicável</u></strong>").&nbsp;De acordo com a Legislação Aplicável, o  tratamento de dados pessoais deve ser norteado por uma série de princípios, em  especial o da transparência.</p>
                <p style="text-align: justify; "><br>Em cumprimento à Legislação  Aplicável e às melhores práticas sobre privacidade, a i9 Magistral  disponibiliza esta Política para que você tenha conhecimento sobre os  propósitos e formas de tratamento de dados pessoais. </p>
                <p style="text-align: justify; "><br>Tratamos os dados  pessoais com o máximo cuidado, seguindo a Legislação Aplicável e implementando  procedimentos operacionais eficazes para garantir a conformidade no uso de  dados pessoais.</p><p style="text-align: justify; "><br></p><p style="text-align: justify; "> </p>
                <ol>
                </ol><p style="text-align: justify; "><b>2.&nbsp;Dados  coletados e tratados&nbsp; </b></p><p style="text-align: justify; ">&nbsp;</p><ol>
                </ol>

                <p style="text-align: justify; ">A i9 Magistral  compreende a importância do uso responsável dos dados pessoais e atua de forma  transparente, com estrita observância aos propósitos a que se destinam os  tratamentos, mediante a coleta dos dados minimamente necessários para que possa  exercer suas atividades.&nbsp; <br>
                    Abaixo listamos os dados pessoais, finalidades e respectivos tipos de  titulares de dados que são coletados e tratados em  nossa organização:</p><p style="text-align: justify; "><strong><em><br></em></strong></p><p style="text-align: justify; "><strong><em>a. Website</em></strong><strong> – Clientes</strong></p>

                <ul>


                </ul><ul><li>&nbsp;Dados de  identificação pessoal, tais como nome, sobrenome, área de atuação e área de  formação;&nbsp;</li><li>Dados de  contato, tais como e-mail, número de telefone, cidade e estado;</li><li>Dados  corporativos e de interesse, tais como nome da empresa, preferência de conteúdo  etc. </li>
                </ul>
                <p style="text-align: justify; ">Os dados  são coletados diretamente do titular, quando este efetua o cadastro na área do  cliente em nosso <em>website</em>.<br>
                    Mantemos o  cadastro de clientes para realizar contatos e executar rotinas financeiras,  administrativas e operacionais, além de comunicação de <em>marketing</em>.</p><p style="text-align: justify; "><strong><em><br></em></strong></p><p style="text-align: justify; "><strong><em>b. Website</em></strong><strong> - Visitantes</strong></p>
                <p style="text-align: justify; ">&nbsp;</p>
                <p style="text-align: justify; ">Através do nosso <em>website</em> podem  ser coletados alguns dados dos visitantes que espontaneamente preencham os  formulários “fale conosco” e “envie-nos uma mensagem”. Dentre eles estão dados  básicos de identificação como nome, e-mail, telefone, endereço, nome da  empresa, CNPJ e estado ou país.</p><p style="text-align: justify; "><strong><em><br></em></strong></p><p style="text-align: justify; "><strong><em>c. Website</em></strong><strong> –  Trabalhe conosco</strong></p>
                <p style="text-align: justify; ">&nbsp;</p>
                <p style="text-align: justify; ">Através do  nosso website, mantemos um canal aberto para recebimento de currículos. Ao  preencher o formulário no link “trabalhe conosco” com a finalidade de se  candidatar a uma vaga, o titular fornecerá dados de identificação, como “nome”,  “área de interesse”, “e-mail”, “telefone”, “endereço do Linkedln”, “endereço do  Facebook”, além de uma mensagem e do currículo. </p>
                <p style="text-align: justify; ">Os dados pessoais serão  acessados e utilizados pela nossa área de RH para identificação e seleção de  candidatos cujo perfil se enquadre nas oportunidades existentes.</p>
                <p style="text-align: justify; "><strong>&nbsp;</strong></p>
                <p style="text-align: justify; "><strong><i>Uso de Cookies</i></strong></p><p style="text-align: justify; "><strong><em><br></em></strong></p>
                <p style="text-align: justify; ">Quando uma pessoa visita nosso<em>website</em> são inseridos identificadores,  chamados de <em>cookies</em>, no navegador ou dispositivo desse visitante, que  nos informam sobre a interação dele com as páginas e recursos em nosso<em> website</em>. Um arquivo de <em>cookie</em> pode conter informações que o <em>website </em>utiliza para interagir com o visitante de forma individualizada e para  adaptar a experiência da internet às suas preferências. </p>
                <p style="text-align: justify; "><br>De maneira geral, certos <em>cookies</em> permitem que o<em> website </em>reconheça o usuário apenas durante sua visita  (chamados de “<em>cookies</em> de sessão”), ou permitem que estas plataformas  reconheçam o usuário em eventuais visitas futuras (são chamados de “<em>cookies</em> persistentes”).</p>
                <p style="text-align: justify; "><br>Os <em>cookies</em> podem servir  para diversas finalidades, como permitir navegar entre páginas de forma  eficiente, armazenar preferências e, em geral, aprimorar a experiência em um  website. Os <em>cookies </em>permitem interação entre o usuário e o <em>website</em>&nbsp;&nbsp; de maneira mais rápida e fácil. Também podem  servir para segmentar o envio de propaganda e publicidade (por exemplo, de  acordo com a localização ou hábitos de navegação).&nbsp; </p>
                <p style="text-align: justify; "><br>Se o visitante fornece dados de  contato como parte de sua visita ao nosso <em>website</em>, a i9 Magistral poderá  usar o arquivo de <em>cookies</em> para identificar informações sobre a atividade  dele. A informação coletada a partir de <em>cookies</em> será usada para fins de  marketing da i9 Magistral.</p>
                <p style="text-align: justify; "><br>Algumas páginas do <em>website </em>da i9 Magistral fazem uso de <em>cookies</em> que permitem  avaliar a utilidade das informações disponibilizadas aos visitantes e analisar  a eficácia da estrutura de navegação.&nbsp;</p><p style="text-align: justify; "><br>Os <em>cookies</em> podem ser  primários (são do próprio<em> website </em>visitado) ou podem ser configurados  por outros <em>sites</em> que executam  conteúdo na página que o usuário está visitando (<em>cookies</em> de terceiros).</p><p style="text-align: justify; "><br>Os <em>cookies </em>primários da i9  Magistral poderão armazenar dados pessoais que tenham sido informados pelo  visitante através de formulários, além do endereço <em>IP</em> que é coletado por <em>cookies</em>.</p>
                <p style="text-align: justify; "><br>A i9 Magistral utiliza os  seguintes <em>cookies</em> em seu <em>website</em>:<br><br></p>
                <ul>
                    <li><strong><em>Cookies </em></strong><strong>Essenciais: </strong>são necessários para permitir a movimentação do visitante em nosso <em>website</em> e dar acesso ao seu perfil, a  recursos exclusivos para usuários cadastrados e outras áreas do <em>website</em>. Esses <em>cookies </em>não  coletam informações do usuário que poderiam ser usadas para fins de <em>marketing</em>, nem identificam por onde o  usuário navegou na Internet.<br><br></li><li>&nbsp;<strong><em>Cookies </em></strong><strong>de  Funcionalidade: </strong>registram informações sobre  escolhas que o usuário fez e permitem à i9 Magistral ajustar o <em>website </em>ao perfil do usuário.<br><br></li><li><strong><em>Cookies</em></strong><strong> Analíticos:</strong>&nbsp;são  utilizados para fins de criação e análise estatística, sem coletar informação  de caráter pessoal. Utilizamos <em>cookies</em> do Google<em> Analytics</em> para  coletar informações sobre como visitantes usam nosso site, o comportamento  deles em cada página, produtos visitados etc. Esses&nbsp;<em>cookies</em> coletam dados agregados para nos  fornecer informação sobre como nosso <em>website</em> está sendo utilizado. Os endereços <em>IP</em> coletados são anonimizados pelas próprias ferramentas.<br><br></li><li><strong><em>Cookies</em></strong><strong> de Publicidade Comportamental</strong> – nosso <em>website</em> pode conter publicidade de terceiros, cuja relevância é adaptada ao perfil  individual do usuário com base nos locais de pesquisa em sites  e localização geográfica do endereço <em>IP</em>.<br></li>
                </ul>
                <p style="text-align: justify; "><em><br>Cookies</em> e tecnologias de anúncios como <em>web beacons,  pixels</em> e <em>tags</em> de redes sociais ajudam a oferecer anúncios relevantes  de forma mais eficaz. Eles também nos ajudam a coletar dados agregados para  fins de pesquisas e relatórios de desempenho para anunciantes. Os <em>pixels </em>permitem  compreender e melhorar a oferta de anúncios para os usuários, bem como  identificar quando determinados anúncios já foram apresentados a um determinado  usuário.&nbsp;</p>
                <p style="text-align: justify; "><br>Utilizamos <em>cookies</em> (i) necessários e analíticos,  para melhorar a experiência do visitante em nosso <em>website</em>e nos  permitir oferecer um serviço mais eficiente; e (ii) de terceiros, para  publicidade.</p>
                <p style="text-align: justify; "><br>O  visitante pode recusar ou desabilitar os <em>cookies</em> por meio de configurações do seu navegador. Entretanto, algumas interações em  nosso <em>website&nbsp;</em>podem não funcionar corretamente com os <em>cookies</em> desabilitados.</p>
                <p style="text-align: justify; "><br>Ao navegar em nosso <em>website</em>, o titular poderá ter acesso a  plataformas de terceiros, através de <em>links</em> específicos (Facebook, Twitter, Instagram, Linkedln, Whatsapp, Youtube, Skype,  por exemplo) que podem coletar/tratar dados pessoais e sobre os quais não temos  nenhuma ingerência. Por isso, recomendamos a leitura das políticas de  privacidade próprias desses terceiros.</p><p style="text-align: justify; "><strong><br></strong></p><p style="text-align: justify; "><strong>3. Compartilhamento  com terceiros</strong></p>
                <p style="text-align: justify; ">&nbsp;</p>
                <p style="text-align: justify; ">Na execução de suas legítimas  atividades, a i9 Magistral pode compartilhar dados pessoais com  terceiros/parceiros com a finalidade de armazenamento e gerenciamento das bases  de dados, como, por exemplo, agências de mídia e fornecedores de ferramentas  automatizadas <em>marketing</em> digital. </p>
                <p style="text-align: justify; "><br>A i9 Magistral possui sólido  programa de governança em privacidade de dados, e sob nenhuma hipótese  comercializa dados pessoais, ou os compartilha com terceiros, sem um propósito  legítimo ou em desconformidade com as Leis Aplicáveis.&nbsp;</p><p style="text-align: justify; "><strong><br></strong></p><p style="text-align: justify; "><strong>4. Tempo  de retenção dos dados</strong></p>
                <p style="text-align: justify; ">&nbsp;</p>
                <p style="text-align: justify; ">A não ser  conforme especificamente indicado nesta Política, de modo geral, os dados pessoais  tratados pela i9 Magistral permanecem armazenados  pelo tempo de duração do relacionamento do titular com a nossa organização, ou  pelo tempo necessário aos propósitos legítimos da i9 Magistral na qualidade de controladora dos dados. Dados pessoais  que sejam relevantes para obrigações legais e contábeis serão retidos pelo  tempo necessário de acordo com a Legislação Aplicável.&nbsp;&nbsp;</p><p style="text-align: justify; "><strong><br></strong></p><p style="text-align: justify; "><strong>5. Segurança  da informação</strong></p>
                <p style="text-align: justify; ">&nbsp;</p>
                <p style="text-align: justify; ">A i9 Magistral armazena os dados  pessoais em servidores próprios e de terceiros, tendo pleno compromisso com a  segurança e envidando o esforço necessário na busca da preservação da  integridade e privacidade dos dados pessoais.&nbsp; </p>
                <p style="text-align: justify; "><br>Procuramos adotar medidas técnicas  e administrativas modernas, aptas a proteger os dados pessoais de acessos não  autorizados e de situações acidentais ou ilícitas de destruição, perda,  alteração, divulgação ou qualquer forma de tratamento inadequado ou ilícito.</p><p style="text-align: justify; "><strong><br></strong></p><p style="text-align: justify; "><strong>6. Exercício  de direitos em relação aos dados pessoais</strong></p>
                <p style="text-align: justify; ">&nbsp;</p>
                <p style="text-align: justify; ">Além de outros direitos previstos  no artigo 18 da LGPD, qualquer titular tem o direito de solicitar a confirmação  da existência de tratamento sobre seus dados, bem como o acesso a eles. Poderá,  ainda, solicitar a correção de dados que eventualmente estejam incorretos ou  desatualizados.</p>
                <p style="text-align: justify; "><br>É também assegurado o direito de  exigir a anonimização, o bloqueio ou a eliminação de dados pessoais que se  revelem desnecessários ou cujo tratamento, por qualquer razão, venha a ser  considerado irregular.</p><p style="text-align: justify; "><br></p><p style="text-align: justify; "><b>7. Exercício de direitos em relação aos dados pessoais</b></p><p style="text-align: justify; "><br></p>
                <p style="text-align: justify; ">Para  qualquer comunicação que você deseje manter com a i9 Magistral a respeito do  tratamento de dados pessoais, solicitamos que entre em contato pelo e-mail do  Encarregado responsável (DPO), Daniel K. <a href="mailto:dataprotection@i9magistral.com.br">dataprotection@i9magistral.com.br</a>. O prazo para esse atendimento  será de, no máximo, 15 dias.</p>
                <p style="text-align: justify; "><br>Ao  realizar contato conosco, visando a própria segurança, sigilo e inviolabilidade  dos dados, poderemos solicitar que você nos forneça informações adicionais ou  realize procedimento capaz de confirmar a sua identidade.</p><p style="text-align: justify; "><strong><br></strong></p><p style="text-align: justify; "><strong>8. Revisão  da Política de Privacidade&nbsp;</strong></p>
                <p style="text-align: justify; ">&nbsp;</p>
                <p style="text-align: justify; ">Os termos da presente Política  poderão ser atualizados ou adaptados de tempos em tempos para que reflitam as  nossas atividades, bem como estejam sempre em conformidade com a Legislação  Aplicável e as melhores práticas.</p>

            </div>
        </div>
    </div>A
</div>
<footer>
    <div class="row">SELECT * FROM `i9_formulas` WHERE 1
        <style>
            .politica_privacidade:hover{
                text-decoration: underline !important;
            }
        </style>
        <div class="col-md-9">
            i9 Magistral powered by Capsugel & Chemyunion @ 2020 - Todos os direitos reservados
            Website por Gabi Thomaz<br>
            <small>Website por Gabi Thomaz</small><br/>
            <small><a class="politica_privacidade" href="<?=BASE_SITE.'/politica-de-privacidade.php'?>" target="_blank">
                    Política de privacidade
                </a></small>
        </div>
        <div class="col-md-3 text-right redes">
            <a href="#" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
        </div>
    </div>
</footer>
<!-- >> JS
============================================================================== -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Masks/Validation -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script src="//ajax.microsoft.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>
<script src="<?=BASE_SITE;?>assets/js/validation/masks.js"></script>
<!-- Owl Carousel -->
<script src="<?=BASE_SITE;?>assets/js/owl-carousel/js/owl.carousel.min.js"></script>

<!-- Main Scripts -->
<script src="<?=BASE_SITE;?>assets/js/main.js"></script>
<!-- >> /JS
============================================================================= -->
</body>
</html>



