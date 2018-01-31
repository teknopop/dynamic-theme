<?php
	header("Content-type: text/css;");
	
	if( file_exists('../../../../wp-load.php') ) :
		include '../../../../wp-load.php';
	else:
		include '../../../../../wp-load.php';
	endif;
?>

<?php
	// Styles	
	$primary 	= ft_of_get_option('fabthemes_primary_color','#769A38');
	$secondary	= ft_of_get_option('fabthemes_secondary_color','');
	$link 		= ft_of_get_option('fabthemes_link_color','');
	$hover 		= ft_of_get_option('fabthemes_hover_color','');

?>

#masthead, 
#fservices .service-box a.read-more,
#comments #respond p.form-submit input,
.news-box a.read-more,
.entry-footer a.read-more{
	background: <?php echo $primary ?>!important;
}

#comments #respond p.form-submit input{
	border-color:<?php echo $primary ?>!important;
}

.home-section .section-title,
#combo-section h2.section-title{
	color:<?php echo $primary ?>!important;
}
.main-navigation ul ul,
#footer-widgets
{
	background: <?php echo $secondary ?>!important;
}

/* Links */

a, .entry-meta span a{
	color: <?php echo $link ?>;
}

a:visited {
	color: <?php echo $link ?>;
}

a:hover,
a:focus,
a:active {
	color:<?php echo $hover ?>;
	text-decoration: none;
}


