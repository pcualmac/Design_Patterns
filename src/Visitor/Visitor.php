<?php
namespace Visitor;
use Compositor\Item as Item;

interface Visitor {
	public function visit(Item $item);
}

?>