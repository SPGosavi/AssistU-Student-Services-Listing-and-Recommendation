function checkPass() {
    var password = document.getElementById("pass").value;
    var c_password = document.getElementById("pass1").value;

    if (password != c_password) {
        alert("Passwords do not match!");
        return false;
    }
    return true;
}

function passvisibility() {
   var pass = document.getElementById("pass");
   var pass1 = document.getElementById("pass1");
   if (pass.type === "password") {
       pass.type = "text";
       pass1.type = "text";
   let eyecb=document.getElementById("eyecb");
      eyecb.src="eye-open.png";
   } else {
       pass.type = "password";
       pass1.type = "password";
   let eyecb=document.getElementById("eyecb");
   eyecb.src="eye-close.png";
   }
}