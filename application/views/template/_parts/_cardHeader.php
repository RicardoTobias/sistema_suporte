<div class="card-header py-3">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                        <h4 class="m-0 font-weight-bold text-uppercase">
                            
                            <?php 
                                if (isset($SX2) && ($nomeTabela)) {
                                    echo 'Registros Cadastrados na tabela'.  $nomeTabela . ' | '.$SX2;
                                }; 
                            ?>
                        </h4>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <!-- Descrição da página/rotina -->
                        <p class="mt-3 mb-0 text-justify"><?= $descricao; ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>