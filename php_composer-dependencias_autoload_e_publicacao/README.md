# PHP Composer: Dependências, Autoload e Publicação 🚀🐘
*** 
![elefantinho-do-bem-250](https://user-images.githubusercontent.com/88351614/183260985-d5341984-bdd4-4a1b-8a7a-74bb34254763.jpg)

* **`Meus estudos de PHP, composer, e laravel(framework PHP).`**

## Conteúdo
- [x] PHP Composer: Dependências, Autoload e Publicação
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

#  O que é PSR-4?
*  PSR-4 define um padrão para o carregamento automático de classes
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

Para rodar as configurações do autoload que foram adicionadas no composer.json, rodamos o seguinte comando:
```
composer dump-autoload
```

<hr>

> É muito comum trabalharmos em projetos legados que não implementam a PSR-4 em sua estrutura de arquivos.
> 
> Qual a solução que o Composer nos entrega para conseguirmos utilizar um autoload nesses casos?

* Classmap
```
"classmap": [
    "./Teste.php"
],
```

Podemos também ter que adicionar um arquivo php procedural, então usamos files:
```
 "files": ["functions.php"],
```
<hr>

# Instalando PHPUnit

```
composer require --dev phpunit/phpunit ^8
```
* Repare que na chamada do composer require foi adicionado um parâmetro --dev. Esse parâmetro informa que a dependência a ser instalada não deverá ser utilizada em ambiente de produção.
* Em ambiente de produção, quando precisarmos instalar as dependências do projeto, bastará executarmos:
```
composer install --no-dev
```
Para que sejam baixadas as dependências dentro de require no arquivo composer.json, mas não as dependências de require-dev

> Onde ficam os arquivos executáveis que o Composer traz com os pacotes?
* Na pasta bin dentro da pasta vendor

<hr>

# Instalando o PHPCS
* uma ferramenta que nos mostre em que locais do código tal padrão está sendo quebrado. O nome dessa ferramenta é PHP_CodeSniffer, também, conhecida como PHPCS. Acessaremos o [site da ferramenta](https://github.com/squizlabs/PHP_CodeSniffer), onde encontraremos as instruções de instalação com o Composer.



> Quando utilizamos Composer para gerenciar nosso projeto, normalmente significa que temos consciência do que estamos fazendo e somos pessoas que se preocupam com qualidade de código. Além de diversas boas práticas, existem também recomendações específicas sobre como organizar nosso código.
> 
> Em qual linha abrir as chaves, como nomear variáveis e métodos, etc. Tudo isso está bem descrito na [PSR 12](https://www.php-fig.org/psr/psr-12/) e nesta aula instalamos uma ferramenta que verifica se o código que escrevemos

<hr>

* Através do flag --dev definimos que uma dependência não faz parte do ambiente de produção
* Caso desejarmos baixar as dependências de "produção" apenas podemos usar o flag no-dev
* Arquivos executáveis fornecidos por componentes instalados pelo composer ficam na pasta vendor/bin
* Conhecemos três ferramentas do mundo PHP:
  * phpunit para rodar testes;
  * phpcs para verificar padrões de código;
  * phan para executar uma análise estática da sintaxe do nosso código.

<hr>

# Scripts no JSON
Adicionamos scripts no composer.json
``` 
"scripts": {
    "test": "phpunit tests\\TestBuscadorDeCursos.php",
    "cs": "phpcs --standard=PSR12 src/",
    "phan": "phan --allow-polyfill-parser"   
}
```
É como se fosse um apelido para nossos comandos.

<hr>

> Podemos fazer referência aos scrips já existentes. Para isso, basta adicionarmos um @ na frente de cada script na lista:

```
"scripts": {
    "test": "phpunit tests\\TestBuscadorDeCursos.php",
    "cs": "phpcs --standard=PSR12 src/",
    "phan": "phan --allow-polyfill-parser",
    "check": [
        "@phan",
        "@cs",
        "@test"
    ]
}
```
* Ao executarmos o composer check, os scripts serão executados com sucesso

> Podemos adicionar descrições personalizadas para nossos scripts
```
"scripts-descriptions": {
    "check": "Roda as verificações do código. PHAN, PHPCS e PHPUNIT"
}
```
<hr>

# Eventos e scripts
> Com eles, podemos executar scripts em momentos específicos como, por exemplo, ao instalar ou atualizar um pacote.
[eventos disponíveis](https://getcomposer.org/doc/articles/scripts.md)

<hr>

# Versionamento
> Para disponibilizarmos nosso projeto de forma que terceiros possam baixá-lo e utilizá-lo, precisamos armazená-lo em algum repositório público.
> 
> O Composer consegue acessar diversos repositórios e para entender quais as versões disponíveis de cada pacote ele vê as tags do GIT em seu respectivo repositório.

* As tags devem ser organizadas seguindo o [“Semantic Versioning”](https://semver.org/)

<hr>

# Certificado
![certificado-composer](https://user-images.githubusercontent.com/88351614/200389386-7efb773b-2825-49cc-858d-25239c387e4d.png)

