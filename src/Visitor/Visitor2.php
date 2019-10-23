<?php
namespace src\Visitor

interface Visitor2 {
	public function visitPart(Item $item);
	public function visitAssembly(Item $item);
}

?>