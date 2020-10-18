async
=========

[![Latest Stable Version](https://img.shields.io/packagist/v/phlak/colorizer.svg)](https://packagist.org/packages/raphaeu/async)
[![Total Downloads](https://img.shields.io/packagist/dt/raphaeu/async)](https://packagist.org/packages/raphaeu/async)
[![Author](https://img.shields.io/badge/author-raphaeu-blue.svg)](https://www.linkedin.com/in/rafael-aguiar-74824922/)
[![License](https://img.shields.io/github/license/raphaeu/async)](https://packagist.org/packages/raphaeu/async)

Fazer resquisições assíncronas com PHP de forma fácil e eficiente.

Requisitos
------------

  - [PHP](https://php.net) >= 5.6

Instalando com composer
-----------------------

```bash
composer require raphaeu/async
```

Usando
------

```php
// Import 
use async\Task;
use async\Async;

// Inicialize async class
$async = new Async();

// Create tasks
$task1 = new Task("php /tmp/randTimer.php");
$task2 = new Task("php /tmp/randTimer.php");
$task3 = new Task("php /tmp/randTimer.php");

// Vinculando testes
$async->addTask($task1);
$async->addTask($task2);
$async->addTask($task3);

// Rodando tarefas assíncronas
while ($async->hasDo())
{
    usleep(250);
    echo $task1->getResult();
}
```
#### Arquivo do teste assíncrono <B>randTimer.php</b>
```php
<?php
  usleep(rand(500, 2000));
  echo timer();
```


#### Configurando

Para conseguir resgatar o resultado da tarefa assíncrona precisa informar uma path temporária. 

```php
$async = new Async('/path-temp/');
```

Changelog
---------

A lista de mudanças voce pode encontrar na página [GitHub Releases](https://github.com/raphaeu/async/releases).

Soluções de problemas
---------------------

Por favor, reporte os bugs para [GitHub Issue Tracker](https://github.com/PHLAK/Colorizer/issues).

Copyright
---------

Este projeto está licenciado sob a [MIT License](https://github.com/PHLAK/Colorizer/blob/master/LICENSE).
