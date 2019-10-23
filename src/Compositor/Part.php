<?php
namespace Compositor;


class Part extends Item {
	
	public function __construct($description, $cost) {
		parent::__construct($description, $cost);
	}
	
	// Empty implementations for unit parts
	public function addItem(Item $item) {}
	public function removeItem(Item $item) {}
	public function getItems() {
		return array();
	}
	public function getItem() {
		return $this;
	}
	
}
?>