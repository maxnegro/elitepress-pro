<?php class Webriti_pagination
{
function Webriti_page($curpage, $post_type_data)
{	?>
	<nav class="navigation pagination">
		<?php if($curpage != 1  ) {
				echo '<a href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'"><i class="fa fa-angle-double-left"></i></a>'; } ?>
		<?php for($i=1;$i<=$post_type_data->max_num_pages;$i++)
			{
			echo '<a class="page-numbers '.($i == $curpage ? 'current ' : '').'" href="'.get_pagenum_link($i).'">'.$i.'</a>';
			}				
		if($i-1!= $curpage)	 {
		echo '<a class="page-numbers" href="'.get_pagenum_link(($curpage+1 <= $post_type_data->max_num_pages ? $curpage+1 : $post_type_data->max_num_pages)).'"><i class="fa fa-angle-double-right"></i></a>';
		 } ?>
	</nav>
<?php } 
}
?>