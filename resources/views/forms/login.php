<form method="POST" action="/login">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    E-mail: <input type="email" name="email" /><br />
    Senha: <input type="password" name="password" /><br />
    <input type="submit" />
</form>