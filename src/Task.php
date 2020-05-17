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
    private $filename;

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
            $this->filename =  uniqid(rand(), true);
            $this->pid = exec("{$this->cmd} > {$path}{$this->filename} & echo $!");
            $this->running = 1;
        }elseif($this->running == 1){
            if (!is_numeric(exec('ps -o pid -p ' . $this->pid)))
            {
                $this->result = file_get_contents($path . $this->filename);
                unlink($path . $this->filename);
                $this->running = 0;
            }
        }
        return $this->running;
    }
}