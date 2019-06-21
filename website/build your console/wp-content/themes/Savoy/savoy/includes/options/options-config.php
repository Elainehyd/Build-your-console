<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
	}

    // This is your option name where all the Redux data is stored.
    $opt_name = 'nm_theme_options';


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // NM: Disable tracking
		'disable_tracking' => true,
		// TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
		'menu_title'			=> __( 'Theme Settings', 'nm-framework-admin' ),
		'page_title'			=> __( 'Theme Settings', 'nm-framework-admin' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off'  => true,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit'     => '&nbsp;',
		// Footer credit text

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
		'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                )
            )
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

	Redux::setSection( $opt_name, array(
		'title'		=> __( '一般', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-cog',
		'fields'	=> array(
            array(
				'id' 		=> 'full_width_layout',
				'type' 		=> 'switch',
				'title' 	=> __( '全宽版式', 'nm-framework-admin' ),
				'desc'		=> __( '显示全角页面布局.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> '启用',
				'off' 		=> '禁用'
			),
			array(
				'id' 		=> 'page_load_transition',
				'type' 		=> 'switch',
				'title' 	=> __( '页面加载转换', 'nm-framework-admin' ),
				'desc'		=> __( '页面加载转换.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> '启用',
				'off' 		=> '禁用'
			),
            array(
				'id' 	=> 'favicon',
				'type' 	=> 'media',
				'title'	=> __( '图标', 'nm-framework-admin' ),
				'desc'	=> __( '上传. ico/. png 图像以显示为您的图标.', 'nm-framework-admin' )
			),
            array(
				'id'		=> 'custom_wp_gallery',
				'type'		=> 'switch',
				'title'		=> __( '自定义滑块', 'nm-framework-admin' ),
				'desc'		=> __( '使用自定义图像滑块替换默认的 wordpress 库。', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'		=> 'wp_gallery_popup',
				'type'		=> 'switch',
				'title'		=> __( 'wordpress 画廊-弹出', 'nm-framework-admin' ),
				'desc'		=> __( '模式弹出的 wordpress 画廊。', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用',
                'required'	=> array( 'custom_wp_gallery', '=', '0' )
			),
			array(
				'id' 		=> 'font_awesome',
				'type' 		=> 'switch',
				'title' 	=> __( '字体 Awesome', 'nm-framework-admin' ),
				'desc'		=> __( '包括该 <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> 图标库 (使用引导 cdn)。', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> '启用',
				'off' 		=> '禁用'
			),
			array(
				'id' 		=> 'wp_admin_bar',
				'type' 		=> 'switch',
				'title' 	=> __( 'wordpress 管理栏', 'nm-framework-admin' ),
				'desc'		=> __( '显示登录用户的 front-end wordpress 管理栏。', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> '启用',
				'off' 		=> '禁用'
			),
            array (
				'id'	=> 'vcomp_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '可视化编辑器', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id' 		=> 'vcomp_enable_frontend',
				'type' 		=> 'switch',
				'title' 	=> __( '前端编辑器', 'nm-framework-admin' ),
				'desc'		=> __( '为可视化编辑器插件启用前端编辑器。', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> '启用',
				'off' 		=> '禁用'
			),
            array(
				'id' 		=> 'vcomp_stock',
				'type' 		=> 'switch',
				'title' 	=> __( '默认元素', 'nm-framework-admin' ),
				'desc'		=> __( '为可视化编辑器插件启用其他默认元素。', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> '启用',
				'off' 		=> '禁用'
			)
		)
	) );

    Redux::setSection( $opt_name, array(
		'title'		=> __( '顶栏', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-minus',
		'fields'	=> array(
			array(
				'id' 		=> 'top_bar',
				'type' 		=> 'switch',
				'title' 	=> __( '顶栏', 'nm-framework-admin' ),
				'desc'		=> __( '显示顶栏', 'nm-framework-admin' ),
				'default'	=> 0,
				'on' 		=> '启用',
				'off' 		=> '禁用'
			),
			array(
				'id' 		=> 'top_bar_text',
				'type' 		=> 'editor',
				'title' 	=> __( '文本', 'nm-framework-admin' ),
				'desc' 		=> __( '输入顶栏文本.', 'nm-framework-admin' ),
				'default'	=> __( '欢迎光临本店!', 'nm-framework-admin' ),
				'args'		=> array(
					'wpautop'	=> false,
					'teeny' 	=> true
				),
				'required'	=> array( 'top_bar', '=', '1' )
			),
			array(
				'id'			=> 'top_bar_left_column_size',
				'type'			=> 'slider',
				'title'			=> __( '文本列大小', 'nm-framework-admin' ),
				'desc'			=> __( '选择顶栏文本列的大小-跨度.', 'nm-framework-admin' ),
				'default'		=> 6,
				'min'			=> 1,
				'max'			=> 12,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'	=> array( 'top_bar', '=', '1' )
			),
			array(
				'id'		=> 'top_bar_social_icons',
				'type'		=> 'select',
				'title'		=> __( '社交图标', 'nm-framework-admin' ),
				'desc'		=> __( '显示社交个人资料图标（来自“社交个人资料”设置标签）.', 'nm-framework-admin' ),
				'options'	=> array( '0' => '没有', 'l_c' => '在文本 (左) 列中显示', 'r_c' => '在菜单 (右) 列中显示' ),
				'default'	=> '0',
				'required'	=> array( 'top_bar', '=', '1' )
			)
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> __( '页眉', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-chevron-up',
		'fields'	=> array(
			array(
				'id' 		=> 'header_layout',
				'type' 		=> 'image_select',
				'title' 	=> __( '布局', 'nm-framework-admin' ),
				'desc' 		=> __( '选择页眉布局.', 'nm-framework-admin' ),
				'options'	=> array(
					'default' 	        => array( 'alt' => 'Default', 'img' => NM_URI . '/assets/img/option-panel/header-default.png' ),
                    'menu-centered'     => array( 'alt' => 'Centered menu', 'img' => NM_URI . '/assets/img/option-panel/header-menu-centered.png' ),
					'centered'          => array( 'alt' => 'Centered logo', 'img' => NM_URI . '/assets/img/option-panel/header-centered.png' ),
                    'stacked'           => array( 'alt' => 'Stacked', 'img' => NM_URI . '/assets/img/option-panel/header-stacked.png' ),
                    'stacked-centered'  => array( 'alt' => 'Stacked Centered', 'img' => NM_URI . '/assets/img/option-panel/header-stacked-centered.png' )
				),
				'default' 	=> 'centered'
			),
            array(
				'id'		=> 'header_layout_mobile',
				'type'		=> 'select',
				'title' 	=> __( '布局-手机', 'nm-framework-admin' ),
				'desc'		=> __( '选择移动屏幕宽度的页眉布局.', 'nm-framework-admin' ),
                'options'	=> array( 'default' => '显示购物车计数', 'alt' => '隐藏购物车计数和左对齐Logo' ),
				'default'	=> 'alt'
			),
			array(
				'id'		=> 'header_fixed',
				'type'		=> 'switch',
				'title'		=> __( '浮动', 'nm-framework-admin' ),
				'desc'		=> __( '页面上方的浮动页眉-滚动页面时的内容.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'		=> 'header_transparency',
				'type'		=> 'select',
				'title' 	=> __( '透明度', 'nm-framework-admin' ),
				'desc'		=> __( '选择 "页" 以启用标题透明度.', 'nm-framework-admin' ),
				'options'	=> array( '0' => '禁用', 'home' => '首页', 'home-shop' => '首页和店铺' ),
				'default'	=> 'disabled'
			),
            array (
				'id'	=> 'header_info_spacing',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '间距', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'			=> 'header_spacing_top',
				'type'			=> 'slider',
				'title'			=> __( '上', 'nm-framework-admin' ),
				'desc'			=> __( '顶部页眉间距.', 'nm-framework-admin'),
				'default'		=> 17,
				'min'			=> 0,
				'max'			=> 250,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'header_spacing_top_alt',
				'type'			=> 'slider',
				'title'			=> __( '顶部浮动 平板和移动', 'nm-framework-admin' ),
				'desc'			=> __( '浮动页眉、tablet 和移动的顶部页眉间距.', 'nm-framework-admin'),
				'default'		=> 10,
				'min'			=> 0,
				'max'			=> 250,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'logo_spacing_bottom',
				'type'			=> 'slider',
				'title'			=> __( 'Logo - Bottom', 'nm-framework-admin' ),
				'desc'			=> __( 'Bottom logo spacing.', 'nm-framework-admin'),
				'default'		=> 0,
				'min'			=> 0,
				'max'			=> 250,
				'step'			=> 1,
				'display_value'	=> 'text',
                'required'		=> array( 'header_layout', 'contains', 'stacked' )
			),
			array(
				'id'			=> 'header_spacing_bottom',
				'type'			=> 'slider',
				'title'			=> __( '底部', 'nm-framework-admin' ),
				'desc'			=> __( '底部页眉间距.', 'nm-framework-admin'),
				'default'		=> 17,
				'min'			=> 0,
				'max'			=> 250,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'header_spacing_bottom_alt',
				'type'			=> 'slider',
				'title'			=> __( '底浮子、平板和手机', 'nm-framework-admin' ),
				'desc'			=> __( '浮动页眉、tablet 和移动设备的底部页眉间距.', 'nm-framework-admin'),
				'default'		=> 10,
				'min'			=> 0,
				'max'			=> 250,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array (
				'id'	=> 'header_info_border',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '边框', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'header_border',
				'type'		=> 'switch',
				'title'		=> __( '边框', 'nm-framework-admin' ),
				'desc'		=> __( '显示页眉边框.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'home_header_border',
				'type'		=> 'switch',
				'title'		=> __( '边框-主页', 'nm-framework-admin' ),
				'desc'		=> __( '在主页上显示页眉边框.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'shop_header_border',
				'type'		=> 'switch',
				'title'		=> __( '店铺边框', 'nm-framework-admin' ),
				'desc'		=> __( '在商店存档/列表页上显示页眉边框.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array (
				'id'	=> 'header_info_logo',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( 'Logo', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'	=> 'logo',
				'type'	=> 'media',
				'title'	=> __( 'Logo 上传', 'nm-framework-admin' ),
				'desc'	=> __( '上传您的Logo.', 'nm-framework-admin' )
			),
			array(
				'id'		=> 'alt_logo_config',
				'type'		=> 'select',
				'title'		=> __( '替代 Logo', 'nm-framework-admin' ),
				'desc'		=> __( '选择一个选项以启用替代Logo.', 'nm-framework-admin' ),
				'options'	=> array(
                    '0'                                 => __( '禁用', 'nm-framework-admin' ),
                    'alt-logo-home'                     => __( '在主页中显示页面页眉', 'nm-framework-admin' ),
                    'alt-logo-fixed'                    => __( '在浮点型页眉中显示', 'nm-framework-admin' ),
                    'alt-logo-home alt-logo-fixed'      => __( '显示在主页-页面和浮动标题', 'nm-framework-admin' ),
                    'alt-logo-tablet'                   => __( '在 tablet 页眉中显示', 'nm-framework-admin' ),
                    'alt-logo-mobile'                   => __( '在手机页眉中显示', 'nm-framework-admin' ),
                    'alt-logo-tablet alt-logo-mobile'   => __( '在 tablet 和移动页眉中显示', 'nm-framework-admin' )
                ),
				'default'	=> '0'
			),
            array(
				'id'	=> 'alt_logo',
				'type'	=> 'media',
				'title'	=> __( '替代 Logo 上传', 'nm-framework-admin' ),
				'desc'	=> __( '上传您的替代 Logo.', 'nm-framework-admin' ),
                'required'	=> array( 'alt_logo_config', '!=', '0' )
			),
			array(
				'id'			=> 'logo_高',
				'type'			=> 'slider',
				'title'			=> __( 'Logo 高', 'nm-framework-admin' ),
				'desc'			=> __( 'Logo 高.', 'nm-framework-admin'),
				'default'		=> 16,
				'min'			=> 10,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'			=> 'logo_height_tablet',
				'type'			=> 'slider',
				'title'			=> __( '标志高度-平板', 'nm-framework-admin' ),
				'desc'			=> __( '平板屏幕宽度的Logo高度.', 'nm-framework-admin'),
				'default'		=> 16,
				'min'			=> 10,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'			=> 'logo_height_mobile',
				'type'			=> 'slider',
				'title'			=> __( 'Logo 高度 - 手机', 'nm-framework-admin' ),
				'desc'			=> __( '手机屏幕宽度的 Logo 高度.', 'nm-framework-admin'),
				'default'		=> 16,
				'min'			=> 10,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array (
				'id'	=> 'header_info_menu',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '菜单', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'			=> 'menu_height',
				'type'			=> 'slider',
				'title'			=> __( '菜单高度', 'nm-framework-admin' ),
				'desc'			=> __( '菜单高度.', 'nm-framework-admin'),
				'default'		=> 50,
				'min'			=> 50,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'menu_height_tablet',
				'type'			=> 'slider',
				'title'			=> __( '菜单高度-平板', 'nm-framework-admin' ),
				'desc'			=> __( '平板屏幕宽度的菜单高度.', 'nm-framework-admin'),
				'default'		=> 50,
				'min'			=> 50,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'menu_height_mobile',
				'type'			=> 'slider',
				'title'			=> __( '手机菜单高度', 'nm-framework-admin' ),
				'desc'			=> __( '手机屏幕宽度的菜单高度.', 'nm-framework-admin'),
				'default'		=> 50,
				'min'			=> 50,
				'max'			=> 500,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array (
				'id'	=> 'header_info_menu_login',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '菜单-登录/我的帐户', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'		=> 'menu_login',
				'type'		=> 'switch',
				'title'		=> __( '菜单', 'nm-framework-admin' ),
				'desc'		=> __( '在页眉菜单中显示登录/我的帐户.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'menu_login_popup',
				'type'		=> 'switch',
				'title'		=> __( '弹出', 'nm-framework-admin' ),
				'desc'		=> __( '在弹出窗口中显示登录/注册表单.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用',
				'required'	=> array( 'menu_login', '=', '1' )
			),
			array(
				'id'		=> 'menu_login_icon',
				'type'		=> 'switch',
				'title'		=> __( '图标', 'nm-framework-admin' ),
				'desc'		=> __( '显示登录/我的帐户菜单图标 (而不是文本).', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用',
				'required'	=> array( 'menu_login', '=', '1' )
			),
            array (
				'id'	=> 'header_info_menu_cart',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '菜单-购物车', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'menu_cart',
				'type'		=> 'select',
				'title'		=> __( '菜单', 'nm-framework-admin' ),
				'desc'		=> __( '配置购物车菜单构件.', 'nm-framework-admin' ),
				'options'	=> array( '1' => '启用', 'link' => '仅链接 (无幻灯片面板)', '0' => '禁用' ),
				'default'	=> '1'
			),
			array(
				'id'		=> 'menu_cart_icon',
				'type'		=> 'switch',
				'title'		=> __( '图标', 'nm-framework-admin' ),
				'desc'		=> __( '显示购物车菜单图标 (而不是文本).', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用',
				'required'	=> array( 'menu_cart', '!=', '0' )
			),
			array (
				'id'	=> 'widget_panel_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '购物车面板', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'		=> 'widget_panel_color',
				'type'		=> 'select',
				'title'		=> __( '配色方案', 'nm-framework-admin' ),
				'desc'		=> __( '为购物车幻灯片面板选择配色方案.', 'nm-framework-admin' ),
				'options'	=> array( 'light' => '亮', 'dark' => '暗' ),
				'default'	=> 'dark'
			)
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> __( '页脚', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-chevron-down',
		'fields'	=> array(
			array(
				'id'		=> 'footer_sticky',
				'type'		=> 'switch',
				'title'		=> __( '粘贴', 'nm-framework-admin' ),
				'desc'		=> __( '使页脚节 "粘贴" 到页面的底部.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array (
				'id'	=> 'footer_widgets_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '部件', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'footer_widgets_layout',
				'type'		=> 'select',
				'title'		=> __( '布局', 'nm-framework-admin' ),
				'desc'		=> __( '为页脚小部件部分选择布局.', 'nm-framework-admin' ),
				'options'	=> array( 'boxed' => '盒装', 'full' => '充分', 'full-nopad' => '充分 (无填充)' ),
				'default'	=> 'boxed'
			),
			array(
				'id'		=> 'footer_widgets_border',
				'type'		=> 'switch',
				'title'		=> __( '上边框', 'nm-framework-admin' ),
				'desc'		=> __( '在页脚小部件节上显示上边框.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'			=> 'footer_widgets_columns',
				'type'			=> 'slider',
				'title'			=> __( '列', 'nm-framework-admin' ),
				'desc'			=> __( '选择要显示的页脚小部件列数.', 'nm-framework-admin' ),
				'default'		=> 2,
				'min'			=> 1,
				'max'			=> 4,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array (
				'id'	=> 'footer_bar_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '栏', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'	=> 'footer_bar_logo',
				'type'	=> 'media',
				'title'	=> __( 'Logo', 'nm-framework-admin' ),
				'desc'	=> __( '上传自定义 Logo (最大高度设置为 30px).', 'nm-framework-admin' )
			),
			array(
				'id'		=> 'footer_bar_text',
				'type'		=> 'text',
				'title'		=> __( '版权文本', 'nm-framework-admin' ),
				'desc'		=> __( '输入您的版权文本.', 'nm-framework-admin' ),
				'validate'	=> 'html'
			),
			array(
				'id'		=> 'footer_bar_text_cr_year',
				'type'		=> 'switch',
				'title'		=> __( '版权文本-版权与年份', 'nm-framework-admin' ),
				'desc'		=> __( '在版权文本之前显示版权标志 (&copy;) 和当前年份.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'footer_bar_content',
				'type'		=> 'select',
				'title'		=> __( '右列', 'nm-framework-admin' ),
				'desc'		=> __( '右列中的内容.', 'nm-framework-admin' ),
				'options'	=> array( 'copyright_text' => '版权文本', 'social_icons' => '社交媒体图标 (从 "社会概况" 设置选项卡)', 'custom' => '自定义内容' ),
				'default'	=> 'copyright_text'
			),
			array(
				'id'		=> 'footer_bar_custom_content',
				'type'		=> 'text',
				'title'		=> __( '自定义内容', 'nm-framework-admin' ),
				'desc'		=> __( '自定义内容 (允许 html).', 'nm-framework-admin' ),
				'validate'	=> 'html',
				'required'	=> array( 'footer_bar_content', '=', 'custom' )
			)
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> __( '造型', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-eye-open',
		'fields'	=> array(
			array(
				'id'	=> 'info_styling_general',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '一般', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'highlight_color',
				'type'			=> 'color',
				'title'			=> __( '突出显示颜色', 'nm-framework-admin' ),
				'desc'			=> __( '主主题突出显示颜色.', 'nm-framework-admin' ),
				'default'		=> '#dc9814',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'button_font_color',
				'type'			=> 'color',
				'title'			=> __( '按钮-字体颜色', 'nm-framework-admin' ),
				'desc'			=> __( '产品按钮文本.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'button_background_color',
				'type'			=> 'color',
				'title'			=> __( '按钮-背景色', 'nm-framework-admin' ),
				'desc'			=> __( '产品按钮背景颜色.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_typography',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '排版', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'main_font_color',
				'type'			=> 'color',
				'title'			=> __( '主字体颜色', 'nm-framework-admin' ),
				'desc'			=> __( '正文文本颜色.', 'nm-framework-admin' ),
				'default'		=> '#777777',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'heading_color',
				'type'			=> 'color',
				'title'			=> __( '标题颜色', 'nm-framework-admin' ),
				'desc'			=> __( '标题文本颜色.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_background',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '背景', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'main_background_color',
				'type'			=> 'color',
				'title'			=> __( '背景颜色', 'nm-framework-admin' ),
				'desc'			=> __( '主站点背景颜色.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'main_background_image',
				'type'	=> 'media',
				'url'	=> true,
				'title'	=> __( '背景图片', 'nm-framework-admin' ),
				'desc'	=> __( '上载背景图像或指定 url (装箱版式).', 'nm-framework-admin' )
			),
			array(
				'id'		=> 'main_background_image_type',
				'type'		=> 'select',
				'title'		=> __( '背景类型', 'nm-framework-admin' ),
				'desc'		=> __( '选择背景图像类型 (固定图像或重复图案/纹理).', 'nm-framework-admin' ),
				'options'	=> array( 'fixed' => '固定 (全)', 'repeat' => 'Repeat (pattern)' ),
				'default'	=> 'fixed'
			),
			array(
				'id'	=> 'info_styling_top_bar',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '顶栏', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'top_bar_font_color',
				'type'			=> 'color',
				'title'			=> __( '字体颜色', 'nm-framework-admin' ),
				'desc'			=> __( '顶栏文本颜色.', 'nm-framework-admin' ),
				'default'		=> '#eeeeee',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'top_bar_background_color',
				'type'			=> 'color',
				'title'			=> __( '背景颜色', 'nm-framework-admin' ),
				'desc'			=> __( '顶栏背景色.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_header',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '页眉', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'header_navigation_color',
				'type'			=> 'color',
				'title'			=> __( '菜单字体颜色r', 'nm-framework-admin' ),
				'desc'			=> __( '页眉菜单链接颜色.', 'nm-framework-admin' ),
				'default'		=> '#707070',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'header_navigation_highlight_color',
				'type'			=> 'color',
				'title'			=> __( '菜单字体颜色-突出显示', 'nm-framework-admin' ),
				'desc'			=> __( '用于 "突出显示" 标题菜单中的链接.', 'nm-framework-admin' ),
				'transparent'	=> false,
				'default'		=> '#282828',
				'validate'		=> 'color'
			),
			array(
				'id'		=> 'header_background_color',
				'type'		=> 'color',
				'title'		=> __( '背景颜色', 'nm-framework-admin' ),
				'desc'		=> __( '页眉背景色.', 'nm-framework-admin' ),
				'default'	=> '#ffffff',
				'validate'	=> 'color'
			),
			array(
				'id'		=> 'header_home_background_color',
				'type'		=> 'color',
				'title'		=> __( '背景色-首页', 'nm-framework-admin' ),
				'desc'		=> __( '页眉上的标题背景颜色.', 'nm-framework-admin' ),
				'default'	=> '#ffffff',
				'validate'	=> 'color'
			),
			array(
				'id'		=> 'header_float_background_color',
				'type'		=> 'color',
				'title'		=> __( '背景色-浮动', 'nm-framework-admin' ),
				'desc'		=> __( '浮动页眉背景色.', 'nm-framework-admin' ),
				'default'	=> '#ffffff',
				'validate'	=> 'color'
			),
			array(
				'id'			=> 'header_slide_menu_open_background_color',
				'type'			=> 'color',
				'title'			=> __( '背景颜色-手机菜单打开', 'nm-framework-admin' ),
				'desc'			=> __( '打开手机菜单时的页眉背景色.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_dropdown_menu',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '下拉菜单', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'dropdown_menu_font_color',
				'type'			=> 'color',
				'title'			=> __( '字体颜色', 'nm-framework-admin' ),
				'desc'			=> __( '页眉下拉菜单链接颜色.', 'nm-framework-admin' ),
				'transparent'	=> false,
				'default'		=> '#a0a0a0',
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'dropdown_menu_font_highlight_color',
				'type'			=> 'color',
				'title'			=> __( '字体颜色-突出显示', 'nm-framework-admin' ),
				'desc'			=> __( '用于 "突出显示" 标题下拉菜单中的链接.', 'nm-framework-admin' ),
				'transparent'	=> false,
				'default'		=> '#eeeeee',
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'dropdown_menu_background_color',
				'type'			=> 'color',
				'title'			=> __( '背景颜色', 'nm-framework-admin' ),
				'desc'			=> __( '页眉下拉菜单背景颜色.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
            array(
				'id'	=> 'info_styling_slide_menu',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '手机菜单', 'nm-framework-admin' ) . '</h3>'
			),
            array(
				'id'			=> 'slide_menu_font_color',
				'type'			=> 'color',
				'title'			=> __( '字体颜色', 'nm-framework-admin' ),
				'desc'			=> __( '手机菜单的字体颜色.', 'nm-framework-admin' ),
				//'default'		=> '#cccccc',
                'default'		=> '#555555',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
            array(
				'id'			=> 'slide_menu_font_highlight_color',
				'type'			=> 'color',
				'title'			=> __( '字体颜色-突出显示', 'nm-framework-admin' ),
				'desc'			=> __( '手机菜单字体 "高亮" 颜色.', 'nm-framework-admin' ),
				//'default'		=> '#eeeeee',
                'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
            array(
				'id'			=> 'slide_menu_border_color',
				'type'			=> 'color',
				'title'			=> __( '边框颜色', 'nm-framework-admin' ),
				'desc'			=> __( '手机菜单边框颜色.', 'nm-framework-admin' ),
				//'default'		=> '#464646',
                'default'		=> '#eeeeee',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
            array(
				'id'			=> 'slide_menu_background_color',
				'type'			=> 'color',
				'title'			=> __( '背景颜色', 'nm-framework-admin' ),
				'desc'			=> __( '手机菜单背景颜色.', 'nm-framework-admin' ),
				//'default'		=> '#333333',
                'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_footer_widgets',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '页脚小部件', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'footer_widgets_font_color',
				'type'			=> 'color',
				'title'			=> __( '字体颜色', 'nm-framework-admin' ),
				'desc'			=> __( '页脚小部件文本颜色.', 'nm-framework-admin' ),
				'default'		=> '#777777',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_widgets_title_font_color',
				'type'			=> 'color',
				'title'			=> __( '字体颜色-标题', 'nm-framework-admin' ),
				'desc'			=> __( '页脚小部件的标题颜色.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_widgets_highlight_font_color',
				'type'			=> 'color',
				'title'			=> __( '字体颜色-突出显示', 'nm-framework-admin' ),
				'desc'			=> __( '链接悬停状态颜色.', 'nm-framework-admin' ),
				'default'		=> '#dc9814',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_widgets_background_color',
				'type'			=> 'color',
				'title'			=> __( '背景颜色', 'nm-framework-admin' ),
				'desc'			=> __( '页脚小部件背景颜色.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_footer_bar',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '页脚栏', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'footer_bar_font_color',
				'type'			=> 'color',
				'title'			=> __( '字体颜色', 'nm-framework-admin' ),
				'desc'			=> __( '页脚栏文本颜色.', 'nm-framework-admin' ),
				'default'		=> '#aaaaaa',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_bar_highlight_font_color',
				'type'			=> 'color',
				'title'			=> __( '字体颜色-突出显示', 'nm-framework-admin' ),
				'desc'			=> __( '链接悬停状态颜色.', 'nm-framework-admin' ),
				'default'		=> '#eeeeee',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_bar_menu_border_color',
				'type'			=> 'color',
				'title'			=> __( '菜单边框颜色', 'nm-framework-admin' ),
				'desc'			=> __( '在较小屏幕宽度上的菜单边框颜色.', 'nm-framework-admin' ),
				'default'		=> '#3a3a3a',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'footer_bar_background_color',
				'type'			=> 'color',
				'title'			=> __( '背景颜色', 'nm-framework-admin' ),
				'desc'			=> __( '页脚-条形图背景色.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_shop',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '店铺', 'nm-framework-admin' ) . '</h3>'
			),
            array(
				'id'			=> 'shop_taxonomy_header_heading_color',
				'type'			=> 'color',
				'title'			=> __( '分类横幅标题颜色', 'nm-framework-admin' ),
				'desc'			=> __( '类别横幅标题颜色.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
            array(
				'id'			=> 'shop_taxonomy_header_description_color',
				'type'			=> 'color',
				'title'			=> __( '类别横幅-描述颜色', 'nm-framework-admin' ),
				'desc'			=> __( '类别横幅说明颜色.', 'nm-framework-admin' ),
				'default'		=> '#777777',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'sale_flash_font_color',
				'type'			=> 'color',
				'title'			=> __( '销售徽章-字体颜色', 'nm-framework-admin' ),
				'desc'			=> __( '"销售徽章" 文本颜色.', 'nm-framework-admin' ),
				'default'		=> '#373737',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'sale_flash_background_color',
				'type'			=> 'color',
				'title'			=> __( '销售徽章-背景色', 'nm-framework-admin' ),
				'desc'			=> __( '"销售徽章" 背景色.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_styling_shop_single_product',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '店铺-单一产品', 'nm-framework-admin' ) . '</h3>'
			),
			array(
				'id'			=> 'single_product_background_color',
				'type'			=> 'color',
				'title'			=> __( '背景', 'nm-framework-admin' ),
				'desc'			=> __( '单一产品详细信息背景颜色.', 'nm-framework-admin' ),
				'default'		=> '#eeeeee',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'featured_video_icon_color',
				'type'			=> 'color',
				'title'			=> __( '特色视频图标-颜色', 'nm-framework-admin' ),
				'desc'			=> __( '特色视频图标颜色.', 'nm-framework-admin' ),
				'default'		=> '#282828',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'featured_video_background_color',
				'type'			=> 'color',
				'title'			=> __( '特色视频图标-背景颜色', 'nm-framework-admin' ),
				'desc'			=> __( '特色视频图标背景颜色.', 'nm-framework-admin' ),
				'default'		=> '#ffffff',
				'transparent'	=> false,
				'validate'		=> 'color'
			)
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> __( '排版', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-font',
		'fields'	=> array(
			// Main font
			array (
				'id'	=> 'main_font_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . __( '主字体', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'main_font_source',
				'type'		=> 'radio',
				'title'		=> __( '字体源', 'nm-framework-admin' ),
				'options'	=> array(
					'1'	=> '标准 + 谷歌 webfonts',
					'2'	=> 'Adobe Typekit',
                    '3'	=> '自定义 CSS'
				),
				'default'	=> '1'
			),
			// Main font: Standard + Google Webfonts
			array (
				'id'			=> 'main_font',
				'type'			=> 'typography',
				'title'			=> __( '字体', 'nm-framework-admin' ),
				'line-height'	=> false,
				'text-align'	=> false,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-size'		=> false,
				'color'			=> false,
				'all_styles'    => true, // Since v1.3.4: Include all available styles for selected Google font
                'default'		=> array (
					'字体系列'	=> '打开 Sans',
					'子集'		=> '',
				),
				'required'		=> array( 'main_font_source', '=', '1' )
			),
			// Main font: Adobe Typekit
			array(
				'id'		=> 'main_font_typekit_kit_id',
				'type'		=> 'text',
				'title'		=> __( 'Typekit 套件 ID', 'nm-framework-admin' ),
				'desc'		=> __( '输入主字体的 Typekit 套件 ID.', 'nm-framework-admin' ),
				'default'	=> '',
				'required'	=> array( 'main_font_source', '=', '2' )
			),
			array (
				'id'		=> 'main_typekit_font',
				'type'		=> 'text',
				'title'		=> __( 'Typekit Font Face', 'nm-framework-admin' ),
				'desc'		=> __( 'Example: futura-pt', 'nm-framework-admin' ),
				'default'	=> '',
				'required'	=> array( 'main_font_source', '=', '2' )
			),
            // Main font: Custom CSS
			array(
				'id'		=> 'main_font_custom_css',
				'type'		=> 'ace_editor',
				'title' 	=> __( 'Custom CSS', 'nm-framework-admin' ),
				'desc' 		=> __( 'Enter custom CSS rules.<br><br>Example: body { font-family: "Proxima Nova Regular", sans-serif; }', 'nm-framework-admin' ),
				'mode'		=> 'css',
				'theme'		=> 'chrome',
				'default'	=> '',
				'required'	=> array( 'main_font_source', '=', '3' )
			),
			// Secondary font
			array (
				'id'	=> 'secondary_font_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '辅助字体', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'secondary_font_source',
				'type'		=> 'radio',
				'title'		=> __('字体源', 'nm-framework-admin'),
				'options'	=> array(
					'0' => '(none)',
					'1'	=> 'Standard + Google Webfonts',
					'2'	=> 'Adobe Typekit'
				),
				'default'	=> '0'
			),
			// Secondary font: Standard + Google Webfonts
			array (
				'id'			=> 'secondary_font',
				'type'			=> 'typography',
				'title'			=> __( 'Font Face', 'nm-framework-admin' ),
				'line-height'	=> false,
				'text-align'	=> false,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-size'		=> false,
				'color'			=> false,
                'all_styles'    => true, // Since v1.3.4: Include all available styles for selected Google font
                'default'		=> array (
					'font-family'	=> 'Open Sans',
					'subsets'		=> '',
				),
				'required'		=> array( 'secondary_font_source', '=', '1' )
			),
			// Secondary font: Adobe Typekit
			array(
				'id'		=> 'secondary_font_typekit_kit_id',
				'type'		=> 'text',
				'title'		=> __( 'Typekit Kit ID', 'nm-framework-admin' ),
				'desc'		=> __( 'Enter your Typekit Kit ID for the Secondary Font.', 'nm-framework-admin' ),
				'default'	=> '',
				'required'	=> array( 'secondary_font_source', '=', '2' )
			),
			array (
				'id'		=> 'secondary_typekit_font',
				'type'		=> 'text',
				'title'		=> __( 'Typekit Font Face', 'nm-framework-admin' ),
				'desc'		=> __( 'Example: proxima-nova', 'nm-framework-admin' ),
				'default'	=> '',
				'required'	=> array( 'secondary_font_source', '=', '2' )
			)
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> __( '博客', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-website',
		'fields'	=> array(
			array(
				'id'		=> 'blog_static_page',
				'type'		=> 'switch',
				'title'		=> __( '静态内容', 'nm-framework-admin' ),
				'desc'		=> __( "在博客的索引页上显示静态页面内容.", 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'blog_static_page_id',
				'type'		=> 'select',
				'title'		=> __( '静态内容-页', 'nm-framework-admin' ),
				'desc'		=> __( "选择要在博客的索引页上显示的页面.", 'nm-framework-admin' ),
				'data'		=> 'pages',
				'required'	=> array( 'blog_static_page', '=', '1' )
			),
			array (
				'id'	=> 'blog_categories_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . __( '类别', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'		=> 'blog_categories',
				'type'		=> 'switch',
				'title'		=> __( '类别', 'nm-framework-admin' ),
				'desc'		=> __( '在主博客页面上显示帖子类别.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'		=> 'blog_categories_hide_empty',
				'type'		=> 'switch',
				'title'		=> __( '隐藏空', 'nm-framework-admin' ),
				'desc'		=> __( '隐藏空帖子类别.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用',
				'required'	=> array( 'blog_categories', '=', '1' )
			),
			array(
				'id'		=> 'blog_categories_layout',
				'type'		=> 'select',
				'title'		=> __( '布局', 'nm-framework-admin' ),
				'desc'		=> __( '选择类别菜单布局.', 'nm-framework-admin' ),
				'options'	=> array( 'list' => '分隔列表', 'list_nosep' => '列表', 'columns' => '列' ),
				'default'	=> 'list',
                'required'	=> array( 'blog_categories', '=', '1' )
			),
			array(
				'id'			=> 'blog_categories_columns',
				'type'			=> 'slider',
				'title'			=> __( '列', 'nm-framework-admin' ),
				'desc'			=> __( '选择要显示的类别列数.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 2,
				'max'			=> 5,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'	=> array( 'blog_categories_layout', '=', 'columns' )
			),
			array(
				'id'		=> 'blog_categories_toggle',
				'type'		=> 'switch',
				'title'		=> __( '切换', 'nm-framework-admin' ),
				'desc'		=> __( '显示在小浏览器宽度上显示/隐藏类别的链接.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用',
                'required'	=> array( 'blog_categories', '=', '1' )
			),
			array(
				'id'		=> 'blog_categories_orderby',
				'type'		=> 'select',
				'title'		=> __( '订单', 'nm-framework-admin' ),
				'desc'		=> __( '选择类别订单.', 'nm-framework-admin' ),
				'options'	=> array( 'id' => 'ID', 'name' => '名称', 'slug' => 'Slug', 'count' => '计数', 'term_group' => '术语组' ),
				'default'	=> 'name',
                'required'	=> array( 'blog_categories', '=', '1' )
			),
			array(
				'id'		=> 'blog_categories_order',
				'type'		=> 'select',
				'title'		=> __( '订单方向', 'nm-framework-admin' ),
				'desc'		=> __( '选择类别订单方向.', 'nm-framework-admin' ),
				'options'	=> array( 'asc' => '升序', 'desc' => '降序' ),
				'default'	=> 'asc',
                'required'	=> array( 'blog_categories', '=', '1' )
			),
			array (
				'id'	=> 'blog_archive_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . __( '存档/列表', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'blog_layout',
				'type'		=> 'select',
				'title'		=> __( '布局', 'nm-framework-admin' ),
				'desc'		=> __( '选择博客布局.', 'nm-framework-admin' ),
				'options'	=> array( 'classic' => 'Classic', 'grid' => 'Grid', 'list' => 'List' ),
				'default'	=> 'grid'
			),
            array(
				'id'		=> 'blog_sidebar',
				'type'		=> 'select',
				'title'		=> __( '栏', 'nm-framework-admin' ),
				'desc'		=> __( '选择博客提要栏布局.', 'nm-framework-admin' ),
				'options'	=> array( 'none' => '无边栏', 'left' => '左边栏', 'right' => '侧边栏右侧' ),
				'default'	=> 'none',
                'required'	=> array( 'blog_layout', '=', 'classic' )
			),
            array(
				'id'		=> 'blog_grid_preloader',
				'type'		=> 'switch',
				'title'		=> __( '加载', 'nm-framework-admin' ),
				'desc'		=> __( '在加载博客图像时显示预.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用',
                'required'	=> array( 'blog_layout', '=', 'grid' )
			),
			array(
				'id'			=> 'blog_grid_columns',
				'type'			=> 'slider',
				'title'			=> __( '网格列', 'nm-framework-admin' ),
				'desc'			=> __( '选择网格布局中的列数.', 'nm-framework-admin' ),
				'default'		=> 3,
				'min'			=> 2,
				'max'			=> 5,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'	=> array( 'blog_layout', '=', 'grid' )
			),
			array(
				'id'		=> 'blog_show_full_posts',
				'type'		=> 'switch',
				'title'		=> __( '显示完整帖子', 'nm-framework-admin' ),
				'desc'		=> __( '在博客列表上显示完整的帖子.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'blog_gallery',
				'type'		=> 'switch',
				'title'		=> __( '博客库', 'nm-framework-admin' ),
				'desc'		=> __( '在博客列表上显示图像库', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array (
				'id'	=> 'blog_single_post_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . __( '单张帖子', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'single_post_sidebar',
				'type'		=> 'select',
				'title'		=> __( '单帖布局', 'nm-framework-admin' ),
				'desc'		=> __( '选择单张布局.', 'nm-framework-admin' ),
				'options'	=> array( 'none' => '无边栏', 'left' => '左边栏', 'right' => '侧边栏右侧' ),
				'default'	=> 'none'
			),
            array(
				'id'		=> 'single_post_display_featured_image',
				'type'		=> 'switch',
				'title'		=> __( '显示精选图像', 'nm-framework-admin' ),
				'desc'		=> __( '在文章标题上方显示特色图片.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'		=> 'single_post_related',
				'type'		=> 'switch',
				'title'		=> __( '相关职位', 'nm-framework-admin' ),
				'desc'		=> __( '在内容下方显示相关帖子.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'			=> 'single_post_related_columns',
				'type'			=> 'slider',
				'title'			=> __( '相关帖子-专栏', 'nm-framework-admin' ),
				'desc'			=> __( '选择要显示的相关过帐列数.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 2,
				'max'			=> 6,
				'step'			=> 2,
				'display_value'	=> 'text',
                'required'	=> array( 'single_post_related', '=', '1' )
			),
            array(
				'id'			=> 'single_post_related_per_page',
				'type'			=> 'slider',
				'title'			=> __( '相关帖子-每页产品', 'nm-framework-admin' ),
				'desc'			=> __( '选择要显示的相关职位数.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 1,
				'max'			=> 48,
				'step'			=> 1,
				'display_value'	=> 'text',
                'required'	=> array( 'single_post_related', '=', '1' )
			)
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> __( '店铺过滤器', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-shopping-cart',
		'fields'	=> array(
			array(
				'id'		=> 'shop_header',
				'type'		=> 'switch',
				'title'		=> __( '页眉', 'nm-framework-admin' ),
				'desc'		=> __( '显示店铺页眉.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'shop_filters_enable_ajax',
				'type'		=> 'select',
				'title'		=> __( 'AJAX', 'nm-framework-admin' ),
				'desc'		=> __( '使用 AJAX 筛选商店内容 (ajax 允许新内容而不重新加载整个页面).', 'nm-framework-admin' ),
				'options'	=> array( '1' => '启用', 'desktop' => '在触摸设备上禁用', '0' => '禁用' ),
				'default'	=> '1'
			),
			array(
				'id'		=> 'shop_ajax_update_title',
				'type'		=> 'switch',
				'title'		=> __( 'AJAX - 更新页面标题', 'nm-framework-admin' ),
				'desc'		=> __( '在 AJAX 加载新页面后更新文档/页面标题.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用',
				'required'	=> array( 'shop_filters_enable_ajax', '!=', '0' )
			),
			array (
				'id' 	=> 'shop_header_categories_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '类别', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'shop_categories',
				'type'		=> 'switch',
				'title'		=> __( '类别', 'nm-framework-admin' ),
				'desc'		=> __( '在商店页眉中显示产品类别.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'shop_categories_hide_empty',
				'type'		=> 'switch',
				'title'		=> __( '隐藏空', 'nm-framework-admin' ),
				'desc'		=> __( '隐藏空产品类别.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用',
				'required'	=> array( 'shop_categories', '=', '1' )
			),
			array(
				'id'		=> 'shop_categories_top_level',
				'type'		=> 'select',
				'title'		=> __( '显示类型', 'nm-framework-admin' ),
				'desc'		=> __( '选择产品类别显示类型.', 'nm-framework-admin' ),
				'options'	=> array( '1' => '始终显示 top-level 类别', '0' => '隐藏 top-level 类别 (在分类页上)' ),
				'default'	=> '1',
				'required'	=> array( 'shop_categories', '=', '1' )
			),
			array(
				'id'		=> 'shop_categories_back_link',
				'type'		=> 'select',
				'title'		=> __( '"返回"链接', 'nm-framework-admin' ),
				'desc'		=> __( '在子类别菜单上显示 "返回" 链接.', 'nm-framework-admin' ),
				'options'	=> array( '0' => '禁用', '1st' => '显示', '2nd' => '从第二子类别级别显示' ),
				'default'	=> '1st',
				'required'	=> array( 'shop_categories_top_level', '=', '0' )
			),
			array(
				'id'		=> 'shop_categories_layout',
				'type'		=> 'select',
				'title'		=> __( '布局', 'nm-framework-admin' ),
				'desc'		=> __( '"选择产品类别" 菜单布局.', 'nm-framework-admin' ),
				'options'	=> array( 'list_sep' => '分隔列表', 'list_nosep' => '列表' ),
				'default'	=> 'list_sep',
				'required'	=> array( 'shop_categories', '=', '1' )
			),
			array(
				'id'		=> 'shop_categories_orderby',
				'type'		=> 'select',
				'title'		=> __( '订单', 'nm-framework-admin' ),
				'desc'		=> __( '选择产品类别订单.', 'nm-framework-admin' ),
				'options'	=> array(
                    'id' => 'ID',
                    'name'          => '名称/菜单-订单',
                    'slug'          => 'Slug',
                    'count'         => 'Count',
                    'term_group'    => '术语组'
                ),
				'default'	=> 'slug',
				'required'	=> array( 'shop_categories', '=', '1' )
			),
			array(
				'id'		=> 'shop_categories_order',
				'type'		=> 'select',
				'title'		=> __( '订单方向', 'nm-framework-admin' ),
				'desc'		=> __( '选择产品类别订单方向.', 'nm-framework-admin' ),
				'options'	=> array( 'asc' => '升序', 'desc' => '降序' ),
				'default'	=> 'asc',
				'required'	=> array( 'shop_categories', '=', '1' )
			),
			array (
				'id' 	=> 'shop_header_filters_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '筛选器部件', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'shop_filters',
				'type'		=> 'select',
				'title'		=> __( '筛选器', 'nm-framework-admin' ),
				'desc'		=> __( '选择产品-筛选器布局.', 'nm-framework-admin' ),
				'options'	=> array(
                    'disabled'  => '禁用',
                    'header'    => '在商店页眉中显示',
                    'default'   => '在边栏中显示',
                    'popup'     => '在弹出式面板中显示'
                ),
				'default'	=> 'disabled'
			),
			array(
				'id'			=> 'shop_filters_columns',
				'type'			=> 'slider',
				'title'			=> __( '列', 'nm-framework-admin' ),
				'desc'			=> __( '选择要显示的筛选器列数.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 1,
				'max'			=> 4,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'	=> array( 'shop_filters', '=', 'header' )
			),
			/*array(
				'id'		=> 'shop_filters_scrollbar',
				'type'		=> 'select',
				'title'		=> __( 'Scrollbar', 'nm-framework-admin' ),
				'desc'		=> __( 'Enable scrollbar for product filters with long content (set height below).', 'nm-framework-admin' ),
				'options'	=> array(
                    '0'         => 'Disable',
                    'default'   => 'Default scrollbar',
                    'js'        => 'Custom scrollbar'
                ),
				'default'	=> '0',
				'required'	=> array( 'shop_filters', '=', 'header' )
			),*/
            array(
				'id'		=> 'shop_filters_scrollbar',
				'type'		=> 'switch',
				'title'		=> __( 'Scrollbar', 'nm-framework-admin' ),
				'desc'		=> __( 'Display scrollbar for product filters with long content (set height below).', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用',
                'required'	=> array( 'shop_filters', '=', 'header' )
			),
			array(
				'id'			=> 'shop_filters_height',
				'type'			=> 'slider',
				'title'			=> __( '筛选器高度', 'nm-framework-admin' ),
				'desc'			=> __( '设置产品筛选器高度 (更长的内容是可滚动的).', 'nm-framework-admin' ),
				'default'		=> 150,
				'min'			=> 80,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'		=> array( 'shop_filters_scrollbar', '!=', '0' )
			),
            array(
				'id'		=> 'shop_filters_sidebar_position',
				'type'		=> 'select',
				'title'		=> __( '侧栏位置', 'nm-framework-admin' ),
				'desc'		=> __( '选择筛选器-侧栏位置.', 'nm-framework-admin' ),
				'options'	=> array( 'left' => '左', 'right' => '右' ),
				'default'	=> 'left',
				'required'	=> array( 'shop_filters', '=', 'default' )
			),
			array (
				'id' 	=> 'shop_header_search_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '搜索', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'shop_search',
				'type'		=> 'select',
				'title'		=> __( '搜索', 'nm-framework-admin' ),
				'desc'		=> __( '选择产品搜索版式.', 'nm-framework-admin' ),
				'options'	=> array(
                    '0' => '禁用',
                    'header' => '在页眉菜单中显示',
                    'shop' => '陈列在店铺'
                ),
				'default'	=> 'shop'
			),
			array(
				'id'		=> 'shop_search_ajax',
				'type'		=> 'switch',
				'title'		=> __( 'AJAX', 'nm-framework-admin' ),
				'desc'		=> __( '在主商店中搜索时使用 ajax (ajax 允许新内容而不重新加载整个页面).', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'		=> 'shop_search_auto_close',
				'type'		=> 'switch',
				'title'		=> __( '自动关闭', 'nm-framework-admin' ),
				'desc'		=> __( '执行搜索时关闭搜索字段.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'			=> 'shop_search_min_char',
				'type'			=> 'slider',
				'title'			=> __( '最小字符数', 'nm-framework-admin' ),
				'desc'			=> __( '搜索所需的最小字符数.', 'nm-framework-admin' ),
				'default'		=> 2,
				'min'			=> 1,
				'max'			=> 10,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'		=> 'shop_search_by_titles',
				'type'		=> 'switch',
				'title'		=> __( '仅标题', 'nm-framework-admin' ),
				'desc'		=> __( '仅按产品标题搜索.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			)
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> __( '店铺', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-shopping-cart',
		'fields'	=> array(
            array(
				'id'		=> 'shop_content_home',
				'type'		=> 'switch',
				'title'		=> __( '页面内容', 'nm-framework-admin' ),
				'desc'		=> __( '显示默认商店页面上的 "WooCommerce > 设置 > 产品展示".', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array (
				'id' 	=> 'shop_category_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '类别', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'		=> 'shop_content_taxonomy',
				'type'		=> 'select',
				'title'		=> __( '页面内容', 'nm-framework-admin' ),
				'desc'		=> __( '选择要在分类页上显示的内容.', 'nm-framework-admin' ),
				'options'	=> array(
                    '0'                 => '禁用',
                    'taxonomy_header'   => '类别横幅 (静态)',
                    'shop_page'         => '商店页面上的 "WooCommerce > 设置 > 产品展示"'
                ),
				'default'	=> 'shop_page'
			),
            array(
				'id'		=> 'shop_taxonomy_header_text_alignment',
				'type'		=> 'select',
				'title'		=> __( '横幅-文本对齐', 'nm-framework-admin' ),
				'desc'		=> __( '选择横幅文本对齐方式.', 'nm-framework-admin' ),
				'options'	=> array( 'left' => '左', 'center' => '中', 'right' => '右' ),
				'default'	=> 'center',
                'required'	=> array( 'shop_content_taxonomy', '=', 'taxonomy_header' )
			),
            array(
                'id'		=> 'shop_taxonomy_header_text_max_width',
                'type' 		=> 'text',
                'title' 	=> __( '横幅-文本最大宽度', 'nm-framework-admin' ),
                'desc'		=> __( '输入横幅文本的最大宽度.', 'nm-framework-admin' ),
                'validate'	=> 'numeric',
                'default'	=> '',
                'required'	=> array( 'shop_content_taxonomy', '=', 'taxonomy_header' )
            ),
            array(
				'id'			=> 'shop_taxonomy_header_image_height',
				'type'			=> 'slider',
				'title'			=> __( '横幅-图像高度', 'nm-framework-admin' ),
				'desc'			=> __( '类别横幅-图像高度.', 'nm-framework-admin' ),
				'default'		=> 370,
				'min'			=> 1,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text',
                'required'	=> array( 'shop_content_taxonomy', '=', 'taxonomy_header' )
			),
            array(
				'id'			=> 'shop_taxonomy_header_image_height_tablet',
				'type'			=> 'slider',
				'title'			=> __( '横幅-图像高度片', 'nm-framework-admin' ),
				'desc'			=> __( '分类横幅-tablet 屏幕宽度的图像高度.', 'nm-framework-admin' ),
				'default'		=> 370,
				'min'			=> 1,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text',
                'required'	=> array( 'shop_content_taxonomy', '=', 'taxonomy_header' )
			),
            array(
				'id'			=> 'shop_taxonomy_header_image_height_mobile',
				'type'			=> 'slider',
				'title'			=> __( '横幅-图像高度手机', 'nm-framework-admin' ),
				'desc'			=> __( '类别横幅-移动屏幕宽度的图像高度.', 'nm-framework-admin' ),
				'default'		=> 210,
				'min'			=> 1,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text',
                'required'	=> array( 'shop_content_taxonomy', '=', 'taxonomy_header' )
			),
			array(
				'id'		=> 'shop_category_description',
				'type'		=> 'switch',
				'title'		=> __( '描述', 'nm-framework-admin' ),
				'desc'		=> __( '显示类别说明.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用',
                'required'	=> array( 'shop_content_taxonomy', '!=', 'taxonomy_header' )
			),
            array(
                'id'		=> 'shop_default_description',
                'type'		=> 'textarea',
                'title'		=> __( '说明-默认', 'nm-framework-admin' ),
                'desc'		=> __( '输入未选择类别时显示的默认说明.', 'nm-framework-admin' ),
                'rows'      => 4,
                'validate'	=> 'html',
                'required'	=> array( 'shop_category_description', '=', '1' )
            ),
            array(
				'id'		=> 'shop_description_layout',
				'type'		=> 'select',
				'title'		=> __( '描述-布局', 'nm-framework-admin' ),
				'desc'		=> __( '选择店铺描述的布局.', 'nm-framework-admin' ),
				'options'	=> array( 'clean' => 'Clean', 'borders' => 'Borders' ),
				'default'	=> 'clean',
                'required'	=> array( 'shop_category_description', '=', '1' )
			),
			array (
				'id' 	=> 'shop_catalog_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '目录', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'			=> 'shop_columns',
				'type'			=> 'slider',
				'title'			=> __( '目录', 'nm-framework-admin' ),
				'desc'			=> __( '选择要显示的产品列数.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 1,
				'max'			=> 6,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'			=> 'shop_columns_mobile',
				'type'			=> 'slider',
				'title'			=> __( '目录-手机', 'nm-framework-admin' ),
				'desc'			=> __( '选择要在手机屏幕宽度上显示的产品列数.', 'nm-framework-admin' ),
				'default'		=> 1,
				'min'			=> 1,
				'max'			=> 2,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'			=> 'products_per_page',
				'type'			=> 'slider',
				'title'			=> __( '每页产品', 'nm-framework-admin' ),
				'desc'			=> __( '选择商店目录中每页显示的产品数量.', 'nm-framework-admin' ),
				'default'		=> 12,
				'min'			=> 1,
				'max'			=> 48,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array(
				'id'		=> 'product_sale_flash',
				'type'		=> 'select',
				'title'		=> __( '产品销售快讯', 'nm-framework-admin' ),
				'desc'		=> __( '产品销售闪光徽章.', 'nm-framework-admin' ),
				'options'	=> array( '0' => '禁用', 'txt' => '显示销售文本', 'pct' => '显示销售百分比' ),
				'default'	=> 'pct'
			),
			array(
				'id'		=> 'product_image_lazy_loading',
				'type'		=> 'switch',
				'title'		=> __( '图像延迟加载', 'nm-framework-admin' ),
				'desc'		=> __( '在向下滚动页面时延迟加载产品目录图像 (加速加载时间).', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'product_hover_image_global',
				'type'		=> 'switch',
				'title'		=> __( '悬停图像', 'nm-framework-admin' ),
				'desc'		=> __( '当产品处于 "悬停" 时显示库中的次映像.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'product_action_link',
				'type'		=> 'select',
				'title'		=> __( '产品操作链接', 'nm-framework-admin' ),
				'desc'		=> __( '配置产品操作链接 (例如 "显示更多").', 'nm-framework-admin' ),
				'options'	=> array( 'action-link-hide' => 'Show on hover', 'action-link-show' => 'Always show', 'action-link-touch' => 'Always show on touch devices' ),
				'default'	=> 'action-link-hide'
			),
			array(
				'id'		=> 'shop_infinite_load',
				'type'		=> 'select',
				'title'		=> __( '无限加载', 'nm-framework-admin' ),
				'desc'		=> __( '配置 "无限" 产品加载.', 'nm-framework-admin' ),
				'options'	=> array( '0' => '禁用', 'button' => '按钮', 'scroll' => '滚动' ),
				'default'	=> 'button'
			),
            array (
				'id' 	=> 'shop_catalog_auto_scroll_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '目录-自动滚动', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'			=> 'shop_scroll_offset',
				'type'			=> 'slider',
				'title'			=> __( '滚动偏移', 'nm-framework-admin' ),
				'desc'			=> __( '用于偏移商店滚动位置 (例如, 单击类别链接时).', 'nm-framework-admin' ),
				'default'		=> 70,
				'min'			=> 0,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'shop_scroll_offset_tablet',
				'type'			=> 'slider',
				'title'			=> __( '滚动偏移-平板', 'nm-framework-admin' ),
				'desc'			=> __( '用于偏移商店滚动位置 (例如, 单击类别链接时).', 'nm-framework-admin' ),
				'default'		=> 70,
				'min'			=> 0,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'shop_scroll_offset_mobile',
				'type'			=> 'slider',
				'title'			=> __( '滚动偏移-手机', 'nm-framework-admin' ),
				'desc'			=> __( '用于偏移商店滚动位置 (例如, 单击类别链接时).', 'nm-framework-admin' ),
				'default'		=> 70,
				'min'			=> 0,
				'max'			=> 1000,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
			array (
				'id' 	=> 'product_quickview_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '快速查看', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'product_quickview',
				'type'		=> 'switch',
				'title'		=> __( '快速查看', 'nm-framework-admin' ),
				'desc'		=> __( '产品快速查看.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'		=> 'product_quickview_links',
				'type'		=> 'select',
				'title'		=> __( '链接', 'nm-framework-admin' ),
				'desc'		=> __( '选择快速查看链接.', 'nm-framework-admin' ),
				'options'	=> array( 'all' => '所有产品链接', 'detail' => '产品详细信息链接' ),
				'default'	=> 'detail',
				'required'	=> array( 'product_quickview', '=', '1' )
			),
			array(
				'id'		=> 'product_quickview_summary_layout',
				'type'		=> 'select',
				'title'		=> __( '产品概述', 'nm-framework-admin' ),
				'desc'		=> __( '选择快速查看产品摘要版式.', 'nm-framework-admin' ),
				'options'	=> array( 'align-top' => '与顶部对齐 (适用于较短的图像)', 'align-bottom' => '底端对齐' ),
				'default'	=> 'align-bottom',
				'required'	=> array( 'product_quickview', '=', '1' )
			),
			array(
				'id'		=> 'product_quickview_atc',
				'type'		=> 'switch',
				'title'		=> __( '添加到购物车按钮', 'nm-framework-admin' ),
				'desc'		=> __( '显示购物按钮.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用',
				'required'	=> array( 'product_quickview', '=', '1' )
			),
			array(
				'id'		=> 'product_quickview_details_button',
				'type'		=> 'switch',
				'title'		=> __( '详细信息按钮', 'nm-framework-admin' ),
				'desc'		=> __( '显示按钮到完整的产品详细信息.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用',
				'required'	=> array( 'product_quickview', '=', '1' )
			),
			array (
				'id' 	=> 'cart_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '购物车', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'cart_show_item_price',
				'type'		=> 'switch',
				'title'		=> __( '单项价格', 'nm-framework-admin' ),
				'desc'		=> __( '显示购物车中产品的单项价格.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array (
				'id' 	=> 'checkout_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '结账', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'		=> 'checkout_inline_notices',
				'type'		=> 'switch',
				'title'		=> __( '内联验证通知', 'nm-framework-admin' ),
				'desc'		=> __( '显示内嵌验证通告 (在输入字段下面).', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			)
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> __( '单品', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-shopping-cart',
		'fields'	=> array(
			array(
				'id'		=> 'product_navigation_same_term',
				'type'		=> 'switch',
				'title'		=> __( '产品导航-同一类别', 'nm-framework-admin' ),
				'desc'		=> __( '在同一类别中保持产品导航.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'		=> 'product_redirect_scroll',
				'type'		=> 'switch',
				'title'		=> __( '重定向滚动', 'nm-framework-admin' ),
				'desc'		=> __( '在重定向到商店后 (单击 "痕迹导航"、"类别" 或 "标记" 链接后) 滚动到产品.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'		=> 'single_product_sale_flash',
				'type'		=> 'select',
				'title'		=> __( '销售快讯', 'nm-framework-admin' ),
				'desc'		=> __( '产品销售快讯徽章.', 'nm-framework-admin' ),
				'options'	=> array( '0' => '禁用', 'txt' => '显示销售文本', 'pct' => '显示销售百分比' ),
				'default'	=> '0'
			),
            array (
				'id' 	=> 'product_image_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '画廊', 'nm-framework-admin' ) . '</h3>',
			),
			array(
				'id'			=> 'product_image_column_size',
				'type'			=> 'slider',
				'title'			=> __( '列大小', 'nm-framework-admin' ),
				'desc'			=> __( '选择 "库" 列的大小-跨度.', 'nm-framework-admin' ),
				'default'		=> 7,
				'min'			=> 3,
				'max'			=> 7,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'		=> 'product_thumbnails_layout',
				'type'		=> 'select',
				'title'		=> __( '缩略图版式', 'nm-framework-admin' ),
				'desc'		=> __( '选择画廊缩略图布局.', 'nm-framework-admin' ),
				'options'	=> array( 'horizontal' => '水平', 'vertical' => '垂直' ),
				'default'	=> 'vertical'
			),
			array(
				'id'		=> 'product_image_zoom',
				'type'		=> 'switch',
				'title'		=> __( '灯箱', 'nm-framework-admin' ),
				'desc'		=> __( '查看全尺寸图像的灯箱库.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'product_image_hover_zoom',
				'type'		=> 'switch',
				'title'		=> __( '缩放', 'nm-framework-admin' ),
				'desc'		=> __( '鼠标图像缩放和平移.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'			=> 'product_image_max_size',
				'type'			=> 'slider',
				'title'			=> __( '最大宽度-平板/移动', 'nm-framework-admin' ),
				'desc'			=> __( '选择图片库的最大宽度 (以像素为单位), 以缩小屏幕大小.', 'nm-framework-admin' ),
				'default'		=> 500,
				'min'			=> 100,
				'max'			=> 1220,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'		=> 'product_image_pagination',
				'type'		=> 'switch',
				'title'		=> __( '分页-平板/移动', 'nm-framework-admin' ),
				'desc'		=> __( '在较小的屏幕大小上显示分页.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array (
				'id' 	=> 'product_details_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '详细', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'		=> 'product_custom_select',
				'type'		=> 'switch',
				'title'		=> __( '变体-自定义下拉列表', 'nm-framework-admin' ),
				'desc'		=> __( '显示自定义下拉菜单-产品变体.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'		=> 'product_select_hide_labels',
				'type'		=> 'switch',
				'title'		=> __( '变体-隐藏下拉标签', 'nm-framework-admin' ),
				'desc'		=> __( '隐藏产品标签-变体下拉列表.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            /*array(
				'id'		=> 'grouped_products_qty_arrows',
				'type'		=> 'select',
				'title'		=> __( 'Grouped - Quantity Arrows', 'nm-framework-admin' ),
				'desc'		=> __( 'Select quantity arrows layout for grouped-products.', 'nm-framework-admin' ),
				'options'	=> array( 'qty-hide' => 'Disable', 'qty-show' => 'Show', 'qty-show qty-hover-show' => 'Show on Hover' ),
				'default'	=> 'qty-hide'
			),*/
            array(
				'id'		=> 'grouped_products_qty_arrows',
				'type'		=> 'switch',
				'title'		=> __( '分组数量箭头', 'nm-framework-admin' ),
				'desc'		=> __( '显示分组产品的数量箭头.', 'nm-framework-admin' ),
				'default'	=> 0,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
			array(
				'id'		=> 'product_description_layout',
				'type'		=> 'select',
				'title'		=> __( '描述布局', 'nm-framework-admin' ),
				'desc'		=> __( '选择产品描述的版式.', 'nm-framework-admin' ),
				'options'	=> array( 'boxed' => '盒装', 'full' => '全宽' ),
				'default'	=> 'boxed'
			),
			array(
				'id'		=> 'product_reviews',
				'type'		=> 'switch',
				'title'		=> __( '点评', 'nm-framework-admin' ),
				'desc'		=> __( '显示产品评论选项卡.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array(
				'id'		=> 'product_share_buttons',
				'type'		=> 'switch',
				'title'		=> __( '共享按钮', 'nm-framework-admin' ),
				'desc'		=> __( '显示社交共享按钮.', 'nm-framework-admin' ),
				'default'	=> 1,
				'on'		=> '启用',
				'off'		=> '禁用'
			),
            array (
				'id' 	=> 'product_upsell_related_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . __( '销售 &amp; 相关产品', 'nm-framework-admin' ) . '</h3>',
			),
            array(
				'id'			=> 'product_upsell_related_columns',
				'type'			=> 'slider',
				'title'			=> __( '列', 'nm-framework-admin' ),
				'desc'			=> __( '选择要显示的向上销售/相关产品列数.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 1,
				'max'			=> 6,
				'step'			=> 1,
				'display_value'	=> 'text'
			),
            array(
				'id'			=> 'product_upsell_related_per_page',
				'type'			=> 'slider',
				'title'			=> __( '每页产品', 'nm-framework-admin' ),
				'desc'			=> __( '选择要显示的向上销售/相关产品的数量.', 'nm-framework-admin' ),
				'default'		=> 4,
				'min'			=> 1,
				'max'			=> 48,
				'step'			=> 1,
				'display_value'	=> 'text'
			)
		)
	) );

    Redux::setSection( $opt_name, array(
		'title'		=> __( '我的帐户', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-shopping-cart',
		'fields'	=> array(
			array(
                'id'		=> 'myaccount_profile_image',
                'type'		=> 'switch',
                'title'		=> __( '配置文件图像', 'nm-framework-admin' ),
                'desc'		=> '显示 <a href="http://en.gravatar.com/" target="_blank">gravatar</a> 配置文件图像.',
                'default'	=> 0,
                'on'		=> '启用',
                'off'		=> '禁用'
            ),
            array(
				'id' 		=> 'myaccount_dashboard_text',
				'type' 		=> 'editor',
				'title' 	=> __( '仪表板文本', 'nm-framework-admin' ),
				'desc' 		=> __( '输入要在仪表板页上显示的文本.', 'nm-framework-admin' ),
				'default'	=> '',
				'args'		=> array(
					'wpautop'	=> false,
					'teeny' 	=> true
				)
			)
		)
	) );

    if ( defined( 'NM_WISHLIST_DIR' ) ) {
        Redux::setSection( $opt_name, array(
            'title'		=> __( '收藏', 'nm-framework-admin' ),
            'icon'		=> 'el-icon-heart',
            'fields'	=> array(
                array(
                    'id'		=> 'wishlist_show_variations',
                    'type'		=> 'switch',
                    'title'		=> __( '显示变化', 'nm-framework-admin' ),
                    'desc'		=> __( '在 "收藏" 中显示产品的可用变化.', 'nm-framework-admin' ),
                    'default'	=> 0,
                    'on'		=> '启用',
                    'off'		=> '禁用'
                ),
                array(
                    'id'		=> 'wishlist_share',
                    'type'		=> 'switch',
                    'title'		=> __( '共享链接', 'nm-framework-admin' ),
                    'desc'		=> __( '显示社交共享链接.', 'nm-framework-admin' ),
                    'default'	=> 0,
                    'on'		=> '启用',
                    'off'		=> '禁用'
                ),
                array(
                    'id'	=> 'wishlist_page_id',
                    'type'	=> 'select',
                    'title'	=> __( '收藏页', 'nm-framework-admin' ),
                    'desc'	=> __( '选择 "收藏" 页 (用于创建共享链接).', 'nm-framework-admin' ),
                    'data'	=> 'pages',
                    'required'	=> array( 'wishlist_share', '=', '1' )
                ),
                array(
                    'id'		=> 'wishlist_share_title',
                    'type'		=> 'text',
                    'title'		=> __( '共享标题', 'nm-framework-admin' ),
                    'desc'		=> __( '为社会共享链接输入标题.', 'nm-framework-admin' ),
                    'default'	=> 'My Wishlist',
                    'validate'	=> 'no_html',
                    'required'	=> array( 'wishlist_share', '=', '1' )
                ),
                array(
                    'id'		=> 'wishlist_share_text',
                    'type'		=> 'textarea',
                    'title'		=> __( '共享文本', 'nm-framework-admin' ),
                    'desc'		=> __( '输入社会共享链接的描述。输入 <strong>%wishlist_url% </strong> 以显示 "收藏" url.', 'nm-framework-admin' ),
                    'rows'      => 4,
                    'validate'	=> 'no_html',
                    'required'	=> array( 'wishlist_share', '=', '1' )
                ),
                array(
                    'id'		=> 'wishlist_share_image_url',
                    'type'		=> 'text',
                    'title'		=> __( 'Share Image URL', 'nm-framework-admin' ),
                    'desc'		=> __( 'Enter a image-URL for the social share links.', 'nm-framework-admin' ),
                    'validate'	=> 'url',
                    'required'	=> array( 'wishlist_share', '=', '1' )
                )
            )
        ) );
    }

	if ( defined( 'NM_PORTFOLIO_VERSION' ) ) {
        Redux::setSection( $opt_name, array(
            'title'		=> __( '组合', 'nm-framework-admin' ),
            'icon'		=> 'el-icon-website',
            'fields'	=> array(
                array(
                    'id'        => 'portfolio_page_layout',
                    'type'      => 'select',
                    'title'     => __( '页面布局', 'nm-framework-admin' ),
                    'desc'      => __( '选择项目组合页面布局.', 'nm-framework-admin' ),
                    'options'	=> array(
                        'full'          => '充分',
                        'full-nopad'    => '充分 (无填充)',
                        'boxed'         => '盒装'
                    ),
                    'default'   => 'boxed'
                ),
                array(
                    'id'		=> 'portfolio_categories',
                    'type'		=> 'switch',
                    'title'		=> __( '类别', 'nm-framework-admin' ),
                    'desc'		=> __( '显示类别菜单.', 'nm-framework-admin' ),
                    'default'	=> 1,
                    'on'		=> '启用',
                    'off'		=> '禁用'
                ),
                array(
                    'id'        => 'portfolio_categories_alignment',
                    'type'      => 'select',
                    'title'     => __( '分类-对齐', 'nm-framework-admin' ),
                    'desc'      => __( '选择类别菜单对齐.', 'nm-framework-admin' ),
                    'options'	=> array(
                        'left'      => '左',
                        'center'    => '中',
				        'right'     => '右'
                    ),
                    'default'	=> 'left',
                    'required'	=> array( 'portfolio_categories', '=', '1' )
                ),
                array(
                    'id'		=> 'portfolio_categories_js',
                    'type'		=> 'switch',
                    'title'		=> __( '类别-动画排序', 'nm-framework-admin' ),
                    'desc'		=> __( '动画类别排序.', 'nm-framework-admin' ),
                    'default'	=> 1,
                    'on'		=> '启用',
                    'off'		=> '禁用',
                    'required'	=> array( 'portfolio_categories', '=', '1' )
                ),
                array(
                    'id'	    => 'portfolio_layout',
                    'type'	    => 'select',
                    'title'	    => __( '布局', 'nm-framework-admin' ),
                    'desc'	    => __( '选择项目组合布局.', 'nm-framework-admin' ),
                    'options'   => array(
                        'standard'  => '标准',
                        'overlay'   => '覆盖'
                    ),
                    'default'   => 'standard'
                ),
                array(
                    'id'		=> 'portfolio_packery',
                    'type'		=> 'switch',
                    'title'		=> __( 'Packery 网格', 'nm-framework-admin' ),
                    'desc'		=> __( '启用 "Packery" 网格布局.', 'nm-framework-admin' ),
                    'default'	=> 1,
                    'on'		=> '启用',
                    'off'		=> '禁用'
                ),
                array(
                    'id'		=> 'portfolio_items',
                    'type' 		=> 'text',
                    'title' 	=> __( '项目', 'nm-framework-admin' ),
                    'desc'		=> __( '要显示的项目数 (保留为无限制的空白).', 'nm-framework-admin' ),
                    'validate'	=> 'numeric',
                    'default'	=> ''
                ),
                array(
                    'id'        => 'portfolio_columns',
                    'type'      => 'select',
                    'title'     => __( '每行的项目数', 'nm-framework-admin' ),
                    'desc'      => __( '选择每行的项目数.', 'nm-framework-admin' ),
                    'options'	=> array(
                        '1' => '1',
                        '2' => '2',
                        '3'	=> '3',
                        '4'	=> '4'
                    ),
                    'default'   => '2'
                ),
                /*array(
                    'id'		=> 'portfolio_category',
                    'type' 		=> 'text',
                    'title' 	=> __( "Category (optional)", 'nm-framework-admin' ),
                    'desc'		=> __( "Enter slug-name for portfolio category to display.", 'nm-framework-admin' ),
                    'validate'	=> 'no_special_chars',
                    'default'	=> ''
                ),
                array(
                    'id'		=> 'portfolio_ids',
                    'type' 		=> 'text',
                    'title' 	=> __( "Item ID's (optional)", 'nm-framework-admin' ),
                    'desc'		=> __( "Enter comma separated ID's of portfolio items to display.", 'nm-framework-admin' ),
                    'validate'	=> 'comma_numeric',
                    'default'	=> ''
                ),*/
                array(
                    'id'        => 'portfolio_order_by',
                    'type'      => 'select',
                    'title'     => __( '订单', 'nm-framework-admin' ),
                    'desc'      => __( '订单组合项目.', 'nm-framework-admin' ),
                    'options'	=> array(
                        'date'  => '日期',
                        'title' => '标题',
                        'rand'  => '随机'
                    ),
                    'default'   => 'date'
                ),
                array(
                    'id'	    => 'portfolio_order',
                    'type'	    => 'select',
                    'title'	    => __( '订单', 'nm-framework-admin' ),
                    'desc'	    => __( '投资组合项目订单.', 'nm-framework-admin' ),
                    'options'   => array(
                        'desc'  => '降序',
                        'asc'   => '升序'
                    ),
                    'default'   => 'desc'
                ),
                array (
                    'id' 	=> 'portfolio_permalinks_info',
                    'icon'	=> true,
                    'type'	=> 'info',
                    'raw'	=> '<h3 style="margin: 0;">' . __( '固定链接', 'nm-framework-admin' ) . '</h3>',
                ),
                array(
                    'id'		=> 'portfolio_permalink',
                    'type'		=> 'text',
                    'title'		=> __( '固定连接', 'nm-framework-admin' ),
                    //'desc'		=> __( 'Enter base parmalink name for the portfolio.', 'nm-framework-admin' ),
                    'desc'		=> sprintf( '%s <br><strong>%s</strong>',
                        __( '输入投资组合的基本固定连接名称.', 'nm-framework-admin' ),
                        __( '重新保存 "设置 > 固定连接" 更改后的页面.</strong>', 'nm-framework-admin' )
                    ),
                    'default'	=> 'portfolio',
                    'validate'	=> 'unique_slug'
                    //'flush_permalinks' => true // NM: Doesn't seem to work: https://docs.reduxframework.com/core/the-basics/validation/
                ),
                array(
                    'id'		=> 'portfolio_category_permalink',
                    'type'		=> 'text',
                    'title'		=> __( '类别固定链接', 'nm-framework-admin' ),
                    //'desc'		=> __( 'Enter base parmalink name for portfolio-categories.', 'nm-framework-admin' ),
                    'desc'		=> sprintf( '%s <br><strong>%s</strong>',
                        __( '输入投资组合的基本固定连接名称-类别.', 'nm-framework-admin' ),
                        __( '重新保存 "设置 > 固定连接" 更改后的页面.', 'nm-framework-admin' )
                    ),
                    'default'	=> 'portfolio-category',
                    'validate'	=> 'unique_slug'
                    //'flush_permalinks' => true // NM: Doesn't seem to work: https://docs.reduxframework.com/core/the-basics/validation/
                )
            )
        ) );
    }

	Redux::setSection( $opt_name, array(
        'title'		=> __( '社交档案', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-share-alt',
        'fields'    => array(
            array(
                'id'        => 'social_profiles',
                'type'      => 'sortable',
                'title'     => __( 'Enter your social profile URLs', 'nm-framework-admin' ),
                //'label'     => true,
                'desc'      => __( '拖放以更改您的社交档案的顺序.', 'nm-framework-admin' ),
                'mode'      => 'text',
                'options'   => array(
                    'facebook'      => 'Facebook profile URL',
                    'instagram'     => 'Instagram profile URL',
                    'twitter'       => 'Twitter profile URL',
                    'googleplus'    => 'Google+ profile URL',
                    'flickr'        => 'Flickr profile URL',
                    'linkedin'      => 'LinkedIn profile URL',
                    'pinterest'     => 'Pinterest profile URL',
                    'rss'           => 'RSS feed URL',
                    'snapchat'      => 'Snapchat profile URL',
                    'behance'       => 'Behance profile URL',
                    'dribbble'      => 'Dribbble profile URL',
                    'soundcloud'    => 'SoundCloud profile URL',
                    'tumblr'        => 'Tumblr profile URL',
                    'vimeo'         => 'Vimeo profile URL',
                    'vk'            => 'VK profile URL',
                    'weibo'         => 'Weibo profile URL',
                    'youtube'       => 'YouTube profile URL'
                )
            )
        )
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> __( '自定义代码', 'nm-framework-admin' ),
		'icon'		=> 'el-icon-lines',
		'fields'	=> array(
			array(
				'id'		=> 'custom_css',
				'type'		=> 'ace_editor',
				'title'		=> __( 'CSS', 'nm-framework-admin' ),
				'desc'		=> __( "将自定义 css 添加到站点的头/顶部.", 'nm-framework-admin' ),
				'mode'		=> 'css',
				'theme'		=> 'chrome',
				'default'	=> ''
			),
			array(
				'id'		=> 'custom_js',
				'type'		=> 'ace_editor',
				'title'		=> __( 'JavaScript', 'nm-framework-admin' ),
				'desc'		=> __( "Add custom JavaScript to the footer/bottom of your theme.", 'nm-framework-admin' ),
				'mode'		=> 'javascript',
				'theme'		=> 'chrome',
				'default'	=> ''
			)
		)
	) );

    /*
     * <--- END SECTIONS
     */
