function getProfile() {
  $.ajax({
    url: "./PHP/mongo.php",
    type: "GET",
    data: { fetchData: true },
    success: function (obj) {
      var username = localStorage.getItem("username");
      $("#username").text(username);
      $("#pusername").text(username);
      $("#email").text(obj.email);
      $("#address").text(obj.name);
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", error);
      $("#errorMessage").text(
        "An error occurred while processing your request"
      );
    },
  });
}
