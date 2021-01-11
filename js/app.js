var addUserForm = document.getElementById('addUserForm');
addUserForm.addEventListener('submit', function(e){
  var request = new XMLHttpRequest();
  request.open("POST", "localhost/~axel/free/controllers/customersController.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
      var response = this.responseText;
   }
  };
  request.send();
});
