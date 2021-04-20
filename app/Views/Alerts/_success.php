<?php if ($this->success) { ?>

    <?php foreach ($this->success as $msg) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
               <i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo $msg; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

<?php } ?>