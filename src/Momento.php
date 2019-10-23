<?php

use Compositor\Item as Item;


class Momento
{
    private $stack;
    private $limit;
    
    public function __construct($limit = 200) {
        // initialize the stack
        $this->stack = array();
        $this->limit = $limit;
    }

    public function push(Item $item) {
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_unshift($this->stack, $item);
        } else {
        	$this->limit=$this->limit+10;
        	$this->push($item);
        }
    }

    public function pop() {
        if ($this->isEmpty()) {
            // trap for stack underflow
	      throw new RunTimeException('Stack is empty!');
	  } else {
            // pop item from the start of the array
            return array_shift($this->stack);
        }
    }

    public function top() {
        if($this->isEmpty()) return null;
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }
    public function size() {
        return count($this->stack);
    }
    public function getLimit() {
        return $this->limit;
    }
}