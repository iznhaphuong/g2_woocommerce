<?php 
if(is_tax()){
    get_template_part('archive');
} else if (is_single()) {
// echo 'single';    
get_template_part('template-parts/content/content', 'single');

}