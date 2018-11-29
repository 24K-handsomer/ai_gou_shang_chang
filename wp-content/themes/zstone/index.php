<?php get_header(); ?>
	<!--轮播-->
	<div id="myCarousel" class="carousel slide">
		<!-- 轮播（Carousel）指标 -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
		</ol>
		<!-- 轮播（Carousel）项目 -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="<?php bloginfo('template_url'); ?>/images/banner02.jpg" alt="五周年庆典，放假至冰点">
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_url'); ?>/images/banner02.jpg" alt="五周年庆典，放假至冰点">
			</div>
		</div>
		<!-- 轮播（Carousel）导航 -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>
	<!--区域一-->
	<div id="area">
		<ul>
			<li class="mouse">
				<div class="bt">
					<div>当季主推</div>
					<span>SEASON THEME</span>
				</div>
				<div class="txt none">
					<p>彻底解决肌肤问题<br/></p>
					<p>皮肤问题多发季，增强机体免疫力<br/></p>
					<a>马上拥有</a>
				</div>
				<div class="img">
					<a href="#">
						<img src="<?php bloginfo('template_url'); ?>/images/dangjizhutui.png" alt="当季主推" />
					</a>
				</div>
			</li>
			<li class="mouse">
				<div class="bt">
					<div>明星畅销榜</div>
					<span>STAR BESTSELLER LIST</span>
				</div>
				<div class="txt none">
					<p>保税区热销排行<br/></p>
					<p>中国区保税区店十大热销单品<br/></p>
					<a>查看详情</a>
				</div>
				<div class="img">
					<a href="#">
						<img src="<?php bloginfo('template_url'); ?>/images/mingxingchangxiao.jpg" alt="明星畅销榜" />
					</a>
				</div>
			</li>
			<li class="mouse">
				<div class="bt">
					<div>活动好礼</div>
					<span>GOOD MANNERS</span>
				</div>
				<div class="txt none">
					<p>狂欢618<br/></p>
					<p>精彩赢好礼<br/></p>
					<a>立即参加</a>
				</div>
				<div class="img">
					<a href="#">
						<img src="<?php bloginfo('template_url'); ?>/images/huodonghaoli.jpg" alt="狂欢618" />
					</a>
				</div>
			</li>
		</ul>
	</div>
	<!--畅销产品-->
	<div id="bestseller">
		<div id="bestseller-one">推荐产品区</div>
		<div id="bestseller-two">
			<div>
				<a href="<? bloginfo('url'); ?>/3020.html">
					<img src="<?php bloginfo('template_url'); ?>/images/xuanchuan80.jpg" alt="极致呵护，亲密无忧" />
				</a>
			</div>
			<!--产品展示-->
			<div id="bestseller-two-right">
				<ul>
					<?
					if (have_posts()) {
						$i = 0;
						$args = array(
 							
 							//'post_in' => array(16,23,30,33,26,130),
 							'category_name'  => 'product',
 							//'post_and' => array(16,23,26,30,33,36),
 							'showposts' => 6,
 							'orderby' => modified,
 							'order' => 'ASC'
 						);
						query_posts(array('post__in' => array(16,23,30,33,26,130)));
						while (have_posts()) {
							the_post();
							$i++;
							?>
							<li class="btnbg trans-rotate">
								<a href="<? the_permalink(); ?>">
									<img src="<? echo catch_the_image(); ?>" alt="<? the_title(); ?>">
								</a>
							</li>
							<?
							if ($i == 3) {
								echo "</ul><ul>";
							}
						}
						wp_reset_query();
					}
					else{
						echo "没有商品可以显示";
					}
					?>
				</ul>
			</div>
		</div>
		
		<div id="bestseller-three">
			<div>
				<a href="<?php bloginfo('template_url'); ?>/company" alt="公司简介">
				<img src="<?php bloginfo('template_url'); ?>/images/jianjie.jpg" alt="帮助与建议" />
				</a>
			</div>
			<div>
				<ul>
					<li>帮助与建议</li>
					<li>人对人的承诺，我想变向的是给于对方期望，当承诺没有对现的时候，就是人期望破灭的时候那是另人很失望很痛苦的事情．我们要加强我们的承诺，哪怕是很小的事情</li>
					<li><a href="<?php bloginfo('template_url'); ?>/advice">了解更多</a></li>
				</ul>
			</div>
			<div>
				<div>
					<img src="<?php bloginfo('template_url'); ?>/images/logaim.jpg" alt="美国爱购商城中国保税区店" />
				</div>
				<div>
					<div>经销商专区</div>
					<div>经销商咨询优惠一站式服务</div>
				</div>
			</div>
		</div>
	</div>



<script type="text/javascript">
    
$(document).ready(function(){
	$('#myCarousel').carousel({interval:2000});//每隔1秒自动轮播
	$(".mouse").mouseout(function(){
		$(this).children(".img").removeClass("none");
		$(this).children(".txt").addClass("none");
	});
	
	$(".mouse").mouseover(function(){
		$(this).children(".img").addClass("none");
		$(this).children(".txt").removeClass("none");
	});
});

var t_img; // 定时器
var isLoad = true; // 控制变量

// 判断图片加载状况，加载完成后回调
isImgLoad(function(){
    // 加载完成
    var he = $(".mouse").children(".img").height();
    $(".mouse").children(".txt").css("height",he);
});

// 判断图片加载的函数
function isImgLoad(callback){
    // 注意我的图片类名都是cover，因为我只需要处理cover。其它图片可以不管。
    // 查找所有封面图，迭代处理
    $(".img>a>img").each(function(){
        // 找到为0就将isLoad设为false，并退出each
        if(this.height === 0){
            isLoad = false;
            return false;
        }
    });
    // 为true，没有发现为0的,加载完毕
    if(isLoad){
        clearTimeout(t_img); // 清除定时器
        // 回调函数
        callback();
    // 为false，因为找到了没有加载完成的图，将调用定时器递归
    }else{
        isLoad = true;
        t_img = setTimeout(function(){
            isImgLoad(callback); // 递归扫描
        },500); // 我这里设置的是500毫秒就扫描一次，可以自己调整
    }
}


</script>

<!--底部公司介绍-->
<?php get_footer(); ?>