<?php

include("database/conn.php");


function get_all_codes($conn) {
    $sql = "SELECT * FROM datacenters";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();

    $codes = array();
    while ($row = $result->fetch_assoc()) {
        $codes[] = $row;
    }

    $stmt->close();

    return $codes;
}
?>
