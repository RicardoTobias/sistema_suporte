<?php if (isset($alert)) : ?>

    <?php foreach ($alert as $a => $color) : ?>

        <?php if ($msg = $this->session->flashdata($a)) : ?>

            <div class="alert alert-<?= $color; ?> alert-dismissible fade show pt-4 pb-4" role="alert">

                <span class="text-uppercase font-weight-bold">
                    <i class="fas fa-exclamation-triangle"></i> <?= $msg; ?>
                </span>

                <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

        <?php endif; ?>
    <?php endforeach; ?>

<?php endif; ?>