<?php require APP_ROOT . '/views/inc/header.php'; ?>
    <div class="jumbotron text-center jumbotron-fluid">
        <h1 class="display-3"><?php /** @var object $data */
            echo $data['title'] ?></h1>
        <p class="lead">
            <?php echo $data['description'];?>
        </p>
    </div>

<?php require APP_ROOT . '/views/inc/footer.php'; ?>