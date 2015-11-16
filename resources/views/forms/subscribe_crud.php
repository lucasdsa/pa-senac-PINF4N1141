<form method="POST" action="/subscribe">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    Nome: <input type="text" name="name" /><br />
    E-mail: <input type="email" name="email" /><br />
    Senha: <input type="password" name="password" /><br />
    Tipo: <select name="super">
        <option value="1">Administrador</option>
        <option value="0">Normal</option>
    </select>
    <br />
    <input type="submit" />
</form>