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
    document.getElementById("title").innerHTML = "Nuevo usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal('show');
    document.getElementById("id").value = "";
}

function registrarUser(e) {
    e.preventDefault();
    const usuario = document.getElementById('usuario');
    const nombre = document.getElementById('nombre')
    const password = document.getElementById('password');
    const confirmar = document.getElementById('confirmar');
    const caja = document.getElementById('caja');
    if (usuario.value === '' || nombre.value === '' || caja.value === '') {
        Swal.fire({
          position: "top-end",
          icon: "error",
          title: "Todos los campos son obligatorios",
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
                console.log(res);
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
                }else if (res == "modificado"){
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Usuario modificado con exito",
                        showConfirmButton: true,
                        timer: 3000
                      });
                      $("#nuevo_usuario").modal('hide');
                      frm.reset();
                      tblUsuarios.ajax.reload();
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res,
                        showConfirmButton: true,
                        timer: 3000
                      });
                }
            }
        }
    }
}

function btnEditarUser(id){
    document.getElementById("title").innerHTML = "Actualizar usuario";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + "Usuarios/editar/" + id
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("usuario").value = res.usuario;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("caja").value = res.id_caja;
            document.getElementById("claves").classList.add("d-none");
            $("#nuevo_usuario").modal('show');
        }
    }
}