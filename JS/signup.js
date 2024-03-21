$(document).ready(function () {
  $("#signup").click(function (event) {
    event.preventDefault(); // Prevent the default form submission
    var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var confirmPassword = $("#confirmPassword").val();

    // Perform client-side validation
    if (password !== confirmPassword) {
      $("#errorMessage").text("Passwords do not match");
      return;
    }

    // AJAX call
    $.ajax({
      url: "./PHP/register.php",
      type: "POST",
      data: {
        username: username,
        email: email,
        password: password,
      },
      success: function (response) {
        // Handle response from server
        if (response.trim() === "Registration successful") {
          Swal.fire("Sign Up successfully", "", "success");
          setTimeout(() => {
            window.location.href = "login.html";
            localStorage.setItem("username", uemail);
          }, 1000);
        } else {
          $("#errorMessage").text(response);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX error:", error);
        $("#errorMessage").text(
          "An error occurred while processing your request"
        );
      },
    });
  });
});
