<?php namespace App;



class FraudDetect {

    public $APPLICATION_STORE =[] ;
    public $APPLICATION_AMOUNT_THRESHOLD;
    public $APPLICATION_LIST ;
    public $FRAUD_APAPPLICATIONS=[];

     function __construct($Threshold_Amount,$AplicationList) {
        $this->APPLICATION_AMOUNT_THRESHOLD = $Threshold_Amount;
        $this->APPLICATION_LIST = $AplicationList;    
    }

    private function parseString($string){
        $splitString = explode(',',$string);
        return $splitString;
    }

    private function applicationParseAndStore($applicationString){ 
        // parseString method called to parse the comma seperate loan application string into an array
        $splitAppString = $this->parseString($applicationString);

        //store the parsed application string in APPLICATION_STORE array with key = hashed postcode
        $this->APPLICATION_STORE[$splitAppString [0]]=  $splitAppString ;

        return $this->APPLICATION_STORE;
    }

    private function accumalateApplicationTransactions($applicationString){
        $stringArray = $this->parseString($applicationString);
        $value =  $stringArray[2];
        $time_Stamp = $stringArray[1];
        $post_code_hash= $stringArray[0];  
       
        //check to see if hashed post code is already stored in APPLICATION_STORE array
        if(array_key_exists($post_code_hash,$this->APPLICATION_STORE)){

            // create time stamps for the time of new application and the applicaiton stored in APPLICATION_STORE array for that hashed postcode.
            $new_application_time_stamp = strtotime($time_Stamp);
            $old_application_time_stamp =strtotime($this->APPLICATION_STORE[$post_code_hash][1]);

            // check to see if the value of new transaction + the stored value  will be more that the APPLICATION_AMOUNT_THRESHOLD
            if($this->APPLICATION_STORE[$post_code_hash][2] + $value > $this->APPLICATION_AMOUNT_THRESHOLD){

                // check to see if new application time is before the stored application time in APPLICATION_STORE array + 24 hours
                if ( $new_application_time_stamp < $old_application_time_stamp + 24*60*60  ){
                    
                    // hashed postcode from fraudulent transaction is pushed to FRAUD_APAPPLICATIONS array
                    $this->FRAUD_APAPPLICATIONS[] = $post_code_hash;
                    return $this->FRAUD_APAPPLICATIONS;
                } 
                // if new application time is after the stored application time in APPLICATION_STORE array + 24 hours, 
                // the values stored in APPLICATION_STORE array for that hashed postcode are over written with the new values for that postcode
                else {
                        return $this->applicationParseAndStore($applicationString);
                    }
            }
            //if the value of new application value + the stored value will not be more that the APPLICATION_AMOUNT_THRESHOLD
            //the new application value is added to the one stored in the APPLICATION_STORE array for that hashed postcode
            else {
                $this->APPLICATION_STORE[$post_code_hash][2] = $this->APPLICATION_STORE[$post_code_hash][2] + $value; 
            }
            return $this->APPLICATION_STORE;
        }

        // if an application for a hashed post code is not already stored in APPLICATION_STORE array, 
        // applicationParseAndStore method is called 
        else {
            $this->applicationParseAndStore($applicationString);
        }
            
    }

    public function fraudCheck (){
        // loop through APPLICATION_LIST and pass each application string into accumalateApplicationTransactions method
        foreach ($this->APPLICATION_LIST  as $appString) {
            $this->accumalateApplicationTransactions($appString);
        }
 
        return $this->FRAUD_APAPPLICATIONS;
    }
}
