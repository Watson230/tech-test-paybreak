<?php namespace App;

class FraudDetect {

    public $APPLICATION_STORE ;
    public $APPLICATION_AMOUNT_THRESHOLD;
    public $APPLICATION_LIST ;

    public function __construct($applicationStore, $Threshold_Amount,$AplicationList) {
        $this->APPLICATION_STORE = $applicationStore;
         $this->APPLICATION_AMOUNT_THRESHOLD = $Threshold_Amount;
        $this->APPLICATION_LIST = $AplicationList;    
    }

    public function parseString($string){
        $splitString = explode(',',$string);
        return $splitString;
    }

    public function applicationParseAndStore($applicationString){ 
        $splitString = $this->parseString($applicationString);
        $this->APPLICATION_STORE[$splitString [0]]=  $splitString ;
        return $this->APPLICATION_STORE;
    }


    public function accumalateApplicationTransactions($applicationString){

    
      $stringArray = $this->parseString($applicationString);
        $value =  $stringArray[2];
        $time_Stamp = $stringArray[1];
        $post_code_hash= $stringArray[0];   

        if( array_key_exists($post_code_hash,$this->APPLICATION_STORE)){
            $this->APPLICATION_STORE[$post_code_hash][2] = $this->APPLICATION_STORE[$stringArray[0]][2] + $value;
           
            return $this->APPLICATION_STORE;
        }

        
        else{
            // var_dump($APPLICATION_STORE,'dewwd');
            $this->applicationParseAndStore($applicationString);
        }

        


    }



}
