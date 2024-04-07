console.log('Custom admin actions script is loaded3');
document.addEventListener('DOMContentLoaded', function() {
  //if(document.querySelector('.fa-check-circle')){ //probly better way to prevent loading on other pages
  console.log('making ajax req');
    const customButton = document.querySelectorAll('.fa-check-circle'); //querySelector()
    const table = document.getElementsByClassName('vuetable')[0];

    customButton.forEach((el, index) => el.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default button click action
             
        console.log(table.rows[index+1].cells[0].textContent);

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("footer").innerHTML = "group updated for "+JSON.parse(this.responseText).status;
    }
    xhttp.open("POST", "/admin/accounts/users");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("name=value&user="+table.rows[index+1].cells[0].textContent);
    }));
});
