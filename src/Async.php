<?php
namespace async;

/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 16/05/20
 * Time: 12:25
 */
namespace async;

class Async
{
    private $tasks = [];
    private $path = '/tmp/';

    public function __construct($path = null)
    {
        $this->path = is_null($path)?$this->path:$path;
    }

    public function addTask(Task $task)
    {
        $this->tasks[] = $task;
    }

    public function getTasks()
    {
        return $this->tasks;
    }
    
    public function hasDo()
    {
        $running =  0;
        foreach ($this->tasks as $task) {
            if ($task->run($this->path)) {
                $running++;
            }
        }
        return $running;
    }

}