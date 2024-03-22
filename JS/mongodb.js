function getProfile() {
  $.ajax({
    url: "./PHP/mongo.php",
    type: "GET",
    data: { fetchData: true },
    success: function (obj) {
      obj = JSON.parse(obj);
      var name = localStorage.getItem("localname");
      $("#username").text(name);
      $("#pusername").text(name);
      $("#email").text(obj.age);
      $("#address").text(obj.address);
      $("#paddress").text(obj.address);
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", error);
      $("#errorMessage").text(
        "An error occurred while processing your request"
      );
    },
  });
}
