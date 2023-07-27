<?php

/**
 * @class vdwdrekening
 */
class vdwdrekening extends FLBuilderModule
{

    /**
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'              => __('Rekening', 'fl-builder'),
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
FLBuilder::register_module('vdwdrekening', array(
    'general'      => array(
        'title'         => __('General', 'fl-builder'),
        'sections'      => array(
            'section-photos'    => array(
                'title'         => '',
                'fields'        => array(
                    'rekenings'     => array(
                        'type'         => 'form',
                        'label'        => __('Bank', 'fl-builder'),
                        'form'         => 'rekening_column_form',
                        'preview_text' => 'title',
                        'multiple'     => true
                    ),
                )
            )
        )
    ),
));


FLBuilder::register_settings_form('rekening_column_form', array(
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
                            'label'         => __('Atasnama', 'fl-builder'),
                            'default'       => 'Atasnama',
                        ),
                        'norek'          => array(
                            'type'          => 'text',
                            'label'         => __('No Rekening', 'fl-builder'),
                            'default'       => '0000000',
                        ),
                        'img'    => array(
                            'type'          => 'photo',
                            'label'         => __('Logo Bank', 'fl-builder')
                        ),
                    ),
                ),
            )
        ),
    )
));
