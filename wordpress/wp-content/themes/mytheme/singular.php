<?php 
if(is_tax()){
    get_template_part('archive');
} 
if (is_single()) {
echo 'single';
}