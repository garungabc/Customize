# WP CUSTOM CUSTOMIZE
customize wp

Description:
Create simple customize for wordpress. Type input include : "text, checkbox, radio, select, dropdown-pages"

Parameters:
<hr>
DEMO
</hr>
<pre>
/**
 * Class handle for Product Custom Post Type
 */
class SettingTheme
{
    public function __construct()
    {
        $fields = [
            'name_section' => 'information_contact',
            'title_setion' => 'Information contact',
            'priority_setion' => 40,
            'addsetting' => [
                [
                    'name_setting' => 'support_phone',
                    'label_setting' => 'Support Phone',
                    'default_value' => '0123456789',
                    'priority_control' => 5,
                    'type' => 'text'
                ]
            ]
        ];
        $customizer = new Garung\CustomizeTheme($fields);
    }
}

new SettingTheme();
</pre>


