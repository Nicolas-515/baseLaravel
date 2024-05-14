## Dependências

Para que o projeto consiga rodar em sua máquina, é necessário algumas dependencias e rotas devidamente configuradas. Dentre elas:

- [Composer (2.7.6)](https://getcomposer.org/download/)
- [Nodejs (20.13.1 LTS)](https://nodejs.org/en/download)
- [7zip](https://www.7-zip.org/download.html)

Obs.: O 7z é chamado pelos pacotes do NPM para descomprimir seus Downloads, caso encontre problemas ao configurar esse projeto, principalmente nas partes em que envolve nodejs, verifique se o 7z é reconhecido como comando no CMD, e caso contrário, adicione em suas variáveis de ambiente o caminho até o executável baixado.

## Baixando e configurando

Clone o repositório aonde desejar, mas de preferencia, numa pasta em que seu usuário tenha permmissão para ler/escrever. Esse procedimento será feito em sua ferramenta de terminal de escolha. Contanto que tenha as variáveis de ambiente configuradas, qualquer programa dará conta da instalação

```
git clone <esse-repo>.git
```

Em seguida, vamos configurar o projeto para rodar em sua máquina. Entre no diretório do projeto com o comando:

```
cd baseLaravel
```
E em seguida, abra o explorador de arquivos do windows nessa pasta, com o comando:
```
explorer .
```
Com isso, uma janela do explorador de arquivos irá aparecer, será necessário fazer uma alteração no arquivo *.env.example* então abra ele com seu editor de texto de escolha.

Dentro dele, existem três linhas importantes
```
DB_CONNECTION=sqlite
DB_DATABASE=(Caminho completo até o repositório)\baseLaravel\database\database.sqlite
DB_FOREIGN_KEYS=true
```
Altere aonde foi pedido, o valor completo até aonde o repositório foi clonado.

O resultado final deve ser algo proximo a isso

```
DB_CONNECTION=sqlite
DB_DATABASE=C:\xampp\htdocs\deliver\vitafor\database\database.sqlite
DB_FOREIGN_KEYS=true
```
Salve o arquivo como apenas *.env* (sem incluir o .exemple) e podemos então sair


De volta na diretório base do arquivo, vamos agora instalar as dependencias com ajuda do composer.

```
composer require laravel/installer
```
```
composer require laravel/breeze --dev
```
```
composer install
```
Os comandos podem levar um tempo, é normal.

Em seguida é necessário garantir que o laravel crie e popule o banco de dados sqlite, por isso, execute o comando

```
php artisan migrate
```
Caso seja necessário criar um novo arquivo .sqlite reponda com *yes* no terminal

Em seguida, execute os comandos abaixo para configurar as respectivas variáveis.
```
php artisan key:generate
```
```
php artisan storage:link
```
```
php artisan migrate:fresh
```

E com isso, quase tudo deve estar configurado para rodar em sua máquina, faltando apenas configurar os arquivos referentes ao nodejs, faça isso com os comandos
```
npm install
```
```
npm run build
```

E pronto, ja será possivel executar esse projeto e validar as implementações. rode o comando
```
php artisan serve
```
E poderá acessar em localhost:8000 a pagina.

Caso necessite de alguma outra informação, por favor entrar em contato via email.