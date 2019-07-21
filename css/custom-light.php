<?php function custom_light() {
	$elitepress_lite_options=theme_data_setup();
	$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
	$link_color = $current_options['link_color'];
	list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
	$r = $r - 40;
	$g = $g - 35;
	$b = $b - 40;
	?>
<style type="text/css">

/* Menu Colors */

.navbar .navbar-nav > .open > a, .navbar .navbar-nav > .open > a:hover, .navbar .navbar-nav > .open > a:focus, 
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, 
.navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus { color: <?php echo $link_color;?> !important; }

.navbar .navbar-nav > .open > a, .navbar .navbar-nav > .open > a:hover, .navbar .navbar-nav > .open > a:focus,
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > .active > a { border-top: 2px solid <?php echo $link_color;?>; }

.nav .open > a, .nav .open > a:hover, .nav .open > a:focus { border-top: 1px solid <?php echo $link_color;?>; }

/* Background Colors */

.header-info, .flex-btn:after, .btn1, .section-title, .page-title-section, .service-area:hover .service-box, .project-btn:after, .view_all_project_button:hover, .pager a.selected, .client-pager a.selected, .project-btn:after, .detail-btn:after, .entry-date, .sidebar-widget-tags a:hover, .shortcode-btn-solid, .hc_scrollup, .tagcloud a:hover, .post-password-form input[type="submit"]:hover, .error_404 > p > a, #blogdetail-btn,  .blogdetail-btn a, .blogdetail-btn button, .blog-seprator, .more-link:hover, .more-link:active, .widget table caption, ins, mark, 
.team-area .team-social li:hover, .team-area .team-social li:focus, .paginations .page-numbers.current, .paginations a:hover, .paginations a:focus, 
.reply a:hover, .flexslider .flex-next:hover, .flexslider .flex-prev:hover, .contact-btn { background-color: <?php echo $link_color;?>; }

/* Font Color */

a, .site-logo h1, .site-logo h1 > a, .widget ul > li > a:hover, .widget ul > li > a:focus, .service-btn a:hover, .service-area h4 > a:hover, .features-area:hover h4 > a, .entry-header .entry-title > a:hover, .entry-meta a, .entry-meta a:hover, .entry-meta a:focus, .team-area h5, .port-more-link:hover, .static-client-area h3 > span, .post-content li > i, .post-content li:hover a, .contact-detail address > span > a:hover, .error_404 h4, .page-title a, .portfolio-tabs li.active > a, .portfolio-tabs li > a:hover, 
.widget table #next a:hover, .widget table #prev a:hover, .widget table tbody a:hover, .widget table tbody a:focus,
.site-logo h1, .site-logo h1 > a, .site-footer .widget ul > li > a:hover, .archive-title, tbody a, p a, dl dd a, .contact-icon i, .author-name .designation, .site-footer .widget-title:after, .static-client-area  .designation:before, .portfolio-detail-info p small, .portfolio-detail-info p small a, .blog-tags a, .blog-blockquote blockquote > small, p.wp-caption-text a, .comment-date, .comment-date a, .blog-description p a { 
color:<?php echo $link_color;?>; }

/* Border Color */

.site-footer { border-top: 7px solid <?php echo $link_color;?>; }
.section-title:before { border-left-color: <?php echo $link_color;?>; }
.portfolio-info:hover { border-bottom: 3px solid <?php echo $link_color;?>; }
.project-btn, .pager a, .pager a.selected, .client-pager a, .client-pager a.selected, .view_all_project_button { border: 2px solid <?php echo $link_color;?>; }
.service-area:hover .service-box, .detail-btn:active:after, .more-link:hover, .more-link:active, .reply a:hover { 
	border: 1px solid <?php echo $link_color;?>; 
}
blockquote { border-left: 5px solid <?php echo $link_color;?>; }
.header-section { border-bottom: 7px solid <?php echo $link_color;?>; }
.team-area .team-social li:hover, 
.team-area .team-social li:focus {
	-moz-box-shadow: inset 0 0 3px <?php echo $link_color;?>;
	-webkit-box-shadow: inset 0 0 3px <?php echo $link_color;?>;
}
.paginations .page-numbers.current, .paginations a:hover, .paginations a:focus, .contact-btn { box-shadow: 0 3px 0 rgb(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b;?>); }

/*Fleaxslider Css*/
.flex-control-paging li a { border: 2px solid <?php echo $link_color;?>; }
.flex-control-paging li a:hover { background: <?php echo $link_color;?>; border: 2px solid <?php echo $link_color;?>; }
.flex-control-paging li a.flex-active { background: <?php echo $link_color;?>; border: 2px solid <?php echo $link_color;?>; }

</style>
<?php } ?>