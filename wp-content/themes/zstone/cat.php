<? get_header(); ?>
<div class="c">
	<div id="left-box-product">
		<div id="home-loop-product">

			<!--产品展示-->
			<ul>
				<?
				if (have_posts()) {
					$i = 0;
					//$cat = get_query_var('cat');
					//$catname = get_category($cat)->slug;
					
					while (have_posts()) {
						the_post();
						$i++;
						?>
						<li>
							<a href="<? the_permalink(); ?>">
								<img  class="btnbg trans-rotate" src="<? echo catch_the_image(); ?>" alt="<? the_title(); ?>" >
								<?
								$money = get_post_meta($post->ID,'money',true);
								?>
								<div><? echo $money; ?></div>
							</a>
						</li>
						<?
						if ($i % 3 == 0) {
							echo "</ul><ul>";
						}
					}
				}
				else{
					echo "没有商品可以显示";
				}
				?>
			</ul>
		</div>
		<!--导航分页链接-->
		<div class="page_navi"><?php par_pagenavi(6); ?></div>
	</div>
</div>

<? get_footer(); ?>