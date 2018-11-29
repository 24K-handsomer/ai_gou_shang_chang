<div id="comment-box">
	<h3>评论</h3>
	<ol class="commentlist">
		<?
		if (!comments_open()) {
			?>
			<li class="tip-box"><p>评论功能已经关闭</p></li>
			<?
		}
		else if (post_password_required()) {
			?>
			<li class="tip-box"><p>请输入密码查看评论</p></li>
			<?
		}
		else if (!have_comments()) {
			?>
			<li class="tip-box"><p>还没有评论，你快点说两句吧！</p></li>
			<?
		}
		else {
			wp_list_comments();
		}
		?>
	</ol>
	<div class="clr"></div>
		<?
		if (comments_open()) {
			comment_form();
		}
		?>
	
</div>