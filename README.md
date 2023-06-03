# Sistema de aconselhamento de matrícula

    A ideia foi fazer um sistema de aconselhamento de matrícula, visto que na UFAL, especificamente no meu
    curso (Ciência da computação) muitos alunos são "jubilados", ou seja, não conseguem terminar o curso
    no prazo estipulado.
    O sistema de aconselhamento de matrícula tem por objetivo, dado o histórico do aluno, aconselhá-lo
    de quais disciplinas ele deverá se  matricular, desde o período atual, para que termine o curso
    no menor tempo possível (caso seja possível), com no máximo 8 (oito)disciplinas por período e
    sem choques de horário, usando técnicas de computação evolucionária.
    O projeto é formado pelos usuários do tipo: admin e aluno. O admin deverá ser o usuário capaz de
    gerenciar as informações de cada curso, tais como número de períodos, informações das disciplinas
    e seus respectivos horários, etc. Já o aluno será aquele que irá “consumir” o sistema.

## Índice

- [Tecnologias utilizadas no sistema](#Tecnologias-utilizadas-no-sistema)
- [Instruções de Instalação](#instruções-de-instalação)
- [Elementos obrigatórios no sistema implementados](#Elementos-obrigatórios-no-sistema-implementados)
- [Elementos que faltam para concluir o projeto](#Elementos-que-faltam-para-concluir-o-projeto)
- [Impedimentos (para a conclusão do projeto até a data estipulada)](#Impedimentos-(para-a-conclusão-do-projeto-até-a-data-estipulada))

## Tecnologias utilizadas no sistema

1. PHP:
    1.1. Code igniter 3
2. CSS & HTML:
    2.1. Bootstrap
4. JS:
    4.1. Jquery
    4.2. Ajax
4. Database:
    5.1. mariaDB

## Instruções de Instalação

Passo a passo para a instalação e configuração do projeto. 

1. Clone o repositório: `git clone https://github.com/Radbios/many-minds-test.git`
2. Entre no diretório do projeto: `cd many-minds-test`
3. Instale as dependências: `composer install`
4. Configure o banco de dados: 
    1. `hostname` => `seu_hostname`;
    2. `username` => `seu_username`;
    3. `password` => `seu_password`;
    4. `database` => `seu_database`;
5. Execute os scripts da diretório `sql` 
    [OBSERVAÇÕES] - *Execute primeiro `db_codeigniter_usuarios.sql`, pois as outras tabelas dependem dela [Table-Relationship]*

6. Execute o projeto

## Elementos obrigatórios no sistema implementados

1. Sistema de login:
    1. O sistema suporta autenticação de usuários por nível (`admin` e `student`). Só poderar acessar o sistema se estiver autenticado;
    2. Ambos os usuários (`admin`,`student`) tem suas próprias `skills` e `gates`.
    3. Atualmente não há opção de registro de usuário, apenas o `admin` pode criar novos usuários;
    4. [Desafio] Um mesmo endereço de IP tem 3 chances para autenticar, caso não contrário, seu IP será travado por 1min (60s).
2. CRUD de usuários:
    2.1. O usuário só pode ser excluído logicamente (`desativado`);
3. [Opcional] Desenvolvimento de sistema e listagem de logs de alterações do sistema. Ações efetuadas pelos usuários serão registradas.
4. [Desafio] Criar WS de retorno de registros do sistema, com as seguintes condições:
    1. Deve ser retornado em formato JSON;
    2. Criar método de autenticação para consumo do WS;
    3. Funcionamento do WS pode ser definido pelo candidato:
        1. O funcionamento escolhido foi retornar os registros de todos os usuários do sistema.
            [OBSERVAÇÕES] - *APENAS O ADMIN PODE CONSUMIR ESTE SERVIÇO, NÃO FAZ SENTIDO UM USUÁRIO `STUDENT` TER ESSAS INFORMAÇÕES*
    [OBSERVAÇÕES] - *A rota para consumir o serviço é `http://localhost/ws/registros`, passando os parametros de `email` e `senha` no body*

## Elementos que faltam para concluir o projeto

1. `ADMIN`:
    1. CRUD de `cursos`;
    2. CRUD de `disciplinas`;
    3. Excluir/limpar `logs`;
2. `STUDENT`:
    1. CRUD do `histórico analítico`;
    2. Script evolucionário para gerar o `aconselhamento`;
    3. CRUD dos `aconselhamentos` .
        [OBSERVAÇÕES] - *Cada usuário `student` só poderá ter até 5 registros de aconselhamento. Com o máximo de itens atingidos, o serviço ficará desabilitado para ele até que exluia um dos registros* 
3. `ALL USERS`:
    1 - `Perfil` do usuário;
        [OBSERVAÇÕES] - *Incluindo edição dos dados*
    2 - `Configurações` da conta;
    3 - `Cadastro` de novos usuários;
    4 - `Esqueceu a senha`;

## OBSERVAÇÕES FINAIS

*Não foi possível concluir o projeto devido ao prazo de entrega. Além disso, o teste ocorreu em dias de atividades da universidade*