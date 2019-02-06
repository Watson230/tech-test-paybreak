<?php namespace App;

class FraudDetect {

    var $APPLICATION_STORE=[];

    public function parseString($string){
        $splitString = explode(',',$string);
        return $splitString;
    }

    public function applicationParseAndStore($applicationString){ 
        $splitString = explode(',',$applicationString);
        $APPLICATION_STORE[$splitString [0]]=  $splitString ;
        return $APPLICATION_STORE;
    }

}
