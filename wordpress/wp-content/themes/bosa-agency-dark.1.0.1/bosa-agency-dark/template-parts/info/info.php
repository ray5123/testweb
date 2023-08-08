<?php
$info_one_title 	= get_theme_mod( 'info_one_title', '' );
$info_one_contentone   = get_theme_mod( 'info_one_content_one', '' );
$info_one_contenttwo   = get_theme_mod( 'info_one_content_two', '' );

$info_two_title 	= get_theme_mod( 'info_two_title', '' );
$info_two_contentone   = get_theme_mod( 'info_two_content_one', '' );
$info_two_contenttwo   = get_theme_mod( 'info_two_content_two', '' );


$info_three_title   = get_theme_mod( 'info_three_title', '' );
$info_three_contentone = get_theme_mod( 'info_three_content_one', '' );
$info_three_contenttwo = get_theme_mod( 'info_three_content_two', '' );


$info_array = array();
$has_info = false;
if( !empty( $info_one_title) || !empty($info_one_contentone ) || !empty($info_one_contenttwo) ){
	$has_info = true;
	$info_array['info_one'] = array(
		'title' => $info_one_title,
		'content_one' => $info_one_contentone,
		'content_two' => $info_one_contenttwo,
	);
}
if( !empty($info_two_title) || !empty($info_two_contentone ) || !empty($info_two_contenttwo) ){
	$has_info = true;
	$info_array['info_two'] = array(
		'title' => $info_two_title,
		'content_one' => $info_two_contentone,
		'content_two' => $info_two_contenttwo,

	);
}
if( !empty( $info_three_title) || !empty($info_three_contentone) || !empty($info_three_contenttwo) ){
	$has_info= true;
	$info_array['info_three'] = array(
		'title' => $info_three_title,
		'content_one' => $info_three_contentone,
		'content_two' => $info_three_contenttwo,

	);
}

if( !get_theme_mod( 'disable_info_section', true ) && $has_info ){ ?>
	<section class="section-info-area">
		<div class="content-wrap">
			<div class="row">
				<?php foreach( $info_array as $each_info ){ ?>
					<div class="col-sm-6 col-md-4">
						<article class="info-content-wrap text-center">
							<div class="info-icon">
								<i class="fas fa-check"></i>
							</div>							
							<div class="entry-content">
								<header class="entry-header">
									<h3 class="entry-title">
										<?php echo esc_html( $each_info['title'] ) ; ?>
									</h3>
								</header>
								<div class="entry-content">
									<p><?php echo esc_html( $each_info['content_one'] ) ; ?></p>
									<p><?php echo esc_html( $each_info['content_two'] ) ; ?></p>
								</div>
							</div>
						</article>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>  