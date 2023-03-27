<?php

// function that runs when shortcode is called
function author()
{
    $authorData = "Hello World";
    return $authorData;
}

add_shortcode('sidebar_author', 'author');

// You can use '[sidebar_author]' as shortcode

?>