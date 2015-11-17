<?php

foreach ($users as $user) {
    echo '<div class="user">' . 
             '<div class="desc">' . 
                '<span>' . $user->name . '</span>' .
                '<img src=' . $img . '></img>' .
             '</div>' .
             '<div class="crud">
                <button>Editar</button>
                <button>Deletar</button>' . 
             '</div>' .
         '</div>';
}

echo '<br /><a id="listPrev" href="#">&lt</a>' .
     '<a id="listNext" href="#">&gt</a>';

?>