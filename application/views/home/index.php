<div class="container mt-5 mb-5">

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">Dicas e erros</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">300</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-4x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">KCS</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">150</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-4x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-danger text-uppercase mb-1">Issues</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">100</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tools fa-4x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="card mb-4 border-left-warning shadow mb-4">
                    <div class="card-header">
                        <h6 class="mt-2 font-weight-bold text-warning">Dicas, dúvidas e erros do sistema:</h6>
                    </div>
                    <div class="card-body p-0">
                        <table class="table border-top-0 mb-0 border-bottom-0 table-bordered table-striped">

                            <tbody>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i>
                                        <a href="" class="text-secondary" target="_blank">
                                            Dúvida LGPD TAF
                                        </a>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-warning btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                            <span class="text">Veja mais opções...</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card mb-4 border-left-success shadow mb-4">
                    <div class="card-header">
                        <h6 class="mt-2 font-weight-bold text-success">Knowledge Centered Support - KCS:</h6>
                    </div>
                    <div class="card-body p-0">
                        <table class="table border-top-0 mb-0 border-bottom-0 table-bordered table-striped">

                            <tbody>

                                <?php foreach ($artigos as $artigo) : ?>

                                    <tr>
                                        <td><i class="fas fa-chevron-right"></i>
                                            <a href="<?= $artigo->link ?>" class="text-secondary" target="_blank">
                                                <?= $artigo->artigo ?>
                                            </a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                            <span class="text">Veja mais opções...</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card mb-4 border-left-danger shadow mb-4">
                    <div class="card-header">
                        <h6 class="mt-2 font-weight-bold text-danger">Issues:</h6>
                    </div>
                    <div class="card-body p-0">
                        <table class="table border-top-0 mb-0 border-bottom-0 table-striped table-bordered">

                            <tbody>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> TDW</td>
                                    <td>
                                        <a href="https://tdw.totvs.com/" class="text-secondary" target="_blank">
                                            https://tdw.totvs.com/
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> Meu RH</td>
                                    <td>
                                        <a href="https://rhonline.totvs.com.br/" class="text-secondary" target="_blank">
                                            https://rhonline.totvs.com.br/
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> Gmail</td>
                                    <td>
                                        <a href="https://mail.google.com/" class="text-secondary" target="_blank">
                                            https://mail.google.com/
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> Zendesk</td>
                                    <td>
                                        <a href="https://totvssuporte.zendesk.com/agent/dashboard" class="text-secondary" target="_blank">
                                            https://totvssuporte.zendesk.com/agent/dashboard
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> Cisco Finesse</td>
                                    <td>
                                        <a href="https://sncfinesse1.totvs.com.br:8445/" class="text-secondary" target="_blank">
                                            https://sncfinesse1.totvs.com.br:8445/
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> Upload de arquivos</td>
                                    <td>
                                        <a href="https://suporte.totvs.com/portal/p/10098/fileupload" class="text-secondary" target="_blank">
                                            https://suporte.totvs.com/portal/p/10098/fileupload
                                        </a>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-danger btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                            <span class="text">Veja mais opções...</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card mb-4 border-left-primary shadow mb-4">
                    <div class="card-header">
                        <h6 class="mt-2 font-weight-bold text-primary">Links úteis:</h6>
                    </div>
                    <div class="card-body p-0">
                        <table class="table border-top-0 mb-0 border-bottom-0 table-bordered table-striped">

                            <tbody>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> TDW</td>
                                    <td>
                                        <a href="https://tdw.totvs.com/" class="text-secondary" target="_blank">
                                            https://tdw.totvs.com/
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> Meu RH</td>
                                    <td>
                                        <a href="https://rhonline.totvs.com.br/" class="text-secondary" target="_blank">
                                            https://rhonline.totvs.com.br/
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> Gmail</td>
                                    <td>
                                        <a href="https://mail.google.com/" class="text-secondary" target="_blank">
                                            https://mail.google.com/
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> Zendesk</td>
                                    <td>
                                        <a href="https://totvssuporte.zendesk.com/agent/dashboard" class="text-secondary" target="_blank">
                                            https://totvssuporte.zendesk.com/agent/dashboard
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> Cisco Finesse</td>
                                    <td>
                                        <a href="https://sncfinesse1.totvs.com.br:8445/" class="text-secondary" target="_blank">
                                            https://sncfinesse1.totvs.com.br:8445/
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><i class="fas fa-chevron-right"></i> Upload de arquivos</td>
                                    <td>
                                        <a href="https://suporte.totvs.com/portal/p/10098/fileupload" class="text-secondary" target="_blank">
                                            https://suporte.totvs.com/portal/p/10098/fileupload
                                        </a>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                            <span class="text">Veja mais opções...</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.container-fluid -->