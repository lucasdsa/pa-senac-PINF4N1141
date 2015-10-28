<?php

function echoHeader($title) {

    echo '<head>' .
         '<meta charset="utf-8" />' .
         '<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />' .
         '<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>' .
         '<link rel="stylesheet" href="public/css/index.css" />' .
         '<link rel="stylesheet" href="public/css/decoration.css" />' .
         '<script src="public/js/index.js"></script>' .
         '<title>' . $title . "</title>
         '</head>';
}

?>