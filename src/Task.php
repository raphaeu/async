<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 16/05/20
 * Time: 12:26
 */

namespace async;


class Task
{
    private $timeout;
    private $cmd;
    private $pid;
    private $running = null;
    private $result = null;

    public function __construct($cmd, $timeout = 5)
    {
        $this->cmd = $cmd;
        $this->timeout = $timeout;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function run($path)
    {
        if (is_null($this->running) )
        {
            $this->pid = exec("{$this->cmd} > {$path}$$ & echo $!");
            $this->running = 1;
        }elseif($this->running == 1){
            if (!is_numeric(exec('ps -o pid -p ' . $this->pid)))
            {
                $this->result = file_get_contents($path . ($this->pid - 1));
                $this->running = 0;
            }
        }
        return $this->running;
    }

}