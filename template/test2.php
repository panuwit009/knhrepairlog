<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP + AJAX Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>
        <label for="username">Enter Username:</label>
        <input type="text" id="username" name="username">
        <button id="checkUser">Check User</button>
    </div>

    <div id="response"></div>

    <script>
        $(document).ready(function(){
            $('#checkUser').click(function(){
                var username = $('#username').val();
                $.ajax({
                    url: 'process_ajax.php',  // PHP file to handle the AJAX request
                    type: 'POST',
                    data: { username: username },  // Sending username to the server
                    success: function(response){
                        $('#response').html(response);  // Show the response from PHP
                    }
                });
            });
        });
    </script>
</body>
</html>
