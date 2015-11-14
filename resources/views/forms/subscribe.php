<form method="POST" action="/subscribe">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    Nome: <input type="text" name="name" /><br />
    E-mail: <input type="email" name="email" /><br />
    Senha: <input type="password" name="password" /><br />
    <input type="submit" />
</form>