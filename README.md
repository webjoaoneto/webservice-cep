webservice-cep
==============

Webservice CEP Brasileiro

Esta API é pública e aberta, capaz de retornar a maioria dos CEPS brasileiros via requisições HTTP GET.

Update
==============
100% dos CEP Brasileiros funcionando corretamente.
Banco de dados de CEP com atualização de Jan/2014.


Bugs:
Caso você não encontre um CEP válido, abra um ISSUE e eu farei o possível para adiciona-lo ao repositório o mais rápido possível.

Objetivo do projeto:
Prover um local estável e de alta disponibilidade (Github) para servir os CEPS brasileiros, de forma 100% gratuita e aberta, livre de cadastros indesejáveis e sem restrição de acesso.

A ser desenvolvido:
* APIs com Orientação a Objetos nas linguagens JAVA, RUBY, PHP, .NET e Javascript (Node) com alerta de CEPS não encontrados.

Como Usar
==============

Exemplos - CURL:

#### Para o CEP 01001000:

``curl -s https://raw.githubusercontent.com/joao-gsneto/webservice-cep/master/public/ceps/01/001/000.json``

#### Para o CEP 15014000

``curl -s https://raw.githubusercontent.com/joao-gsneto/webservice-cep/master/public/ceps/15/014/000.json``

#### Exemplo - PHP

Para o CEP 15014000

``file_get_contents('https://raw.githubusercontent.com/joao-gsneto/webservice-cep/master/public/ceps/15/014/000.json');``


Propor atualização
===================

A melhor forma de propor um update nesse banco de dados é enviando-nos o banco de dados de CEP mais atual via sistema dos correios.
O formato aceito pode ser tanto em MDB (Como no programa oficial) como em banco de dados MySQL.
Dessa forma será mais simples a atualização automatica desse repositório, já com os scripts prontos.


Forks e Pull Requests 
==================
Forks e Pull request são bem vindos, como sempre.


Mirrors
=================
Clonar esse repositório e criar um MIRROR hospedando os arquivos também é uma atitude muito bem vinda!
