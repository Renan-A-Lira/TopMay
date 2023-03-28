

# TopMay
Supervisor de Servidor Pintos LTDA

## Instalação

Instale as dependencias com composer:

```bash
  cd topmay
  composer install
```
## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

`HOSTNAME`

`BD_USERNAME`

`BD_PASSWORD`

`DATABASE`


## Documentação

### `./index.php`
> **Arquivo inicial do projeto**
> renderiza toda a pagina front-end e forneçe todas as funções para compilar as informações

### `./database`
> **Relacionado diretamento com o banco de dados**
> >`./connection.php` 
> >função `open()` que retorna a coneção com o banco de dados
> 
> >`./querys/sqlQuerys.php` 
> >todas as funções de busca sql.

### `./view`
> **Toda a parte front-end**. Está dividida em:
>
> > `./components`
> > arquivos que contém componentes reutilizaveis
>
> >`./itens`
> > contem os arquivos que em si usam as funções do index.php para tratamento de dados
>
> >`./templates`
> > arquivos com template base para uso dos arquivos de `./itens`. No caso do proprio projeto, um template base para uma tabela
> 
> >`home.blade.php`
> > pagina principal que será renderizada pela `index.php`

### `./controller`
> **Processamento dos dados**
> >`./init.php` 
> >importações das funções do controller
> 
> >`./assetsController`
> >funções relacionadas ao assets do projeto. (retornando o caminho do arquivo relacionado).
> 
> >`./functionsController`
> >funções relacionadas ao processamento de dados enviada pelo banco de dados. Retorna as informações necessarias para o front-end.

### assets
> imagens, áudios e css utilizados pelo projeto

## Stack utilizada

**Front-end:** blade, jquery, TailwindCSS

**Back-end:** php, sql

**Packages:** [phpdoenv](https://github.com/vlucas/phpdotenv), [blade template](https://github.com/jenssegers/blade)


