<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 16/05/20
 * Time: 14:44
 */
require __DIR__ . '/../vendor/autoload.php';

use async\Task;
use async\Async;

$task1 = new Task("php /tmp/a.php");
$task2 = new Task("php /tmp/a.php");
$task3 = new Task("php /tmp/a.php");
$task4 = new Task("php /tmp/a.php");


$async = new Async();

$async->addTask($task1);
$async->addTask($task2);
$async->addTask($task3);
$async->addTask($task4);

while ($totalOk = $async->hasDo())
{

    $isRunnning = $isDone = '';

    foreach ($async->getTasks() as $task)
    {
        $isRunnning .=  $task->isRunning()?'R':'.';
        $isDone .=  $task->isDone()?'D':'.';

    }    
    echo "Rodando: {$isRunnning} {$isDone} ".((count($async->getTasks()) - $totalOk))."/". count($async->getTasks()) ."\r";
    usleep(250);

}


foreach ($async->getTasks() as $task)
{
    echo PHP_EOL. $task->getResult();
}
