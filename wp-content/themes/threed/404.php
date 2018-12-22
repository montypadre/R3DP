<?php
	get_header(); 
?>
<div class="errorPage-wrapper">
	<div class="error-content">		
		<?php 
				$page_404_text=threed_get_option('404-page-text');
				if(empty($page_404_text))
				{
					$page_404_text='';
				}	
		?>
		<h4><?php printf('%s',$page_404_text); ?></h4>
		<a href="<?php echo site_url('/'); ?>" class="button-medium button-medium--red"><?php esc_html_e('Back to HOME','threed'); ?></a>
	</div>
</div>
<?php get_footer(); ?>
