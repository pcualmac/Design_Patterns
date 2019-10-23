<?php
require_once __DIR__ . '/../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
// use jerry\Range;
use Compositor\Part;
use Compositor\Assembly;
use Compositor\Item;

// require_once(getcwd().'/src/Momento.php');

class CompositorTest extends TestCase
{
    public function testStarTtype()
    {
        $part1 = new Part('AAA',1);
        $this->assertInstanceOf(Part::class, $part1);
        $this->assertInstanceOf(Item::class, $part1);
        $this->assertTrue(is_string($part1->getDescription()));
        $part2 = new Assembly('ZZZZ',array());
        $this->assertInstanceOf(Assembly::class, $part2);
        $this->assertInstanceOf(Item::class, $part2);
        $this->assertTrue(is_string($part2->getDescription()));
    }

    public function testDescription()
    {
        $part1 = new Part("AAA",1);
        $this->assertEquals("AAA", $part1->getDescription());
        $part2 = new Assembly('ZZZZ',array());
        $this->assertEquals('ZZZZ', $part2->getDescription());
        $part2->addItem($part1);
        $this->assertEquals('AAA', $part2->getItem('AAA')->getDescription());
    }

    public function testStarSize()
    {
        $part1 = new Part("AAA",1);
        $this->assertSame(-1, $part1->getCount());
        $this->assertEquals("AAA", $part1->getDescription());
        $part2 = new Assembly('ZZZZ',array());
        $this->assertSame(0, $part2->getCount());
        $this->assertEquals('ZZZZ', $part2->getDescription());
        $part2->addItem($part1);
        $this->assertSame(1, $part2->getCount());
    }

    public function testItem()
    {
        $part1 = new Part("AAA",1);
        $this->assertEquals(1, $part1->getItem()->getVal());
        $part2 = new Assembly('ZZZZ',array());
        $this->assertSame(-2, $part2->getItem(array()));
        $this->assertSame(-1, $part2->getItem('just a test'));
        $part2->addItem($part1);
        $this->assertSame($part1->getVal() , $part2->getItem('AAA')->getVal());
        $this->assertSame($part1->getDescription() , $part2->getItem('AAA')->getDescription());
    }
}