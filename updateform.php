<?php
$servername = "localhost";
$username = "rectubmx_customer";
$password = "Rakesh@2023";
$dbname = "rectubmx_customerquery";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formID = $_GET['form_id'];
    
    $centerCode = $_POST['exampleInputCenter_Code'];
    $firstName = $_POST['exampleInputFirst_Name'];
    $lastName = $_POST['exampleInputLast_Name'];
    $dateOfBirth = $_POST['exampleInputDOB'];
    $phoneNumber = $_POST['exampleInputPhone_Number'];
    $address = $_POST['exampleInputAddress'];
    $city = $_POST['exampleInputCity'];
    $state = $_POST['state'];
    $zip = $_POST['exampleInputZip'];
    $income = $_POST['exampleInputIncome'];
    $socialSecurity = $_POST['exampleInputSocial_Security'];
    $email = $_POST['exampleInputEmail'];
    $bankName = $_POST['exampleInputBank_Name'];
    $accountNumber = $_POST['exampleInputAccount_Number'];
    $isAbleToSpend = isset($_POST['blankCheckbox']) ? 'Yes' : 'No';
    $isInterested = isset($_POST['blankCheckbox2']) ? 'Yes' : 'No';

    // Build the SQL query to update the record in the database
    $sql = "UPDATE formcliant SET Center_Code='$centerCode', First_Name='$firstName', Last_Name='$lastName', DOB='$dateOfBirth', Phone_Number='$phoneNumber', Address='$address', City='$city', State='$state', Zip='$zip', Income='$income', Social_Security='$socialSecurity', Email='$email', Bank_Name='$bankName', Account_Number='$accountNumber',dt=NOW() , IsAbleToSpend='$isAbleToSpend', IsInterested='$isInterested' WHERE sno='$formID'";

    // Execute the SQL query and check if the update was successful
    if ($conn->query($sql) === TRUE) {
        header("Location: thank.php?success=1&formSNo=$formID");
    } else {
        echo "Error updating main columns: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

