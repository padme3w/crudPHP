<?php include 'layout-top.php' ?>

<?php if (isset($msg) && $msg != "") : ?>
    <div class="alert alert-danger" role="alert">
    <?=$msg?>
    </div>
<?php endif; ?>

<form method='POST' action='<?=route('autenticacao/logar/')?>'>

<label class='col-md-4'>
    E-mail
    <input type="text" class="form-control <?=hasError("email","is-invalid")?>" name="email" value="">
    <div class='invalid-feedback'><?=getValidationError("email") ?></div>
</label>

<label class='col-md-4'>
    Senha
    <input type="password" class="form-control <?=hasError("senha","is-invalid")?>" name="senha" value="" >
    <div class='invalid-feedback'><?=getValidationError("senha") ?></div>
</label>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Entrar</button>
</form>

<?php include 'layout-bottom.php' ?>