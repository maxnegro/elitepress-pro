<?php if('page' == get_option('show_on_front')){ get_template_part('index');}
		else
		{
		$elitepress_lite_options=theme_data_setup();
		$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
		get_header();
		get_template_part('index','slider');
		$data =is_array($current_options['front_page_data']) ? $current_options['front_page_data'] : explode(",",$current_options['front_page_data']);
		if($data) 
		{
		foreach($data as $key=>$value)
			{		
				switch($value) 
				{
					case 'top-call-out-section':
					//****** get index top call out section  ********
					get_template_part('index', 'top-call-out-section');
					break;

					case 'service':
					//****** get index service  ********				
					get_template_part('index', 'service');
					break;

					case 'portfolio':
					//****** get index portfolio  ********
					get_template_part('index', 'portfolio');
					break;

					case 'testimonial':
					//****** get index testimonial  ********
					get_template_part('index', 'testimonial');
					break;

					case 'blog':
					//****** get index blog  ********
					get_template_part('index', 'blog');
					break;

					case 'client':
					//****** get index client  ********
					get_template_part('index', 'client');
					break;
					
					case 'contact':
					//****** get index contact  ********
					get_template_part('index', 'contact');
					break;
				}
			}
		} 	
	get_footer(); 
	}
?>