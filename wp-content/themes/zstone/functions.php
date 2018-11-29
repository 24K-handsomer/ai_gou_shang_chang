<?php

// 添加特色图像功能
add_theme_support('post-thumbnails');
set_post_thumbnail_size(130, 100, true); // 图片宽度与高度，图片的长宽可以自行修改。

//注册一个小工具
register_sidebar(
    array(
        'name' => '侧边栏',
        'before_widget' => '<div class="sbox" >',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    )
);


//获取文章第一张图片，如果没有图就会显示默认的图（产品图）
 function catch_the_image() { 
    global $post, $posts; 
    $first_img = ''; 
    ob_start(); 
    ob_end_clean(); 
    $product_img = get_post_meta($post->ID,'product_img',true); 
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $product_img, $matches);
    $first_img = $matches [1] [0]; 
    if(empty($first_img)){  
        $first_img = bloginfo('template_url'). '/images/default-thumb.jpg'; 
    }
    return $first_img; 
 }


 //获取文章第二张图片，如果没有图就会显示默认的图
 function catch_the_second_image() { 
    global $post, $posts; 
    $first_img = ''; 
    ob_start(); 
    ob_end_clean(); 
    $product_img = get_post_meta($post->ID,'product_detail_img',true); 
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $product_img, $matches);
    $first_img = $matches [1] [0]; 
    if(empty($first_img)){  
        $first_img = bloginfo('template_url'). '/images/default-thumb.jpg'; 
    } 
    return $first_img; 
 }


function wz()
{
    if ( !is_home() ) {  ?>

    <div class="wz">
        <a href="<? bloginfo('url'); ?>">首页</a>
        <?
        if ( is_category() ) {
            //single_cat_title();
            global $wp_query;  
            $cat_ID = get_query_var('cat'); 
            $cat_attr = get_category_root($cat_ID);
            
            $str = '';
            foreach ($cat_attr as $catvalue) {
                
                $str .= "&nbsp;>&nbsp;<a href='".get_category_link($catvalue['cat_id'])."' >".$catvalue['cat_name']."</a>";
            }
            echo $str;
        }

        elseif ( is_tag() ) {
            echo "&nbsp;>&nbsp;";          
            single_tag_title();
        }

        elseif ( is_search() ) { echo $s; }
        elseif ( is_single() ) {

            //$str = $_SERVER['HTTP_REFERER'];
            //$name = $str ? substr($str,strripos($str,"/")+1) : "product";

            //$cat = get_category_by_slug($name);
            //$cat_link = get_category_link($cat->term_id);
            $str = '';
            $cat = get_the_category();
            foreach ($cat as $catvalue) {
                
                $str .= "&nbsp;>&nbsp;<a href='".get_category_link($catvalue->term_id)."' >".$catvalue->name."</a>";
            }
            echo $str."&nbsp;>&nbsp;";
            the_title();
        }
        elseif ( is_page() ) { 
            echo "&nbsp;>&nbsp;";
            the_title(); 
        }
        elseif ( is_404() ) { echo "404错误页面";}
        ?>  
    </div>
    
<? } 
}



//导航分页
function par_pagenavi($range = 9){
    global $paged, $wp_query;
    if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
    if($max_page > 1){if(!$paged){$paged = 1;}
    if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 首页 </a>";}
    previous_posts_link(' 上一页 ');
    if($max_page > $range){
        if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
        if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
        for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
        if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
        for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    next_posts_link(' 下一页 ');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 末页 </a>";}}
}


/*当前文章别名*/
function the_slug() {
  $post_data = get_post($post->ID, ARRAY_A);
  $slug = $post_data['post_name'];
  return $slug;
}


/*通过别名，获取id*/
function getinfo($slug, $type="page"){ //slug

  global   $wpdb;
  if ($type == "page") { //传过来的是页面的别名

      return $wpdb->get_var("SELECT * FROM $wpdb->posts WHERE post_name = '".$slug."'");
  }
  else{ //传过来的是分类的别名

    return $wpdb->get_var("SELECT * FROM $wpdb->terms WHERE slug = '".$slug."'");
  }
}

/*取根分类id*/
function get_category_root_id($cat)
{
  $this_category = get_category($cat);   // 取得当前分类 
  while($this_category->category_parent) // 若当前分类有上级分类时，循环
  {
    $this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
  }
  return $this_category->term_id; // 返回根分类的id号
}


/*获取该分类之上的所有父分类*/
function get_category_root($cat)
{
  $this_category = get_category($cat);   // 取得当前分类
  $arr['cat_id'] = $this_category->term_id;
  $arr['cat_name'] = $this_category->name;
  $arr['cat_slug'] = $this_category->slug;
  $attr[] = $arr; 
  while($this_category->category_parent) // 若当前分类有上级分类时，循环
  {
    $this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
    $arr['cat_id'] = $this_category->term_id;
    $arr['cat_name'] = $this_category->name;
    $arr['cat_slug'] = $this_category->slug;
    $attr[] = $arr;
  }
  //return $this_category->term_id; // 返回根分类的id号
  $attr = array_reverse($attr);
  return $attr;
}


?>