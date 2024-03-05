let tblUsuarios;

document.addEventListener('DOMContentLoaded', function(){
    tblUsuarios = $('#tblUsuarios').DataTable( {
        ajax: {
            url: base_url + 'Usuarios/list',
            dataSrc: ''
        },
        columns: [ {
            'data': 'id',
        },
        {
            'data': 'usuario',
        },
        {
            'data': 'nombre',
        },
        {
            'data': 'caja',
        },
        {
            'data': 'estado',
        },
        {
            'data': 'acciones',
        }
        ]
    } );
})

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

function frmUsuario(){
    $("#nuevo_usuario").modal('show');
}

function registrarUser(e) {
    e.preventDefault();
    const usuario = document.getElementById('usuario');
    const nombre = document.getElementById('nombre')
    const password = document.getElementById('password');
    const confirmar = document.getElementById('confirmar');
    const caja = document.getElementById('caja');
    if (usuario.value === '' || nombre.value === '' || password.value === '' || confirmar.value === '' || caja.value === '') {
        Swal.fire({
          position: "top-end",
          icon: "error",
          title: "Todos los campos son obligatorios",
          showConfirmButton: true,
          timer: 3000
        });
    }else if (password.value != confirmar.value) {
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Las contraseñas no coinciden",
            showConfirmButton: true,
            timer: 3000
          });
    }else {
        const url = base_url + "Usuarios/registrar"
        const frm = document.getElementById('frmUsuario');
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText)
                if (res == "si") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Usuario registrado con exito",
                        showConfirmButton: true,
                        timer: 3000
                      });
                      $("#nuevo_usuario").modal('hide');
                      frm.reset();
                      tblUsuarios.ajax.reload();
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: res,
                        showConfirmButton: true,
                        timer: 3000
                      });
                }
            }
        }
    }
}