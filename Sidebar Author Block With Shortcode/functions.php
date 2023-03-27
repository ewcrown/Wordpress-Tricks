<?php

// function that runs when shortcode is called
function author()
{

    $name = get_the_author_meta('display_name');
    $description = get_the_author_meta('user_description');
    $avatar = get_avatar(get_the_author_meta('ID'), 265);
    $heading = get_the_author_meta('author_heading');

    $authorData = "
	<div class='sidebar_author_block'>
			{$avatar}
			<h2>{$heading}</h2>
			<h3>{$name}</h3>
			<p>{$description}</p>
	</div>
	";

    return $authorData;
}

add_shortcode('sidebar_author', 'author');

?>