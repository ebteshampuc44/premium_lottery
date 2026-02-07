<?php
// save-user.php
session_start();
require_once 'conn.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

// Allow CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    if (!$data) {
        echo json_encode(['success' => false, 'message' => 'Invalid JSON data']);
        exit();
    }
    
    // Extract data
    $uid = isset($data['uid']) ? mysqli_real_escape_string($conn, $data['uid']) : '';
    $fullName = isset($data['fullName']) ? mysqli_real_escape_string($conn, $data['fullName']) : '';
    $email = isset($data['email']) ? mysqli_real_escape_string($conn, $data['email']) : '';
    $phone = isset($data['phone']) ? mysqli_real_escape_string($conn, $data['phone']) : '';
    $emailVerified = isset($data['emailVerified']) ? (int)$data['emailVerified'] : 0;
    $photoURL = isset($data['photoURL']) ? mysqli_real_escape_string($conn, $data['photoURL']) : '';
    $createdAt = isset($data['createdAt']) ? mysqli_real_escape_string($conn, $data['createdAt']) : date('Y-m-d H:i:s');
    
    // Validate required fields
    if (empty($uid) || empty($email)) {
        echo json_encode(['success' => false, 'message' => 'Missing required fields']);
        exit();
    }
    
    // First check if user table exists, if not create it
    $checkTableQuery = "SHOW TABLES LIKE 'users'";
    $tableResult = mysqli_query($conn, $checkTableQuery);
    
    if (!$tableResult) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($conn)]);
        exit();
    }
    
    if (mysqli_num_rows($tableResult) == 0) {
        // Create users table
        $createTableQuery = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            firebase_uid VARCHAR(255) UNIQUE NOT NULL,
            full_name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            phone VARCHAR(20),
            email_verified TINYINT(1) DEFAULT 0,
            photo_url VARCHAR(500),
            created_at DATETIME NOT NULL,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_firebase_uid (firebase_uid),
            INDEX idx_email (email)
        )";
        
        if (!mysqli_query($conn, $createTableQuery)) {
            echo json_encode(['success' => false, 'message' => 'Failed to create users table: ' . mysqli_error($conn)]);
            exit();
        }
    }
    
    // Check if user already exists
    $checkUserQuery = "SELECT id FROM users WHERE firebase_uid = '$uid' OR email = '$email'";
    $checkResult = mysqli_query($conn, $checkUserQuery);
    
    if (!$checkResult) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($conn)]);
        exit();
    }
    
    if (mysqli_num_rows($checkResult) > 0) {
        // Update existing user
        $row = mysqli_fetch_assoc($checkResult);
        $userId = $row['id'];
        
        $updateQuery = "UPDATE users SET 
            full_name = '$fullName',
            phone = '$phone',
            email_verified = $emailVerified,
            photo_url = '$photoURL',
            updated_at = CURRENT_TIMESTAMP
            WHERE id = $userId";
        
        if (mysqli_query($conn, $updateQuery)) {
            echo json_encode(['success' => true, 'message' => 'User updated successfully', 'action' => 'updated', 'userId' => $userId]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update user: ' . mysqli_error($conn)]);
        }
    } else {
        // Insert new user
        $insertQuery = "INSERT INTO users (firebase_uid, full_name, email, phone, email_verified, photo_url, created_at) 
                        VALUES ('$uid', '$fullName', '$email', '$phone', $emailVerified, '$photoURL', '$createdAt')";
        
        if (mysqli_query($conn, $insertQuery)) {
            $userId = mysqli_insert_id($conn);
            echo json_encode(['success' => true, 'message' => 'User saved successfully', 'action' => 'inserted', 'userId' => $userId]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save user: ' . mysqli_error($conn)]);
        }
    }
    
    mysqli_close($conn);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>