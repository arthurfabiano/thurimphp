THURIMPHP FRAMEWORK
This README would normally document whatever steps are necessary to get your application up and running.

O QUE JÁ FOI FEITO NO PROJETO
Quick summary
COISAS AINDA PARA FAZER
Summary of set up
ANOTAÇÕES
CORE Núcluo da aplicação todas as classes para gerenciar a lógica coloca-se aqui.

STORAGE Serva para caso o usuário que for usar o fw carregar alguma coisa exemplo arquivos de imagem, etc...

pega tudo que o usuário digitar na url parse_url($_SERVER['resquet_uri'], PHP_URL_PATH);

MODEL As model devem ser criadas no singular. A modela tem que ser criada com o mesmo nome que foi criada a tabela mas no singular... a tabela no banco foi criada em inglês mas o arquivo da modal deve ser criada no singular.

Dentro da model o atributo $table deve ter o mesmo nome que a tabela no banco de dados!

REFERÊNCIAS
CodeIgniter
Laravel