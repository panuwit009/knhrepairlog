$(document).ready(function () {
    $("#loginForm").submit(function (e) { 
        e.preventDefault();
        let data = new FormData(e.target);
        
        $.ajax({
            type: "POST",
            enctype: "multipart/form-data",
            url: "checklogin.php",
            data: data,
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {
                if (response.status) {
                    toastr.success(response.message);
                    setTimeout(function () {
                        if (response.role_menu === "admin") {
                            window.location.href = "index.php";
                        } else if (response.role_menu === "user") {
                            window.location.href = "userdash.php";
                        }
                    }, 1000);
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });
});



$.ajax({
    type: "method",
    url: "url",
    data: "data",
    dataType: "dataType",
    success: function (response) {
        
    }
});
