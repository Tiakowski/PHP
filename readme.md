# Projeto de Gerenciamento de Tarefas

## Descrição
Este projeto é um sistema de gerenciamento de tarefas, onde os usuários podem criar, editar e concluir tarefas. O sistema permite que os usuários definam prioridades, datas limite e filtrem as tarefas por prioridade.

## Funcionalidades
- Criação de tarefas com título, descrição, data limite e prioridade.
- Edição de tarefas existentes.
- Marcação de tarefas como concluídas.
- Filtro de tarefas por prioridade.
- Interface intuitiva e fácil de usar.

## Tecnologias utilizadas
- HTML5
- CSS3
- JavaScript
- PHP
- Jquery
- AJAX
- MySQL
- Biblioteca de ícones FontAwesome

## Pré-requisitos
- Navegador web
- Servidor PHP ou Apache

## Configuração do Banco de Dados
1. Abra o arquivo `app/DAO/config.php`.
2. Edite as configurações do banco de dados para corresponder ao seu ambiente de desenvolvimento.
3. Certifique-se de ter criado previamente o banco de dados necessário para o projeto.

## Especificações do Banco de Dados
O banco de dados consiste nas seguintes tabelas:

### Tabela `tasks`
- `id` (int, chave primária, auto_increment): ID único para cada tarefa.
- `title` (tinytext, não permite NULL): Título da tarefa.
- `description` (text, permite NULL): Descrição detalhada da tarefa.
- `priority` (int unsigned, não permite NULL): Prioridade da tarefa.
- `date` (date, permite NULL): Data limite da tarefa.

Certifique-se de configurar corretamente as tabelas no banco de dados de acordo com as especificações acima antes de executar o projeto.

## Como executar o projeto
1. Navegue até o diretório do projeto.
2. Caso esteja usando Apache:
   - Coloque o diretório do projeto dentro da pasta raiz do seu servidor Apache.
   - Abra o navegador e acesse o endereço `localhost/CRUD/index.php`.
3. Caso esteja usando o servidor PHP embutido:
   - Abra o terminal e navegue até a pasta do projeto.
   - Execute o comando `php -S localhost:porta`, substituindo "porta" pela porta desejada (por exemplo, 8000).
   - Abra o navegador e acesse o endereço `localhost:porta`, substituindo "porta" pela mesma porta utilizada no comando anterior.




## Possíveis Erros e Soluções

### Erro: Uncaught PDOException: could not find driver
Caso você esteja usando o servidor embutido do PHP e encontre este erro na conexão com o MySQL, siga as instruções a seguir:

1. Abra o prompt de comando (cmd) no seu sistema operacional.
2. Digite o seguinte comando: `php --ini`.
3. Localize o caminho exibido ao lado de "Loaded Configuration File:". Copie esse endereço.
4. Abra o explorador de arquivos e cole o endereço na barra de endereços.
5. Será aberto um arquivo de texto (.txt). Use o atalho de teclado Ctrl + F para abrir a caixa de pesquisa.
6. Procure por "extension=pdo_mysql" no arquivo de texto.
7. Caso haja um ponto e vírgula (;) antes dessa linha, remova-o para descomentar a extensão.
8. Salve o arquivo de texto e feche-o.
9. Reinicie o servidor embutido do PHP e tente novamente conectar-se ao MySQL.

Essas etapas ajudam a garantir que a extensão `pdo_mysql` esteja habilitada na configuração do PHP, permitindo a conexão adequada com o MySQL. Certifique-se de seguir essas instruções se você estiver enfrentando problemas relacionados à conexão com o banco de dados MySQL.
