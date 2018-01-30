<?php get_header(); ?>

	<div class="row">
		<div class="col-sm-12">

			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
  	
					get_template_part( 'content', get_post_format() );
  
				endwhile; endif; 
			?>

			<?php 

				$args = array(
					'post_type' => 'your_post',
				);  
				$your_loop = new WP_Query( $args ); 

				if ( $your_loop->have_posts() ) : while ( $your_loop->have_posts() ) : $your_loop->the_post(); 
				$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

				<!-- contents of Your Post -->
				<h1>Title</h1>
				<?php the_title(); ?>

				<h1>Content</h1>
				<?php the_content(); ?>
				
			<?php endwhile; endif; wp_reset_postdata(); ?>



		</div> <!-- /.col -->
	</div> <!-- /.row -->

<?php get_footer(); ?>