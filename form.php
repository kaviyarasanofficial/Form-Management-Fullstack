<?php
$servername = "localhost";
$username = "rectubmx_customer";
$password = "Rakesh@2023";
$dbname = "rectubmx_customerquery";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // Sanitize and validate data
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

    // Prepare and execute the SQL statement
   $stmt = $conn->prepare("INSERT INTO formcliant (Center_Code, First_Name, Last_Name, DOB, Phone_Number, Address, City, State, Zip, Income, Social_Security, Email, Bank_Name, Account_Number, IsAbleToSpend, IsInterested) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("ssssssssisssssss", $centerCode, $firstName, $lastName, $dateOfBirth, $phoneNumber, $address, $city, $state, $zip, $income, $socialSecurity, $email, $bankName, $accountNumber, $isAbleToSpend, $isInterested);

        if ($stmt->execute()) {
            $stmt->close();
            // Get the last inserted ID, which is the form serial number
            $formSNo = $conn->insert_id;
            $conn->close();
            header("Location: thank.php?success=1&formSNo=$formSNo"); // Pass the form serial number as a parameter
            exit;
        } else {
            echo '<script>alert("Error storing form data.");</script>';
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

    $conn->close();

?>
<!-- Rest of your HTML code... -->
