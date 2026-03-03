<?php if ($this->auth->isLoggedIn()) { ?>
    <?= $this->basic_view('post/create.php') ?>
<?php } ?>

<?php if ($this->auth->isLoggedIn()) { ?>
    <h2>Neue Posts</h2>
<?php } ?>

<?php if (!empty($posts) && (count($posts) > 0)) { ?>
    <?php foreach ($posts as $post) { ?>
        <?= $this->basic_view('post/mini.php', ['post' => $post]) ?>
    <?php } ?>
<?php } else { ?>
    <p>Es gibt keine Posts</p>
<?php } ?>