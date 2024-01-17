

<div class="modal fade" id="modal_pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Vista / PDF - view\ajax\pdf_orden.php</h4>
            </div>
            <div class="modal-body">
                <div id="loader2" class="text-center"></div>
                <div class="outer_div2"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="generar_pdf" class="btn btn-success">Generar PDF</button>
                <!-- Agrega esto donde quieras en tu archivo ordenes-view.php -->
                <a href="view\ajax\pdf_generar.php?idOrden=1" target="_blank">Generar PDF</a>
            </div>
        </div>
    </div>
</div>