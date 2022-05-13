<div class="modal fade" id="filtro" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-4 shadow">

            <!-- Begin CONTENT -->
            <div class="modal-body">

                <form method="POST" action="<?php echo base_url('identificador-rubricas/filtrar-dados');?>">

                    <div class="modal-body p-1">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-0"><i class="fas fa-filter"></i> Filtrar exibição dos registros</h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-4">

                        <!-- Begin T3M_ID -->
                        <div class="col-md-4">

                            <label for="T3M_ID">ID</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="T3M_ID" name="T3M_ID">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: T3M_ID;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>

                        </div>
                        <!-- End T3M_ID -->

                        <!-- End T3M_FILIAL -->
                        <div class="col-md-4">

                            <label for="T3M_FILIAL">Filial</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="T3M_FILIAL" name="T3M_FILIAL">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: T3M_FILIAL;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>
                        </div>
                        <!-- End T3M_FILIAL -->

                        <!-- Begin T3M_CODERP -->
                        <div class="col-md-4">

                            <label for="T3M_CODERP">Código ERP</label>

                            <div class="input-group">

                                <input type="text" class="form-control" id="T3M_CODERP" name="T3M_CODERP">

                                <!-- Begin TOOLTIP -->
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" data-tt="tooltip"
                                        data-placement="top" title="Campo: T3M_CODERP;">?</button>
                                </div>
                                <!-- End TOOLTIP -->

                            </div>
                        </div>
                        <!-- End T3M_CODERP -->

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