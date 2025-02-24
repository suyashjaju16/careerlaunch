<?php
session_start();
if (isset($_POST['generate_csv'])) {
    if (ob_get_level()) {
        ob_end_clean();
    }

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.$_SESSION["org_name"].'.csv"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    $data = json_decode(fetch_data(API_CSV_DATA_ENDPOINT, $_SESSION["payload"]), true);
    if ($data === null || empty($data)) {
        header('HTTP/1.1 500 Internal Server Error');
        echo 'Failed to fetch or decode CSV data';
        exit();
    }

    $output = fopen('php://output', 'w');
    $headers = array_keys($data[0]);
    fputcsv($output, $headers);
    foreach ($data as $row) {
        fputcsv($output, array_values($row));
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
    header('Content-Disposition: attachment; filename="'.$_SESSION["org_name"].'.xls"');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    $data = json_decode(fetch_data(API_CSV_DATA_ENDPOINT, $_SESSION["payload"]), true);
    if ($data === null || empty($data)) {
        header('HTTP/1.1 500 Internal Server Error');
        echo 'Failed to fetch or decode Excel data';
        exit();
    }

    $output = fopen('php://output', 'w');
    $headers = array_keys($data[0]);
    fwrite($output, implode("\t", $headers) . "\n");
    foreach ($data as $row) {
        fwrite($output, implode("\t", array_values($row)) . "\n");
    }
    fclose($output);
    exit();
}
?>