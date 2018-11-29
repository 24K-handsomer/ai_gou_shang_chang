<? get_header(); ?>	
<?php

the_post();

$cat = get_the_category($post->ID); //通过文章id获取当前文章分类信息
//$cat = get_the_category(get_the_ID());

//$name = $cat[0]->slug;  //当前文章父级分类别名

$cat_attr = get_category_root($cat[0]->term_id);
$cat_slug = $cat_attr[0]['cat_slug'];

//加载 content-$name.php 模板文章页，如果文件不存在，则调用content.php文件
get_template_part('content',$cat_slug);

?>

<? get_footer(); ?>
