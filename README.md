![Logo AI Solutions](http://aisolutions.tec.br/wp-content/uploads/sites/2/2019/04/logo.png)

# AI Solutions

## Teste para novos candidatos (PHP/Laravel)
## Fork desenvolvido por Rodrigo Mangini (rjmangini@gmail.com / https://www.linkedin.com/in/rjmangini/)

### Introdução

Este teste utiliza PHP 8.1, Laravel 10 e um banco de dados SQLite simples.

1. Faça o clone desse repositório;
1. Execute o `composer install`;
1. Crie e ajuste o `.env` conforme necessário
1. Execute as migrations e os seeders;

### Primeira Tarefa:

Crítica das Migrations e Seeders: Aponte problemas, se houver, e solucione; Implemente melhorias;

### Segunda Tarefa:

Crie a estrutura completa de uma tela que permita adicionar a importação do arquivo `storage/data/2023-03-28.json`, para a tabela `documents`. onde cada registro representado neste arquivo seja adicionado a uma fila para importação.

Feito isso crie uma tela com um botão simples que dispara o processamento desta fila.

Utilize os padrões que preferir para as tarefas.

### Terceira Tarefa:

Crie um test unitário que valide o tamanho máximo do campo conteúdo.

Crie um test unitário que valide a seguinte regra:

Se a categoria for "Remessa" o título do registro deve conter a palavra "semestre", caso contrário deve emitir um erro de registro inválido.
Se a caterogia for "Remessa Parcial", o titulo deve conter o nome de um mês(Janeiro, Fevereiro, etc), caso contrário deve emitir um erro de registro inválido.


Boa sorte!


## Respostas

### Instalação / Configuração

1. Copiar o arquivo `.env.example` para `.env`
2. Rodar `composer install`
3. Rodar `php artisan migrate:fresh`
3. Rodar `php artisan db:seed`


### Primeira Tarefa:

1. As tabelas `categories` e `documents` estão replicadas na migration e no arquivo "base" `database/schema/sqlite-schema.sql`, sendo assim comentei as linhas referentes a criação dessas duas tabelas nesse arquivo base, e também os inserts na tabela migration.

2. Por padronização, inclui os campos de `timestamp` (created_at e updated_at) no seeder.

### Segunda Tarefa:

Modifiquei a tela de bemvindo do Laravel, para incluir uma opção "AI Solutions - Teste PHP", que direciona para a tela principal do teste.

Nessa segunda tela, exibo o arquivo de importação, quantos registros foram colocados em fila, uma lista dos registros já importados e um botão "Processar Fila" que efetiva o input da fila para o banco de dados.

Após a importação a tela é atualiza com os novos registros e botão se modifica para "Voltar" que direciona para a página do boas vindas novamente.

### Terceira Tarefa:

execute os testes com o comando:

`php artisan test`


Grato pela oportunidade !!!

