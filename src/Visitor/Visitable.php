<?php
namespace Visitor;

interface Visitable {
	public function accept(Visitor $visitor);
}
?>