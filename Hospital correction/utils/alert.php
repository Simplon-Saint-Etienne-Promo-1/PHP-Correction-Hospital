<?php if (isset($_GET['error'])) { ?>
    <div class="red darken-1">
        <p><?= $_GET['error'] ?></p>
    </div>
<?php } ?>

<?php if (isset($_GET['success'])) { ?>
    <div class="green darken-1">
        <p><?= $_GET['success'] ?></p>
    </div>
<?php } ?>