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
class Preorder implements Visitor
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
    		// var_dump(get_class($item));
    		// die('Jerry');
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

    public function visit(Item $item)
    {
    	$str='';
    	if($item instanceof Part)
    	{
    		$str= $item->getDescription();
    	}
    	else
    	{
    		//Create a LIFO
    		$plaseholder = new Momento();
    		$elemetsR=array_reverse($item->getItems());
    		foreach ($elemetsR as $value) {
    			$plaseholder->pudh($value);
    		}
    		while(!$plaseholder->isEmpty())
    		{
    			$temp=$plaseholder->pop;
    			$tempelemetsR=array();
    			if($temp instanceof Part)
    			{
    				$str+=$temp->getDescription();
    			}
    			else
    			{
    				$str+=$temp->getDescription();
    				$tempelemetsR=array_reverse($temp->getItems());
    			}
    		}
    	}
    	echo $str;
    }
}