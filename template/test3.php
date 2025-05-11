<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP without AJAX Example</title>
</head>
<body>
    <form action="process_no_ajax.php" method="POST">
        <label for="username">Enter Username:</label>
        <input type="text" id="username" name="username">
        <button type="submit">Check User</button>
    </form>

    <?php if (isset($_GET['response'])): ?>
        <div><?php echo $_GET['response']; ?></div>
    <?php endif; ?>
</body>
</html>
