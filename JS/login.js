$(document).ready(function () {
  $("#login").click(function (e) {
    e.preventDefault(); // Prevent form submission
    var uname = $("#username").val();
    var upassword = $("#password").val();

    // AJAX form submission
    $.ajax({
      type: "POST",
      url: "./PHP/login.php",
      data: {
        password: upassword,
        username: uname,
      },
      success: function (response) {
        // Handle success
        if (response === "success") {
          Swal.fire("Log in successfully", "", "success");
          setTimeout(() => {
            window.location.href = "profile.html";
          }, 2000);
        } else {
          Swal.fire("User Not Found", "Sign up first", "error");
        }
      },
      error: function (xhr, status, error) {
        // Handle error
        $("#errorMessage").html("An error occurred. Please try again later.");
      },
    });
  });
});
