<div class="modal fade" id="filtro" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-4 shadow">

            <!-- Begin CONTENT -->
            <div class="modal-body">

                <form method="POST" action="<?php echo base_url('complemento-cadastral/filtrar-dados');?>">

                    <div class="modal-body p-1">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-0"><i class="fas fa-filter"></i> Filtrar exibição dos registros</h4>
                            </div>
                            <div class="col-md-6">
                                <button id="btn-service-list" class="btn btn-link text-secondary float-right" type="button"
                                    data-toggle="collapse" data-target="#moreFilter">
                                    [+] Exibir mais opções de filtro
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-4">

                        <!-- Begin C1E_ID -->
                        <div class="col-md-4">

                            <label for="C1E_ID">ID</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C1E_ID" name="C1E_ID">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C1E_ID;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C1E_ID -->

                        <!-- End C1E_CODFIL -->
                        <div class="col-md-4">

                            <label for="C1E_CODFIL">Filial</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C1E_CODFIL" name="C1E_CODFIL">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C1E_CODFIL;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>
                        </div>
                        <!-- End C1E_CODFIL -->

                        <!-- Begin C1E_DTINI -->
                        <div class="col-md-4">

                            <label for="C1E_DTINI">Data de início</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C1E_DTINI" name="C1E_DTINI">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C1E_DTINI;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>
                        </div>
                        <!-- End C1E_DTINI -->

                    </div>

                    <div class="row mb-4 collapse" id="moreFilter">

                        <!-- Begin C1E_EVENTO -->
                        <div class="col-md-4">

                            <label for="C1E_EVENTO">Tipo do evento</label>

                            <div class="input-group">

                                <select class="form-control form-select custom-select" name="C1E_EVENTO">
                                    <option value="">Não informar</option>
                                    <option value="I">Inclusão</option>
                                    <option value="A">Alteração</option>
                                    <option value="A">Exclusão</option>
                                </select>

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C1E_EVENTO;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C1E_EVENTO -->

                        <!-- Begin C1E_STATUS -->
                        <div class="col-md-4">

                            <label for="C1E_STATUS" class="form-label">Status</label>

                            <div class="input-group">

                                <select class="form-control form-select custom-select" name="C1E_STATUS">
                                    <option value="">Não informar</option>
                                    <option value="0">Válido</option>
                                    <option value="1">Inválido</option>
                                    <option value="2">Aguardando retorno</option>
                                    <option value="3">Inconsistente</option>
                                    <option value="4">Aceito RET</option>
                                    <option value="6">Aguardando Exclusão</option>
                                    <option value="7">Excluído RET</option>
                                </select>

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C1E_STATUS;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C1E_STATUS -->

                        <!-- Begin C1E_ATIVO -->
                        <div class="col-md-4">

                            <label for="C1E_ATIVO" class="form-label">Ativo</label>

                            <div class="input-group">

                                <select class="form-control form-select custom-select" name="C1E_ATIVO">
                                    <option value="">Não informar</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                </select>

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C1E_ATIVO;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C1E_ATIVO -->

                    </div>

            </div>
            <!-- End Content -->

            <div class="modal-footer flex-nowrap p-0">
                <button type="submit"
                    class="btn btn-lg btn-link text-decoration-none col-6 m-0 pt-3 pb-3 rounded-0 border-right">
                    <strong><i class="far fa-check-circle"></i> Filtrar dados!</strong></button>
                <button type="button" class="btn btn-lg btn-link text-decoration-none col-6 m-1 rounded-0 text-danger"
                    data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar filtro!</button>
            </div>

            </form>
            <!-- End FORM ON FOOTER -->

        </div>
    </div>
</div>