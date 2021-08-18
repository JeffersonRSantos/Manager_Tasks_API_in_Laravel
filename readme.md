## Instruções da executar

1. Clone o diretório com:
    1. git clone git@github.com:JeffersonRSantos/manager-tasks-api.git

2. Duplique o arquivo .env-exemple para dentro do diretório backend, e renomeie para .env

3. Informe uma conexão de banco de dados em .env, para rodar as migrations

4. Execute:
    1. composer install
    2. npm install
    3. php artisan key:generate
    4. php artisan migrate

5. Inicie o servidor na porta 9090: 
    1. php artisa serve --port=9090


* obs: Caso precise, limpe o cache da aplicação com o comando: 
    composer run-script clear-project-cache
