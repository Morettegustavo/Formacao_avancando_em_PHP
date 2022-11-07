# PHP Composer: Dependências, Autoload e Publicação 🚀🐘
*** 
![elefantinho-do-bem-250](https://user-images.githubusercontent.com/88351614/183260985-d5341984-bdd4-4a1b-8a7a-74bb34254763.jpg)

* **`Meus estudos de PHP, composer, e laravel(framework PHP).`**

## Conteúdo
- [ ] PHP Composer: Dependências, Autoload e Publicação
*  Saiba como gerenciar dependências
*  Entenda o Autoload de classes e funções
*  Integre ferramentas como PHPUnit
*  Automatize tarefas rotineiras com scripts
*  Publique e versione o seu pacote

># Comandos e sintaxes aprendidas durante curso
***

### O que é o composer?
* O Composer, de forma bastante resumida, é um gerenciador de dependências.

### Mas como informamos ao Composer que ele deverá gerenciar as dependências de um projeto?
> Existem duas formas de fazer isso:
* A primeira é criando no próprio projeto, um arquivo composer.json, estruturando-o em seguida.
  * No PhpStrorm existe uma forma bem fácil de fazer isso, indo em Tools/composer/initComposer
  * Ou podemos ir no terminal abrir o projeto e rodar: composer init

> O que é o Vendor Name no nome do pacote distribuído com Composer?
* É o nome da pessoa ou companhia que distribui o pacote
<hr>

# Buscando pacotes
### Dá onde o composer pega esses pacotes?
> O repositório principal do Composer é um site chamado [http://packagist.org](http://packagist.org)

<hr>

# Instalando Guzzle e DomCrawler
> Para instalar um pacote usamos o seguinte comando
``` 
composer require vendor/nomepacote 
```
No caso para instalar o Guzzle rodamos:
``` 
composer require guzzlehttp/guzzle
```
Quando rodamos esse comando é criada uma pasta chamada vendor, nela vai ficar as depências que acabamos de instalar.

### É possível, ao invés de executarmos o composer require, simplesmente adicionarmos os novos pacotes aqui? 

> No terminal, executaremos <strong style="font-size: 1.1em;">composer install</strong>. Com isso, o Composer lerá nosso arquivo JSON e instalará as dependências.
> 
> temos também um arquvo composer.lock que explicita tudo que já foi instalado no projeto, incluindo suas versões. Sendo assim, se quisermos em algum momento, além de baixar os novos pacotes, atualizar os já existentes, podemos rodar o comando <strong style="font-size: 1.1em;">composer update</strong>

<hr>

> Durante o desenvolvimento do nosso código, importamos o arquivo atuoload.php dentro dá pasta vendcr.
> 
> Qual o próposito deste arquivo?

* Carregar o código responsável por realizar o autoload de classes
  * Neste arquivo, o Composer faz o trabalho necessário para definir um autoload de classes de forma que seja possível utilizar as dependências sem incluir seus arquivos separadamente.

<hr>

> O que aprendemos até o momento?

* O composer possui um repositório central de pacotes: https://packagist.org/
* É possível configurar repositórios de outras fontes (do github, zip etc)
* O pacotes guzzlehttp/guzzle serve para executar requisições HTTP de alto nível
* Para instalar uma dependência (pacote) basta executar: composer require <nome do pacote>
* Composer guarda as dependências e dependências transitivas na pasta vendor do projeto
* O nome e versão da dependências fica salvo no arquivo composer.json
* O comando require adiciona automaticamente a dependência no composer.json
* O comando composer install automaticamente baixa todas as dependências do composer.lock (ou do composer.json, caso o .lock não exista ainda)
* O arquivo composer.lock define todas as versões exatas instaladas
* O composer já gera um arquivo autoload.php para facilitar o carregamento das dependências
  * Basta usar require vendor/autoload.php

<hr>

> Os pacotes se organizam de forma que o Composer consiga realizar o autoload de todos com um único código.
> 
> Quais os principais pontos da PSR-4?

* Todos os arquivos devem ter como seu nome o nome da classe contida nele e a extensão .php
* Cada um dos namespaces após o vendor namespace deve ser mapeados para uma estrutura de diretórios
* Um vendor namespace (namespace raiz ou padrão) deve ser mapeado para uma pasta base da aplicação

<hr>

> Já sabemos que o autoload.php do Composer consegue buscar as classes dos componentes baixados pois eles implementam a PSR-4. Nós também vimos agora como configurar a PSR-4 em nosso projeto
> 
> O que é necessário para configurar a PSR-4 em nosso projeto, levando em consideração que nossa estrutura de arquivos já atende seus requisitos?

* Basta adicionar na chave psr-4 filha da chave autoload a chave contendo nosso vendor namespace e o valor contendo nossa pasta base, exemplo:
``` 
{ “autoload”: { “psr-4”: { “Alura\\Namespace\\Padrao\\”: “src/php/code/” } } }


 "autoload": {
      "psr-4": {
          "Alura\\BuscadorDeCursos\\": "src/"
      }
  }
```

<hr>




