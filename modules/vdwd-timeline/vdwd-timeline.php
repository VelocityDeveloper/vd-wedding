<?php

/**
 * @class vdwdtimeline
 */
class vdwdtimeline extends FLBuilderModule
{

    /**
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'              => __('Timelines', 'fl-builder'),
            'description'       => __('', 'fl-builder'),
            'category'          => __('VD Wedding', 'fl-builder'),
            'partial_refresh'   => true,
            'icon'              => 'list.svg',
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('vdwdtimeline', array(
    'general'      => array(
        'title'         => __('General', 'fl-builder'),
        'sections'      => array(
            'section-photos'    => array(
                'title'         => '',
                'fields'        => array(
                    'timelines'     => array(
                        'type'         => 'form',
                        'label'        => __('Story', 'fl-builder'),
                        'form'         => 'timelines_column_form',
                        'preview_text' => 'title',
                        'multiple'     => true
                    ),
                )
            )
        )
    ),
));


FLBuilder::register_settings_form('timelines_column_form', array(
    'title' => __('Add Story', 'fl-builder'),
    'tabs'  => array(
        'general'      => array(
            'title'         => __('General', 'fl-builder'),
            'sections'      => array(
                'title'       => array(
                    'title'         => __('Title', 'fl-builder'),
                    'fields'        => array(
                        'title'          => array(
                            'type'          => 'text',
                            'label'         => __('Title', 'fl-builder'),
                            'default'       => 'Title',
                        ),
                        'subtitle'          => array(
                            'type'          => 'text',
                            'label'         => __('Sub Title', 'fl-builder'),
                            'default'       => 'Sub title here',
                        ),
                        'img'    => array(
                            'type'          => 'photo',
                            'label'         => __('Image', 'fl-builder')
                        ),
                        'description' => array(
                            'type'          => 'editor',
                            'label'         => __('Description', 'fl-builder'),
                            'default'       => 'Description here',
                            'placeholder'   => __('', 'fl-builder'),
                            'rows'          => '10',
                            'max'           => '300',
                            'preview'         => array(
                                'type'             => 'text',
                                'selector'         => '.vdwd-timeline-desc'
                            )
                        ),
                    ),
                ),
            )
        ),
    )
));
