<?php
require_once('FraudCheck.php');
use App\FraudDetect;

$testData1 = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00',
'6a81b904f63762f00d53c4d69825420efd00f5f9,2019-01-29T13:12:11,10.00',
'5a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-31T13:15:11,30.00',
'3a81b904f63762f00d53c4d79825420efd00f5f9,2019-02-29T13:12:11,10.00',
'2a81b904f63762f00d53c4d69825420efd00f5f9,2019-02-29T13:12:11,10.00',
'1a81b904f63762f00d53c4d79825420efd00f5f9,2019-02-31T13:15:11,10.00');

$testData2 = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00',
'6a81b904f63762f00d53c4d69825420efd00f5f9,2019-01-29T13:12:11,10.00',
'7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-31T13:15:11,10.00');

$testData3 = array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00',
'6a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:15,10.00',
'6a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:15:11,40.00');

$testData4= array('7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:11,10.00',
'6a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:12:15,10.00',
'6a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:15:11,40.00',
'5a72b504f63762f00d53c4d79825420efd00f5f9,2019-01-29T13:15:11,10.00',
'7a81b904f63762f00d53c4d79825420efd00f5f9,2019-01-30T01:12:11,50.00')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paycheck- Fraud detect</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>



<div class="container">

    <h1>Loan Application Fraud Check</h1>

    <div class="row">

    <div class="col-sm-6 border"> 
        <h2>Test Case 1</h2>
        <p> No fraudulent applications</p>
        <h5>Application Threshold = 40</h5>
        <h5>Test Data 1</h5>
            <?php foreach($testData1 as $applicationString):?>

            <p><?php echo $applicationString?> </p>

            <?php endforeach; ?>

        <h4>Fraudulent:</h4>
            <?php
            $fraudDetect = new FraudDetect([],40,$testData1);
            $answer = $fraudDetect->fraudCheck();
            if(!$answer) echo 'None Found';
            else echo $answer
            ?>
    </div>


    <div class="col-sm-6 border">   
        <h2>Test Case 2 </h2>
        
       <p> No fraudulent applications - repeated postcode transaction exceeding threshold +24 hours apart </p>

        <h5>Application Threshold = 40</h5>

        <h5>Test Data 2</h5>
            <?php foreach($testData2 as $applicationString):?>

            <p><?php echo $applicationString?> </p>

            <?php endforeach; ?>

        <h3>Fraudulent:</h3>
            <?php
            $fraudDetect = new FraudDetect([],40,$testData2);
            $answer = $fraudDetect->fraudCheck();
            if(!$answer) echo 'None Found';
            else echo $answer
            ?>
    </div>

    </div>
    <div class="row">
    <div class="col-sm-6 border">

        <h2>Test Case 3</h2>
        <p> Fraudulent applications - single postcode </p>

        <h5>Application Threshold = 30</h5>

        <h5>Test Data 3</h5>
            <?php foreach($testData3 as $applicationString):?>

            <p><?php echo $applicationString?> </p>

            <?php endforeach; ?>

        <h4>Fraudulent:</h4>
            <?php
            $fraudDetect = new FraudDetect([],30,$testData3);
            $answer = $fraudDetect->fraudCheck();
            if(!$answer) echo 'None Found';
            else foreach($answer as $postcode) {
                echo $postcode, '<br>';
            }
            ?>

    </div>

    <div class="col-sm-6 border">
     <h2>Test Case 4</h2>
     <p> Fraudulent applications - multiple postcode </p>
        <h5>Application Threshold = 30</h5>

        <h5>Test Data 4</h5>
            <?php foreach($testData4 as $applicationString):?>

            <p><?php echo $applicationString?> </p>

            <?php endforeach; ?>

        <h4>Fraudulent:</h4>
            <?php
            $fraudDetect = new FraudDetect([],30,$testData4);
            $answer = $fraudDetect->fraudCheck();
            if(!$answer) echo 'None Found';
            else foreach($answer as $postcode) {
                echo $postcode, '<br>';
            }
            ?>
    </div>

    </div>

</div>

</body>
</html>