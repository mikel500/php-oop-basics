<div class="py-5 container">
    <h1> Formulario de registro </h1>
    <p class="my-3 fs-5 "> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam recusandae, fuga corporis quidem at molestias dolore iusto libero consequatur quas expedita minus veritatis ut animi asperiores praesentium veniam provident voluptas! </p>
    <form action="<?= base_url ?>user/postUser" method="POST" class="register-form border border-1 rounded p-3 mx-auto mt-5">
        <div class="row mb-2">
            <div class="col-sm mb-1">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Howard">
            </div>
            <div class="col-sm mb-1">
                <label for="surname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="surname" name="surname" placeholder="Philips Lovecraft">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm mb-1">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="cthulhumythos@gmail.com">
                <p class="form-text">No compartiremos tu email con terceros.</p>
            </div>
            <div class="col-sm mb-1">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="HPLovecraft16!">
            </div>
        </div>
        <div class="form-check mb-5">
            <input type="checkbox" class="form-check-input" id="terms" name="terms" value="accepted">
            <label class="form-check-label" for="terms">Acepto los términos y condiciones</label>
        </div>
        <button type="submit" class="btn btn-primary" name="register" value="register">Enviar</button>
    </form>
    <?php if (isset($_SESSION["success_msg"])) : ?>
        <p class="text-center text-success fs-5 mt-2"><?= $_SESSION["success_msg"] ?></p>
    <?php endif; ?>
    <?php if (isset($_SESSION["error_msg"])) : ?>
        <p class="text-center text-danger fs-5 mt-2"><?= $_SESSION["error_msg"] ?></p>
    <?php endif; ?>
</div>
<?php
unset($_SESSION["success_msg"]);
unset($_SESSION["error_msg"]);
?>