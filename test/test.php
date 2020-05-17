<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 16/05/20
 * Time: 14:44
 */
require __DIR__ . '/../vendor/autoload.php';

use \async\Task;

$task1 = new Task("php /tmp/a.php");
$task2 = new Task("php /tmp/a.php");
$task3 = new Task("php /tmp/a.php");
$task4 = new Task("php /tmp/a.php");


$async = new \async\Async();

$async->addTask($task1);
$async->addTask($task2);
$async->addTask($task3);
$async->addTask($task4);


while ($async->hasDo())
{
    usleep(250);
}
