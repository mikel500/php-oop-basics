<div id="login-modal" class="modal fade" tabindex="-1" aria-labelledby="login-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-light bg-primary">
                <h5 class="modal-title">Introduzca sus datos de acceso</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca su correo electrónico">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="********">
                </div>
                <p id="login-error" class="text-center text-danger mt-2"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="login-button" class="btn btn-primary">Entrar</button>
            </div>
        </div>
    </div>
</div>