<form method="POST">
    <div class="row mb-4">
        
        <div class="col-md-4">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C92_ID;"></i>
                <strong>ID:</strong></label>
            <div class="input-group">
                <input type="text" class="form-control" id="C92_ID" value="<?php echo $dados->C92_ID; ?>" disabled
                    readonly>
            </div>
        </div>
        
        <div class="col-md-4">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C92_FILIAL;"></i>
                Filial</label>
            <div class="input-group">
                <input type="text" class="form-control" id="C92_FILIAL" name="C92_FILIAL"
                    value="<?php echo $dados->C92_FILIAL; ?>">
            </div>
        </div>
        
        <div class="col-md-4">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C92_DTINI;"></i>
                Data de início</label>
            <div class="input-group">
                <input type="text" class="form-control" id="C92_DTINI" name="C92_DTINI"
                    value="<?php echo $dados->C92_DTINI; ?>">
            </div>
        </div>
    </div>

    <div class="row mb-4">
        
        <div class="col-md-6">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C92_TPINSC;"></i>
                <strong>Tipo de inscrição:</strong></label>
            <div class="input-group">
                <input type="text" class="form-control" id="C92_TPINSC" value="<?php echo $dados->C92_TPINSC; ?>">
            </div>
        </div>
        
        <div class="col-md-6">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C92_NRINSC;"></i>
                Número de inscrição</label>
            <div class="input-group">
                <input type="text" class="form-control" id="C92_NRINSC" name="C92_NRINSC"
                    value="<?php echo $dados->C92_NRINSC; ?>">
            </div>
        </div>
        
    </div>

    <div class="row mb-4">

        <div class="col-md-4">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C92_EVENTO;"></i>
                Tipo
                do evento</label>
            <div class="input-group">
                <select class="form-control form-select custom-select" name="C92_EVENTO">
                    <option value="I" <?php echo ($dados->C92_EVENTO == 'I' ? 'selected' : ''); ?>>Inclusão</option>
                    <option value="A" <?php echo ($dados->C92_EVENTO == 'A' ? 'selected' : ''); ?>>Alteração</option>
                    <option value="A" <?php echo ($dados->C92_EVENTO == 'E' ? 'selected' : ''); ?>>Exclusão</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top"
                    title="C92_STATUS;"></i> Status</label>
            <div class="input-group">
                <select class="form-control form-select custom-select" name="C92_STATUS">
                    <option value="" <?php echo ($dados->C92_STATUS == '' ? 'selected' : ''); ?>>Não processado</option>
                    <option value="0" <?php echo ($dados->C92_STATUS == '0' ? 'selected' : ''); ?>>Válido</option>
                    <option value="1" <?php echo ($dados->C92_STATUS == '1' ? 'selected' : ''); ?>>Inválido</option>
                    <option value="2" <?php echo ($dados->C92_STATUS == '2' ? 'selected' : ''); ?>>Aguardando retorno
                    </option>
                    <option value="3" <?php echo ($dados->C92_STATUS == '3' ? 'selected' : ''); ?>>Inconsistente
                    </option>
                    <option value="4" <?php echo ($dados->C92_STATUS == '4' ? 'selected' : ''); ?>>Aceito RET</option>
                    <option value="6" <?php echo ($dados->C92_STATUS == '6' ? 'selected' : ''); ?>>Aguardando Exclusão
                    </option>
                    <option value="7" <?php echo ($dados->C92_STATUS == '7' ? 'selected' : ''); ?>>Excluído RET</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top"
                    title="C92_PROTUL;"></i> Protocolo</label>
            <div class="input-group">
                <input type="text" class="form-control" id="filial" value="<?php echo $dados->C92_PROTUL; ?>"
                    name="C92_PROTUL">
            </div>
        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-12">
            <label for="tipoevento" class="form-label"><i class="far fa-question-circle" data-tt="tooltip"
                    data-placement="top" title="C92_ATIVO;"></i> Ativo</label>
            <div class="input-group">
                <select class="form-control form-select custom-select" name="C92_ATIVO">
                    <option value="1" <?php echo ($dados->C92_ATIVO == '1' ? 'selected' : ''); ?>>Sim</option>
                    <option value="2" <?php echo ($dados->C92_ATIVO == '2' ? 'selected' : ''); ?>>Não</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" data-toggle="tooltip" data-placement="top"
                        title="Campo: C92_ATIVO;">?</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="R_E_C_N_O_" value="<?php echo $dados->R_E_C_N_O_ ?>">
    <div class="row mb-4">
        <div class="col-md-12">

            <a href="<?php echo base_url("estabelecimentos"); ?> " class="btn btn-primary">
                <i class="fas fa-angle-left"></i> Voltar
            </a>
            
            <button type="submit" class="btn btn-success">
                <i class="far fa-paper-plane"></i> Salvar dados
            </button>
            
        </div>
    </div>
</form>