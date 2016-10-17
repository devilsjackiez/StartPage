<?php

// Name of the file
$filename = 'DB/start_page20161007.sql';
// MySQL host
$mysql_host = 'mariadbha.coast.ebuero.de';
// MySQL username
$mysql_username = 'startpage';
// MySQL password
$mysql_password = 'Yie2soh1fie1eiQu';
// Database name
$mysql_database = 'startpage';

// Connect to MySQL server
$sql = mysqli_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysqli_error());
// Select database
mysqli_select_db($sql,$mysql_database) or die('Error selecting MySQL database: ' . mysqli_error($sql));

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{    
    // Perform the query
    mysqli_query($sql,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($sql) . '<br /><br />');
	mysqli_set_charset( $sql, 'utf8');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
?>