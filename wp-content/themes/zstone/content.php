
<div class="c">
	<div id="left-box">
		<div id="post-box">
			<div class="post-item">
				<div class="post-title"><? the_title(); ?></div>

				<div class="post-meta">
					所属分类：<? the_category(','); ?><span>|</span>
					作者：<? the_author(); ?><span>|</span>
					时间：<? the_time( 'Y-m-d H:i:s' ); ?>
					<? edit_post_link( '编辑', ' <span>|</span> ', '' ); ?>
				</div>
				<?
				//该文章所属的商品
				$cat = get_the_category();
				$cat_slug = $cat[1]->slug;
				if ($cat_slug) {
					$post_name = substr($cat_slug,0,-5);
	    			$post_id = getinfo($post_name);
	    			$hre = get_permalink($post_id);
					$title = get_post($post_id)->post_title;
					?>

					<div class="post-hre">
						产品链接：<a href="<? echo $hre; ?>"><? echo $title; ?></a>
					</div>
					<?
				}
				?>
				
				<div class="post-content">
					<? the_content(); ?>
				</div>
				<div class="post-tag">
					<?php
						echo get_the_tag_list('标签：','&nbsp;&nbsp;&nbsp;&nbsp;');
					?>
				</div>
				<div class="post-nav">
					<? previous_post_link('上一篇：%link','%title',true); ?>
					<? next_post_link('下一篇：%link','%title',true); ?>
				</div>
			</div>
			
		</div>
	</div>

	<? get_sidebar(); ?>

</div>

<!--相关联产品-->
<? get_template_part('related','product'); ?>

<div class="c">
<!--评论-->
<? comments_template(); ?>
</div>