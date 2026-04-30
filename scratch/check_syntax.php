<?php
$dir = new RecursiveDirectoryIterator(__DIR__ . '/../app');
$iterator = new RecursiveIteratorIterator($dir);
$phpFiles = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

$errors = [];
foreach ($phpFiles as $file) {
    $filePath = $file[0];
    $output = [];
    $returnVar = 0;
    exec("php -l " . escapeshellarg($filePath), $output, $returnVar);
    if ($returnVar !== 0) {
        $errors[] = implode("\n", $output);
    }
}

if (empty($errors)) {
    echo "No syntax errors found.";
} else {
    echo "Syntax errors found:\n" . implode("\n", $errors);
}
