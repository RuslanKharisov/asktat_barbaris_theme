<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
  <nav class="bg-white border-primary-200 px-4 lg:px-6 py-5">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center">
        <?php
        $logo_id = carbon_get_theme_option('crb_logo');
        if ($logo_id):
          $logo_url = wp_get_attachment_image_url($logo_id, 'full');
        ?>
        <img src="<?php echo esc_url($logo_url); ?>" class="mr-3 h-6 sm:h-9" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" />
        <?php endif; ?>
        <span class="self-center text-xl font-semibold whitespace-nowrap">
          <?php echo esc_html(get_bloginfo('name')); ?>
        </span>
      </a>

      <div class="flex items-center lg:order-1">
        <button id="burger" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-primary-500 rounded-lg lg:hidden hover:bg-primary-100 focus:outline-none focus:ring-2 focus:ring-primary-200" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6 burger-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          </svg>
          <svg class="w-6 h-6 close-icon hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>

      <div id="mobile-menu" class="hidden lg:justify-between items-center w-full lg:flex lg:w-auto lg:order-2">
        <?php
        $menu_name = 'header-menu';
        $locations = get_nav_menu_locations();
        
        if (isset($locations[$menu_name])) {
          $menu = wp_get_nav_menu_object($locations[$menu_name]);
          $menu_items = wp_get_nav_menu_items($menu->term_id);
          
          if ($menu_items) {
            echo '<ul class="navbar flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0 lg:me-5">';
            foreach ($menu_items as $menu_item) {
              $title = $menu_item->title;
              $url = $menu_item->url;
              $active_class = (get_permalink() === $url) ? 'text-primary-500' : 'lg:text-primary-700';
              
              echo '<li>';
              echo '<a href="' . esc_url($url) . '" class="block py-2 pr-4 pl-3 rounded lg:bg-transparent ' . $active_class . ' lg:p-0 duration-500">' . esc_html($title) . '</a>';
              echo '</li>';
            }
            echo '</ul>';
          }
        }
        ?>
      <?php include get_template_directory() . '/template-parts/whatsapp-link.php'; ?>
      </div>
    </div>
  </nav>
</header>