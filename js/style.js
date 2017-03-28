function myFunction() {
var dayte = document.getElementById("date").value;
var podate = document.getElementById("poDate").value;
var tobedelivered = document.getElementById("tobrDelivered").value;
var companyname = document.getElementById("companyName").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name1=' + name + '&email1=' + email + '&password1=' + password + '&contact1=' + contact;
if (name == '' || email == '' || password == '' || contact == '') {
alert("Please Fill All Fields");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "ajaxjs.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;
}