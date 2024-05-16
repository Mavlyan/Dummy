<?php

function findDuplicatesAndSaveCSV($filename, $columnIndex, $manual_url_key_row_numbers) {
    // Check if file exists
    if (!file_exists($filename)) {
        echo "File not found.";
        return;
    }

    // Open CSV file for reading
    $file = fopen($filename, 'r');
    if (!$file) {
        echo "Error opening file.";
        return;
    }

    // Initialize array to store data from CSV
    $data = [];

    $url_keys = [];
    $unset_url_key_skus = [];

    $headers = fgetcsv($file);

    // Read CSV file line by line and parse into array
    while (($row = fgetcsv($file)) !== false) {
        // Check if column index is valid
        if ($columnIndex < 0 || $columnIndex >= count($row)) {
            echo "Invalid column index.";
            fclose($file);
            return;
        }
        $data[] = $row;

        //Search duplicates
        if ($row[17] !== '' && array_search($row[17], $url_keys, true)) {
            $unset_url_key_skus[] = $row[0];
        }

        $url_keys[] = trim($row[17]);
    }

    foreach ($data as $index => $datum) {
        //TMP Fix for products with the same names
        if (in_array($index+1, $manual_url_key_row_numbers)) {
            $data[$index][17] .= '-' . $index;
            continue;
        }


        if (in_array($datum[0], $unset_url_key_skus, true)) {
            $data[$index][17] = '';
        }
    }

    // Close file
    fclose($file);

    // Save to new CSV file
    if (!empty($unset_url_key_skus)) {
        $duplicateFilename = 'fixed_url_duplicates.csv';
        $duplicateFile = fopen($duplicateFilename, 'w');
        fputcsv($duplicateFile, $headers);

        // Write duplicates to file
        foreach ($data as $fixed_row) {
            fputcsv($duplicateFile, $fixed_row);
        }

        fclose($duplicateFile);
        echo "saved to $duplicateFilename.";
    } else {
        echo "No duplicates found.";
    }
}

// Usage example
$filename = 'data.csv'; // Change this to your CSV file's path
$columnIndex = 0; // Change this to the index of the column you want to check for duplicates

//TMP workaround. It should be done via Magento Plugin for Url_Key Generator.
$manual_url_key_row_numbers = [
    129,
    154,
    238, 368,
    384,
    539, 542, 545, 548, 551, 554,
    540, 543, 546, 549, 552, 555,
    627,
    628,
    682, 690, 827, 831,
    826, 830,
    871,
    872,
    883,
    972,
    985,
    1187
];

findDuplicatesAndSaveCSV($filename, $columnIndex, $manual_url_key_row_numbers);
