<?php


// execute the test and dump the output to text file
$out = exece("vendor/bin/codecept run);

// read the output from text file and build html 

echo "<pre>" . $output . "</pre>";

// render the html content 
