<?php
// Don't forget to back up all .conf files in /home/user/conf/web before executing this script.

// Set the directory where the script will operate.
$directory = __DIR__; 

// Specify the main domain directory (/home/admin/web/main-domain.com/public_html)
$newString = 'main-domain.com'; //change-here

// Specify the file containing secondary domains to be moved to (/home/admin/web/main-domain.com/public_html)
$brbrvz = 'domainlist.txt';

// Function to replace strings in a file.
function replaceInFile($filePath, $oldString, $newString) {
    $fileContents = file_get_contents($filePath);
    $fileContents = preg_replace('/(?<=\/)' . preg_quote($oldString, '/') . '(?=\/)/', $newString, $fileContents);
    file_put_contents($filePath, $fileContents);
}

// Read the list of old strings from the domain list file.
$oldStrings = file($brbrvz, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Iterate through the directory and its subdirectories.
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
foreach ($iterator as $file) {
    // Check if the file is a .conf file.
    if ($file->isFile() && strtolower($file->getExtension()) === 'conf') {
        // Replace old strings with the new string in each .conf file.
        foreach ($oldStrings as $oldString) {
            replaceInFile($file->getRealPath(), $oldString, $newString);
        }
    }
}
echo "Replacement complete.";
?>
