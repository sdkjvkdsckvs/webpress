<?php 
funtion enqueue_parent_style(){
    wp_enqueue_style('parent_style',
        get_templete_diretory_uri().'/style.css');

    wp_enqueue_style('index_style',
        get_stylesheet_diretory_uri().'/index.css');

    wp_enqueue_style('inner_style',
        get_stylesheet_diretory_uri().'/inner.css');  

    wp_enqueue_script('index_script',
        get_stylesheet_diretory_uri().'/index.js'); 

}
add_action('wp_enqueue_script', 'enqueue_parent_style')

?>