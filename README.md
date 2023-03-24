# newm
Projeto para estágio de desenvolvimento

## Banco de dados
Crie um banco de dados e execute as instruções SQLs abaixo para criar a tabela `clientes` e a tabela `endereco`:
```sql
  CREATE TABLE `clientes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nome` varchar(255) NOT NULL,
 `data_nascimento` date NOT NULL,
 `cpf` varchar(255) NOT NULL,
 `celular` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 `observacao` text NOT NULL,
 PRIMARY KEY (`id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8
```
```sql
 CREATE TABLE `endereco` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `cidade` varchar(255) NOT NULL,
 `bairro` varchar(255) NOT NULL,
 `rua` varchar(255) NOT NULL,
 `numero` varchar(255) NOT NULL,
 `complemento` varchar(255) NOT NULL,
 `fk_end_cliente` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `fk_end_cliente` (`fk_end_cliente`),
 CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`fk_end_cliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8
```

## Configuração
As credenciais do banco de dados estão no arquivo `./app/Db/Database.php` e você deve alterar para as configurações do seu ambiente (HOST, NAME, USER e PASS).

## Composer
Para a aplicação funcionar, é necessário rodar o Composer para que sejam criados os arquivos responsáveis pelo autoload das classes.

Caso não tenha o Composer instalado, baixe pelo site oficial: [https://getcomposer.org/download](https://getcomposer.org/download/)

Para rodar o composer, basta acessar a pasta do projeto e executar o comando abaixo em seu terminal:
```shell
 composer install
```

Após essa execução uma pasta com o nome `vendor` será criada na raiz do projeto e você já poderá acessar pelo seu navegador.

Para rodar a aplicação basta criar uma pasta no caminho C:\xampp\htdocs\
Após abrir o Xampp Control e executar o Apache e Mysql
Após isso navegar até o caminho do projeto localmente ->> http://localhost/"nome_projeto"/clientes/
Feito isso será exibido a index do projeto para a utilização da aplicação.

