<?php
require_once 'dbcon.php';


#----------------sanitizing--------------------------

function sanitize($input) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags($input), ENT_QUOTES, 'UTF-8'));
}



#-----fetching data --------------------------------




require '../php/dbcon.php'; // Ensure your database connection is established

function catchone($what, $fromdb, $whereattrs, $conditions) {
    global $conn;

    // Validate the input for columns and tables to prevent SQL injection
    $allowed_columns = is_array($what) ? $what : explode(',', $what);
    $allowed_tables = [$fromdb]; // You can extend this if needed

    // Validate columns
    foreach ($allowed_columns as $column) {
        $column = trim($column);
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $column)) {
            die("Invalid column name: $column");
        }
    }

    // Validate table
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $fromdb)) {
        die("Invalid table name: $fromdb");
    }

    // Construct the SQL query
    $query = "SELECT " . implode(', ', $allowed_columns) . " FROM $fromdb WHERE ";
    $conditions_sql = [];
    
    foreach ($whereattrs as $index => $attr) {
        $attr = trim($attr);
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $attr)) {
            die("Invalid attribute name: $attr");
        }
        $conditions_sql[] = "$attr = ?";
    }

    $query .= implode(" AND ", $conditions_sql); // Join conditions with AND

    // Prepare the SQL statement
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    // Bind parameters dynamically
    $types = str_repeat('s', count($conditions)); // Assuming all conditions are strings
    $stmt->bind_param($types, ...$conditions); // Use splat operator to pass conditions as arguments

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    if ($result === false) {
        die("Execute failed: " . htmlspecialchars($stmt->error));
    }

    // Fetch and return the result
    $data = $result->fetch_assoc();

    // Close the statement
    $stmt->close();

    return $data;
}

// // Example usage
// $table = 'user'; // Example table name
// $a = 'ayush'; // Example ID
// $b = 'gautam'; // Example username

// // Fetch the result
// $result = catchone(['name', 'username'], $table, ['username', 'username'], [$a, $b]);

// if ($result) {
//     print_r($result);
// } else {
//     echo "No records found.";
// }











function catchall($what, $fromdb, $whereattrs, $conditions) {
    global $conn;

    // Validate the input for columns and tables to prevent SQL injection
    $allowed_columns = is_array($what) ? $what : explode(',', $what);
    $allowed_tables = [$fromdb]; // You can extend this if needed

    // Validate columns
    foreach ($allowed_columns as $column) {
        $column = trim($column);
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $column)) {
            die("Invalid column name: $column");
        }
    }

    // Validate table
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $fromdb)) {
        die("Invalid table name: $fromdb");
    }

    // Construct the SQL query
    $query = "SELECT " . implode(', ', $allowed_columns) . " FROM $fromdb WHERE ";
    $conditions_sql = [];
    
    foreach ($whereattrs as $index => $attr) {
        $attr = trim($attr);
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $attr)) {
            die("Invalid attribute name: $attr");
        }
        $conditions_sql[] = "$attr = ?";
    }

    $query .= implode(" or ", $conditions_sql); // Join conditions with AND

    // Prepare the SQL statement
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    // Bind parameters dynamically
    $types = str_repeat('s', count($conditions)); // Assuming all conditions are strings
    $stmt->bind_param($types, ...$conditions); // Use splat operator to pass conditions as arguments

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    if ($result === false) {
        die("Execute failed: " . htmlspecialchars($stmt->error));
    }

    // Fetch and return all the results
    $data = $result->fetch_all(MYSQLI_ASSOC);;

    // Close the statement
    $stmt->close();

    return $data;
}









// Example usage
$table = 'user'; // Example table name
$a = 'ayush'; // Example ID
$b = 'gautam'; // Example username

// Fetch the result
$result = catchall(['name', 'username'], $table, ['username', 'username'], [$a, $b]);

if ($result) {
    print_r($result);
} else {
    echo "No records found.";
}






















function catcharray($what ,$fromdb ){
    global $conn;
}


function getProfileOf($uname) {
    global $conn; // Assuming $conn is your database connection
    
    // Escape the username to prevent SQL injection
    $escaped_uname = mysqli_real_escape_string($conn, $uname);

    $sql = "SELECT * FROM user WHERE username='$escaped_uname'";
    
    if($result = mysqli_query($conn, $sql)) {
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                $profile = $row['profile'];
            }
            mysqli_free_result($result);
        } else {
            $profile = "No profile found for username: $escaped_uname";
        }
    } else {
        $profile = "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    
    return $profile;
}








#------updating data --------------------------------









?>