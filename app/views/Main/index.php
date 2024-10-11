<h1>views/main/index</h1>

<?php
foreach ($posts as $post){
    echo '<h3>' . $post->title . '</h3>';
}
?>