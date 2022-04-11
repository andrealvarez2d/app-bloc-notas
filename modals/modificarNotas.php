<div class="modal fade" id="modiModal<?php echo $fileQUERY['notaID']; ?>" tabindex="-1"
    aria-labelledby="modificarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modificarModalLabel">Modificar Nota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="form4" id="formNota" action="procesos/proceModificar.php" method="post">
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $fileQUERY['notaID']; ?>" name="idNota" id="idNota">
                        <label for="tituloNota" class="col-form-label">Titulo:</label>
                        <input type="text" class="form-control" id="tituloNota" name="tituloNota"
                            value="<?php echo $fileQUERY['tituloNota']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="formNota" class="col-form-label">Nota:</label>
                        <textarea class="form-control" name="nota" id="formNota"
                            required><?php echo $fileQUERY['nota']; ?></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-secondary" name="btn" value="Guardar">
            </div>
            </form>
        </div>
    </div>
</div>
</div>