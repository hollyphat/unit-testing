<?php
/**
 * Created by PhpStorm.
 * User: Hollyphat
 * Date: 11/25/2019
 * Time: 2:53 PM
 */

require "Calculator.php";
class CalculatorTest extends PHPUnit_Framework_TestCase
{
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new Calculator();
    }

    protected function tearDown()
    {
        $this->calculator = NULL;
    }

    public function addDataProvider() {
        return array(
            array(1,2,3),
            array(0,0,0),
            array(-1,-1,-2),
        );
    }

    public function testWithStub()
    {
        // Create a stub for the Calculator class.
        $calculator = $this->getMockBuilder('Calculator')
            ->getMock();

        // Configure the stub.
        $calculator->expects($this->any())
            ->method('add')
            ->will($this->returnValue(6));

        $this->assertEquals(6, $calculator->add(100,100));
    }

    /*public function testAdd()
    {
        $result = $this->calculator->add(1, 2);
        $this->assertEquals(3, $result);
    }*/

    /**
     * @dataProvider addDataProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $result = $this->calculator->add($a, $b);
        $this->assertEquals($expected, $result);
    }
}