<?php 

use PHPUnit\Framework\TestCase;
require 'paybreak.php';
use App\FraudDetect;

class PaybreakTest extends TestCase
{
    // parse comma separated string of elements in 3 elements, postcode, timestamp and amount
    public function test_Parse_String()
    {
    $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00';
    $fraudDetect = new FraudDetect;
    $result = $fraudDetect->parseString($exampleString);
    $expect = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11', '10.00');
    $this->assertEquals($expect, $result);
    }

    // parse comma seperated string and store the data in an Application store array, by is hashed postcode value
    public function test_application_parse_and_store()
    {
    $array=[];
    $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00';
    $fraudDetect = new FraudDetect;
    $result = $fraudDetect->applicationParseAndStore($exampleString);
    $array['7a81b904f63762f00d53c4d79825420efd00f5f9'] = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11','10.00');
    $expect = $array;
    $this->assertEquals($expect, $result);
    }

}
