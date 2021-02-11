<?php


namespace App\Tests\Service;


use App\Service\CalculatorService;
use PHPUnit\Framework\TestCase;

class CalculatorServiceTest extends TestCase
{
    public function testAdd() {
        $calculator = new CalculatorService();
        $result = $calculator->add(1,1);

        $this->assertEquals(2,$result);
    }
}