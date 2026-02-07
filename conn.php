<?php 
$username = "root";
$password = "";
$hostname = "localhost"; 
$db = "Lotterie";

// Create connection
$conn = mysqli_connect($hostname, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if it doesn't exist
$createDbQuery = "CREATE DATABASE IF NOT EXISTS $db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if (mysqli_query($conn, $createDbQuery)) {
    // Select the database
    mysqli_select_db($conn, $db);
    
    // Set charset
    mysqli_set_charset($conn, "utf8mb4");
    
    // Create lottery_types table if it doesn't exist
    $checkTypesTable = "SHOW TABLES LIKE 'lottery_types'";
    $typesResult = mysqli_query($conn, $checkTypesTable);
    
    if (mysqli_num_rows($typesResult) == 0) {
        $createTypesTable = "CREATE TABLE lottery_types (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            slug VARCHAR(50) UNIQUE NOT NULL,
            description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        mysqli_query($conn, $createTypesTable);
        
        // Insert default lottery types
        $insertTypes = "INSERT INTO lottery_types (name, slug) VALUES 
            ('Gold Lottery', 'gold-lottery'),
            ('Silver Lottery', 'silver-lottery'),
            ('Bronze Lottery', 'bronze-lottery')";
        mysqli_query($conn, $insertTypes);
    }
    
    // Create lottery_tickets table if it doesn't exist
    $checkTicketsTable = "SHOW TABLES LIKE 'lottery_tickets'";
    $ticketsResult = mysqli_query($conn, $checkTicketsTable);
    
    if (mysqli_num_rows($ticketsResult) == 0) {
        $createTicketsTable = "CREATE TABLE lottery_tickets (
            id INT AUTO_INCREMENT PRIMARY KEY,
            lottery_type_id INT NOT NULL,
            ticket_number VARCHAR(50) UNIQUE NOT NULL,
            prize_amount DECIMAL(10,2) NOT NULL,
            prize_description VARCHAR(255),
            is_active TINYINT(1) DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (lottery_type_id) REFERENCES lottery_types(id) ON DELETE CASCADE
        )";
        mysqli_query($conn, $createTicketsTable);
    }
    
    // Check if users table exists (will be created by save-user.php if needed)
    $checkUsersTable = "SHOW TABLES LIKE 'users'";
    $usersResult = mysqli_query($conn, $checkUsersTable);
    
    if (mysqli_num_rows($usersResult) == 0) {
        // Table will be created when first user signs up via save-user.php
        error_log("Users table doesn't exist yet. It will be created when first user signs up.");
    }
    
} else {
    die("Error creating database: " . mysqli_error($conn));
}
?>