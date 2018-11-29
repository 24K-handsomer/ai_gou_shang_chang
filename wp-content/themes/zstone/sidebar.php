<div id="right-box">
<?
	/*if( is_dynamic_sidebar('侧边栏') ) {
		dynamic_sidebar('侧边栏');
	}
	else{
		?>
		<div class="sbox">
			<h2>分类</h2>
			<ul>
				<? wp_list_cats(); ?>
			</ul>
		</div>
		<?
	}*/
?>
	
	        <?
	        /*
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
	            'numberposts' => 8,
	            'category_name' => $cat1_slug,
	            'orderby' => 'rand'
	        );
	        $rand_posts = get_posts($args);
	
	        foreach ($rand_posts as $post) {
	            setup_postdata($post);
	            ?>
	            <div class="sbox-product">
	                <a href="<? the_permalink(); ?>">
	                    <div class="sbox-product-left"><img src="<? echo catch_the_image(); ?>"></div>
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
	        */
	        ?>
	  

	<div class="widget" id="tabbed-widget">
		<div class="widget-top">
			<h4>相关分类</h4>
		</div>
		<div class="widget-container">
			<div id="tab4" class="tabs-wrap tagcloud" style="display: block;">
				<?
				$args=array(
					'orderby' => 'name',
					'order' => 'ASC'
				);
				$categories=get_categories($args);
				foreach ($categories as $category) {
					?>
					<a href="<? echo get_category_link( $category->term_id ); ?>" style="font-size: 8pt;"><? echo $category->name; ?></a>
					<?
				}
				?>
			</div>
		</div>
	</div>


	<div class="widget">
		<?
		$cat2 = get_the_category();
		$cat2_slug = $cat2[1]->slug;
		
		if (!$cat2_slug) {
			$cat2_slug = 'zhishi';
			
		}

		$args = array(
			'numberposts' => 8,
			'category_name' => $cat2_slug,
			'orderby' => 'rand'
		);
		$rand_posts = get_posts($args);

		if ($rand_posts) {
			?>
			<div class="widget-top">
				<h4>热门文章</h4>
			</div>
			<div class="widget-container">
				<ul class="widget-top-sellers">
				<?
				foreach ($rand_posts as $post) {
					setup_postdata($post);
					?>
					<li><a href="<? the_permalink(); ?>"><? the_title(); ?></a></li>
					<?
				}
				wp_reset_postdata();
				?>
				</ul>
			</div>
			<?
		}
		?>
	</div>
	
</div>