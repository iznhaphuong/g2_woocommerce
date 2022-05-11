<!-- Display categories -->

<?php
            $args = array(
            'orderby' => 'name',
            'order' => 'ASC'
            );
            
            $categories = get_categories($args);
            foreach($categories as $category) { 
                echo '<div class="cat-item">';
                echo '<a class="cat-name d-flex justify-content-between" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name .'<span class="postpercat px-2">'. $category->count . '</span></a>';
                echo '</div>';
                echo '<hr>';
            }
?>