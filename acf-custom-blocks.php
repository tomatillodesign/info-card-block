<?php
/*
Plugin Name: Tomatillo Design ~ Custom Info Card
Description: Create custom blocks and run all of your code here. Requires Advanced Custom Fields PRO.
Author: Chris Liu-Beers, Tomatillo Design
Author URI: http://www.tomatillodesign.com
Version: 2.0
License: GPL v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/



// Examples below!
// See documentation:
// https://www.advancedcustomfields.com/resources/blocks/
// https://www.advancedcustomfields.com/resources/acf_register_block_type/
//
// IMPORTANT: Remember to create your own custom fields in ACF and set them to the correct Block
// See the attached ACF .json for getting started (import this into ACF using the ACF-->Tools)
//


add_action( 'init', 'clb_custom_acf_blocks_register_acf_blocks_d3fdcc70' );
function clb_custom_acf_blocks_register_acf_blocks_d3fdcc70() {
    register_block_type( plugin_dir_path( __FILE__ ) . 'blocks/clb-custom-info-card' );
}


// add_filter('acf/pre_save_block', 'clb_add_permanent_id_markup_to_blocks');
// function clb_add_permanent_id_markup_to_blocks( $attributes ) {

// 	error_log('attributes');
// 	error_log( print_r( $attributes, true ) );

//     if( !isset($attributes['data']['clb-custom-id']) ) {
//         $attributes['data']['clb-custom-id'] = 'CLB-TEST-block-' . uniqid();
//     }
//     return $attributes;
// }


// add_filter(
//     'acf/pre_save_block',
//     function( $attributes ) {

//         //error_log('attributes');
//         error_log( print_r( $attributes, true ) );

//         // if ( empty( $attributes['clb_custom_id'] ) ) {
//         //     $attributes['clb_custom_id'] = 'clb_custom_id-' . uniqid();
//         // }

//         $clb_custom_id = $attributes['clb_custom_id'];
//         error_log( print_r("clb_custom_id: " . $clb_custom_id) );

//         if( !$attributes['clb_custom_id'] ) { $attributes['clb_custom_id'] = uniqid(); }

//         // if ( empty( $attributes['data']['clb_custom_id'] ) ) {
//         //     $attributes['data']['clb_custom_id'] = 'clb_custom_id-' . uniqid();
//         // }

//         return $attributes;
//     }
// );


if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_637d2374119f6',
        'title' => 'Block - Custom Info Cards',
        'fields' => array(
            array(
                'key' => 'field_637e2c4654db2',
                'label' => 'Card Settings',
                'name' => '',
                'aria-label' => '',
                'type' => 'accordion',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'open' => 0,
                'multi_expand' => 0,
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_637e268186b76',
                'label' => 'Card Settings',
                'name' => 'td_info_cards_settings_group',
                'aria-label' => '',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_637e26ceca8b3',
                        'label' => 'Number of Columns',
                        'name' => 'td_info_cards_number_of_columns',
                        'aria-label' => '',
                        'type' => 'button_group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            1 => '1',
                            2 => '2',
                            3 => '3',
                            4 => '4',
                            5 => '5',
                            6 => '6',
                        ),
                        'default_value' => 3,
                        'return_format' => 'value',
                        'allow_null' => 0,
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_637e271af8dd7',
                        'label' => 'Card Type',
                        'name' => 'td_info_cards_type',
                        'aria-label' => '',
                        'type' => 'button_group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'icon' => 'Icon',
                            'photo' => 'Photo',
                        ),
                        'default_value' => '',
                        'return_format' => 'value',
                        'allow_null' => 0,
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_637e27e9859e7',
                        'label' => 'Sub-header?',
                        'name' => 'td_info_cards_include_sub_header',
                        'aria-label' => '',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '33',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 0,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                        'ui' => 1,
                    ),
                    array(
                        'key' => 'field_637e27b5859e6',
                        'label' => 'Description?',
                        'name' => 'td_info_cards_include_description',
                        'aria-label' => '',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '33',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 0,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                        'ui' => 1,
                    ),
                    array(
                        'key' => 'field_637e286a102e8',
                        'label' => 'Button?',
                        'name' => 'td_info_cards_include_button',
                        'aria-label' => '',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '33',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 0,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                        'ui' => 1,
                    ),
                    array(
                        'key' => 'field_637e299dcdb71',
                        'label' => 'Aspect Ratio (width : height)',
                        'name' => 'td_info_cards_aspect_ratio',
                        'aria-label' => '',
                        'type' => 'button_group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e271af8dd7',
                                    'operator' => '==',
                                    'value' => 'photo',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            11 => '1:1',
                            32 => '3:2',
                            43 => '4:3',
                            169 => '16:9',
                            23 => '2:3',
                            34 => '3:4',
                        ),
                        'default_value' => '',
                        'return_format' => 'value',
                        'allow_null' => 0,
                        'layout' => 'horizontal',
                    ),
                    array(
                        'key' => 'field_637e2b38adbd5',
                        'label' => 'Card Background',
                        'name' => 'td_info_cards_card_background',
                        'aria-label' => '',
                        'type' => 'color_picker',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'enable_opacity' => 1,
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_637e2ba94ea19',
                        'label' => 'Button Background',
                        'name' => 'td_info_cards_button_background',
                        'aria-label' => '',
                        'type' => 'color_picker',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e286a102e8',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'enable_opacity' => 1,
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_6387923afc509',
                        'label' => 'Icon Size',
                        'name' => 'td_info_cards_icon_size',
                        'aria-label' => '',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e271af8dd7',
                                    'operator' => '==',
                                    'value' => 'icon',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'fa-10x' => '10x',
                            'fa-9x' => '9x',
                            'fa-8x' => '8x',
                            'fa-7x' => '7x',
                            'fa-6x' => '6x',
                            'fa-5x' => '5x',
                            'fa-4x' => '4x',
                            'fa-3x' => '3x',
                            'fa-2x' => '2x',
                            'fa-1x' => 'Default font size',
                            'fa-sm' => 'Small',
                            'fa-xs' => 'Extra-small',
                            'fa-2xs' => 'Extra-extra-small',
                        ),
                        'default_value' => 'fa-4x',
                        'return_format' => 'value',
                        'multiple' => 0,
                        'allow_null' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_637e2c6254db3',
                'label' => 'Settings END',
                'name' => '',
                'aria-label' => '',
                'type' => 'accordion',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'open' => 0,
                'multi_expand' => 0,
                'endpoint' => 1,
            ),
            array(
                'key' => 'field_637e2751859e3',
                'label' => 'Info Cards',
                'name' => 'td_info_cards_repeater',
                'aria-label' => '',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'block',
                'pagination' => 0,
                'min' => 0,
                'max' => 0,
                'collapsed' => 'field_637e2772859e4',
                'button_label' => 'Add Info Card',
                'rows_per_page' => 20,
                'sub_fields' => array(
                    array(
                        'key' => 'field_637e3ff9bb890',
                        'label' => 'Action',
                        'name' => 'card_action',
                        'aria-label' => '',
                        'type' => 'button_group',
                        'instructions' => 'Modal will display the "Description" field in the pop-up.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'default' => 'Default',
                            'modal' => 'Modal (Pop-up)',
                        ),
                        'default_value' => 'default',
                        'return_format' => 'value',
                        'allow_null' => 0,
                        'layout' => '',
                        'parent_repeater' => 'field_637e2751859e3',
                    ),
                    array(
                        'key' => 'field_637e3bf845cbd',
                        'label' => 'Photo',
                        'name' => 'card_photo',
                        'aria-label' => '',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e271af8dd7',
                                    'operator' => '==',
                                    'value' => 'Photo',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => '',
                        'library' => '',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                        'preview_size' => 'medium',
                        'parent_repeater' => 'field_637e2751859e3',
                    ),
                    array(
                        'key' => 'field_637e3c2345cbe',
                        'label' => 'Icon Style',
                        'name' => 'card_icon_style',
                        'aria-label' => '',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e271af8dd7',
                                    'operator' => '==',
                                    'value' => 'Icon',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'thin' => 'Thin',
                            'light' => 'Light',
                            'regular' => 'Regular',
                            'solid' => 'Solid',
                            'duotone' => 'Duotone',
                            'brands' => 'Brands',
                        ),
                        'default_value' => 'regular',
                        'return_format' => 'value',
                        'multiple' => 0,
                        'allow_null' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                        'parent_repeater' => 'field_637e2751859e3',
                    ),
                    array(
                        'key' => 'field_637e3ccc45cbf',
                        'label' => 'Icon Type',
                        'name' => 'card_icon_type',
                        'aria-label' => '',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e271af8dd7',
                                    'operator' => '==',
                                    'value' => 'Icon',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'classic' => 'Classic',
                            'sharp' => 'Sharp',
                        ),
                        'default_value' => 'classic',
                        'return_format' => 'value',
                        'multiple' => 0,
                        'allow_null' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                        'parent_repeater' => 'field_637e2751859e3',
                    ),
                    array(
                        'key' => 'field_637e3cf745cc0',
                        'label' => 'Icon',
                        'name' => 'card_icon',
                        'aria-label' => '',
                        'type' => 'text',
                        'instructions' => 'Search and select any icon from https://fontawesome.com/icons. Enter the text name of the icon here, eg "lightbulb."',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e271af8dd7',
                                    'operator' => '==',
                                    'value' => 'Icon',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => 'fa-',
                        'append' => '',
                        'parent_repeater' => 'field_637e2751859e3',
                    ),
                    array(
                        'key' => 'field_637e2772859e4',
                        'label' => 'Heading',
                        'name' => 'card_heading',
                        'aria-label' => '',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'parent_repeater' => 'field_637e2751859e3',
                    ),
                    array(
                        'key' => 'field_637e2c03a87cf',
                        'label' => 'Sub-Heading',
                        'name' => 'card_subheading',
                        'aria-label' => '',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e27e9859e7',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'parent_repeater' => 'field_637e2751859e3',
                    ),
                    array(
                        'key' => 'field_637e278c859e5',
                        'label' => 'Description',
                        'name' => 'card_description',
                        'aria-label' => '',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e27b5859e6',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                            array(
                                array(
                                    'field' => 'field_637e3ff9bb890',
                                    'operator' => '==',
                                    'value' => 'modal',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                        'delay' => 0,
                        'parent_repeater' => 'field_637e2751859e3',
                    ),
                    array(
                        'key' => 'field_637e3b3904522',
                        'label' => 'Button Text',
                        'name' => 'card_button_text',
                        'aria-label' => '',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e286a102e8',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 'Learn More',
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'parent_repeater' => 'field_637e2751859e3',
                    ),
                    array(
                        'key' => 'field_637e3b5f04523',
                        'label' => 'Link',
                        'name' => 'card_link',
                        'aria-label' => '',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_637e3ff9bb890',
                                    'operator' => '==',
                                    'value' => 'default',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'parent_repeater' => 'field_637e2751859e3',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/clb-custom-info-card',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
    
    endif;		