<div class="sbox-b">
    <div>你可能需要的产品</div>

    <?
    
    //$str = $_SERVER['HTTP_REFERER'];
    //$name = $str ? substr($str,strripos($str,"/")+1) : "product";                
    //$catid = get_category_by_slug($name)->term_id;
    //
    $cat = get_the_category();

    $cat_slug = $cat[1]->slug;

	$post_name = substr($cat_slug,0,-5);
    
    $post_id = getinfo($post_name);
    
    $cat1 = get_the_category($post_id);
    
    $cat1_slug = $cat1[1]->slug;
    
    if (!$cat1_slug) {
    	$cat1_slug = 'product';
    }
   
    $args = array(
        'numberposts' => 5,
        'category_name' => $cat1_slug,
        'orderby' => 'rand'
    );
    $rand_posts = get_posts($args);

    foreach ($rand_posts as $post) {
        setup_postdata($post);
        ?>
        <div class="sbox-product">
            <a href="<? the_permalink(); ?>">
                <div class="sbox-product-left"><img src="<? echo catch_the_image(); ?>" alt="<? the_title(); ?>" ></div>
                <div class="sbox-product-right">
                    <div class="title"><? the_title(); ?></div>
                    <div class="instru">&nbsp;&nbsp;</div>
                    <div class="money">价格：￥<span><? echo get_post_meta($post->ID,'money',true); ?></span></div>
                </div>
            </a>
        </div>
        <?
    }
    wp_reset_postdata();
    
    ?>

</div>