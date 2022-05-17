<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

  

   
   // check wheather we are logged in 
   if (isset($_SESSION['id'])) 
   {
       $faker = Faker\Factory::create();


   for ($i = 0; $i <5; $i++)
   {
      $studentid = $faker->numberBetween(20000001, 99999999);
      $password = password_hash($faker->password(), PASSWORD_DEFAULT);
      $dob = $faker->date($format = 'Y-m-d', $max = '-18 years');
      $firstname = $faker->firstName($gender = null | 'male'|'female');
      $lastname = $faker->lastName();
      $streetAdress = $faker->streetAddress();
      $town = "London";
      $county = "Greater London";
      $country = "United Kingdom";
      $postcode =  "SW1" . $faker->numberBetween(0, 1) . " " . 
      $faker->randomNumber(2, false) . 
      strtoupper($faker->randomLetter()) . strtoupper($faker->randomLetter());

      $sql = "INSERT INTO student (studentid, password, DOB, firstname, lastname, house, town, county, country, postcode)
      VALUES ('$studentID', '$password', '$dob', '$firstName', '$lastName', '$streetAdress', '$town', '$county', '$country',
       '$postCode')";
      
      $result = mysqli_query($conn, $sql);
    }
  
   }

   


