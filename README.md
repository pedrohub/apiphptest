# apiphptest
App with Rest Contacts and weather conditions page


### Requisitos

Apache server com PHP ou Xampp ou Wamp

PHP 5 ou superior

Banco Mysql 5.5 ou superior

### Instala��o

1. Baixe a aplica��o dispon�vel no link abaixo e coloque no webroot do seu servidor web, caso seja Xampp, colocar na pasta htdocs

	https://github.com/pedrohub/apiphptest/tree/master

2. Executar o script db.sql para criar a estrutura da base de dados, o script esta na pasta scripts do projeto

### RestFull
*Atualmente a api tem 7 opera��es, que contemplam o CRUD de Pessoas e contatos.

Pessoas

* Get Pessoas
* 	http://server:port/bravitest/api/v1/peoples

** Add Peoples with Contact
** http://server:port/bravitest/api/v1/peoples/add 

