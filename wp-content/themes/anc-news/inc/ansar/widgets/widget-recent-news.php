<?php
add_action( 'widgets_init','ancnews_recent_blog'); 
   function ancnews_recent_blog() { return   register_widget( 'ancnews_sidebar_recent_blog' ); }

/**
 * Adds widget for recent work in footer.
 */
class ancnews_sidebar_recent_blog extends WP_Widget {


	function __construct() {
		parent::__construct(
			'ancnews_sidebar_recent_blog', // Base ID
			__('ANC-NEWS - Recent News Widget'  , 'anc-news'), // Name
			array( 'description' => __( 'Recent News Post', 'anc-news' ), ) // Args
		);
	}
	/* Function for widget */
	public function widget( $args, $instance ) {
		$recent_title = apply_filters( 'widget_title', $instance['recent_title'] );
		$number_of_posts = apply_filters( 'widget_title', $instance['number_of_posts'] );
		if($number_of_posts=='') { $number_of_posts = 4; }
		
		echo $args['before_widget'];
		if ( ! empty( $recent_title ) )
		echo $args['before_title'] . $recent_title . $args['after_title']; ?>		
		<div class="bs-widget-blog-post">
		<?php $loop = new WP_Query(array( 'post_type' => 'post', 'showposts' => $number_of_posts ));
			if( $loop->have_posts() ) : 
			while ( $loop->have_posts() ) : $loop->the_post();?>				
					<div class="media bs-blog-post">
                        <?php $post_thumbnail =array('class' => "img-fluid"); ?>
						<?php if(has_post_thumbnail()):?>
                        <div class="bs-post-area">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            	<?php the_post_thumbnail('', $post_thumbnail); ?>
                            </a>
                        </div>
                        <?php endif;?>
                        <div class="media-body">
                        	<h3><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h3>
                                <span><?php echo get_the_date( 'F j, Y' ); ?></span>
                        </div>
                    </div>

			<?php endwhile; ?>		
			<?php endif; ?>
			<?php wp_reset_postdata() ?>
			</div>	
		<?php		
		echo $args['after_widget']; // closed Function		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'recent_title' ] )  && isset( $instance[ 'number_of_posts' ] )) {
			$recent_title = $instance[ 'recent_title' ];
			$number_of_posts = $instance[ 'number_of_posts' ];
		}
		else {
			$recent_title = __( 'Latest News', 'anc-news' );
			$number_of_posts = 4;
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'recent_title' ); ?>"><?php _e( 'Title:','anc-news' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'recent_title' ); ?>" name="<?php echo $this->get_field_name( 'recent_title' ); ?>" type="text" value="<?php echo esc_attr( $recent_title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php _e( 'Number of pages to show:','anc-news' ); ?></label> 
		<input size="3" maxlength="2"id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>" type="text" value="<?php echo esc_attr( $number_of_posts ); ?>" />
		</p>		
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['recent_title'] = ( ! empty( $new_instance['recent_title'] ) ) ? strip_tags( $new_instance['recent_title'] ) : '';
		$instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ) ? strip_tags( $new_instance['number_of_posts'] ) : '';
		return $instance;
	}

}
?>