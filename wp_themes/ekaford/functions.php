<?php
//==================================================
// Для разработки. На боевом сервере удалить или
// закомментировать этот блок!
//==================================================

/**
 * Убирает ошибку на локальном сервере «Не удалось установить защищённое соединение с WordPress.org»
 */

function increase_timeout_for_api_requests_27091( $r, $url ) {
  if ( false !== strpos( $url, '//api.wordpress.org/' ) ) {
    $r['timeout'] = 30;
  }
  return $r;
}

add_filter( 'http_request_args', 'increase_timeout_for_api_requests_27091', 10, 2 );



//==================================================
// Основные функции WordPress
//==================================================

/**
 * Подключение скриптов и стилей
 */

function my_theme_enqueue_scripts_and_styles() {
    //== При разработке/изменении стилей, автоматически меняем версию *.css файла, чтобы у юзверей было видно изменения
    $cache_buster = 1; // 1-включена генерация версии, 0-отключена
    $css_modif_time = filemtime( get_stylesheet_directory() . '/css/style.min.css' );
    if ( $cache_buster != 0 ) {
      $css_version = $css_modif_time;
    } else {
      $css_version = null;
    }


    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/style.min.css', array(), $css_version, 'all' );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true );
    wp_enqueue_style( 'swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css', array('main'), null, 'all' );
    wp_enqueue_script( 'swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js', array('main'), null, true );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts_and_styles' );


/**
 * Поддержка изображений для постов
 */

add_theme_support( 'post-thumbnails' );


//== Разные размеры изображений

add_image_size( 'shop-item', 150, 150, true );
add_image_size( 'woo-cat-in-slider', 255, 115, true );


//== Добавление собственного размера изображения в загрузчик медиафайлов

// function my_image_size_blog_content_gallery($sizes) {
//   $addsizes = array(
//     "blog-content-gallery" => 'Для галереи блога'
//   );
//   $newsizes = array_merge($sizes, $addsizes);
//   return $newsizes;
// }

// add_filter('image_size_names_choose', 'my_image_size_blog_content_gallery');


/**
 * Поддержка меню
 */

add_theme_support('menus');


//== Регистрация меню

register_nav_menus(
  array(
    'side_top_menu'    => 'Главное меню сверху',
    'side_bottom_menu' => 'Меню снизу',
    'slider_menu' => 'Меню слайдер'
  )
);


//== Подключение своих классов Волкер меню

load_template( dirname( __FILE__ ) . '/template-parts/class-walker-nav-menu-for-index-slider-menu-woocommerce-menu.php' );


/**
 * Вычисление уровня дочернего элемента
 */

// function category_has_children() {

//   global $wpdb;

//   $term = get_queried_object();
//   $category_children_check = $wpdb->get_results(" SELECT * FROM wp_term_taxonomy WHERE parent = '$term->term_id' ");

//   if ( $category_children_check ) {
//     return true;
//   } else {
//     return false;
//   }
// }


/**
 * Сокращает цитату на определённое количество слов
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */

// function my_custom_excerpt_length( $length ) {
//     return 6;
// }

// add_filter( 'excerpt_length', 'my_custom_excerpt_length', 999 );


/**
 * Добавляет в конце цитаты "Читать далее"
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */

// function my_excerpt_more( $more ) {
//     return '…';
// }

// add_filter( 'excerpt_more', 'my_excerpt_more' );


/**
 * Добавляем контент "по-умолчанию" для вновь созданных постов
 */

function my_default_editor_content( $content ) {
  $content = "Страница в разработке.";
  return $content;
}

add_filter( 'default_content', 'my_default_editor_content' );



//==================================================
// Дополнительные функции Wordpress
//==================================================


/**
 * Отключаем создание миниатюр файлов для указанных размеров
 */

function delete_intermediate_image_sizes( $sizes ){
  return array_diff( $sizes, array(
    'medium',
    'medium_large',
    'large'
  ) );
}

add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );


/**
 * Сообщения об ошибках при попытке авторизации
 * пользователя на сайте
 */

function my_change_default_login_errors(){
  return '<strong>ОШИБКА</strong>: Вы ошиблись при вводе логина или пароля.';
}

add_filter( 'login_errors', 'my_change_default_login_errors' );


/**
 * Защита от вредоносных URL-запросов
 */

if (strpos($_SERVER['REQUEST_URI'], "eval(") || strpos($_SERVER['REQUEST_URI'], "CONCAT") || strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") || strpos($_SERVER['REQUEST_URI'], "base64")) {
  @header("HTTP/1.1 400 Bad Request");
  @header("Status: 400 Bad Request");
  @header("Connection: Close");
  @exit;
}


/**
 * Запрет пингбэков и трэкбэков на самого себя
 */

function my_disable_self_ping( &$links ) {
  foreach ( $links as $l => $link )
    if ( 0 === strpos( $link, get_option( 'home' ) ) )
      unset($links[$l]);
}

add_action( 'pre_ping', 'my_disable_self_ping' );


/**
 * Скрываем версию WordPress
 */

function my_remove_wp_version_wp_head_feed() {
  return '';
}

add_filter('the_generator', 'my_remove_wp_version_wp_head_feed');


/**
 * Ставим ссылку на себя в футере в админке
 */

function my_change_admin_footer () {
  $footer_text = array(
    'Спасибо вам за творчество с <a href="http://wordpress.org">WordPress</a>',
    'Дизайн, разработка и продвижение <a href="http://gltrend.ru" target="_blank">«Global Trend»</a>'
  );
  return implode( ' &bull; ', $footer_text);
}

add_filter('admin_footer_text', 'my_change_admin_footer');


/**
 * Убираем весь мусор из хэдера
 */

add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на RSS категорий
remove_action('wp_head','feed_links', 2); // минус ссылки на основной RSS и комментарии
remove_action('wp_head','rsd_link');  // удаляет RSD ссылку для удаленной публикации
remove_action('wp_head','wlwmanifest_link'); // удаляет ссылку Windows для Live Writer
remove_action('wp_head','wp_generator');  // удаляет версию WordPress
remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','index_rel_link');
remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10, 0 ); // удаляет ссылки на предыдущую и следующую статьи
remove_action('wp_head','wp_shortlink_wp_head', 10, 0 ); // удаляет короткую ссылку

// Отключаем type="application/json+oembed"
remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );


/**
 * Избавляемся от REST API
 */

// Отключаем сам REST API
 add_filter('rest_enabled', '__return_false');

// Отключаем события REST API
 remove_action( 'init', 'rest_api_init' );
 remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
 remove_action( 'parse_request', 'rest_api_loaded' );

// Отключаем Embeds связанные с REST API
 remove_action( 'rest_api_init', 'wp_oembed_register_route' );
 remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

// Отключаем фильтры REST API
 remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
 remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
 remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
 remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
 remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
 remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
 remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
 remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
 remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );



//==================================================
// Настройки Woocommerce
//==================================================


/**
* This code should be added to functions.php of your theme
**/
add_filter('woocommerce_grouped_price_html', 'custom_grouped_price', 10, 2);

function custom_grouped_price( $price, $product ) {
$price = '';

// if ( !$product->min_grouped_price || $product->min_grouped_price !== $product->max_grouped_price ) $price .= '<p>' . _x('From', 'min_price', 'woocommerce') . ' </p>';
$price .= woocommerce_price($product->get_price());
if ( $product->max_grouped_price && $product->max_grouped_price !== $product->min_grouped_price ) {
// $price .= '<p> ' . _x('to', 'max_price', 'woocommerce') . ' </p>';

$price .= woocommerce_price($product->max_grouped_price);
}

return $price;
}


/**
 * Включаем поддержку woocommerce нашей темой
 */

function woocommerce_support() {
  add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'woocommerce_support' );


/**
 * Убираем "жёлтый" счётчик товаров у категорий
 */

function my_remove_category_products_count() {
  return;
}

add_filter( 'woocommerce_subcategory_count_html', 'my_remove_category_products_count' );


/**
 * Добавляем кнопки +/- к полю выбора количества на странице товара
 */

// function wcqi_enqueue_polyfill() {
//     wp_enqueue_script( 'wcqi-number-polyfill' );
// }

// add_action( 'wp_enqueue_scripts', 'wcqi_enqueue_polyfill' );


remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 9 );

 ?>