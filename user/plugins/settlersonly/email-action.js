console.log('hello email js31');
function loadxhr(){
console.log('sending');
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("footer").innerHTML = "email sent to "+JSON.parse(this.responseText).status;
  }
  xhttp.open("POST", "/admin/accounts/users"); //this should be just /
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("email=value&user="+location.href.match(/([^\/]*)\/*$/)[1]);
}

