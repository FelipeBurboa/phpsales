function frmLogin(e) {
    e.preventDefault();
    const user = document.getElementById('user');
    const password = document.getElementById('password');
    if (user.value === '') {
        password.classList.remove("is-invalid");
        user.classList.add("is-invalid");
        user.focus();
    }else if (password.value === '') {
        user.classList.remove("is-invalid");
        password.classList.add("is-invalid");
        password.focus();
    }else {
        const url = base_url + "Usuarios/validate"
        const frm = document.getElementById('frmLogin');
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "ok") {
                    window.location = base_url + "Usuarios";
                }else{
                    document.getElementById("alert").classList.remove("d-none");
                    document.getElementById("alert").innerHTML = res;
                }
            }
        }
    }
}