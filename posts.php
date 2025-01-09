<?php
define('WP_USE_THEMES', false);
require($_SERVER['DOCUMENT_ROOT'] . "/blog/wp-load.php");
?>
<?php 
//The Loop - latest 3 posts from blogs category
$query1 = new WP_Query('showposts=3&cat=blogs&offset=0'); 
if ($query1->have_posts()) : 
while ($query1->have_posts()) : $query1->the_post(); 
?>

					<div class="col-xs-12 col-sm-4 mobi-mb-30">
						<div class="single-post">
							<div class="thumb angle-shape relative">
							
                                
                                
                                <img src="<?php the_post_thumbnail(array( 400, 350 )); ?>" alt="Thumbnail" />
							</div>
							<div class="content pl-30 pr-10 pb-30">
								<h6>"<?php echo get_the_date('F Y', get_the_ID() ); ?>"</h6>
								<a href="<?php the_permalink(); ?>"><h3 class="text-capitalize mb-10">"<?php the_title(); ?>"</h3></a>
								<p><?php the_excerpt(); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn sm-btn mt-25">Read More</a>
							</div>
						</div>
					</div>

<?php 
//loop ends
endwhile; endif; wp_reset_postdata(); 
?>  