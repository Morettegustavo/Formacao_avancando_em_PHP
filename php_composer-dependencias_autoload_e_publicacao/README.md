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