<div class="card p-3">
    <form action="/login" method="POST">
        <h5>Login</h5>
        <div class="mb-3">
            <label for="username" class="form-label">Benutzername</label>
            <input class="form-control" type="text" placeholder="Benutzername" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Passwort</label>
            <input class="form-control" type="password" placeholder="Passwort" id="password" name="password">
        </div>

        <input type="submit" class="btn btn-primary" value="Login">
    </form>
</div>