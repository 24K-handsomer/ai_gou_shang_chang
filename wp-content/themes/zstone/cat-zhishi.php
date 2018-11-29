<? get_header(); ?>
<div class="c">
	<div id="left-box">
		<div id="home-loop">
			<?php
				global $post;
				if(have_posts()){

					//$cat = get_query_var('cat');
					//$catname = get_category($cat)->slug;
					
					while(have_posts()){
						//获取下一篇文章的信息，并将信息存为全局变量$post中
						the_post();
						?>
						<div class="post-item">
							<a href="<? the_permalink(); ?>">
							<div class="post-img">
								<?
								if (has_post_thumbnail()) {
									the_post_thumbnail();
								}
								else{
									?>
									<img src="<? bloginfo('template_url'); ?>/images/jianjie.jpg" alt="<? the_title(); ?>" >
									<?
								}
								?>
							</div>
							<div class="post-title">
								<? the_title(); ?>
							</div>
							</a>
							<div class="post-content">
								<? the_content(); ?>
							</div>
							<div class="post-meta">
								分类：<? the_category(','); ?><span>|</span>
								作者：<? the_author(); ?><span>|</span>
								发布时间：<? the_time( 'Y-m-d' ); ?>
								<? edit_post_link( '编辑', ' <span>|</span> ', '' ); ?>
							</div>
						</div>
						<?
					}
				}
				else{
					echo "没有日志可以显示！";
				}
			?>
		</div>
		<!--导航分页链接-->
		<div class="page_navi"><?php par_pagenavi(9); ?></div>
	</div>

	<? get_sidebar(); ?>
	
</div>
<? get_template_part('related','product'); ?>
<? get_footer(); ?>