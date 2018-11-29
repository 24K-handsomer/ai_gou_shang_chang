<? get_header(); ?>	
<?php
$cat_ID = get_query_var('cat');
$cat_attr = get_category_root($cat_ID);
$cat_slug = $cat_attr[0]['cat_slug'];

//$category = get_the_category();//默认获取当前所属分类 
//$cat_slug = $category[0]->slug;

get_template_part('cat',$cat_slug);
//echo "<pre>";
//var_dump($category);
//echo "</pre>";

?>

<? get_footer(); ?>