webservice-cep
==============

Webservice CEP Brasileiro

Esta API é pública e aberta, capaz de retornar a maioria dos CEPS brasileiros via requisições HTTP GET.


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
