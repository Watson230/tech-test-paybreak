<?php 

use PHPUnit\Framework\TestCase;

class paybreakTest extends TestCase
{
    // parse comma separated string of elements in 3 elements, postcode, timestamp and amount
    public function testparseString()
    {
    $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9, 2019-01-29T13:12:11, 10.00';
    $FraudDetect = new Fraud_Detect;
    $result = $FraudDetect->parseString();
    $expect = array('SW11AA','2019-01-29T13:12:11', '10.00');
    $this->assertEquals($expect, $result);
    }
}
