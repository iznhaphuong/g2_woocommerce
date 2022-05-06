<?php 
// setPostViews(get_the_ID());
get_header();

$the_query = wc_get_product(get_the_ID());


echo $the_query->name;
get_footer();