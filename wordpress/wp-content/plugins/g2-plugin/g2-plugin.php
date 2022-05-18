<?php 
/**
Plugin Name: G2-SearchForm-Custom
Description: Lấy ra search form tự custom
Author: Group 2
Version: 1.0
*/

//Get search form custom
function get_g2_searchform( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
  <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
    <div class="input-group">
      <div class="input-group-prepend" id="searchsubmit">
        <button id="button-addon2" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
      </div>
      <input type="search"  value="'. esc_attr( get_search_query() ) .'" name="s" id="s" placeholder="Search" aria-describedby="button-addon2" class="form-control border-0 bg-light" required>
    </div>
  </div>
  </form>';
  
    return $form;
}
add_shortcode('get_g2_searchform', 'get_g2_searchform');