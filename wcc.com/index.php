<?php

$passengerName
=$telephone
=$email
=$city
=$flightNumber=$fromCountryCity=$arrivalAirport
=$arrivalDate
=$arrivalTime
=$finalDestination
=$pickUpDate
=$pickUpTime
=$departureFlightNumber="";

//form input
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $passenger_salutation= test_input($_POST["passenger_salutation"]);
    $passengerName=test_input($_POST["name"]);
    $telephone= test_input($_POST["telephone"]);
    $email= test_input($_POST["email0"]);
    $travelledWithUsBefore = test_input($_POST["travelledwithusbefore"]);
    $country =  test_input($_POST["Your Country"]);
    $city= test_input($_POST["City2"]);
    $numberOfPeople= test_input($_POST["number of people"]);
    $golfBags=test_input($_POST["Golf Bags"]);
    $wheelChairs= test_input($_POST["Wheel Chairs"]);
    $bikes= test_input($_POST["Bikes"]);
    $babySeats= test_input($_POST["babyseats"]);
    $flightNumber= test_input($_POST["flight number"]);
    $fromCountryCity= test_input($_POST["from country city"]);
    $arrivalAirport= test_input($_POST["arrival airport"]);
    $arrivalDate= test_input($_POST["arrival date"]);
    $arrivalTime= test_input($_POST["arrival time"]);
    $finalDestination= test_input($_POST["final destination"]);
    $pickUpDate= test_input($_POST["pick up date"]);
    $pickUpTime= test_input($_POST["pick up time"]);
    $fromHotel= test_input($_POST["from hotel"]);
    $destinationTo= test_input($_POST["Destination to"]);
    $departureFlightNumber= test_input($_POST["departure flight number"]);
}

//error variables
$errorEmpty = "";
$errorName = "";
$errorEmail = "";


if(empty($passengerName) || empty($email))
    $errorEmpty = "Name and email are required!";

if(!preg_match("/^[a-zA-Z]*$/",$passengerName))
    $errorName = "Invalid Name! <br /> Name can only contain letters and whitespace!";

if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    $errorEmail = "Invalid email!";


//test input data
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}


$emailTo = "mandyharrington@eircom.net";
$emailSubject = "request";
$emailFrom="westcorkcoaches.com";
$emailHeaders = "Reply-To:" . $email . "\r\n"
               ."From: " . $emailFrom . "\r\n";
$successInput="";
if($errorEmpty=$errorName=$errorEmail=""){
    $date = date("Y.m.d")."    (year,month,day)";
    echo mail($emailTo
               ,$emailSubject
               ,"passenger_name: . $passenger_salutation . $passengerName \n
                 telephone: $telephone \n
                 email: $email \n
                 travelledwithusbefore: $travelledWithUsBefore \n
                 Your Country: $country \n
                 City: $city \n
                 number of people: $numberOfPeople \n
                 Golf Bags: $golfBags \n
                 Wheel Chairs: $wheelChairs \n
                 Bikes: $bikes \n
                 babyseats: $babySeats \n
                 flight number: $flightNumber \n
                 from country city: $fromCountryCity \n
                 arrival airport: $arrivalAirport \n
                 arrival date: $arrivalDate \n
                 arrival time: $arrivalTime \n
                 final destination: $finalDestination \n
                 pick up date: $pickUpDate \n
                 pick up time: $pickUpTime \n
                 from hotel: $fromHotel \n
                 Destination to: $destinationTo \n
                 departure flight number: $departureFlightNumber \n
                 Date: ",$emailHeaders);
    $successInput="The request has been successfully sent!";
    header('Location: HtmlPage.html');
    exit;
}
else{
    header('Location: ErrorUserInput.html');
    exit;
}


?>