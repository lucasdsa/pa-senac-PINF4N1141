<?php

foreach ($users as $user) {
    echo '<div>' . $user->name . '</div>';
}

echo '<a id="listPrev" href="#">&lt</a>' .
     '<a id="listNext" href="#">&gt</a>';

?>