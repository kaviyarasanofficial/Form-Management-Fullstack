<?php
//============================================================+
// File name   : download.php
// Description: Generate and download a PDF with data from the database (landscape orientation, full table on one page)
//============================================================+

// Include the TCPDF library
require_once('TCPDF/tcpdf.php');

if (isset($_POST['download_data'])) {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    // Create a new database connection
    $connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");

    // Check if the connection was successful, if not, display an error message and exit
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query the database for data within the selected date range
    $query = "SELECT * FROM formcliant WHERE dt BETWEEN '$startDate' AND '$endDate'";
    $result = mysqli_query($connection, $query);

    // Create a new PDF document with landscape orientation
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document properties
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Data Report');
    $pdf->SetSubject('Data Report');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 6); // Adjust font size

    // Define table headers
    $header = array(
        "sno", "Center_Code", "First_Name", "Last_Name", "DOB", 
        "Phone_Number", "Address", "City", "State", "Zip", 
        "Income", "Social_Security", "Email", "Bank_Name", 
        "Account_Number", "dt", "IsAbleToSpend", "IsInterested", "remarks"
    );

    // Adjust column widths
    $colWidth = $pdf->getPageWidth() / count($header);

    // Move to the right to align with "Sno" column
    $pdf->SetX(10); // Adjust as needed

    // Print header row
    foreach ($header as $col) {
        $pdf->Cell($colWidth, 6, $col, 1);
    }
    $pdf->Ln();

    // Populate table rows with data from the database
    while ($row = mysqli_fetch_assoc($result)) {
        foreach ($row as $value) {
            $pdf->Cell($colWidth, 6, $value, 1);
        }
        $pdf->Ln();
    }

    // Output PDF
    $pdf->Output('data_report.pdf', 'D'); // D to force download
    exit;
}
?>
