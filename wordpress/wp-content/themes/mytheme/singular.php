<?php 
if(is_tax()){
    echo 'archive';
    get_template_part('archive');
} 
if (is_single()) {
echo 'single';
}