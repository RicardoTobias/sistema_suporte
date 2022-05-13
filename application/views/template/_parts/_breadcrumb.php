<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">

                <?php if(isset($breadcrumb)) : ?>
                <?php foreach($breadcrumb as $link => $l) : ?>

                <li class="breadcrumb-item mt-2">
                    <a href="<?= base_url($l); ?>">
                        <i class="fas fa-chevron-right"></i> <?= $link; ?>
                    </a>
                </li>
                
                <?php endforeach; ?>
                <?php endif; ?>
                
                <?php if (isset($filtro)) : ?>
                <li class="ml-auto">

                    <?php if ($filtro == FALSE) : ?>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-link btn-md text-right" data-toggle="modal" data-target="#filtro">
                            <i class="fas fa-filter"></i> Filtrar Dados
                        </button>

                    <?php else : ?>

                        <!-- Button trigger modal -->
                        <a href="<?php echo base_url('admissao-preliminar') ?>" class="btn btn-link btn-md text-right text-danger">
                            <i class="fas fa-ban"></i> Cancelar Filtro
                        </a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-link btn-md text-right" data-toggle="modal" data-target="#filtro">
                            <i class="fas fa-filter"></i> Filtrar Dados
                        </button>

                    <?php endif; ?>
                </li>
                <?php endif; ?>
            </ol>
        </nav>