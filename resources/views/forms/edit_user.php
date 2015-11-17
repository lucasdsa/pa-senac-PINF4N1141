<form method="POST" action="/edit">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    Nome: <input type="text" name="name" value="<?php echo $user->name; ?>"/><br />
    E-mail: <input type="email" name="email" value="<?php echo $user->email; ?>"/><br />
    Senha: <input type="password" name="password" /><br />
    Tipo: <select name="super">
        <option value="1">Administrador</option>
        <option value="0">Normal</option>
    </select>
    <br />
    <input type="submit" />
</form>