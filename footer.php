<footer class="p-4 bg-white sm:p-6">
  <div class="mx-auto max-w-screen-xl">
    
      <div class="grid gap-8 sm:gap-6 md:grid-cols-4 ">
        <div class="mb-6 md:mb-0 w-fit">
          <a href="<?php echo esc_url(
            home_url('/')
          ); ?>" class="flex flex-wrap items-center">
            <?php
            $logo_id = carbon_get_theme_option('crb_logo');
            if ($logo_id):
              $logo_url = $image_url = wp_get_attachment_image_url(
                $logo_id,
                'full'
              ); ?>
            <img src="<?php echo esc_url($logo_url); ?>" class="mr-3 h-6 sm:h-9"
              alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" />
            <?php
            endif;
            ?>
            <p class="self-center text-xl font-semibold whitespace-nowrap "><?php echo esc_html(
              get_bloginfo('name')
            ); ?></p>
          </a>
        </div>

        <div>
          <h2 class="mb-6 text-sm font-semibold text-primary-900 uppercase">
            Навигация
          </h2>
          <?php
          $menu_name = 'header-menu'; // Имя или ID меню
          $locations = get_nav_menu_locations();

          if (isset($locations[$menu_name])) {
            $menu = wp_get_nav_menu_object($locations[$menu_name]);
            $menu_items = wp_get_nav_menu_items($menu->term_id);

            if ($menu_items) {
              echo '<ul
                  class="text-primary-600"
                >';

              foreach ($menu_items as $menu_item) {
                $title = $menu_item->title;
                $url = $menu_item->url;

                echo '<li class="mb-4">';
                echo '<a
                    href="' .
                  esc_url($url) .
                  '"
                    class="block lg:bg-transparent lg:text-primary-700 lg:p-0 duration-500"
                    aria-current="page"
                    >' .
                  esc_html($title) .
                  '</a>';
                echo '</li>';
              }
              echo '</ul>';
            }
          }
          ?>

        </div>

        <div>
          <h2 class="mb-6 text-sm font-semibold text-primary-900 uppercase">
            Контакты
          </h2>
          <?php
          // Получаем значения полей
          $address = carbon_get_theme_option('crb_adress');
          $phone = carbon_get_theme_option('crb_phone');
          $email = carbon_get_theme_option('crb_email');
          $avito_link = carbon_get_theme_option('crb_avito');
          ?>
        
          <ul class="text-primary-600">
        
            <?php if ($address): ?>
            <li class="mb-4 flex ">
              <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path
                    d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                  <path
                    d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                </svg>
              </span>
              <?php echo esc_html($address); ?>
            </li>
            <?php endif; ?>
        
            <?php if ($phone): ?>
            <li class="mb-4 flex ">
              <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                    clip-rule="evenodd" />
                </svg>
              </span>
              <a href="tel:<?php echo esc_html($phone); ?>"><?php echo esc_html($phone); ?></a>
              
            </li>
            <?php endif; ?>
        
            <?php if ($email): ?>
            <li class="mb-4 flex ">
              <span class="me-3 [&>svg]:h-5 [&>svg]:w-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                  <path
                    d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                </svg>
              </span>
              <a href="mailto:<?php echo esc_html($email); ?>"><?php echo esc_html($email); ?></a>
              
            </li>
            <?php endif; ?>
          </ul>
        
        </div>

        <div>
          <h2 class="mb-6 text-sm font-semibold text-primary-900 uppercase">
            Полезные ссылки
          </h2>
          <?php include get_template_directory() . '/template-parts/whatsapp-link.php'; ?>

        </div>
      </div>

    
  </div>
  <hr class="my-6 border-primary-200 sm:mx-auto lg:my-8" />
  <div class="mx-auto max-w-screen-xl sm:flex sm:items-center sm:justify-between">
    <span class="text-sm text-primary-500 sm:text-center">© 2024 <a href="#" class="hover:underline"> BarbarisStudio™</a>.
      Все
      права защищены.
    </span>
    <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">

    </div>
  </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>