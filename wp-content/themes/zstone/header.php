<!DOCTYPE html>
<html>
<head>
	<meta charset="<? echo get_bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<title><?
		if ( is_home() ) {
	        	bloginfo('name');
	    } elseif ( is_category() ) {
	        single_cat_title();
	    }
	    elseif ( is_tag() ) {
	        single_tag_title();
	    }  
	    elseif (is_single() || is_page() ) {
	        //single_post_title();
	        echo wp_title('',false);
	    } elseif (is_search() ) {
	        echo "搜索结果";
	    } elseif (is_404() ) {
	        echo '页面未找到!';
	    } else {
	        wp_title('',true);
	    }
	    ?></title>
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
	<?
		//判断模板
		if ( is_category() || is_tag()) {
			?>
			<link rel="stylesheet" type="text/css" href="<? bloginfo('template_directory'); ?>/style-cat.css" media="all" />
			<?
		}
		if ( is_single() ) {
			?>
			<link rel="stylesheet" type="text/css" href="<? bloginfo('template_directory'); ?>/style-single-zhishi.css" media="all" />
			<link rel="stylesheet" type="text/css" href="<? bloginfo('template_directory'); ?>/style-single-ceshi.css" media="all" />
			<?
		}
		if ( is_page() ) {
			?>
			<link rel="stylesheet" type="text/css" href="<? bloginfo('template_directory'); ?>/style-page.css" media="all" />
			<?
		}
	?>
	
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<?php wp_head(); ?>
</head>
<body>
	<!--logo、导航-->
	<div>
		<div id="logo-top">
			<div id="logo">
			<a href="<?php echo get_option('home'); ?>">
				<img src="<?php bloginfo('template_url'); ?>/images/logo-2.jpg" alt="美国爱购商城中国保税区店" />
			</a>
			</div>
			<div id="logo-right">
				<div id="search">
					<div class="input-group">
						<form action="" method="post">
	                    <input type="text">
	                    <span>
	                        <button class="btn btn-default" type="button">Go!</button>
	                    </span>
	                    </form>
	                </div>
	                <div id="login">
	                	<span><a>登录</a></span>
	                	<span>|</span>
	                	<span><a>注册</a></span>
	                	<span>&nbsp;&nbsp;</span>
	                	<span><a>正品查询</a></span>
	                </div>
				</div>
				<div id="shopcar">
					<div><img src="<?php bloginfo('template_url'); ?>/images/shoppingcar.jpg" /></div>
					<div>购物车<span id="shu">0</span>件</div>
				</div>
			</div>
		</div>
		
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid"> 
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target="#example-navbar-collapse">
						<span class="sr-only">切换导航</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="http://www.igouhappy.com">首页</a>
				</div>
				<div class="collapse navbar-collapse" id="example-navbar-collapse">
					<ul class="nav navbar-nav">
						<!--菜单的调用-->
						<? //wp_nav_menu(); ?>

						<li><a href="http://www.igouhappy.com/category/beautiful">美丽保养专区</a></li>
						<li><a href="http://www.igouhappy.com/category/healthy">大健康专区</a></li>
						<li><a href="http://www.igouhappy.com/category/motherandbaby">母婴专区</a></li>
						<li><a href="http://www.igouhappy.com/category/activity">活动专区</a></li>
						<li><a href="http://www.igouhappy.com/category/zhishi">健康知识</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<!--面包屑导航-->
	<div class="c">
		<? 
		wz();
		//if(function_exists('the_breadcrumb')) the_breadcrumb();
		//cmp_breadcrumbs();
		?>
	</div>