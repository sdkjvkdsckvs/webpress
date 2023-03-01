<?php 
funtion enqueue_parent_style(){
    wp_enqueue_style('parent_style',
        get_templete_diretory_uri().'/style.css');
}
add_action('wp_enqueue_script', 'enqueue_parent_style')

?>