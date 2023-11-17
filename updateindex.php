<?php

$connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

function get_all_codes($conn) {
    $sql = "SELECT * FROM datacenters";
    $result = mysqli_query($conn, $sql);

    $codes = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $codes[] = $row;
    }

    return $codes;
}

$codes = get_all_codes($connection);
?>

<?php
// Assuming you have a database connection established
// Replace these with your actual database credentials
$servername = "localhost";
$username = "rectubmx_customer";
$password = "Rakesh@2023";
$dbname = "rectubmx_customerquery";

// Retrieve the form ID from the URL
if (isset($_GET['form_id'])) {
    $formId = $_GET['form_id'];

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to retrieve form data based on the form ID
    $sql = "SELECT * FROM formcliant WHERE sno = '$formId'";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error in query: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Fetch the data
        } else {
            echo "Form data not found.";
        }
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="formcss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript">
    function validateForm() {
        var firstName = document.forms["myForm"]["exampleInputFirst_Name"].value;
        var lastName = document.forms["myForm"]["exampleInputLast_Name"].value;
        var dob = document.forms["myForm"]["exampleInputDOB"].value;
        var phoneNumber = document.forms["myForm"]["exampleInputPhone_Number"].value;
        var zip = document.forms["myForm"]["exampleInputZip"].value;
        var city = document.forms["myForm"]["exampleInputCity"].value;
        var income = document.forms["myForm"]["exampleInputIncome"].value;
        var ssn = document.forms["myForm"]["exampleInputSocial_Security"].value;
        var bankname = document.forms["myForm"]["exampleInputBank_Name"].value;
        var bankNumber = document.forms["myForm"]["exampleInputAccount_Number"].value;
        var checkbox1 = document.forms["myForm"]["blankCheckbox"].checked;
        var checkbox2 = document.forms["myForm"]["blankCheckbox2"].checked;
        
        var firstNameRegex = /^[A-Za-z]+$/; // Allows only uppercase letters
        var lastNameRegex = /^[A-Za-z]+$/; // Allows both uppercase and lowercase letters
        var phoneNumberRegex = /^\d{10}$/; // Requires 10 digits
        var zipRegex = /^\d{5}$/; // Requires 6 digits
        var cityRegex = /^[A-Za-z]+$/; 
        var banknameRegex = /^[A-Za-z]+$/; // Allows both uppercase and lowercase letters
        var bankNumberRegex = /^\d+$/; // Allows only digits
        
        if (!firstName.match(firstNameRegex)) {
            alert("First Name should only contain  letters.");
            return false;
        }

        if (!lastName.match(lastNameRegex)) {
            alert("Last Name should contain letters (both upper and lower case).");
            return false;
        }

        // Parse the input date string to create a Date object
        var dobDate = new Date(dob);

        // Check if the year falls within the specified range
        var dobYear = dobDate.getFullYear();
        if (dobYear < 1963 || dobYear > 2003) {
            alert("Date of Birth should be between 1963 and 2003.");
            return false;
        }

        if (!phoneNumber.match(phoneNumberRegex)) {
            alert("Phone Number should contain exactly 10 digits.");
            return false;
        }
        
        if (!city.match(cityRegex)) {
        alert("City should contain letters (both upper and lower case).");
        return false;
         }

        if (!zip.match(/^\d{5}$/)) {
        alert("Zip Code should contain exactly 5 digits.");
        return false;
    }

        if (income < 18000) {
            alert("Household Income should be more than 18000.");
            return false;
        }

        if (!ssn.match(/^\d+$/)) {
            alert("Social Security Number should only contain digits.");
            return false;
        }
        
        if (!bankname.match(banknameRegex)) {
            alert("Bank Name should contain letters (both upper and lower case).");
            return false;
        }
        
        if (!bankNumber.match(bankNumberRegex)) {
            alert("Account Number should only contain digits.");
            return false;
        }
        
        if (!checkbox1 || !checkbox2) {
        alert("Please check both checkboxes before submitting the form.");
        return false;
    }
    

        return true;
    }
</script>
</head>
<body class="bg-dark ">
     
    <div class="container mt-4 d-flex justify-content-center fw-bold ">
      <h1 class="text-center text-primary font-weight-bold">ACA/Under 65/Insurance Live Transfer</h1>
     
    </div>
    <div class="container mt-4 d-flex justify-content-center h3 text-white">
    <h6 class="text-center h5 ">Customer Needs to Enroll Himself and Call needs to be Completed.<br>
      Transfer Timing-10am to 8pm EST and 1pm-2pm EST Lunch. DID-9544406996</h6>
    </div>

    <div class="container mt-4 d-flex justify-content-center fw-bold">
<form class="w-75 p-3 rounded" style="background-color: #eee;" action="updateform.php?form_id=<?php echo $formId; ?>" method="POST" name="myForm" onsubmit="return validateForm();">
<input type="hidden" name="form_id" value="<?php echo $formID; ?>">
        <div class="form-group">
            <label for="Center_Code">Select Center Code</label>
		  
		  </select><br> <select value="<?php echo $row['Center_Code']; ?>" class="form-select form-control" name="exampleInputCenter_Code" aria-label="Default select example">
  <option selected><?php echo $row['Center_Code']; ?></option>
   <?php foreach ($codes as $code): ?>
        <option value="<?= $code['datacentercodes']; ?>"><?= $code['datacentercodes']; ?></option>
    <?php endforeach; ?>

</select>
          </div>
          <div class="form-group">
            <label for="exampleInputFirst_Name">First Name</label>
            <input type="text" class="form-control" value="<?php echo $row['First_Name']; ?>" name="exampleInputFirst_Name" aria-describedby="First_NamelHelp">
            <small id="First_NameHelp" class="form-text text-muted">Enter the First Name.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputLast_Name">Last Name</label>
            <input type="text" value="<?php echo $row['Last_Name']; ?>" class="form-control" name="exampleInputLast_Name" aria-describedby="Last_NamelHelp">
            <small id="Last_NameHelp" class="form-text text-muted">Enter the Last Nmae.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputDOB">Date Of Birth (1963-2003)</label>
            <input type="text" value="<?php echo $row['DOB']; ?>" class="form-control" pattern="\d{2}/\d{2}/\d{4}" placeholder="MM/DD/YYYY"  name="exampleInputDOB" aria-describedby="DOBHelp">
            <small id="DOBHelp" class="form-text text-muted">Enter the Date Of Birth.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPhone_Number">Phone Number </label>
            <input type="number" value="<?php echo $row['Phone_Number']; ?>" class="form-control" name="exampleInputPhone_Number" aria-describedby="Phone_NumberHelp">
            <small id="Phone_NumbereHelp" class="form-text text-muted">Enter the Phone Number.</small>
          </div>
          <div class="form-group">
    <label for="exampleInputAddress">Address</label>
    <input type="text" value="<?php echo $row['Address']; ?>" class="form-control" name="exampleInputAddress" aria-describedby="AddressHelp" >
    <small id="AddressHelp" value="<?php echo $row['First_Name']; ?>" class="form-text text-muted">Enter the Address.</small>
</div>
          <div class="form-group">
            <label for="exampleInputCity">City  </label>
            <input type="text" value="<?php echo $row['City']; ?>" class="form-control" name="exampleInputCity" aria-describedby="CityHelp">
            <small id="CityHelp" class="form-text text-muted">Enter the City .</small>
          </div><label for="">Select State  </label>
          <select class="form-control" value="<?php echo $row['State']; ?>" name="state">
            <option>select States</option>
            <option>Alabama(AL)</option>
            <option>Arizona(AZ)</option>
            <option>Colorado(CO)</option>
            <option selected>select States</option>
            <option>Alabama (AL)</option>
            <option>Arizona (AZ)</option>
            <option>Colorado (CO)</option>
            <option>Florida (FL)</option>
            <option>Georgis (GA)</option>
            <option>Illinois (IL)</option>
            <option>Kansas (KS)</option>
            <option>Louisiana (LA)</option>
            <option>Michigan (MI)</option>
            <option>Mississippi (MS)</option>
            <option>Missouri (MO)</option>
            <option>New Jersey (NJ)</option>
            <option>New Mexico (NM)</option>
            <option>North Carolina (NC)</option>
            <option>Ohio (OH)</option>
            <option>Oklahome (OK)</option>
            <option>South Carolina (SC)</option>
            <option>Tennessee (TN)</option>
            <option>Texas (TX)</option>
            <option>Utah (UT)</option>
            <option>Virginia(VA)</option>
           
          </select>
          <div class="form-group">
            <label for="exampleInputZip">Zip  </label>
            <input type="number" value="<?php echo $row['Zip']; ?>" class="form-control" name="exampleInputZip"  aria-describedby="ZipHelp">
            <small id="ZipHelp" class="form-text text-muted">Enter the Zip .</small>
          </div>
          <div class="form-group">
            <label for="exampleInputIncome">What is the Minimum Household Income in a Year?
                (Should Be More than 18000) </label>
            <input type="number" value="<?php echo $row['Income']; ?>" class="form-control" name="exampleInputIncome" aria-describedby="IncomeHelp">
            <small id="IncomeHelp" class="form-text text-muted">Enter the Income .</small>
          </div>
           <div class="form-group">
            <label for="exampleInputSocial_Security">Social Security #
            </label>
            <input type="text" value="<?php echo $row['Social_Security']; ?>" class="form-control" name="exampleInputSocial_Security" aria-describedby="Social_SecurityHelp">
            <small id="Social_SecurityHelp" class="form-text text-muted">Enter the Social Security.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail">Customer's Email ID
            </label>
            <input type="email" value="<?php echo $row['Email']; ?>" class="form-control" name="exampleInputEmail" aria-describedby="EmailHelp">
            <small id="EmailHelp" class="form-text text-muted">Enter the Email.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputBank_Name">Primary Bank Name (Should be a Traditional Bank Where Customer goes himself to the Branch Not a Mobile APP)
            </label>
            <input type="text" value="<?php echo $row['Bank_Name']; ?>" class="form-control" name="exampleInputBank_Name" aria-describedby="Bank_NameHelp">
            <small id="Bank_NameHelp" class="form-text text-muted">Enter the Bank Name .</small>
          </div>
          <div class="form-group">
            <label for="exampleInputAccount_Number">Bank Account Number
            </label>
            <input type="text" value="<?php echo $row['Account_Number']; ?>" class="form-control" name="exampleInputAccount_Number" aria-describedby="Account_NumberHelp">
            <small id="Account_NumberHelp" class="form-text text-muted">Enter the Account Number .</small>
          </div>

         
        <div>
            <h6>Is the Client able to spend Minimum $50 per Month for the Insurance?
              (Should Be Yes)</h6>
            <div class="form-check">
              <input class="form-check-input position-static" type="checkbox" name="blankCheckbox"  value="option1" aria-label="...">
            Yes
            </div>

            <h6>Is the Client Truly Interested to have the Insurance and Have 25-35 minutes to complete the Verification?
              (Should be Yes)</h6>
            <div class="form-check">
              <input class="form-check-input position-static" type="checkbox" name="blankCheckbox2" value="option1" aria-label="...">
            Yes
            </div>



       
        <div class="d-flex justify-content-center">
          
         <button type="submit" class="btn btn-primary" name="submit">Submit</button>

        </div>
        
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>




