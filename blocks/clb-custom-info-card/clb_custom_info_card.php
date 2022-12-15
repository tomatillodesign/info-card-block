<?php
/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$block_to_publish = null;
$id = ' id="clb-custom-info-card-' . uniqid() . '"';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'clb-custom-info-card-area-wrapper';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

$card_data = null;
$modals_to_publish = null;
$card_collection_styles = null;

// card group settings
$card_group_settings = get_field('td_info_cards_settings_group');

$number_of_columns = $card_group_settings['td_info_cards_number_of_columns'];
if( $number_of_columns ) { $class_name .= ' clb-columns-' . $number_of_columns; }

$card_type = $card_group_settings['td_info_cards_type'];
if( $card_type ) { $class_name .= ' clb-info-card-type-' . $card_type; }

$card_subheaders = $card_group_settings['td_info_cards_include_sub_header'];
if( $card_subheaders ) { $class_name .= ' clb-info-cards-include-subheaders'; } else { $class_name .= ' clb-info-cards-no-subheaders'; }

$card_descriptions = $card_group_settings['td_info_cards_include_description'];
if( $card_descriptions ) { $class_name .= ' clb-info-cards-include-descriptions'; } else { $class_name .= ' clb-info-cards-no-descriptions'; }

$card_buttons = $card_group_settings['td_info_cards_include_button'];
if( $card_buttons ) { $class_name .= ' clb-info-cards-include-buttons'; } else { $class_name .= ' clb-info-cards-no-buttons'; }

// photo settings only
if( $card_type == 'photo' ) {
    $image_aspect_ratio = $card_group_settings['td_info_cards_aspect_ratio'];
    $class_name .= ' clb-info-cards-aspect-ratio-' . $image_aspect_ratio;
}

// setup color work in case of custom colors, check for readability and contrast
$theme_primary_color = get_field('primary_color', 'option');
$primary_hsl_array = clb_hex2hsl_020582308( $theme_primary_color );
$h = $primary_hsl_array['h'];
$s = $primary_hsl_array['s'];
$l = 5;
$theme_black_rgb_array = hueToRgb($h, $s, $l);
$theme_black_r = round(intval($theme_black_rgb_array['r']));
$theme_black_g = round(intval($theme_black_rgb_array['g']));
$theme_black_b = round(intval($theme_black_rgb_array['b']));

// background colors
$card_background_color_style = null;
$card_background_color = $card_group_settings['td_info_cards_card_background'];
$card_background_color_array_sum = array_sum($card_background_color);
if( $card_background_color_array_sum > 0 ) {
    $card_background_color_string = 'rgba(' . $card_background_color['red'] . ',' . $card_background_color['green'] . ',' . $card_background_color['blue'] . ',' . $card_background_color['alpha'] . ')';
    $card_background_color_style = ' style="background-color: ' . $card_background_color_string . ';"'; 
    $class_name .= ' clb-info-cards-override-card-background-color';
    
    $lumdiff_to_black = lumdiff($card_background_color['red'],$card_background_color['green'],$card_background_color['blue'],$theme_black_r,$theme_black_g,$theme_black_b);
    $lumdiff_to_white = lumdiff($card_background_color['red'],$card_background_color['green'],$card_background_color['blue'],255,255,255);
    
    if( $lumdiff_to_black >= 5 ) {
        $class_name .= ' clb-info-cards-override-card-foreground-color clb-foreground-dark';
        $card_collection_styles .= '--ironwood-card-body-color: var(--ironwood-black);';
    } elseif ( $lumdiff_to_white >= 5 ) {
        $class_name .= ' clb-info-cards-override-card-foreground-color clb-foreground-light';
        $card_collection_styles .= '--ironwood-card-body-color: var(--ironwood-white);';
    }
    
    $card_data .= ' data-clb-card-lumdiff-to-black="' . $lumdiff_to_black . '"';
    $card_data .= ' data-clb-card-lumdiff-to-white="' . $lumdiff_to_white . '"';

}

$button_background_color_style = null;
$button_background_color = $card_group_settings['td_info_cards_button_background'];
$button_background_color_array_sum = array_sum($button_background_color);
if( $button_background_color_array_sum > 0 ) { 
    $button_background_color_string = 'rgba(' . $button_background_color['red'] . ',' . $button_background_color['green'] . ',' . $button_background_color['blue'] . ',' . $button_background_color['alpha'] . ')';
    $button_background_color_style = ' style="background-color: ' . $button_background_color_string . ';"';
    $class_name .= ' clb-info-cards-override-button-background-color';

    $button_lumdiff_to_black = lumdiff($button_background_color['red'],$button_background_color['green'],$button_background_color['blue'],$theme_black_r,$theme_black_g,$theme_black_b);
    $button_lumdiff_to_white = lumdiff($button_background_color['red'],$button_background_color['green'],$button_background_color['blue'],255,255,255);

    if( $button_lumdiff_to_black >= 5 ) {
        $class_name .= ' clb-info-cards-override-card-button-foreground-color clb-button-foreground-dark';
        $card_collection_styles .= '--ironwood-card-button-text-color: var(--ironwood-black);';
    } elseif ( $button_lumdiff_to_white >= 5 ) {
        $class_name .= ' clb-info-cards-override-card-button-foreground-color clb-button-foreground-light';
        $card_collection_styles .= '--ironwood-card-button-text-color: var(--ironwood-white);';
    }

    $card_data .= ' data-clb-card-button-lumdiff-to-black="' . $button_lumdiff_to_black . '"';
    $card_data .= ' data-clb-card-button-lumdiff-to-white="' . $button_lumdiff_to_white . '"';
}

$total_card_count = 0;
$td_info_cards_repeater = get_field('td_info_cards_repeater');
if (is_array($td_info_cards_repeater)) {
  $total_card_count = count($td_info_cards_repeater);
}
if( $total_card_count ) { 
    $class_name .= ' clb-info-cards-total-count-' . $total_card_count; 
    $card_data .= ' data-clb-card-count="' . $total_card_count . '"';
}


///////////////////////
// Build the card /////
if( have_rows('td_info_cards_repeater') ) {

    while ( have_rows('td_info_cards_repeater') ) {
    
        the_row();

        $card_icon_to_publish = null;
        $card_heading_to_publish = null;
        $card_subheading_to_publish = null;
        $card_description_to_publish = null;
        $card_image_to_publish = null;
        $card_link_href = null;
        $card_link_closing = null;
        $card_is_modal = false;
        $modal_ref = null;
        $card_button_to_publish = null;
        $single_card_custom_classes = null;

        $card_action = get_sub_field('card_action');
        if( $card_action == 'modal' ) {
            $card_is_modal = true;
            $modal_ref = uniqid() . rand(1000, 100000);
            $card_link_href = '<a href="#ironwood-modal-' . $modal_ref . '" data-bs-toggle="modal" data-bs-target="#ironwood-modal-' . $modal_ref . '">';
            $card_link_closing = '</a>';
        } elseif( $card_action == 'default' ) {
            $card_link = get_sub_field('card_link');
            if( $card_link ) {
                $card_link_href = '<a href="' . $card_link . '">';
                $card_link_closing = '</a>';
            } else {
                $single_card_custom_classes .= ' clb-info-card-missing-link';
            }
        }

        if( $card_type == 'icon' ) {
            $icon_size = $card_group_settings['td_info_cards_icon_size'];
            $card_icon_style = 'fa-' . get_sub_field('card_icon_style');
            $card_icon_type = 'fa-' . get_sub_field('card_icon_type');
            $card_icon = 'fa-' . get_sub_field('card_icon');
            if( get_sub_field('card_icon') ) {
                $card_icon_to_publish .= '<div class="clb-single-info-card-icon-wrapper"><i class="' . $card_icon_type . ' ' . $card_icon_style . ' ' . $card_icon . ' ' . $icon_size . '"></i></div>';
            }
        }
        
        $card_heading = get_sub_field('card_heading');
        if( $card_heading ) { $card_heading_to_publish = '<h3 class="clb-single-info-card-heading">' . $card_link_href . $card_heading . $card_link_closing . '</h3>'; }

        $card_subheading = get_sub_field('card_subheading');
        if( $card_subheading && $card_subheaders ) { $card_subheading_to_publish = '<div class="clb-single-info-card-subheading">' . $card_subheading . '</div>'; }

        $card_description = get_sub_field('card_description');
        if( ($card_description && $card_descriptions) || ($card_description && $card_is_modal) ) {
            $card_description_to_publish = '<div class="clb-single-info-card-description-wrapper">' . $card_description . '</div>';
            if( $card_is_modal ) {
                $modal_description_to_publish = $card_description_to_publish;
                $card_description_to_publish = null;
            } 
        }

        $card_image_id = get_sub_field('card_photo');
        $size = 'large';
        if( $card_image_id && $card_type == 'photo' ) {
            $card_image_to_publish = '<div class="clb-single-info-card-image-wrapper">' . wp_get_attachment_image( $card_image_id, $size ) . '</div>';
        }

        if( $card_buttons ) {
            $card_button_text = get_sub_field('card_button_text');
            if( $card_button_text ) {
                $card_button_to_publish = '<div class="clb-single-info-card-button-wrapper"><button class="clb-single-info-card-cta-button"' . $button_background_color_style . '>' . $card_link_href . $card_button_text . $card_link_closing . '</button></div>';
            }
        }

        $block_to_publish .= '<div class="clb-single-info-card-wrapper' . $single_card_custom_classes . '" ' . $card_background_color_style . '>
                                <div class="clb-single-info-card-button-flex-wrapper">
                                    ' . $card_link_href . $card_image_to_publish . $card_icon_to_publish . $card_link_closing . '
                                    <div class="clb-single-info-card-body-wrapper">
                                    ' . $card_heading_to_publish . $card_subheading_to_publish . $card_description_to_publish . '
                                    </div>
                                ' . $card_button_to_publish . '
                                </div>
                            </div>';

        if( $card_is_modal ) {
        $modals_to_publish .= '<!-- Modal -->
                                <div class="modal fade clb-ironwood-modal" id="ironwood-modal-' . $modal_ref . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title clb-ironwood-modal-title" id="ironwood-modal-' . $modal_ref . '">' . $card_heading . '</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                    </div>
                                    <div class="modal-body">
                                        ' . $modal_description_to_publish . '
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>';
        }
    
    }
    
}



///////////////////////

$block_to_publish = '<div class="' . $class_name . '" ' . $id . $card_data . ' style="' . $card_collection_styles . '">' . $block_to_publish . '</div>';
echo $block_to_publish;

if( $modals_to_publish ) {
    echo '<div class="clb-move-modals">' . $modals_to_publish . '</div>';
}
