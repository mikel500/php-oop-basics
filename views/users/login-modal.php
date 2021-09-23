<div id="login-modal" class="modal fade" tabindex="-1" aria-labelledby="login-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-light bg-primary">
                <h5 class="modal-title">Introduzca sus datos de acceso</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="login" method="post" action="<?= base_url ?>user/login">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="login" value="Submit">Entrar</button>
            </div>
        </div>
    </div>
</div>