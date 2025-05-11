<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];

    // Simulate a simple user check from a database or array
    $users = ['john', 'jane', 'admin'];

    if (in_array($username, $users)) {
        header('Location: index.php?response=Username "' . $username . '" is taken.');
    } else {
        header('Location: index.php?response=Username "' . $username . '" is available.');
    }
    exit;
} else {
    header('Location: index.php?response=Please enter a username.');
    exit;
}
?>
