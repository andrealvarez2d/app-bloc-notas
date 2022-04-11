<div class="modal fade" id="borrarModal<?php echo $fileQUERY['notaID']; ?>" tabindex="-1"
    aria-labelledby="borrarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="borrarModalLabel">Borrar Nota</h5>
            </div>
            <div class="modal-body">
                ¿Desea eliminar la nota "<?php echo $fileQUERY['tituloNota']; ?>"?
            </div>
            <div class="modal-footer">
                <form action="procesos/proceEliminar.php">
                    <button type="submit" value="<?php echo $fileQUERY['notaID']; ?>"
                        class="btn btn-secondary btnBorrar" data-bs-dismiss="modal" name="id">SI</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                </form>
            </div>
        </div>
    </div>
</div>