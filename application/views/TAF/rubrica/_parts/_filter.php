<div class="modal fade" id="filtro" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-4 shadow">

            <!-- Begin CONTENT -->
            <div class="modal-body">

                <form method="POST" action="<?php echo base_url('rubricas/filtrar-dados');?>">

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

                        <!-- Begin C8R_ID -->
                        <div class="col-md-4">

                            <label for="C8R_ID">ID</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C8R_ID" name="C8R_ID">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C8R_ID;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C8R_ID -->

                        <!-- Begin C8R_FILIAL -->
                        <div class="col-md-4">

                            <label for="C8R_FILIAL">Filial</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C8R_FILIAL" name="C8R_FILIAL">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C8R_FILIAL;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C8R_FILIAL -->                        

                        <!-- Begin C8R_DTINI -->
                        <div class="col-md-4">

                            <label for="C8R_DTINI">Data de início</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C8R_DTINI" name="C8R_DTINI">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C8R_DTINI;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>
                        </div>
                        <!-- End C8R_DTINI -->

                    </div>

                    <div class="row mb-4">

                        <!-- Begin C8R_IDTBRU -->
                        <div class="col-md-4">

                            <label for="C8R_IDTBRU">Identificador de rubrica</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C8R_IDTBRU" name="C8R_IDTBRU">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C8R_IDTBRU;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C8R_IDTBRU -->

                        <!-- End C8R_DESRUB -->
                        <div class="col-md-4">

                            <label for="C8R_CODRUB">Descrição da rubrica</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C8R_DESRUB" name="C8R_DESRUB">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C8R_DESRUB;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>
                        </div>
                        <!-- End C8R_DESRUB -->

                        <!-- End C8R_CODRUB -->
                        <div class="col-md-4">

                            <label for="C8R_CODRUB">Código da rubrica</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C8R_CODRUB" name="C8R_CODRUB">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C8R_CODRUB;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>
                        </div>
                        <!-- End C8R_CODRUB -->

                    </div>

                    <div class="row mb-4 collapse" id="moreFilter">

                        <!-- Begin C8R_EVENTO -->
                        <div class="col-md-4">

                            <label for="C8R_EVENTO">Tipo do evento</label>

                            <div class="input-group">

                                <select class="form-control form-select custom-select" name="C8R_EVENTO">
                                    <option value="">Não informar</option>
                                    <option value="I">Inclusão</option>
                                    <option value="A">Alteração</option>
                                    <option value="A">Exclusão</option>
                                </select>

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C8R_EVENTO;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C8R_EVENTO -->

                        <!-- Begin C8R_STATUS -->
                        <div class="col-md-4">

                            <label for="C8R_STATUS" class="form-label">Status</label>

                            <div class="input-group">

                                <select class="form-control form-select custom-select" name="C8R_STATUS">
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
                                        data-placement="top" title="Campo: C8R_STATUS;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C8R_STATUS -->

                        <!-- Begin C8R_ATIVO -->
                        <div class="col-md-4">

                            <label for="C8R_ATIVO" class="form-label">Ativo</label>

                            <div class="input-group">

                                <select class="form-control form-select custom-select" name="C8R_ATIVO">
                                    <option value="">Não informar</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                </select>

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C8R_ATIVO;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C8R_ATIVO -->

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