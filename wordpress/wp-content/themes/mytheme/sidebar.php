<!-- Display categories -->
<aside>
    <h3 class="text-uppercase mt-100">Tìm kiếm</h3>
    <hr>
    <!-- Get Search Form from custom plugin -->
    <?= do_shortcode('[get_g2_searchform]');?>

    <h3 class="text-uppercase mt-5">Danh mục</h3>
    <hr>
    <h6 itemprop="name" class="product-title entry-title">
        <!-- Lấy ra tất cả danh mục cha -->
        <?php 
        $all_categories = getCategories( );
        foreach ($all_categories as $cat) 
        {
            if($cat->category_parent == 0) 
            {
                $category_id = $cat->term_id;
        ?>
        <!-- In danh mục cha -->
        <?php       
            echo '<a class="cat-name" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>'; 
        ?>
        <!-- Lấy ra danh mục con -->
        <?php
            $sub_cats = getSubCategories( $category_id );
            // Nếu có danh mục con
            if($sub_cats) 
            {
                foreach($sub_cats as $sub_category) 
                {
                    echo '<div class="line">';
                    //In tên danh mục con
                    echo  '<i class="fas fa-caret-right"></i><a class="ps-2 cat-name" href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>';
                    //In số lượng sản phẩm thuộc danh mục
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
</aside>


