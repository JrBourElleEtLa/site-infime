<?php

$post_id = $_REQUEST['id'];
$imageProject = get_field('image_project', $post_id );
$videoProject = get_field('video_project', $post_id );
$linkProject = get_field('links_project', $post_id );
$projectType = get_field('type_project', $post_id );

if ($projectType == 'image'){

    echo '<div id="content-modal-image">';

    echo '<img src="'.$imageProject['url'].'">';

    echo '</div>';

} elseif ($projectType == 'video'){

    echo '<div id="content-modal-video" class="embed-container">';

    echo '<iframe width="100%" height="100%" src="'.$videoProject.'?&autoplay=1" frameborder="0" allowfullscreen></iframe>';

    echo '</div>';

} elseif ($projectType == 'interactif-360'){

    echo '<div id="content-modal-iframe">';

    echo '<iframe height="100%" width="100%" webkitallowfullscreen="webkitallowfullscreen" src="'.$linkProject.'" style="border: 0px;"></iframe>';

    echo '</div>';
}
?>