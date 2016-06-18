# Simple MVC

Estrutura básica inicial de um MVC com PHP com uso do [Smarty Template Engine](http://www.smarty.net/)

# Configurações

#### Requerimentos

* Conhecer pelo menos o básico de:
    * Orientação a Objetos
    * Design Pattern MVC
    * Smarty ([documentação aqui](http://www.smarty.net/docs/en/))
* PHP na versão igual ou acima da 5.5
* Utilizar a [PSR-4](http://www.php-fig.org/psr/psr-4/), tal como **namespaces**
* Ter o Composer instalado

#### Uso

* Clone ou faça o download do repositório para sua máquina
* Tendo o Composer instalado, abra o terminal/prompt de comando, navegue até a pasta raiz e rode `composer update`
* Configure seu host para apontar para o diretório `/public`
* Configure as definições base em `/app/Config.example.php`
* Em seguida, renomeie o arquivo para `Config.php`

#### Configs

Para cada array de configuração criado em `/app/Config`, cadastre o carregamento dele em `/app/Config/Load.php` apenas informando seu nome no array.

# Padrões de nomenclaturas

## Controllers
* Os arquivos do controller devem começar com letra maiúscula e terminar com o sufixo **Controller.php**
    * `ExemploController.php`

* Controller com nome composto deve utilizar **UpperCamelCase**
    * `ExemploCompostoController.php`

* Toda action (métodos do controller) começa com letra minúscula e termina com o sufixo **Action**
    * `exemploAction()`

* Actions com nome composto deve utilizar **lowerCamelCase**
    * `exemploCompostoAction()`

* Se não houver um método `indexAction()` em seu controller, quando acessado, será retornado a página Error404

* Controllers devem ser criados dentro do diretório `/app/Controllers`

* Seu controller deve extender de **MainController**

#### Estrutura do controller

```php
namespace App\Controller;

use Core\MainController;

class ExemploController extends MainController
{
	public function indexAction()
	{
        // Seu código
	}
}
```

## Models
* Os arquivos de models devem começar com letra maiúscula e terminar com o sufixo **Model.php**
    * `ExemploModel.php`

* Model com nome composto deve utilizar **UpperCamelCase**
    * `ExemploCompostoModel.php`

* Os models devem ser criados dentro do diretório `/app/Models`

* Seu model deve extender de **MainModel**


#### Estrutura do model

```php
namespace App\Models;

use Core\MainModel;

class ExemploModel extends MainModel
{
	// Seu código
}
```

## Views
Para cada **Controller**, um diretório deve ser criado em `/resource/views/templates`, contendo o mesmo nome da classe em **lowercase** e sem o sufixo Controller
* **Classe:** `class ExemploController`
* **Diretório:** `exemplo`

-

Para **Controllers** com nome composto, cada palavra deverá ser separada por hífen `-`
* **Classe:** `class ExemploCompostoController`
* **Diretório:** `exemplo-composto`

-

Para cada **Action** (métodos do Controller), deverá ser criado em seu respectivo diretório (o que leva o nome da classe) um arquivo com o mesmo nome do método em **lowercase**, sem o sufixo Action e com a extensão **.tpl**
* **Action:** `exemploAction()`
* **Arquivo:** `exemplo.tpl`

-

Para actions com nome composto, cada palavra deverá ser separada por hífen `-`
* **Action:** `exemploCompostoAction()`
* **Arquivo:** `exemplo-composto.tpl`

# Sintaxe

## Métodos disponíveis no Controller

```php
$this->model($model, $dir = null);
```

Instancia o model requisitado. Atribua-o a uma variável para obter o objeto.

Ao utilizar o método `$this->model($model, $dir = null)`, no parâmetro `$model` deverá ser passado apenas uma string com o nome do model requisitado. O nome por sua vez deve ser apenas o nome do model sem o sufixo **Model**.

Para o parâmetro `$dir`, caso queira organizar melhor seus Models por subdiretórios, informe a string com o nome do diretório neste parâmetro.

-

```php
$this->view($template, array $data = null, array $partials = null);
```

Instancia a **MainView** para que ela se encarregue de renderizar a página HTML.

Ao utilizar o método `$this->view($template, $data = [], $partials = [])`, serão solicitados três parâmetros:
* `$template` - apenas informe o método `$this->getTemplate()`;
* `$data` - parâmetro opicional. Deve ser um array que será mandado para a view onde o **Smarty** terá acesso;
* `$partials` - parâmetro opicional. Deve ser um array que será mandado para a view onde o **Smarty** terá acesso;

Leia a documentação do método para mais detalhes e exemplos de uso.

-

```php
$this->redirect($path);
```

Realiza os direcionamentos das páginas.

Ao utilizar o método `$this->redirect($path)`, será solicitado o nome do caminho para onde será redirecionado.
Basta informar o caminho após a URL base. Ex:

Caso queira que o direcionamento seja para: `dominio.com/teste/teste-redirecionamento`, informe em `$path` a string `'/teste/teste-redirecionamento'`.

**Obs.:** O uso de barra `/` é facultativo. Pode ser informado `'/teste/teste-redirecionamento'` ou `'teste/teste-redirecionamento'`



## Métodos disponíveis no Model

`$this->newCreate()` retorna a instância da classe **Create** do Banco de Dados.

```php
$create = $this->newCreate();
$create->executeCreate('tabela', $dados[]);
```

-

`$this->newDelete()` retorna a instância da classe **Delete** do Banco de Dados.

```php
$delete = $this->newDelete();
$delete->executeDelete('tabela', 'WHERE id = :id', 'id=1');
```

-

`$this->newRead()` retorna a instância da classe **Read** do Banco de Dados.

```php
$read = $this->newRead();
$read->executeRead('tabela');
```

-

`$this->newUpdate()` retorna a instância da classe **Update** do Banco de Dados.

```php
$update = $this->newUpdate();
$update->executeUpdate('tabela', $dados[], 'WHERE name = :nome', 'nome=zeindelf');

```

-
Nas classes do Banco de Dados localizadas em `/src/Database`, há exemplos de uso e  suas respectivas documentações.