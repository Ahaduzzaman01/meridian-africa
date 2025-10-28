<?php
/*
 * Theme Metabox
 * @package Kristo
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
    exit(); // exit if access directly
}

if ( class_exists('CSF') ){

    $prefix = 'kristo';

	/*-------------------------------------
		Category Taxonomy Options
	-------------------------------------*/
	
	
// Create taxonomy options
  CSF::createTaxonomyOptions( $prefix, array(
	'title'     => esc_html__('Catgeory Options','kristo'),
    'taxonomy'  => 'category',
    'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'fields' => array(

	array(
	
	  'id'          => 'cat-color',
	  'type'        => 'color',
	  'title'       => esc_html__('Select Category Color','kristo'),
	  'default' => '#0073FF',
	  	  
	),
	
	array(
	
	  'id'          => 'catbg-color',
	  'type'        => 'color',
	  'title'       => esc_html__('Select Category Background Color','kristo'),
	  'default' => '#0073ff1a',
	  	  
	),
	
	array(
	  'id'    => 'cat-bg',
	  'type'  => 'upload',
	  'title' => esc_html__('Upload','kristo'),
	),

    )
  ) );
	
	
	/*-------------------------------------
		Post Format Options
	-------------------------------------*/
	CSF::createMetabox('theme_postvideo_options',array(
		'title' => esc_html__('Video Post Format Options','kristo'),
		'post_type' => 'post',
		'post_formats' => 'video',
		'data_type'          => 'serialize',
		'context'            => 'advanced',
		'priority'           => 'default',
	));
	
	CSF::createSection('theme_postvideo_options',array(
		'fields' => array(
			array(
				'id' => 'textm',
				'type' => 'text',
				'title' => esc_html__('Upload Video For Post','kristo'),
				'desc' => esc_html__('Upload Video Post','kristo'),
			)
		)
	));

	
	/*-------------------------------------
       Page Options 
   -------------------------------------*/
   	  $post_metabox = 'kristo_post_meta';
	  
	  CSF::createMetabox( $post_metabox, array(
	    'title'     => esc_html__('Page Options','kristo'),
	    'post_type' => 'page',
	  ) );

	  //
	  // Create a section
	  CSF::createSection( $post_metabox, array(
	    'fields' => array(
	     
		array(
			'id' => 'page_title_enable',
			'title' => esc_html__('Show Page Title','kristo'),
			'type' => 'switcher',
			'default' => true,
			'desc' => esc_html__('Show Page Title Bar', 'kristo') ,
		),
		
		
		array(
			'id' => 'page-spacing-padding',
			'type' => 'spacing',
			'title' => esc_html__('Theme Page Spacing', 'kristo') ,
			'output' => 'body.page .main-container',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '80',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,
		
		
		
		
		

	    )
	  ) );	

	

	/*-------------------------------------
       Podcast Options
   	-------------------------------------*/
    $single_podcast_metabox = 'kristo_podcast_single_meta';

    CSF::createMetabox('kristo_podcast_single_meta', [
        'title'     => esc_html__('Podcast Item Options', 'kristo'),
        'post_type' => 'podcast',
        'data_type' => 'serialize',
        'context'   => 'advanced',
        'priority'  => 'default',
    ]);

    //
    // Create a section
    CSF::createSection('kristo_podcast_single_meta', [
        'fields' => [
            [
                'id'      => 'podcast-audio',
                'type'    => 'media',
                'title'   => 'Upload Audio File',
                'library'   => 'audio',
            ],
        ],
    ]);
	  
	  


}//endif