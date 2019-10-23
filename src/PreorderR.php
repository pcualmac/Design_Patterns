<?php

use Visitor\Visitor;
use Visitor\Visitable;

use Compositor\Part;
use Compositor\Assembly;
use Compositor\Item as Item;


/**
 * Preorder Traversal:
 * visit the root node, then traverse the left subtree and finally traverse the right subtree.
 */
class PreorderR implements Visitor
{
	private $item;

    public function __construct(Item $item=null)
    {
    	if($item instanceof Assembly)
    	{
    		$this->item=$item;
    	}
    	else
    	{
    		$this->item = new  Assembly('new',array());
    	}
    }

    public function getItem()
    {
    	return $this->item;
    }

    public function setItem($item)
    {
    	return $this->item = $item;
    }

    public function visit(Item $item, $flag=null)
    {
    	if($item instanceof Part)
    	{
    		echo $item->getDescription();
    	}
    	else
    	{
    		if( $flag != null || $flag) echo $item->getDescription();
    		$this->visitRecursive($item->pop(), false);
    		$this->visitRecursive($item, false);
    	}
    }
}