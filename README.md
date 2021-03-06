# tech-test-paybreak

### PayBreak Coding Task - loan fraud detection

### Approach

- TDD was used to develop my solution to this tech test, my tests and evidence of my thought process can be found in the "test/test.php" file.

To solve this task I created a FraudDetect class that requires 2 external varibles, 
- Integer for the Application threshold total E.G 50
- Application list array containing comma seperate strings containing information on loan applications e.g "7a81b904f63762f00d53c4d79825420efd00f5f9, 2019-01-29T13:12:11, 10.00 "

The class has a main public function named "fraudCheck", this should be evoked by all instances in order to parse the input list of loan applications against the Application threshold, for fraudulant applications over a 24 hour window.

## Dependencies

```
{
    "autoload": {
        "classmap": [
            "src/"
        ]
    },
    "require-dev": {
        "phpunit/phpunit": "^6"
    },

}


```

## Installing

clone repository : https://github.com/Watson230/tech-test-paybreak

cd into cloned repository 

Install composer files -  composer install

## Running the test suite

- Run the test suite by running 'vendor/bin/phpunit test/test.php' in your terminal
- Testing was carried out using PHPUnit.

## Running locally 

- Run the index.php file locally by running 'php -S localhost:8000 index.php' in your terminal
- Here you will see the results of 4 examples which have ran within index.php
- All tests used a array of comma seperated 'loan application' strings

E.G 

```
$testData1 = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00',
'6a81b904f63762f00d53c4d69825420efd00f5f9,2019-01-29T13:12:11,10.00',
'5a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-31T13:15:11,30.00',
'3a81b904f63762f00d53c4d79825420efd00f5f9,2019-02-29T13:12:11,10.00',
'2a81b904f63762f00d53c4d69825420efd00f5f9,2019-02-29T13:12:11,10.00',
'1a81b904f63762f00d53c4d79825420efd00f5f9,2019-02-31T13:15:11,10.00');

```
