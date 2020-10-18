async
=========

[![Latest Stable Version](https://img.shields.io/packagist/v/raphaeu/async)](https://packagist.org/packages/raphaeu/async)
[![Total Downloads](https://img.shields.io/packagist/dt/raphaeu/async)](https://packagist.org/packages/raphaeu/async)
[![Author](https://img.shields.io/badge/author-raphaeu-blue.svg)](https://www.linkedin.com/in/rafael-aguiar-74824922/)
[![License](https://img.shields.io/github/license/raphaeu/async)](https://packagist.org/packages/raphaeu/async)

Fazer resquisições multitask assíncronas com PHP de forma fácil e eficiente.

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
while ($totalOk = $async->hasDo())
{
    echo "Rodando: ".((count($async->getTasks()) - $totalOk) + 1)."/". count($async->getTasks()) ."\r";
    usleep(250);
}

// Pegando resultados das tarefas
foreach ($async->getTasks() as $task)
{
    echo PHP_EOL. $task->getResult();
}

```
#### Arquivo do teste assíncrono <B>randTimer.php</b>
```php
<?php
  sleep(rand(1, 5));
  echo time();
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

Por favor, reporte os bugs para [GitHub Issue Tracker](https://github.com/raphaeu/async/issues).

Copyright
---------

Este projeto está licenciado sob a [MIT License](https://github.com/raphaeu/async/blob/master/LICENSE).
