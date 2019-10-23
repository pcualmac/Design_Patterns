<?php
require_once __DIR__ . '/../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
// use jerry\Range;
use Compositor\Part;

// require_once(getcwd().'/src/Momento.php');

class MomentoTest extends TestCase
{
    public function testInternalType()
    {
        $stack = new Momento(3);
        $this->assertInternalType('boolean', $stack->isEmpty());
        $this->assertInternalType('int', $stack->size());
    }
    public function testStartValue()
    {
        $stack = new Momento(3);
        $this->assertSame(0, $stack->size());
        $this->assertSame(null, $stack->top());
        $this->assertSame(3, $stack->getLimit());
    }

    public function testpop()
    {
        $stack = new Momento(3);
        $stack->push(new Part('this is a test', 7));
        $this->assertSame(1, $stack->size());
        $this->assertSame(false, $stack->isEmpty());
    }
}