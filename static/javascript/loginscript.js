let url = 'http://localhost:8000/api/services/employee_service.php';
let modal = document.getElementById('loginmodal');

function login() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let loginObj =
        {
            login: [username, password]
        }
    fetch(url, {
        method: 'POST', // or 'PUT'
        body: JSON.stringify(loginObj), // data can be `string` or {object}!
        headers: {'Content-Type': 'application/json'}
    })
        .then(data => {return data.json()})
        .then(res => {isLoggedIn(res)})
}

function isLoggedIn(response) {
    if (response.hasOwnProperty("name")) {
        localStorage.setItem("name", response.name);
        document.getElementById("loginbtn").style.display = "none";
        document.getElementById("logoutbtn").style.display = "block";
        document.getElementById("loggedinTrue").style.display = "block";
        document.getElementById("loggedinTrue").innerText = response.name;
    }
    let modal = document.getElementById('loginmodal');
    modal.style.display = "none";
}

function logout(){
    document.getElementById("loggedinTrue").style.display = "none";
    document.getElementById("loginbtn").style.display = "block";
    document.getElementById("logoutbtn").style.display = "none";
    document.getElementById("loggedinUser").innerText = "You are not logged in!";
    localStorage.clear();
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

}
