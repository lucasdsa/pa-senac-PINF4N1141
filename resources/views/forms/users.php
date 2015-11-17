<?php

foreach ($users as $user) {

    $options = (!$user->super) ? '<button class="edit">Editar</button>
                                  <button class="delete">Deletar</button>' : '<div>Admin</div>';
    
    echo '<div class="user">' . 
             '<div class="desc">' . 
                '<span>' . $user->name . '</span>' .
                '<img src=' . $img . '></img>' .
             '</div>' .
             '<div class="crud">' . 
                '<span>' . $user->email . '</span>' .
                $options . 
             '</div>' .
         '</div>';
}

echo '<br /><a id="listPrev" href="#">&lt</a>' .
     '<a id="listNext" href="#">&gt</a>';

?>