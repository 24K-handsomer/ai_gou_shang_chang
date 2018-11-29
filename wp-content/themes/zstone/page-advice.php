<? get_header(); ?>
<div class="c">
	<?php
		the_post();
	?>
	<div class="comment-title"><? the_title(); ?></div>
	<div class="comment-content"><? the_content(); ?></div>
	<div id="comment-box">
		<h3>留言</h3>
		<ol class="commentlist">
			<?
			if (!comments_open()) {
				?>
				<li class="tip-box"><p>留言功能已经关闭</p></li>
				<?
			}
			else if (post_password_required()) {
				?>
				<li class="tip-box"><p>请输入密码查看留言</p></li>
				<?
			}
			else {
				wp_list_comments();
			}
			?>
		</ol>
		<div class="clr">
			<?
			if (comments_open()) {
				comment_form();
			}
			?>
		</div>
	</div>
</div>
<? get_footer(); ?>