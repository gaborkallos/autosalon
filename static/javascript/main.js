document.addEventListener('DOMContentLoaded', (event) => {
    let name = localStorage.getItem("name");
    if (name != null) {
        document.getElementById("loggedinTrue").style.display = "block";
        document.getElementById("loggedinFalse").style.display = "none";
        document.getElementById("loginbtn").style.display = "none";
        document.getElementById("kogoutbtn").style.display = "block";
    } else {
        document.getElementById("loggedinTrue").style.display = "none";
        document.getElementById("loggedinFalse").style.display = "block";
    }

})
