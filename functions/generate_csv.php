<?php
session_start();
if (isset($_POST['generate_csv'])) {
    if (ob_get_level()) {
        ob_end_clean();
    }

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="responses.csv"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    $csvdata = json_decode(fetch_data(API_STUDENTS_ENDPOINT,$_SESSION["payload"]),true);
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Id', 'Name', 'Email', 'Time', 'Score']);
    foreach ($csvdata as $row) {
        fputcsv($output, [$row['Id'], $row['Name'], $row['Email'], $row['Time'], $row['Score']]);
    }
    fclose($output);
    exit();
}

// Check for Excel download
if (isset($_POST['generate_excel'])) {
    if (ob_get_level()) {
        ob_end_clean();
    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="responses.xls"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    $excelData = json_decode(fetch_data(API_STUDENTS_ENDPOINT, $_SESSION["payload"]), true);
    if ($excelData === null) {
        header('HTTP/1.1 500 Internal Server Error');
        echo 'Failed to fetch or decode Excel data';
        exit();
    }

    $output = fopen('php://output', 'w');
    fwrite($output, "Id\tName\tEmail\tTime\tScore\n");
    foreach ($excelData as $row) {
        fwrite($output, implode("\t", [$row['Id'], $row['Name'], $row['Email'], $row['Time'], $row['Score']]) . "\n");
    }
    fclose($output);
    exit();
}
?>