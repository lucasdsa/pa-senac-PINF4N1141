<?php

foreach ($users as $user) {
    echo '<div class="user">' . $user->name . '</div>';
}

echo '<br /><a id="listPrev" href="#">&lt</a>' .
     '<a id="listNext" href="#">&gt</a>';

?>