<div class="card p-3">
    <form action="/register" method="POST">
        <h5>Registrieren</h5>
        <div class="mb-3">
            <label for="username" class="form-label">Benutzername</label>
            <input class="form-control" type="text" placeholder="Benutzername" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-Mail</label>
            <input class="form-control" type="text" placeholder="E-Mail" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" type="text" placeholder="Name" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Passwort</label>
            <input class="form-control" type="password" placeholder="Passwort" id="password" name="password">
        </div>

        <input type="submit" class="btn btn-primary" value="Registrieren">
    </form>
</div>