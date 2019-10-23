<?php


class Range {
	
	private $visitor;
	private $index = 0;
	
	public function __construct($visitor) {
		$this->visitor = $visitor;
	}
	
	public function rewind() {
		return $this->index = 0;
	}
	
	public function valid() {
		return isset($this->visitor[$this->index]);
	}
	
	public function current() {
		return $this->visitor[$this->index];
	}
	
	public function key() {
		return $this->index;
	}
	
	public function next() {
		$this->index++;
	}
	
}
?>