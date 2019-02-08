# tech-test-paybreak

### PayBreak Coding Task - load fraud detection

### Approach

- TDD was used to develop my solution to this tech test, my tests and evidence of my thought process can be found in the "test/test.php" file.

To solve this task I created a FraudDetect class that requires 3 external varibles, 
- Blank Application_Store array to store loan applications,
- Integer for the Application threshold total E.G 50
- Application list array containing comma seperate strings containing information on loan applications e.g "7a81b904f63762f00d53c4d79825420efd00f5f9, 2019-01-29T13:12:11, 10.00 "

The class has a main public function named "fraudCheck", this should be envoked in order to parse the list of loan applications for fraudulant applications.

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
    "require": {
        "twbs/bootstrap": "^4.2"
    }
}


```

## Installing

clone repository : https://github.com/Watson230/tech-test-paybreak

cd into cloned repository 

Install composer files -  composer insteall

## Running the test suite

- run the test suite by running vendor/bin/phpunit test/test.php in your terminal
- Testing was carried out using PHPUnit.

## Running locally 

- Run the index.php file locally by running php -S localhost:8000 index.php in your terminal
- Here you will see a more visual representation of the test cases and inputs used to test the desired functionality
- All tests used a array of comma seperated 'loan application' strings