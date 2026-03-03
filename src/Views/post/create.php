<h2>Neuen Post erstellen</h2>

<div class="card p-3">
    <form action="/post/create" method="POST">
        <div class="mb-3">
            <label for="message" class="form-label">Nachricht</label>
            <textarea class="form-control" type="text" placeholder="Nachricht" id="message" name="message" cols="3"></textarea>
        </div>

        <input type="submit" class="btn btn-primary" value="Posten">
    </form>
</div>