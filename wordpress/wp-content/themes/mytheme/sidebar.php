<h3>Danh mục</h3>
<div class="categories">
<?php
$args = array(
'orderby' => 'name',
'order' => 'ASC'
);

$categories = get_categories($args);
foreach($categories as $category) { 
    echo '<div class="category d-flex">';
    echo '<a class="cat-name" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
    echo '<p class="postpercat px-2">'. $category->count . '</p>';
    echo '</div>';
    echo '<hr>';
}
?>
</div>