$(document).ready(function () {
  $("#login").click(function (e) {
    e.preventDefault(); // Prevent form submission
    var uemail = $("#email").val();
    var upassword = $("#password").val();

    // AJAX form submission
    $.ajax({
      type: "POST",
      url: "./PHP/login.php",
      data: {
        email: uemail,
        password: upassword,
      }, // Serialize form data
      success: function (response) {
        // Handle success
        if (response === "success") {
          // Swal.fire("Log in successfully", "", "success");
          $("#errorMessage").html(response);
        } else {
          $("#errorMessage").html(response); // Display error message
        }
      },
      error: function (xhr, status, error) {
        // Handle error
        $("#errorMessage").html("An error occurred. Please try again later.");
      },
    });
  });
});
