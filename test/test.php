<?php 

use PHPUnit\Framework\TestCase;
require 'paybreak.php';
use App\FraudDetect;

class PaybreakTest extends TestCase
{
    // parse comma separated string of elements in 3 elements, postcode, timestamp and amount
    public function testParseString()
    {
    $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00';
    $fraudDetect = new FraudDetect;
    $result = $fraudDetect->parseString($exampleString);
    $expect = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11', '10.00');
    $this->assertEquals($expect, $result);
    }

    public function testApplicationParseAndStore()
    {
    $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00';
    $fraudDetect = new FraudDetect;
    $result = $fraudDetect->applicationParseAndStore($exampleString);
    $expect = array(array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11', '10.00'));
    $this->assertEquals($expect, $result);
    }

}
