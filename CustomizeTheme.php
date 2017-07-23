<?php

namespace Garung\Customize;

/**
 *
 */
class CustomizeTheme
{
    /**
     * [$fields description]
     * @var array
     */
    protected $fields = [];

    public function __construct($fields)
    {

        $this->fields = $fields;
        add_action('customize_register', [&$this, 'initCustomize']);
    }

    /**
     * [initCustomize description]
     * @return [type] [description]
     */
    public function initCustomize($wp_manager)
    {
        $wp_manager->add_section($this->fields['name_section'], [
            'title'    => $this->fields['title_setion'],
            'priority' => $this->fields['priority_setion'],
        ]);

        foreach ($this->fields['addsetting'] as $key => $val) {
            $this->addSetting($wp_manager, $this->fields['name_section'], $val);
        }
    }

    /**
     * [addSetting description]
     * @param WP_Customizer_Manager $wp_manager   [description]
     * @param string $name_section [description]
     * @param array  $params       [description]
     */
    public function addSetting($wp_manager, $name_section, $params = [])
    {
        $wp_manager->add_setting($params['name_setting'], [
            'default' => $params['default_value'],
        ]);

        switch ($params['type']) {
            case 'text':
                $this->comboOneControl($wp_manager, $params['name_setting'], $params['label_setting'], $name_section, $params['priority_control'], $params['type']);
                break;
            case 'checkbox':
                $this->comboOneControl($wp_manager, $params['name_setting'], $params['label_setting'], $name_section, $params['priority_control'], $params['type']);
                break;
            case 'radio':
                $this->comboTwoControl($wp_manager, $params['name_setting'], $params['label_setting'], $name_section, $params['priority_control'], $params['type']);
                break;
            case 'select':
                $this->comboTwoControl($wp_manager, $params['name_setting'], $params['label_setting'], $name_section, $params['priority_control'], $params['type']);
                break;
            case 'dropdown-pages':
                $this->comboTwoControl($wp_manager, $params['name_setting'], $params['label_setting'], $name_section, $params['priority_control'], $params['type']);
                break;
            default:
                $this->comboOneControl($wp_manager, $params['name_setting'], $params['label_setting'], $name_section, $params['priority_control'], $params['type']);
                break;
        }
    }

    /**
     * [simpleControl text, checkbox]
     * @param  WP_Customizer_Manager $wp_manager       [description]
     * @param  string $name_setting     [description]
     * @param  string $label_setting    [description]
     * @param  string $name_section     [description]
     * @param  string $priority_control [description]
     * @param  string $type             [description]
     * @return void                  [description]
     */
    protected function comboOneControl($wp_manager, $name_setting, $label_setting, $name_section, $priority_control, $type)
    {
        $wp_manager->add_control($name_setting, [
            'label'    => $label_setting,
            'section'  => $name_section,
            'type'     => $type,
            'priority' => $priority_control,
        ]);
    }

    /**
     * [radioControl radio, select, dropdown_pages]
     * @param  WP_Customizer_Manager $wp_manager [description]
     * @return void             [description]
     */
    protected function comboTwoControl($wp_manager, $name_setting, $label_setting, $name_section, $priority_control, $type)
    {
        $wp_manager->add_control($name_setting, [
            'label'    => $label_setting,
            'section'  => $name_section,
            'type'     => $type,
            'choices'  => ["1", "2", "3", "4", "5"],
            'priority' => $priority_control,
        ]);
    }
}
