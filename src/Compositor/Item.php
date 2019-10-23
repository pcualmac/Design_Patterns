<?php
namespace Compositor;

use JsonSerializable;
use Visitor\Visitable as Visitable;
use Visitor\Visitor as Visitor;

abstract class Item implements JsonSerializable, Visitable
{
	private $description;
	private $val;
	private $type;
	
	public function __construct($description, $val=null) {
		$this->description = $description;
		$this->val = $val;
		if($val==null || is_array($val))
		{
			$this->type='tree';
		}
		else
		{
			$this->type='leaf';
		}
	}
	
	public function getDescription() {
		return $this->description;
	}
	
	public function getVal() {
		return $this->val;
	}
	public function setVal($val) {
		$this->val=$val;
	}
	
	public function getCount() {
		if($this->type=='leaf')
		{
			return -1;
		}
		else return count($this->val);
	}

    public function jsonSerialize()
    {
        return 
        [
            'description'   => $this->description,
            'val' => $this->val,
        ];
    }

	public abstract function addItem(Item $item);
	public abstract function removeItem(Item $item);
	public abstract function getItems();

	

	public function __toString() {
		if($this->type == 'leaf') return $this->description . ' (val = ' . $this->val . ') (type = ' . $this->type . ')';
		else
		{
			// return 'assembly';

			return $this->description . ' (count = ' . $this->getCount() . ')';
		}
	}
	public function accept(Visitor $visitor)
	{
		$visitor->visit($this);
	}
}
?>