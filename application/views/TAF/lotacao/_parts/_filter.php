<div class="modal fade" id="filtro" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-4 shadow">

            <!-- Begin CONTENT -->
            <div class="modal-body">

                <form method="POST" action="<?php echo base_url('lotacao-tributaria/filtrar-dados');?>">

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

                        <!-- Begin C99_ID -->
                        <div class="col-md-4">

                            <label for="C99_ID">ID</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C99_ID" name="C99_ID">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C99_ID;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C99_ID -->

                        <!-- End C99_FILIAL -->
                        <div class="col-md-4">

                            <label for="C99_FILIAL">Filial</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C99_FILIAL" name="C99_FILIAL">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C99_FILIAL;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>
                        </div>
                        <!-- End C99_FILIAL -->

                        <!-- Begin C99_DTINI -->
                        <div class="col-md-4">

                            <label for="C99_DTINI">Data de início</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C99_DTINI" name="C99_DTINI">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C99_DTINI;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>
                        </div>
                        <!-- End C99_DTINI -->

                    </div>

                    <div class="row mb-4">

                        <!-- Begin C99_CODIGO -->
                        <div class="col-md-12">

                            <label for="C99_CODIGO">Código de lotação tributária</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="C99_CODIGO" name="C99_CODIGO">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C99_CODIGO;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C99_CODIGO -->

                    </div>

                    <div class="row mb-4 collapse" id="moreFilter">

                        <!-- Begin C99_EVENTO -->
                        <div class="col-md-4">

                            <label for="C99_EVENTO">Tipo do evento</label>

                            <div class="input-group">

                                <select class="form-control form-select custom-select" name="C99_EVENTO">
                                    <option value="">Não informar</option>
                                    <option value="I">Inclusão</option>
                                    <option value="A">Alteração</option>
                                    <option value="A">Exclusão</option>
                                </select>

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C99_EVENTO;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C99_EVENTO -->

                        <!-- Begin C99_STATUS -->
                        <div class="col-md-4">

                            <label for="C99_STATUS" class="form-label">Status</label>

                            <div class="input-group">

                                <select class="form-control form-select custom-select" name="C99_STATUS">
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
                                        data-placement="top" title="Campo: C99_STATUS;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C99_STATUS -->

                        <!-- Begin C99_ATIVO -->
                        <div class="col-md-4">

                            <label for="C99_ATIVO" class="form-label">Ativo</label>

                            <div class="input-group">

                                <select class="form-control form-select custom-select" name="C99_ATIVO">
                                    <option value="">Não informar</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                </select>

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: C99_ATIVO;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End C99_ATIVO -->

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