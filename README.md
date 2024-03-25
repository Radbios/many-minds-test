# Teste - Many Minds
## Como usar
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
> **Observação:** Por padrão, o servidor é executado na URL **[127.0.0.1:8000](http://127.0.0.1:8000)**.


   
## 🚀 Metas Atingidas
1. Sistema de Autenticação
   - Login
   - Cadastro
   - Trava de IP
3. Cadastro de Produtos
   - Listar
   - Criar
   - Editar
   - Deletar
5. Cadastro de Fornecedores
   - Listar
   - Criar
   - Editar
   - Deletar
9. Sistema de Pedidos
    - Listar Produtos Fornecidos para a Venda
    - Carrinho de Compras
    - Pedidos Realizados
11. LOGS
    - Listagem dos Logs de Modificação do Sistema
13. Web Service (API)
    - Autenticação
    - Todos os Pedidos
    - Pedidos Finalizados

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
