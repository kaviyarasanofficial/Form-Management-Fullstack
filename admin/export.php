<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('database.php');

if (isset($_GET['fromDate']) && isset($_GET['toDate'])) {
    // Retrieve fromDate and toDate from the form
    $start_date = $_GET['fromDate'];
    $end_date = $_GET['toDate'];

    // Validate and sanitize the dates (you may want to add more validation)
    $start_date = date('Y-m-d H:i:s', strtotime($start_date . ' 00:00:00'));
    $end_date = date('Y-m-d H:i:s', strtotime($end_date . ' 23:59:59'));

    // Modify your SQL query to select data within the specified date range
    $sql = "SELECT * FROM formcliant WHERE dt BETWEEN '$start_date' AND '$end_date'";
    
    $res = mysqli_query($con, $sql);

    if (!$res) {
        // Debugging: Output any SQL error
        echo "SQL Error: " . mysqli_error($con);
    } else {
        // Start output buffering
        ob_start();

        // Initialize the variable to store the Excel content
        $excelContent = '';

        // Get column names
        $columns = array();
        while ($fieldinfo = mysqli_fetch_field($res)) {
            $columns[] = $fieldinfo->name;
        }

        // Append column names to the Excel content
        $excelContent .= implode("\t", $columns) . "\n";

        while ($row = mysqli_fetch_assoc($res)) {
            // Append data to the Excel content
            $rowData = array();
            foreach ($columns as $column) {
                $rowData[] = $row[$column];
            }
            $excelContent .= implode("\t", $rowData) . "\n";
        }

        // Clean the output buffer and send the Excel content as a file download
        ob_clean();

        // Set headers for downloading the Excel file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="formcliant_report.xls"');
        header('Cache-Control: max-age=0');

        // Output the Excel content
        echo $excelContent;

        // Exit to prevent any additional output
        exit;
    }
}
?>
