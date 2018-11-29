
<!--产品详情-->
<div id="product-body">

	<div id="product">
        <div id="product_img">
            <img src="<? echo catch_the_image(); ?>" alt="<? the_title(); ?>" />
            <!-- <div id="small-img">
            				<img src="<? //echo catch_the_image(); ?>" />
            				<img src="<? //echo catch_the_image(); ?>" />
            </div> -->
        </div>
        
        <div id="product_intro">
            <?
            $pid = $post->ID;
            ?>
        	<div id="title"><? the_title(); ?></div>
            <table>
				<tr>
					<td>适应人群：</td>
					<td><? echo get_post_meta($pid,'crowd',true); ?></td>
				</tr>
				<tr>
					<td>商品评分：</td>
					<td style="color: #fecb0e;">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </td>
				</tr>
                <tr>
					<td>产品规格：</td>
					<td><? echo get_post_meta($pid,'specification',true); ?></td>
				</tr>
                <tr>
					<td>生产厂家：</td>
					<td><? echo get_post_meta($pid,'company',true); ?></td>
				</tr>
                <tr>
					<td>用法须知：</td>
					<td><? echo get_post_meta($pid,'usage',true); ?></td>
				</tr>
                <tr>
					<td>官方正价：</td>
					<td class="money">￥<span><? echo get_post_meta($pid,'money',true); ?></span></td>
				</tr>
            </table>
            <div>
                <a href="#">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">保税区下单</button>
                </a>
            </div>
        </div>
    </div>

	<!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">保税区提交订单</h4>
                </div>
                <div class="modal-body">
                    <? the_excerpt(); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>


    <div id="product_jianjie">

		<div id="box_left">

            <div class="sbox">
                <div>相关分类</div>
                <ul>
                <?php
                    wp_list_categories("child_of=".get_category_root_id(the_category_ID(false)). "&depth=0&hide_empty=0&title_li=");
                ?>
                </ul>
            </div>

            <div class="sbox">
                <div>你可能需要的产品</div>

                <?
                
                //$str = $_SERVER['HTTP_REFERER'];
                //$name = $str ? substr($str,strripos($str,"/")+1) : "product";                
                //$catid = get_category_by_slug($name)->term_id;
                //
                $cat = get_the_category();
                $cat = $cat[1]->term_id;

                $args = array(
                    'numberposts' => 10,
                    'category' => $cat,
                    'orderby' => 'rand'
                );
                $postid = $post->ID;
                $rand_posts = get_posts($args);

                foreach ($rand_posts as $post) {
                    setup_postdata($post);
                    if ($postid != $post->ID) {
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
                }
                wp_reset_postdata();
                ?>

                

            </div>
		</div>

		<div id="box_right">
			<ul id="myTab" class="nav nav-tabs">
		        <li class="active">
		            <a href="#home" data-toggle="tab">
		                <span>产品详情</span>
		                <span class="glyphicon glyphicon-sort-by-attributes-alt"></span>
		            </a>
		        </li>
		        <li>
		            <a href="#ios" data-toggle="tab">
		                <span>客户评论</span>
		                <span class="glyphicon glyphicon-list-alt"></span>
		            </a>
		        </li>
                
		        <li>
		            <a href="#java"  data-toggle="tab">
		                <span>相关资讯</span>
		                <span class="glyphicon glyphicon-edit"></span>
		            </a>
		        </li>
		    </ul>
		    <div id="myTabContent" class="tab-content">
		        <div class="tab-pane fade in active" id="home">
		            <table style="" cellpadding="0" cellspacing="0" border="1px">
                        <tr>
                            <td>产品全名</td>
                            <td><? echo get_post_meta($pid,'title',true); ?></td>
                        </tr>
                        <tr>
                            <td>主要原料</td>
                            <td><? echo get_post_meta($pid,'material',true); ?></td>
                        </tr>
                        <tr>
                            <td>主要作用</td>
                            <td><? echo get_post_meta($pid,'effect',true); ?></td>
                        </tr>
                        <tr>
                            <td>产品规格</td>
                            <td><? echo get_post_meta($pid,'specification',true); ?></td>
                        </tr>
                        <tr>
                            <td>用法用量</td>
                            <td><? echo get_post_meta($pid,'usage',true); ?></td>
                        </tr>
                        <tr>
                            <td>生产企业</td>
                            <td><? echo get_post_meta($pid,'company',true); ?></td>
                        </tr>
                    </table>

                    <div>
                        <? the_content(); ?>
                    </div>
		        </div>
		        <div class="tab-pane fade" id="ios">
		            <div>
		                <!--评论-->
		                <? comments_template(); ?>
		            </div>
		        </div>

		        <div class="tab-pane fade" id="java">
                    <div>
                        <?
                            $slug = the_slug()."class";//该文章的别名
                            //echo $slug."<br/>";
                            $mycatid = get_category_by_slug($slug)->term_id;
                            $cat_link = get_category_link($mycatid);
                            if ($mycatid) {
                                $args = array(
                                    'category'    => $mycatid,  //思路：相关文章以产品的别名进行分类
                                    'numberposts' => 10,
                                    'orderby'     => 'post_date',
                                    'order'       => 'desc'    
                                );
                                $my_posts = get_posts($args);
                                if ($my_posts) {
                                    foreach ($my_posts as $post) {
                                        setup_postdata($post);
                                        ?>
                                        <ul class="xiangguan">
                                            <li class="xiangguan_title"><a href="<? the_permalink(); ?>"><? the_title(); ?></a></li>
                                            <li class="xiangguan_instru"><? the_content(); ?></li>
                                        </ul>
                                        <?
                                    }
                                    
                                    wp_reset_postdata();

                                    ?>
                                    <div id="catmore"><a href="<? echo $cat_link; ?>">更多>></a></div>
                                    <?
                                }
                                else{
                                    echo "该产品相关资讯暂未发布！！！";
                                }
                                
                            }
                            else{
                                echo "该产品知识的分类目录暂未建立！！";
                            }
                            
                        ?>

                    </div>
		        </div>
		    </div>
		</div>
		
    </div>
</div>
<?
    if(get_post_meta($post->ID,'kefuscript',true)){
        echo get_post_meta($post->ID,'kefuscript',true);
    }
?>