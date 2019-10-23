<?php
namespace Compositor;


class Assembly extends Item {

	private $items = array();
	
	public function __construct($description,$val) {
		parent::__construct($description,$val);
	}
	
	public function addItem(Item $item) {
		$this->items[$item->getDescription()]=$item;
		// array_push($this->items, $item);
		parent::setVal($this->items);
		// var_dump($this->items);
	}
	
	public function removeItem(Item $item) {
		unset($this->items[$item]);
		parent::setVal($this->items);
	}

	public function getItem($key) {
		if(!is_string($key))
		{
			return -2;
		}
		if(!array_key_exists($key, $this->items))
		{
			return -1;
		}
		return $this->items[$key];
	}

	public function getItems() {
		return $this->items;
	}

	public function getJson() {
		return json_encode($this->items,true);
	}

	public function pop() {
		$temp=array_shift($this->items);
		parent::setVal($this->items);
		return $temp;
	}
	
	// Also have to override getVal() 
	public function getVal() {
		$val = array();
		foreach ($this->items as $item):
			$val[] = $item->getVal();
		endforeach;
		return $val;
	}
}
?>