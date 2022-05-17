<aside>
    <!-- Display categories -->
<h3 class="text-uppercase mt-100">Tìm kiếm</h3>
<hr>
<?= do_shortcode('[get_g2_searchform]');?>

<h3 class="text-uppercase mt-5">Danh mục</h3>
<hr>
<h6 itemprop="name" class="product-title entry-title">

    <?php
        $taxonomy     = 'product_cat';
        $orderby      = 'name';  
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no  
        $title        = '';  
        $empty        = 0;
    ?>

    <?php 
        $all_categories = getAllCategories( );

        foreach ($all_categories as $cat) 
        {
            if($cat->category_parent == 0) 
            {
                $category_id = $cat->term_id;
    ?>      

    <?php       
        echo '<a class="cat-name" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>'; 
    ?>

    <?php
        $args2 = array(
            'taxonomy'     => $taxonomy,
            'child_of'     => 0,
            'parent'       => $category_id,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
        );

        $sub_cats = get_categories( $args2 );

        if($sub_cats) 
        {
            foreach($sub_cats as $sub_category) 
            {
                echo '<div class="line">';
                echo  '<i class="fas fa-caret-right"></i><a class="ps-2 cat-name" href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>';
                echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="postpercat px-2 " > ' . $sub_category->count . '</span>' );
                echo '</div>';
            }
        }
        echo '<hr>';
    ?>

    <?php 
            }     
        }
    ?>
</h6>

<!-- New Product Title END -->

</aside>