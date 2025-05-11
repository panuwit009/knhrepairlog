<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];

    // Simulate a simple user check from a database or array
    $users = ['john', 'mark', 'admin'];

    if (in_array($username, $users)) {
        echo "Username '$username' is taken.";
    } else {
        echo "Username '$username' is available.";
    }
} else {
    echo "Please enter a username.";
}
?>
