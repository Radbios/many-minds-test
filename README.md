# Teste - Many Minds
## 📖 Como usar
Siga estas etapas para começar a usar o projeto:
#### 1. Clone o Projeto
Para obter uma cópia do projeto em seu computador, execute o comando abaixo para clonar o repositório usando o Git:
```
git clone https://github.com/Radbios/many-minds-test.git
```
> **Observação:** Caso não tenha o **[Git](https://git-scm.com/)**, instale-o.

#### 2. **Configure o arquivo `.env`**
Vá para a pasta do projeto, faça uma cópia do arquivo `.env.example`, renomeie o arquivo para `.env` e faça as devidas modificações para configurar o servidor.

Você pode usar o seguinte comando para fazer uma cópia do arquivo `.env.example`:
```
cd many-minds-test
cp .env.example .env
```
Em seguida, abra o arquivo `.env` com um editor de texto e faça as configurações necessárias, como definir variáveis de ambiente, configurar credenciais de banco de dados, etc.

#### 4. Instale as Dependências
Instale as dependências do projeto com o composer
```
composer install
```
> **Observação:** Caso não tenha o **[Composer](https://getcomposer.org/)**, instale-o.

#### 5. Rode as Migrations
Rode as migrations do projeto com as seeders
```
php artisan migrate --seed
```
#### 6. Inicie o Servidor
Inicio o servidor laravel

```
php artisan serve
```
> **Observação:** Por padrão, o servidor é executado na URL **[localhost](http://127.0.0.1:8000)**.

## 💻 Usuários do sistema
O sistema tem dois tipos de usuários. A seguir será dado os dados de login para cada tipo.
> **Observação:** os recursos que cada um pode usar será indicado nas **[Funcionalidades do Sistema](#-usu%C3%A1rios-do-sistema)**.

#### Administrador
```
email: admin@gmail.com
senha: admin
```
#### Cliente
```
email: client@gmail.com
senha: client
```
   
## 🚀 Funcionalidades do Sistema

### 1. Sistema de Autenticação

#### 1.1 Login
Alvo: ***todos***

#### 1.2 Cadastro
Alvo: ***todos***

#### 1.3 Trava de IP
Alvo: ***todos***

Descrição: Após 3 (três) tentativas de autenticação, o IP ficará impossibilitado de efetuar requisições de login durante 1 (um) minuto.

### 2. Cadastro de Produtos

#### 2.1 Listar
Alvo: ***admin***

Descrição: o usuário poderá ver a lista de produtos do sistema.

#### 2.2 Criar
Alvo: ***admin***

Descrição: o usuário poderá criar produtos no sistema.
#### 2.3 Editar
Alvo: ***admin***

Descrição: o usuário poderá editar produtos do sistema.

#### 2.4 Deletar
Alvo: ***admin***

Descrição: o usuário poderá deletar produtos do sistema.

### 3. Cadastro de Fornecedores

#### 3.1 Listar
Alvo: ***admin***

Descrição: o usuário poderá ver a lista fornecedores do sistema.

#### 3.2 Criar
Alvo: ***admin***

Descrição: o usuário poderá criar fornecedores no sistema.
#### 3.3 Editar
Alvo: ***admin***

Descrição: o usuário poderá editar fornecedores do sistema.

#### 3.4 Deletar
Alvo: ***admin***

Descrição: o usuário poderá deletar fornecedores do sistema.

### 4. Cadastro Produtos & Fornecedores

#### 4.1 Listar
Alvo: ***admin***

Descrição: o usuário poderá ver a lista fornecedores de um produto. **O inverso também é válido**

#### 4.2 Criar
Alvo: ***admin***

Descrição: o usuário poderá vincular um produto existente ao fornecedor *(inclui definição do código, preço unitário e quantidade em estoque do produto para aquele fornecedor)*. **O inverso também é válido**
#### 4.3 Editar
Alvo: ***admin***

Descrição: o usuário poderá editar os produtos de um fornecedor *(preço unitário e quantidade em estoque)*.

#### 4.4 Deletar
Alvo: ***admin***

Descrição: o usuário poderá deletar logicamente *(mudar status [ativo, inativo])* do produto de um fornecedor.
> **Observação:** A função **Editar Produto do Fornecedor** não funcionará se aquele produto estiver desabilitado.


### 5. Sistema de Pedidos

#### 5.1 Listar Produtos Fornecidos para a Venda
Alvo: ***todos***

Descrição: o usuário poderá ver os produtos ativos com estoque de cada fornecedor.

#### 5.2 Comprar Produto
Alvo: ***todos***

Descrição: o usuário poderá comprar os produtos habilitados.
#### 5.3 Carrinho de Compras
Alvo: ***todos***

Descrição: o usuário poderá ver, retirar produtos e/ou finalizar a compra no carrinho.

#### 5.4 Pedidos Realizados
Alvo: ***todos***

Descrição: o usuário poderá ver os seus pedidos realizados.
> **Observação:**
> 
> Enquanto o status do pedido estiver *ativo*, o usuário poderá remover itens do pedido.
>
> Se o usuário for um *admin*, ele poderá ver todos os pedidos.
>
> Se o usuário for um *admin*, ele poderá finalizar os pedidos.

#### 5.5 Finalizar Pedidos
Alvo: ***admin***

Descrição: o usuário poderá finalizar um pedido *ativo*.
 
#### 5. LOGS
##### Listagem dos Logs de Modificação do Sistema
Descrição: requisições de modificação (criação, atualização e/ou exclusão de recursos) terão logs escritos.
 
#### 6. Web Service (API)

##### 6.1 Login
Alvo: ***todos***
Endpoint: `[POST] - /api/login`
> **Observação:** A **[Trava de IP]** também funciona neste recurso.

##### 6.2 Listar Todos os Pedidos
Alvo: ***todos***

Endpoint: `[GET] - /api/order`

Retorno: Os seus pedidos realizados.
> **Observação:** Se o usuário for um *admin*, ele poderá ver todos os pedidos.

##### 6.3 Listar Pedidos Finalizados
Alvo: ***todos***

Endpoint: `[GET] - /api/order/finished_order`

Retorno: Os seus pedidos realizados que foram finalizados.
> **Observação:** Se o usuário for um *admin*, ele poderá ver todos os pedidos finalizados.

## :computer: Tecnologias Utilizadas

### Back-end
- **[Laravel](https://laravel.com/)**
- **[PHP](https://www.php.net/)**
- **[MySQL](https://www.mysql.com/)**
  
### Front-end
- **[HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML)**
- **[CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS)**
- **[JS](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)**
- **[Blade](https://laravel.com/docs/10.x/blade)**
