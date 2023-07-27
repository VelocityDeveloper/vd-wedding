<?php

/**
 * @class vdwdnavbar
 */
class vdwdnavbar extends FLBuilderModule
{
    /**
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct(array(
            'name'              => __('Navbar Icon', 'fl-builder'),
            'description'       => __('', 'fl-builder'),
            'category'          => __('VD Wedding', 'fl-builder'),
            'partial_refresh'   => true,
            'icon'              => 'menu.svg',
        ));
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('vdwdnavbar', array(
    'general'      => array(
        'title'         => __('General', 'fl-builder'),
        'sections'      => array(
            'section-menus'    => array(
                'title'         => '',
                'fields'        => array(
                    'menus'     => array(
                        'type'         => 'form',
                        'label'        => __('Menu', 'fl-builder'),
                        'form'         => 'vdwdnavbar_column_form',
                        'preview_text' => 'title',
                        'multiple'     => true
                    ),
                )
            )
        )
    ),
));

FLBuilder::register_settings_form('vdwdnavbar_column_form', array(
    'title' => __('Add Menu', 'fl-builder'),
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
                        'link'    => array(
                            'type'          => 'link',
                            'label'         => __('Link', 'fl-builder'),
                            'placeholder'   => __('#id', 'fl-builder'),
                            'default'       => '#id',
                        ),
                        'icon'          => array(
                            'type'          => 'icon',
                            'label'         => __('Icon', 'fl-builder'),
                            'show_remove'   => true
                        ),
                    ),
                ),
            )
        ),
    )
));
