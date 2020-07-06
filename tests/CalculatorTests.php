<?php

use PHPUnit\Framework\TestCase;
use IW\Workshop\Calculator;

class CalculatorTests extends TestCase{
    public function testAdd(): void{
        $this->assertEquals(9, Calculator::add(7,2));

        $this->assertEquals(-9, Calculator::add(-7,-2));

        $this->assertEquals(9, Calculator::add(11,-2));

        $this->assertEquals(-3, Calculator::add(-7,4));

        $this->assertEquals(9.5, Calculator::add(7.25,2.25));
    }

    public function testDivide(): void{

        $this->assertEquals(25, Calculator::divide(125,5));

        $this->assertEquals(5, Calculator::divide(-10,-2));

        $this->assertEquals(-2, Calculator::divide(10,-5));
    }

    public function testExceptionOfDivide(): void{

        $this->expectException(InvalidArgumentException::class);

        Calculator::divide(5,0);
    }

}