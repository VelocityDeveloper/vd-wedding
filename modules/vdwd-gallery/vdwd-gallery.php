<?php

/**
 * @class vdwdgallery
 */
class vdwdgallery extends FLBuilderModule
{

    /**
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'              => __('Gallery', 'fl-builder'),
            'description'       => __('', 'fl-builder'),
            'category'          => __('VD Wedding', 'fl-builder'),
            'partial_refresh'   => true,
            'icon'              => 'format-gallery.svg',
        ));

        $this->add_js('jquery-magnificpopup');
        $this->add_css('jquery-magnificpopup');
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('vdwdgallery', array(
    'general'      => array(
        'title'         => __('General', 'fl-builder'),
        'sections'      => array(
            'section-photos'    => array(
                'title'         => '',
                'fields'        => array(
                    'photos'        => array(
                        'type'        => 'multiple-photos',
                        'label'       => __('Photos', 'fl-builder'),
                        'connections' => array('multiple-photos'),
                    ),
                    'photo_size'    => array(
                        'type'      => 'select',
                        'label'     => __('Photo Size', 'fl-builder'),
                        'default'   => 'medium',
                        'options'   => array(
                            'thumbnail' => __('Thumbnail', 'fl-builder'),
                            'medium'    => __('Medium', 'fl-builder'),
                            'full'      => __('Full', 'fl-builder'),
                        ),
                    ),
                    'photo_spacing' => array(
                        'type'        => 'unit',
                        'label'       => __('Photo Spacing', 'fl-builder'),
                        'mode'        => 'padding',
                        'default'     => '20',
                        'size'        => '5',
                        'units'       => array('px'),
                        'responsive'  => true,
                        'slider'      => array(
                            'px' => array(
                                'min'  => 0,
                                'max'  => 1000,
                                'step' => 10,
                            ),
                        ),
                    ),
                    'grid_column' => array(
                        'type'          => 'unit',
                        'label'         => 'Desktop Grid',
                        'description'   => 'Columns',
                        'default'       => '4',
                        'slider' => array(
                            'min'   => 1,
                            'max'   => 10,
                            'step'  => 1,
                        ),
                    ),
                    'medium_grid_column' => array(
                        'type'          => 'unit',
                        'label'         => 'Medium Device Grid',
                        'description'   => 'Columns',
                        'default'       => '3',
                        'slider' => array(
                            'min'   => 1,
                            'max'   => 10,
                            'step'  => 1,
                        ),
                    ),
                    'responsive_grid_column' => array(
                        'type'          => 'unit',
                        'label'         => 'Small Device Grid',
                        'description'   => 'Columns',
                        'default'       => '2',
                        'slider' => array(
                            'min'   => 1,
                            'max'   => 10,
                            'step'  => 1,
                        ),
                    ),
                )
            )
        )
    ),
    'style'      => array(
        'title'     => __('Style', 'fl-builder'),
        'sections'      => array(
            'general'       => array(
                'title'         => '',
                'fields'        => array(
                    'photo_ratio'    => array(
                        'type'      => 'select',
                        'label'     => __('Photo Ratio', 'fl-builder'),
                        'default'   => 'disable',
                        'options'   => array(
                            'disable'   => __('Disable', 'fl-builder'),
                            '1x1'       => __('1x1', 'fl-builder'),
                            '4x3'       => __('4x3', 'fl-builder'),
                            '16x9'      => __('16x9', 'fl-builder'),
                            '21x9'      => __('21x9', 'fl-builder'),
                        ),
                    ),
                    'border_photos' => array(
                        'type'          => 'border',
                        'label'         => __('Border Photos', 'fl-builder'),
                        'responsive' => true,
                        'preview'    => array(
                            'type'     => 'css',
                            'selector' => '.vdwd-gallery .vdwd-photo',
                        ),
                    ),
                )
            )
        )
    ),
));
