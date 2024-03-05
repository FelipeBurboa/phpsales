<?php include "Views/Templates/header.php"; ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Usuarios</li>
</ol>
<button class="btn btn-primary mb-3" type="button" onclick="frmUsuario();">Nuevo Usuario</button>

<table class="table table-light w-100" id="tblUsuarios">
    <thead class="thead-dark text-center">
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Caja</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuario">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input id="id" type="hidden" name="id">
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="row" id="claves">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmar">Confirmar Password</label>
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="caja">Caja</label>
                        <select id="caja" class="form-control" name="caja">
                            <?php foreach ($data['cajas'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['caja']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="button" id="btnAccion" onclick="registrarUser(event);">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>