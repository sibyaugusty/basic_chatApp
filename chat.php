<?php
// Include database connection file
include 'connect.php';

// Check if the request is a POST request (message sent)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the message from the POST data
    $message = $_POST['message'];
    $username = "Guest"; // You can add user authentication later

    // Insert the message into the database
    $sql = "INSERT INTO chat_messages (username, message, timestamp) VALUES ('$username', '$message', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Fetch messages from the database
    $sql = "SELECT * FROM chat_messages ORDER BY timestamp ASC";
    $result = $conn->query($sql);

    // Display messages in a format suitable for the front-end
    $messages = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $messages .= "<p><strong>" . $row["username"] . ":</strong> " . $row["message"] . "</p>";
        }
    } else {
        $messages = "<p>No messages yet.</p>";
    }

    echo $messages;
}

$conn->close();
?>