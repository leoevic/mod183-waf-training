<!doctype html>

<html lang="de">
    <head>
        <title>Zwitscher</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        <?php // Navbar ?>
        <nav class="navbar bg-body-tertiary mb-3">
            <div class="container-fluid">
                <a class="navbar-brand mb-0 h1">Zwitscher</a>

                <div class="d-flex">
                    <?php if ($this->auth->isLoggedIn()) { ?>
                        <a class="btn btn-primary" href="/logout">Abmelden</a>
                    <?php } else { ?>
                        <a class="btn btn-primary" href="/login">Anmelden</a>
                        <a class="button button-primary" href="/register">Registrieren</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <div class="container">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning p-3"><?= $_SESSION['message'] ?></div>
                <?php unset($_SESSION['message']); ?>
            <?php } ?>
            <?= $content ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>