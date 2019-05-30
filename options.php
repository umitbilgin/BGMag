<?php

function optionsframework_option_name()
{
    // Change this to use your theme slug
    return 'options-framework-theme';
}

function optionsframework_options()
{
    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    foreach ($options_categories_obj as $category)
    {
        $options_categories[$category
            ->cat_ID] = $category->cat_name;
    }

    // Pull all tags into an array
    $options_tags = array();
    $options_tags_obj = get_tags();
    foreach ($options_tags_obj as $tag)
    {
        $options_tags[$tag
            ->term_id] = $tag->name;
    }

    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page)
    {
        $options_pages[$page
            ->ID] = $page->post_title;
    }

    // If using image radio buttons, define a directory path
    $imagepath = get_template_directory_uri() . '/images/';
	$shortname = "bgm";
    $options = array();

    $options[] = array(
        'name' => 'Genel Ayarlar',
        'type' => 'heading'
    );

    $options[] = array(
        'name' => 'Logo',
        'desc' => 'Sitenizde kullanmak istediğiniz logoyu yükleyin.',
        'theme-textdomain',
        'id' => $shortname . '_logo',
        'std' => '',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => 'Favicon',
        'desc' => 'Kullanmak istediğiniz faviconu yükleyin.',
        'id' => $shortname . '_favicon',
        'std' => '',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => 'Meta Description',
        'desc' => 'Site açıklamasını girin. SEO için önemlidir.',
        'id' => $shortname . '_ds',
        'std' => '',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => 'Ana Sayfa Ayarları',
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __('Mag1 Adı','theme-textdomain'),
        'desc' => 'Default olarak Teknoloji yazan bölümün adı.',
        'id' => $shortname . '_mag1adi',
        'std' => 'Teknoloji',
        'type' => 'text'
    );

    $options[] = array(
        'name' => 'Mag1 Icon',
        'desc' => 'Mag1 alanındaki bölümde görünmesini istediğiniz iconun kodunu girin. (fontawesome)',
        'id' => $shortname . '_mag1icon',
        'std' => '<i class="fa fa-laptop" aria-hidden="true"></i>',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => 'Mag1 ID',
        'desc' => 'Mag1 alanında görünmesini istediğiniz yazıların kategorisini seçin.',
        'id' => $shortname . '_mag1id',
        'std' => '0',
        'type' => 'select',
        'options' => $options_categories
    );

    $options[] = array(
        'name' => 'Mag2 Adı (Sol)',
        'desc' => 'Default olarak Android yazan bölümün adı.',
        'id' => $shortname . '_mag2sadi',
        'std' => 'Android',
        'type' => 'text'
    );

    $options[] = array(
        'name' => 'Mag2 Icon (Sol)',
        'desc' => 'Mag2 alanındaki bölümde görünmesini istediğiniz iconun kodunu girin. (fontawesome)',
        'id' => $shortname . '_mag2sicon',
        'std' => '<i class="fa fa-android" aria-hidden="true"></i>',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => 'Mag2 ID (Sol)',
        'desc' => 'Mag2 alanında görünmesini istediğiniz yazıların kategorisini seçin.',
        'id' => $shortname . '_mag2sid',
        'std' => '0',
        'type' => 'select',
        'options' => $options_categories
    );

    $options[] = array(
        'name' => 'Mag2 Adı (Sağ)',
        'desc' => 'Default olarak iOS yazan bölümün adı.',
        'id' => $shortname . '_mag2saadi',
        'std' => 'iOS',
        'type' => 'text'
    );

    $options[] = array(
        'name' => 'Mag2 Icon (Sağ)',
        'desc' => 'Mag2 alanındaki bölümde görünmesini istediğiniz iconun kodunu girin. (fontawesome)',
        'id' => $shortname . '_mag2saicon',
        'std' => '<i class="fa fa-apple" aria-hidden="true"></i>',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => 'Mag2 ID (Sağ)',
        'desc' => 'Mag2 alanında görünmesini istediğiniz yazıların kategorisin seçin.',
        'id' => $shortname . '_mag2said',
        'std' => '0',
        'type' => 'select',
        'options' => $options_categories
    );

    $options[] = array(
        'name' => 'Sosyal Medya Ayarları',
        'type' => 'heading'
    );

    $options[] = array(
        'name' => 'Facebook URL',
        'desc' => 'Linki girin.',
        'id' => $shortname . '_facebook',
        'std' => '',
        'type' => 'text'
    );
    $options[] = array(
        'name' => 'Twitter URL',
        'desc' => 'Linki girin.',
        'id' => $shortname . '_twitter',
        'std' => '',
        'type' => 'text'
    );
    $options[] = array(
        'name' => 'Google Plus URL',
        'desc' => 'Linki girin.',
        'id' => $shortname . '_google',
        'std' => '',
        'type' => 'text'
    );
    $options[] = array(
        'name' => 'Instagram URL',
        'desc' => 'Linki girin.',
        'id' => $shortname . '_instagram',
        'std' => '',
        'type' => 'text'
    );
    $options[] = array(
        'name' => 'Youtube URL',
        'desc' => 'Linki girin.',
        'id' => $shortname . '_youtube',
        'std' => '',
        'type' => 'text'
    );
    $options[] = array(
        'name' => 'Skype URL',
        'desc' => 'Linki girin.',
        'id' => $shortname . '_skype',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => 'Reklam Alanları',
        'type' => 'heading'
    );
	
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);
	
    $options[] = array(
        'name' => 'Header Reklam 728x90',
        'desc' => 'Reklam kodunu girin. <b>(EDİTÖRDEKİ METİN KISMINA)</b>',
        'id' => $shortname . '_hr728x90',
        'std' => '',
        'type' => 'editor',
		'settings' => $wp_editor_settings
    );
    $options[] = array(
        'name' => 'Yazı İçi Reklam',
        'desc' => 'Reklam kodunu girin. <b>(EDİTÖRDEKİ METİN KISMINA)</b>',
        'id' => $shortname . '_yazicireklam',
        'std' => '',
        'type' => 'editor',
		'settings' => $wp_editor_settings
    );
    $options[] = array(
        'name' => 'Yazı Altı Reklam',
        'desc' => 'Reklam kodunu girin. <b>(EDİTÖRDEKİ METİN KISMINA)</b>',
        'id' => $shortname . '_yareklam',
        'std' => '',
        'type' => 'editor',
		'settings' => $wp_editor_settings
    );
    $options[] = array(
        'name' => 'Footer Ayarları',
        'type' => 'heading'
    );
    $options[] = array(
        'name' => 'Footer Yazı',
        'desc' => 'Footer da çıkacak yazıyı girin.',
        'id' => $shortname . '_footer',
        'std' => '',
        'type' => 'text'
    );

    return $options;
}

