<div class="py-5 container">
    <?php if (isset($message)) { ?>
        <h2><?= $message ?></h2>
    <?php } ?>
    <h1> Formulario de registro </h1>
    <p class="my-3"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam recusandae, fuga corporis quidem at molestias dolore iusto libero consequatur quas expedita minus veritatis ut animi asperiores praesentium veniam provident voluptas! </p>
    <form action="index.php?controller=user&action=postUser" method="POST" class="register-form border border-1 rounded p-3 mx-auto mt-5">
        <div class="row mb-2">
            <div class="col-sm mb-1">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-sm mb-1">
                <label for="surname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="surname" name="surname">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm mb-1">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <p class="form-text">We'll never share your email with anyone else.</p>
            </div>
            <div class="col-sm mb-1">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="form-check mb-5">
            <input type="checkbox" class="form-check-input" id="terms" name="terms">
            <label class="form-check-label" for="terms">Acepto los términos y condiciones</label>
        </div>
        <button type="submit" class="btn btn-primary" name="register" value="register">Enviar</button>
    </form>
</div>