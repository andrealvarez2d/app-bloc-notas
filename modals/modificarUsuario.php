<div class="modal fade" id="modiModal<?php echo $fileQUERY['usuarioID']; ?>" tabindex="-1"
    aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarModalLabel">Modificar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="form9" id="formNota" action="procesos/proceModificarUser.php" method="post">
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $fileQUERY['usuarioID']; ?>" name="usuarioID"
                            id="usuarioID">
                        <label for="usuario" class="col-form-label">Usuario:</label>
                        <input type="text" name="usuario" value="<?php echo $fileQUERY['nombreUsuario']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="contra" class="col-form-label">Password:</label>
                        <input type="password" name="contra" required>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-secondary" value="Modificar" name="btn">
            </div>
            </form>
        </div>
    </div>
</div>
</div>