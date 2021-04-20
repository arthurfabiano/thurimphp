<?php if ($this->errors) { ?>

    <?php foreach ($this->errors as $msg) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo $msg; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

<?php } ?>