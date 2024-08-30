<?php

// define("HOSTNAME", "sql110.infinityfree.com");  // Use the host provided by InfinityFree
// define("USERNAME", "if0_37159141");  // Your MySQL username
// define("PASSWORD", "hjain63949");  // Your MySQL password
// define("DATABASE", "if0_37159141_crud_operations");  // Your database name

define("HOSTNAME", "db");  // MySQL service name in docker-compose.yml
define("USERNAME", "your_mysql_username");  // Defined in docker-compose
define("PASSWORD", "your_mysql_password");  // Defined in docker-compose
define("DATABASE", "your_database_name");  // Defined in docker-compose

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error()); 
} else {
    echo "Connected successfully!";
}
?>
