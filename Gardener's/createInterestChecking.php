<?php
 include_once'connection.php';
  session_start();
?>

<?php

$user = $_SESSION["sessionUser"];
$userSSN = "";

$sql = "Select * FROM users WHERE username = '$user'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
   $userSSN = $row['ssn'];
   $userName = $row['name'];
}

$sql = "INSERT INTO account (account, balance, type, person1, SSN1, Person1Type)
VALUES ('default', '0', 'Interest Checking', '$userName', '$userSSN', 'Owner')";
if($conn->query($sql)===TRUE)
{
    
}else
{
    echo "Error: " . $conn->error;
}
    echo "A new account has been created. Proceed to the transfers tab to fund your new account.";
?>