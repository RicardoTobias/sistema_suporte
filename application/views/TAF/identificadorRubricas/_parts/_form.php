<form method="POST">
    <div class="row mb-4">
        <div class="col-md-4">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3M_ID;"></i>
                <strong>ID:</strong></label>
            <div class="input-group">
                <input type="text" class="form-control" id="T3M_ID" value="<?php echo $dados->T3M_ID; ?>" disabled
                    readonly>
            </div>
        </div>
        <div class="col-md-4">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top"
                    title="T3M_FILIAL;"></i>
                Filial</label>
            <div class="input-group">
                <input type="text" class="form-control" id="T3M_FILIAL" name="T3M_FILIAL"
                    value="<?php echo $dados->T3M_FILIAL; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top"
                    title="T3M_CODERP;"></i>
                Código ERP</label>
            <div class="input-group">
                <input type="text" class="form-control" id="T3M_CODERP" name="T3M_CODERP"
                    value="<?php echo $dados->T3M_CODERP; ?>">
            </div>
        </div>
    </div>

    <input type="hidden" name="R_E_C_N_O_" value="<?php echo $dados->R_E_C_N_O_ ?>">

    <div class="row mb-4">
        <div class="col-md-12">

            <a href="<?php echo base_url("complemento-cadastral"); ?> " class="btn btn-primary">
                <i class="fas fa-angle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success">
                <i class="far fa-paper-plane"></i> Salvar dados
            </button>

        </div>
    </div>
</form>