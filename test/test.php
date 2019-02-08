<?php 

use PHPUnit\Framework\TestCase;
use App\FraudDetect;
require 'FraudCheck.php';

//*** NOTE -redundant unit tests have been left in to show the logical approach i took to solve this tech test *****

class PaybreakTest extends TestCase
{
    // Test case 1 - parse comma separated string of elements in 3 elements, postcode, timestamp and amount
        // public function test_Parse_String()
        // {
            // $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00';
            // $fraudDetect = new FraudDetect([],10,'');
            // $result = $fraudDetect->parseString($exampleString);
            // $expect = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11', '10.00');
            // $this->assertEquals($expect, $result);
        // }

    //Test case 2 -  parse comma seperated string and store the data in an $APPLICATION_STORE  array, by is hashed postcode value
        // public function test_application_parse_and_store()
        // {
            // $array=[];
            // $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00';
            // $fraudDetect = new FraudDetect([],10,'');
            // $result = $fraudDetect->applicationParseAndStore($exampleString);
            // $array['7a81b904f63762f00d53c4d79825420efd00f5f9'] = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11','10.00');
            // $expect = $array;
            // $this->assertEquals($expect, $result);
        // }

    // Test case 3 - add application value to the value that already exists for that hashed postcode stored in $APPLICATION_STORE 

            // public function test_accumalate_application_transactions()
            //     {
            //     $exampleString = '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00';
            //     $fraudDetectDummy = new FraudDetect([],30,'');
            //     $testArray = $fraudDetectDummy->applicationParseAndStore($exampleString);

            //     $fraudDetect = new FraudDetect($testArray ,30,'');
            //     $result = $fraudDetect->accumalateApplicationTransactions($exampleString);
            //     $array['7a81b904f63762f00d53c4d79825420efd00f5f9'] = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11','20.00');
            //     $expect = $array;
            //     $this->assertEquals($expect, $result);
            //     }


    // Test case 4 - accumalate the appliction value for each hashed postcode in the storage array - 1 post code
        // public function test_fraud_check_accumalate_transaction_Total_1_Postcode()
        // {
            // $exampleStringArray = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00','7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00','7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00');
            // // $fraudDetectDummy = new FraudDetect([],30,'');
        
            // $fraudDetect = new FraudDetect([] ,40,$exampleStringArray );
            // $result = $fraudDetect->fraudCheck();
            // $array['7a81b904f63762f00d53c4d79825420efd00f5f9'] = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11','30.00');
            // $expect = $array;
            // $this->assertEquals($expect, $result);
        // }

    // Test case 5 - accumalate the appliction value for each hashed postcode in the storage array - 2 post code
        // public function test_fraud_check_accumalate_transaction_Total_2_Postcode()
        // {
            // $exampleStringArray = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00','7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00','6a81b904f63762f00d53c4d69825420efd00f5f9,2019-01-29T13:12:11,10.00');
            // // $fraudDetectDummy = new FraudDetect([],30,'');
        
            // $fraudDetect = new FraudDetect([] ,30,$exampleStringArray );
            // $result = $fraudDetect->fraudCheck();
        
            // $array['7a81b904f63762f00d53c4d79825420efd00f5f9'] = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11','20.00');
            // $array['6a81b904f63762f00d53c4d69825420efd00f5f9'] = array('6a81b904f63762f00d53c4d69825420efd00f5f9','2019-01-29T13:12:11','10.00');
            
            // $expect = $array;
            // $this->assertEquals($expect, $result);
        // }

    // Test case 6 - accumalate the appliction value for each hashed postcode in the storage array - 2 post code
        // public function test_fraud_check_accumalate_transaction_against_APPLICATION_AMOUNT_THRESHOLD()
        // {
            // $exampleStringArray = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00','7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00','6a81b904f63762f00d53c4d69825420efd00f5f9,2019-01-29T13:12:11,10.00');
            // // $fraudDetectDummy = new FraudDetect([],30,'');
        
            // $fraudDetect = new FraudDetect([] ,20,$exampleStringArray );
            // $result = $fraudDetect->fraudCheck();
        
            // $array['7a81b904f63762f00d53c4d79825420efd00f5f9'] = array('7a81b904f63762f00d53c4d79825420efd00f5f9','2019-01-29T13:12:11','20.00');
            // $array['6a81b904f63762f00d53c4d69825420efd00f5f9'] = array('6a81b904f63762f00d53c4d69825420efd00f5f9','2019-01-29T13:12:11','10.00');
            
            // $expect = $array;
            // $this->assertEquals($expect, $result);
        // }


     // Test case 7 - check time stamp between each transiton for a hashed postcode and check accumalted value against application threshold 
     //               no Fraud application present
        public function test_fraud_check_within_24H_No_Fraud_present_test1()
        {
            $exampleStringArray = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00',
                                        '6a81b904f63762f00d53c4d69825420efd00f5f9,2019-01-29T13:12:11,10.00',
                                        '5a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-31T13:15:11,30.00',
                                        '3a81b904f63762f00d53c4d79825420efd00f5f9,2019-02-29T13:12:11,10.00',
                                        '2a81b904f63762f00d53c4d69825420efd00f5f9,2019-02-29T13:12:11,10.00',
                                        '1a81b904f63762f00d53c4d79825420efd00f5f9,2019-02-31T13:15:11,10.00');
        
            $fraudDetect = new FraudDetect(20,$exampleStringArray );
            $result = $fraudDetect->fraudCheck();

            $array= [];
            
            $expect = $array;
            $this->assertEquals($expect, $result);
        }
  

     // Test case 8 - check time stamp between each transiton for a hashed postcode and check accumalted value against application threshold 
     //               no Fraud application present, 2 applications from 1 postcode 24 hours apart

        public function test_fraud_check_within_24H_No_Fraud_present_test2_24H_apart()
        {
            $exampleStringArray = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00',
                                        '6a81b904f63762f00d53c4d69825420efd00f5f9,2019-01-29T13:12:11,10.00',
                                        '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-31T13:15:11,10.00');
        
            $fraudDetect = new FraudDetect(30,$exampleStringArray );
            $result = $fraudDetect->fraudCheck();

            $array= [];
            
            $expect = $array;
            $this->assertEquals($expect, $result);
        }

    // Test case 9 - check time stamp between each transiton for a hashed postcode and check accumalted value against application threshold 
     //               1 Fraud application present
        public function test_fraud_check_within_24H_Fraud_present_test1()
        {
            $exampleStringArray = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00',
                                        '6a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:15,10.00',
                                        '6a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:15:11,40.00');
        
            $fraudDetect = new FraudDetect(30,$exampleStringArray );
            $result = $fraudDetect->fraudCheck();

            $array= ['6a81b904f63762f00d53c4d79825420efd00f5f9'];
            
            $expect = $array;
            $this->assertEquals($expect, $result);
        }

    // Test case 10 - check time stamp between each transiton for a hashed postcode and check accumalted value against application threshold 
     //               2 Fraud application present
        public function test_fraud_check_within_24H_Fraud_present_test2()
        {
            $exampleStringArray = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00',
                                        '6a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:15,10.00',
                                        '6a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:15:11,40.00',
                                        '5a72b504f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:15:11,10.00',
                                        '7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-30T01:12:11,50.00');
        
            $fraudDetect = new FraudDetect(30,$exampleStringArray );
            $result = $fraudDetect->fraudCheck();

            $array= ['6a81b904f63762f00d53c4d79825420efd00f5f9', '7a81b904f63762f00d53c4d79825420efd00f5f9'];
            
            $expect = $array;
            $this->assertEquals($expect, $result);
        }

}
