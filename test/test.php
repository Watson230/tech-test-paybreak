<?php 

use PHPUnit\Framework\TestCase;
use App\FraudDetect;
require 'paybreak.php';


class PaybreakTest extends TestCase
{
    // parse comma separated string of elements in 3 elements, postcode, timestamp and amount
    public function test_Parse_String()
    {
    $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00';
    $fraudDetect = new FraudDetect([],10,'');
    $result = $fraudDetect->parseString($exampleString);
    $expect = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11', '10.00');
    $this->assertEquals($expect, $result);
    }

    // // parse comma seperated string and store the data in an $APPLICATION_STORE  array, by is hashed postcode value
    public function test_application_parse_and_store()
    {
    $array=[];
    $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00';
    $fraudDetect = new FraudDetect([],10,'');
    $result = $fraudDetect->applicationParseAndStore($exampleString);
    $array['7a81b904f63762f00d53c4d79825420efd00f5f9'] = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11','10.00');
    $expect = $array;
    $this->assertEquals($expect, $result);
    }

        // add application value to the value that already exists for that hashed postcode stored in $APPLICATION_STORE 
    public function test_accumalate_application_transactions()
        {
        $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00';
        $fraudDetectDummy = new FraudDetect([],30,'');
        $testArray = $fraudDetectDummy->applicationParseAndStore($exampleString);

        $fraudDetect = new FraudDetect($testArray ,30,'');
        $result = $fraudDetect->accumalateApplicationTransactions($exampleString);
        $array['7a81b904f63762f00d53c4d79825420efd00f5f9'] = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11','20.00');
        $expect = $array;
        $this->assertEquals($expect, $result);
        }

}
