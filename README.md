
# Sistema de Aconselhamento de Matrícula

Este projeto é um sistema de aconselhamento de matrícula desenvolvido para auxiliar os alunos do curso de Ciência da Computação da UFAL a planejar suas matrículas de forma eficiente, visando evitar o jubilamento e concluir o curso no menor tempo possível.

## Índice

- [Objetivo](#Objetivo)
- [Tecnologias utilizadas no sistema](#Tecnologias-utilizadas-no-sistema)
- [Instruções de Instalação](#instruções-de-instalação)
- [Elementos obrigatórios no sistema implementados](#Elementos-obrigatórios-no-sistema-implementados)
- [Elementos que faltam para concluir o projeto](#Elementos-que-faltam-para-concluir-o-projeto)
- [Impedimentos (para a conclusão do projeto até a data estipulada)](#Impedimentos-(para-a-conclusão-do-projeto-até-a-data-estipulada))

## Objetivo

O objetivo do sistema de aconselhamento de matrícula é fornecer recomendações personalizadas de disciplinas para os alunos com base em seu histórico acadêmico. Levando em consideração o período atual, o sistema aconselha quais disciplinas o aluno deve se matricular, respeitando as seguintes restrições:

- Limite máximo de 8 disciplinas por período.
- Evitar choques de horário entre as disciplinas recomendadas.

O sistema é composto por dois tipos de usuários:

1. **Admin**: O administrador tem acesso a funcionalidades de gerenciamento das informações do curso, tais como:

   - Número de períodos do curso.
   - Informações das disciplinas, como nome, código, carga horária, pré-requisitos e horários.

2. **Aluno**: O aluno é o usuário principal do sistema e possui as seguintes funcionalidades:

   - Visualização do histórico acadêmico.
   - Recebimento de recomendações personalizadas de disciplinas para matrícula.

## Tecnologias Utilizadas no Sistema

- PHP:
  - CodeIgniter 3

- CSS & HTML:
  - Bootstrap

- JS:
  - jQuery
  - Ajax

- Banco de Dados:
  - MariaDB

## Instruções de Instalação

Siga o passo a passo abaixo para instalar e configurar o projeto:

1. Clone o repositório: `git clone https://github.com/Radbios/many-minds-test.git`
2. Entre no diretório do projeto: `cd many-minds-test`
3. Instale as dependências: `composer install`
4. Configure o banco de dados:
   - `hostname` => `seu_hostname`
   - `username` => `seu_username`
   - `password` => `seu_password`
   - `database` => `seu_database`
5. Execute os scripts do diretório `sql`:
   **Observações:** Execute primeiro `db_codeigniter_usuarios.sql`, pois as outras tabelas dependem dela [Table-Relationship].
6. Execute o projeto.



## Elementos Obrigatórios Implementados no Sistema

1. Sistema de login:
   1. O sistema suporta autenticação de usuários por nível (`admin` e `student`). Só poderá acessar o sistema se estiver autenticado.
   2. Ambos os usuários (`admin`, `student`) têm suas próprias `skills` e `gates`.
   3. Atualmente não há opção de registro de usuário, apenas o `admin` pode criar novos usuários.
   4. [Desafio] Um mesmo endereço de IP tem 3 chances para autenticar, caso contrário, seu IP será travado por 1 min (60s).

2. CRUD de usuários:
   1. O usuário só pode ser excluído logicamente (`desativado`).

3. [Opcional] Desenvolvimento de sistema e listagem de logs de alterações do sistema. Ações efetuadas pelos usuários serão registradas.

4. [Desafio] Criar WS de retorno de registros do sistema, com as seguintes condições:
   1. Deve ser retornado em formato JSON.
   2. Criar método de autenticação para consumo do WS.
   3. Funcionamento do WS pode ser definido pelo candidato.
      - O funcionamento escolhido foi retornar os registros de todos os usuários do sistema.
      **Observações:**
      - APENAS O ADMIN PODE CONSUMIR ESTE SERVIÇO, NÃO FAZ SENTIDO UM USUÁRIO `STUDENT` TER ESSAS INFORMAÇÕES.

**Observações:**
A rota para consumir o serviço é `http://localhost/ws/registros`, passando os parâmetros de `email` e `senha` no body.


## Elementos que Faltam para Concluir o Projeto

### ADMIN

1. CRUD de `cursos`.
2. CRUD de `disciplinas`.
3. Excluir/limpar `logs`.

### STUDENT

1. CRUD do `histórico analítico`.
2. Script evolucionário para gerar o `aconselhamento`.
3. CRUD dos `aconselhamentos`.
   
   **Observações:**
   - Cada usuário `student` só poderá ter até 5 registros de aconselhamento. Com o máximo de itens atingidos, o serviço ficará desabilitado para ele até que exclua um dos registros.

### ALL USERS

1. `Perfil` do usuário.

   **Observações:**
   - Incluindo edição dos dados.

2. `Configurações` da conta.
3. `Cadastro` de novos usuários.
4. `Esqueceu a senha`.

## OBSERVAÇÕES FINAIS

*Não foi possível concluir o projeto devido ao prazo de entrega. Além disso, o teste ocorreu em dias de atividades da universidade*