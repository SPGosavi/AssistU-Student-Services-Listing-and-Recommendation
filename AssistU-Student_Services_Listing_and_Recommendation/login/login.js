function passvisibility() {
    var pass = document.getElementById("pass");
    if (pass.type === "password") {
        pass.type = "text";
    let eyecb=document.getElementById("eyecb");
       eyecb.src="eye-open.png";
    } else {
        pass.type = "password";
    let eyecb=document.getElementById("eyecb");
    eyecb.src="eye-close.png";
    }
}