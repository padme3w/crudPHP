<html>
<head>
    <meta charset="utf8"/>
    <title>Documentação do framework</title>
    <style>
    red{
        color:red;
    }
    pre{
        color:#312c51;
    }
    h3{
        background-color: #eee;
        border-top:1px solid black;
        border-bottom:1px solid black;
    }
    h4{
        background-color: #eee;
    }
    </style>
</head>
<body>

<h3>Índice</h3>
<a href="#instalacao">Instalação</a><br/>
<a href="#mvc">MVC</a><br/>
<a href="#crud">Criando um CRUD</a><br/>
<a href="<?=route("usuarios")?>">Exemplo do CRUD</a><br/>
<a href="#obs">Observações</a><br/>

<a id="instalacao"></a>
<h3>Instalação</h3>


<h4>Diretório do apache</h4>

<p>Extraia toda a pasta do projeto para o diretório do apache:</p>

<h5>Windows</h5>
<p>No Windows tem que ser o diretório <b>htdocs</b>, tanto no xampp, wampp ou apache (depende de qual você estiver usando): <b>Ex: c:/xampp/htdocs/<red>NOME_DO_PROJETO</red></b></p>

<h5>Linux</h5>
<p>No Linux normalmente é /var/www/<red>NOME_DO_PROJETO</red> ou /var/www/html/<red>NOME_DO_PROJETO</red></p>

<p>Altere o trecho 'NOME_DO_PROJETO' para o nome real da pasta onde está seu projeto.</p>

<h4>Configuração do mod_rewrite</h4>

<p>Caso você esteja usando o XAMPP pode pular para <a href='#mvc'>MVC</a>, pois já vem configurado.</p>


<h5>Windows</h5>
<p>No WINDOWS Encontre o arquivo C:\xampp\apache\conf\<b>http.conf</b></p>

<p>Encontre a linha abaixo e remova o "#":</p>
<pre>
<red>#</red>LoadModule rewrite_module modules/mod_rewrite.so
</pre>

<p>Encontre o trecho que possui as tags de diretório e modifique para:</p>
<pre>
<b>#troque esse</b>
&lt;Directory />
    Options FollowSymLinks
    AllowOverride None
    Order deny,allow
    Deny from all
&lt;/Directory>

<b>#por esse</b>
&lt;Directory />
    Options All
    AllowOverride All
&lt;/Directory>
</pre>

<p>Ainda nesse arquivo encontre todos os locais que possui <red>AllowOverride None</red> e troque para: <red>AllowOverride All</red></p>

<p>Reinicie o xampp</p>

<h5>Linux</h5>

<p>Altere esse arquivo para permitir o mod_rewrite no diretório do seu projeto:</p>
<pre>
sudo nano /etc/apache2/sites-available/<red>000-default.conf</red>
</pre>

<p>Dentro desse arquivo adicione, de acordo com o nome da pasta do seu projeto:</p>

<pre>
&lt;VirtualHost *:80>
        # The ServerName directive sets the request scheme, hostname and port that
        # the server uses to identify itself. This is used when creating
        # redirection URLs. In the context of virtual hosts, the ServerName
        # specifies what hostname must appear in the request's Host: header to
        # match this virtual host. For the default virtual host (this file) this
        # value is not decisive as it is used as a last resort host regardless.
        # However, you must set it for any further virtual host explicitly.
        #ServerName www.example.com

        ServerAdmin webmaster@localhost

        <red>&lt;Directory "/var/www/html/<b>NOME_DO_PROJETO</b>">
             AllowOverride All
        &lt;/Directory></red>

</pre>

<p>Execute os seguintes comandos:</p>
<pre>
sudo a2enmod rewrite
sudo service apache2 restart
</pre>


<a id="mvc"></a>
<h3>MVC</h3>

<h4>O que é o padrão?</h4>

<img src="<?=assets('imgs/mvc.png')?>">

<h4>Fluxo</h4>
<p>A parte mais complicada do MVC é entender o fluxo das requisições, sempre que o usuário pedir algo, isso será resolvido pelo controle,
    que, se necessário irá verificar com o banco e enviar para a view responsável.</p>

<img src="<?=assets('imgs/fluxo.png')?>">

<h4>Funcionamento das URLs</h4>

<p>O usuário sempre pedirá ao controle, por esse movtivo o controller é o primeiro item da URL, o método daquele controle é o segundo, e se necessário pode haver mais partes na url que serão parâmetros para o método.</p>

<img src="<?=assets('imgs/mvc-url.png')?>">



<a id="crud"></a>
<h3>Exemplo de CRUD</h3>

<p>Este projeto contém um exemplo de um CRUD de usuários, para a criação do CRUD foi necessário:</p>

<ol>
    <li>Configurar o banco de dados dentro de <b>app/sys/config.php</b></li>
    <li>Definir o esquema da tabela no banco de dados em <b>app/database/tables.sql</b></li>
    <li>Migrar/criar de fato as tabelas para o banco acessando <a href="<?=$server_url ?>migrate.php"><?=$server_url ?>migrate.php</a>.
        Cuidado, toda vez que esse endereço for acessado ele irá executar todos os SQLs do tables.sql, isso pode apagar todo o seu banco. </li>

    <li>Criar o model Usuario em <b>app/models/Usuario.php</b> </li>
    <li>Criar o controller UsuariosController em <b>app/controllers/UsuariosControllers.php</b> </li>
    <li>Criar a view usuarios em <b>app/views/usuarios.php</b> </li>

</ol>

<p>Você pode acessar o exemplo em <a href="<?=route("usuarios")?>"><?=route("usuarios")?></a> </p>


<a id="obs"></a>
<h3>Observações</h3>

<p>Você terá disponível a qualquer momento algumas funções e variáveis:</p>

<table>
    <tr>
        <td>$server_url</td>
        <td>
            Entrega para você o endereço root do seu projeto: <?=$server_url?>.
            Essa função está disponível nas views, caso queira usar em um controller, primeiramente é preciso usar global $server_url;
        </td>
    </tr>
    <tr>
        <td>route('usuarios')</td>
        <td>
            Entrega para você o endereço para algum controle: <?=route('usuarios')?>
            Evite criar qualquer tipo de link sem essa função.
        </td>
    </tr>
    <tr>
        <td>assets('arquivo.js')</td>
        <td>
            Entrega para você o endereço para algum arquivo dentro da pasta public: <?=assets('arquivo.js')?>
            Evite incluir qualquer arquivo sem essa função.
        </td>
    </tr>
    <tr>
        <td>_v($_POST,"nome")</td>
        <td>
            Essa função primeiro verifica se a chave existe no array, se existir entregará o valor, se não existir ela entregará um valor em branco.
            Caso você tente puxar um valor que não existe, o PHP irá dar erro, use essa função para evitar erros.
        </td>
    </tr>
</table>

<p>Por fim, caso você precise de novas funções globais, inclua-as em <b>app/sys/util.php<b></p>


</body>
</html>
