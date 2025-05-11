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
                if(response.status) {
                    toastr.success(response.message);
                    setTimeout(function () {
                        if (response.role_menu === "admin" || response.role_menu === "passadu" || response.role_menu === "user" || response.role_menu === "doctor") {
                            window.location.href = "index.php";
                        } else {
                            toastr.error(response.message);
                        }
                        
                    }, 1000);
                } else {
                    toastr.error(response.message);
                }
            }
        });
    });
});

