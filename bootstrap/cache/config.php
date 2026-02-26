<?php return array (
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'cluster' => NULL,
          'host' => 'api-mt1.pusher.com',
          'port' => 443,
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => '12',
      'verify' => true,
      'limit' => NULL,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
      'verify' => true,
    ),
    'rehash_on_login' => true,
  ),
  'adminlte' => 
  array (
    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',
    'use_ico_only' => false,
    'use_full_favicon' => false,
    'google_fonts' => 
    array (
      'allowed' => true,
    ),
    'logo' => '<b>Admin</b>LTE',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => NULL,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',
    'auth_logo' => 
    array (
      'enabled' => false,
      'img' => 
      array (
        'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
        'alt' => 'Auth Logo',
        'class' => '',
        'width' => 50,
        'height' => 50,
      ),
    ),
    'preloader' => 
    array (
      'enabled' => true,
      'mode' => 'fullscreen',
      'img' => 
      array (
        'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
        'alt' => 'AdminLTE Preloader Image',
        'effect' => 'animation__shake',
        'width' => 60,
        'height' => 60,
      ),
    ),
    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,
    'layout_topnav' => NULL,
    'layout_boxed' => NULL,
    'layout_fixed_sidebar' => NULL,
    'layout_fixed_navbar' => NULL,
    'layout_fixed_footer' => NULL,
    'layout_dark_mode' => NULL,
    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',
    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4 sidebar-custom-black',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',
    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,
    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',
    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,
    'disable_darkmode_routes' => false,
    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',
    'menu' => 
    array (
      0 => 
      array (
        'type' => 'navbar-search',
        'text' => 'search',
        'topnav_right' => true,
      ),
      1 => 
      array (
        'type' => 'fullscreen-widget',
        'topnav_right' => true,
      ),
      2 => 
      array (
        'type' => 'sidebar-menu-search',
        'text' => 'search',
      ),
      3 => 
      array (
        'text' => 'blog',
        'url' => 'admin/blog',
        'can' => 'manage-blog',
      ),
      4 => 
      array (
        'text' => 'pages',
        'url' => 'admin/pages',
        'icon' => 'far fa-fw fa-file',
        'label' => 4,
        'label_color' => 'success',
      ),
      5 => 
      array (
        'header' => 'account_settings',
      ),
      6 => 
      array (
        'text' => 'profile',
        'url' => 'admin/settings',
        'icon' => 'fas fa-fw fa-user',
      ),
      7 => 
      array (
        'text' => 'change_password',
        'url' => 'admin/settings',
        'icon' => 'fas fa-fw fa-lock',
      ),
      8 => 
      array (
        'text' => 'multilevel',
        'icon' => 'fas fa-fw fa-share',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'level_one',
            'url' => '#',
          ),
          1 => 
          array (
            'text' => 'level_one',
            'url' => '#',
            'submenu' => 
            array (
              0 => 
              array (
                'text' => 'level_two',
                'url' => '#',
              ),
              1 => 
              array (
                'text' => 'level_two',
                'url' => '#',
                'submenu' => 
                array (
                  0 => 
                  array (
                    'text' => 'level_three',
                    'url' => '#',
                  ),
                  1 => 
                  array (
                    'text' => 'level_three',
                    'url' => '#',
                  ),
                ),
              ),
            ),
          ),
          2 => 
          array (
            'text' => 'level_one',
            'url' => '#',
          ),
        ),
      ),
      9 => 
      array (
        'header' => 'labels',
      ),
      10 => 
      array (
        'text' => 'important',
        'icon_color' => 'red',
        'url' => '#',
      ),
      11 => 
      array (
        'text' => 'warning',
        'icon_color' => 'yellow',
        'url' => '#',
      ),
      12 => 
      array (
        'text' => 'information',
        'icon_color' => 'cyan',
        'url' => '#',
      ),
    ),
    'filters' => 
    array (
      0 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\GateFilter',
      1 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\HrefFilter',
      2 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\SearchFilter',
      3 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\ActiveFilter',
      4 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\ClassesFilter',
      5 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\LangFilter',
      6 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\DataFilter',
    ),
    'plugins' => 
    array (
      'Datatables' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
          ),
          1 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
          ),
          2 => 
          array (
            'type' => 'css',
            'asset' => false,
            'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
          ),
        ),
      ),
      'Select2' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
          ),
          1 => 
          array (
            'type' => 'css',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
          ),
        ),
      ),
      'Chartjs' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
          ),
        ),
      ),
      'Sweetalert2' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
          ),
        ),
      ),
      'Pace' => 
      array (
        'active' => false,
        'files' => 
        array (
          0 => 
          array (
            'type' => 'css',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
          ),
          1 => 
          array (
            'type' => 'js',
            'asset' => false,
            'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
          ),
        ),
      ),
    ),
    'iframe' => 
    array (
      'default_tab' => 
      array (
        'url' => NULL,
        'title' => NULL,
      ),
      'buttons' => 
      array (
        'close' => true,
        'close_all' => true,
        'close_all_other' => true,
        'scroll_left' => true,
        'scroll_right' => true,
        'fullscreen' => true,
      ),
      'options' => 
      array (
        'loading_screen' => 1000,
        'auto_show_new_tab' => true,
        'use_navbar_items' => true,
      ),
    ),
    'livewire' => false,
  ),
  'app' => 
  array (
    'name' => 'Laravel',
    'env' => 'local',
    'debug' => true,
    'url' => 'https://ec25d393-35c9-480e-9ff6-5cbaddfac38f-00-ou15qwfsjqgz.worf.replit.dev',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'Africa/Harare',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:AZcm73X/cqLraAkAn88Jy/Fy51IpWkDN/+qwTeWaZnQ=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
      'store' => 'database',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
      6 => 'Illuminate\\Cookie\\CookieServiceProvider',
      7 => 'Illuminate\\Database\\DatabaseServiceProvider',
      8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      11 => 'Illuminate\\Hashing\\HashServiceProvider',
      12 => 'Illuminate\\Mail\\MailServiceProvider',
      13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      17 => 'Illuminate\\Queue\\QueueServiceProvider',
      18 => 'Illuminate\\Redis\\RedisServiceProvider',
      19 => 'Illuminate\\Session\\SessionServiceProvider',
      20 => 'Illuminate\\Translation\\TranslationServiceProvider',
      21 => 'Illuminate\\Validation\\ValidationServiceProvider',
      22 => 'Illuminate\\View\\ViewServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Benchmark' => 'Illuminate\\Support\\Benchmark',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'Uri' => 'Illuminate\\Support\\Uri',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'cache' => 
  array (
    'default' => 'database',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'session' => 
      array (
        'driver' => 'session',
        'key' => '_cache',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'cache',
        'lock_connection' => NULL,
        'lock_table' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/home/runner/workspace/storage/framework/cache/data',
        'lock_path' => '/home/runner/workspace/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => NULL,
        'secret' => NULL,
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
      'failover' => 
      array (
        'driver' => 'failover',
        'stores' => 
        array (
          0 => 'database',
          1 => 'array',
        ),
      ),
    ),
    'prefix' => 'laravel-cache-',
  ),
  'database' => 
  array (
    'default' => 'pgsql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'heliumdb',
        'prefix' => '',
        'foreign_key_constraints' => true,
        'busy_timeout' => NULL,
        'journal_mode' => NULL,
        'synchronous' => NULL,
        'transaction_mode' => 'DEFERRED',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => 'helium',
        'port' => '5432',
        'database' => 'heliumdb',
        'username' => 'postgres',
        'password' => 'password',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => 'helium',
        'port' => '5432',
        'database' => 'heliumdb',
        'username' => 'postgres',
        'password' => 'password',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => 'postgresql://postgres:password@helium/heliumdb?sslmode=disable',
        'host' => 'helium',
        'port' => '5432',
        'database' => 'heliumdb',
        'username' => 'postgres',
        'password' => 'password',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => 'helium',
        'port' => '5432',
        'database' => 'heliumdb',
        'username' => 'postgres',
        'password' => 'password',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 
    array (
      'table' => 'migrations',
      'update_date_on_publish' => true,
    ),
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'laravel-database-',
        'persistent' => false,
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
        'max_retries' => 3,
        'backoff_algorithm' => 'decorrelated_jitter',
        'backoff_base' => 100,
        'backoff_cap' => 1000,
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
        'max_retries' => 3,
        'backoff_algorithm' => 'decorrelated_jitter',
        'backoff_base' => 100,
        'backoff_cap' => 1000,
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/home/runner/workspace/storage/app/private',
        'serve' => true,
        'throw' => false,
        'report' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/home/runner/workspace/storage/app/public',
        'url' => 'https://ec25d393-35c9-480e-9ff6-5cbaddfac38f-00-ou15qwfsjqgz.worf.replit.dev/storage',
        'visibility' => 'public',
        'throw' => false,
        'report' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
        'report' => false,
      ),
    ),
    'links' => 
    array (
      '/home/runner/workspace/public/storage' => '/home/runner/workspace/storage/app/public',
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => 'null',
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/home/runner/workspace/storage/logs/laravel.log',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/home/runner/workspace/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'handler_with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'formatter' => NULL,
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/home/runner/workspace/storage/logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'log',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'scheme' => NULL,
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '2525',
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
        'local_domain' => 'ec25d393-35c9-480e-9ff6-5cbaddfac38f-00-ou15qwfsjqgz.worf.replit.dev',
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
        'retry_after' => 60,
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
        'retry_after' => 60,
      ),
    ),
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Example',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/home/runner/workspace/resources/views/vendor/mail',
      ),
    ),
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'role_pivot_key' => NULL,
      'permission_pivot_key' => NULL,
      'model_morph_key' => 'model_id',
      'team_foreign_key' => 'team_id',
    ),
    'register_permission_check_method' => true,
    'register_octane_reset_listener' => false,
    'events_enabled' => false,
    'teams' => false,
    'team_resolver' => 'Spatie\\Permission\\DefaultTeamResolver',
    'use_passport_client_credentials' => false,
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      \DateInterval::__set_state(array(
         'from_string' => true,
         'date_string' => '24 hours',
      )),
      'key' => 'spatie.permission.cache',
      'store' => 'default',
    ),
  ),
  'queue' => 
  array (
    'default' => 'database',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => NULL,
        'secret' => NULL,
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
      'deferred' => 
      array (
        'driver' => 'deferred',
      ),
      'failover' => 
      array (
        'driver' => 'failover',
        'connections' => 
        array (
          0 => 'database',
          1 => 'deferred',
        ),
      ),
      'background' => 
      array (
        'driver' => 'background',
      ),
    ),
    'batching' => 
    array (
      'database' => 'pgsql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'pgsql',
      'table' => 'failed_jobs',
    ),
  ),
  'roles' => 
  array (
    'staff_roles' => 
    array (
      'accreditation_officer' => 'Accreditation Officer',
      'registrar' => 'Registrar',
      'payments_accounts' => 'Payments / Accounts',
      'production' => 'Production (Cards & Certificates)',
      'internal_auditor' => 'Internal Auditor',
      'director_mdg' => 'Director: Media Development & Governance',
      'it_admin' => 'IT Team (Access Control)',
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'key' => NULL,
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
    'paynow' => 
    array (
      'integration_id' => NULL,
      'integration_key' => NULL,
    ),
    'twilio' => 
    array (
      'sid' => NULL,
      'token' => NULL,
      'whatsapp_from' => NULL,
      'sms_from' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'database',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/home/runner/workspace/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel-session',
    'path' => '/',
    'domain' => '',
    'secure' => true,
    'http_only' => true,
    'same_site' => 'none',
    'partitioned' => true,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/home/runner/workspace/resources/views',
    ),
    'compiled' => '/home/runner/workspace/storage/framework/views',
  ),
  'zmc' => 
  array (
    'master_settings' => 
    array (
      'general' => 
      array (
        'system_name' => 'Zimbabwe Media Commission Portal',
        'commission_short_name' => 'ZMC',
        'logo_light_path' => NULL,
        'logo_dark_path' => NULL,
        'favicon_path' => NULL,
        'footer_text' => '© 2026 Zimbabwe Media Commission',
        'default_language' => 'en',
        'time_zone' => 'Africa/Harare',
        'date_format' => 'Y-m-d',
        'time_format' => 'H:i',
        'currency_symbol' => '$',
        'currency_iso' => 'USD',
        'financial_year_start' => '01-01',
        'financial_year_end' => '12-31',
        'maintenance_mode' => false,
        'public_portal_enabled' => true,
        'staff_portals_enabled' => true,
      ),
      'accounts_roles' => 
      array (
        'force_password_reset_first_login' => true,
        'password_policy' => 
        array (
          'min_length' => 8,
          'complexity' => true,
          'expiry_days' => 0,
          'history' => 3,
        ),
        'session_timeout_minutes' => 60,
        'max_login_attempts' => 5,
        'account_lockout_minutes' => 15,
        'delegated_authority_limits' => 
        array (
          'waiver_auto_approve_threshold' => 0,
        ),
      ),
      'profile_self_service' => 
      array (
        'editable_fields' => 
        array (
          'name' => true,
          'phone' => true,
          'address' => true,
        ),
        'change_username' => 'allowed',
        'change_email_requires_verification' => true,
        'active_sessions_visible' => true,
        'logout_all_devices' => true,
        'public_account_deactivation_request' => true,
      ),
      'auth_security' => 
      array (
        'email_verification_on_signup' => 'mandatory',
        'otp_on_login' => false,
        'otp_methods' => 
        array (
          0 => 'email',
        ),
        'otp_length' => 6,
        'otp_expiry_minutes' => 10,
        'otp_resend_limit' => 3,
        'two_factor' => 
        array (
          'enabled_globally' => false,
          'enforce_by_role' => 
          array (
          ),
          'allowed_methods' => 
          array (
            0 => 'email',
          ),
          'trusted_devices_days' => 30,
        ),
        'ip_logging' => true,
        'ip_whitelist' => 
        array (
        ),
        'new_device_alerts' => false,
      ),
      'portal_specific' => 
      array (
        'public' => 
        array (
          'registration_window' => 
          array (
            'open' => NULL,
            'close' => NULL,
          ),
          'accreditation_window' => 
          array (
            'open' => NULL,
            'close' => NULL,
          ),
          'public_notices_visible' => true,
          'captcha_enabled' => false,
          'allowed_upload_formats' => 
          array (
            0 => 'pdf',
            1 => 'jpg',
            2 => 'jpeg',
            3 => 'png',
          ),
          'max_upload_size_mb' => 10,
        ),
        'staff' => 
        array (
          'default_dashboard_by_role' => 
          array (
          ),
          'staff_announcements_visible' => true,
          'feature_toggles_by_role' => 
          array (
          ),
        ),
      ),
      'accreditation_registration' => 
      array (
        'accreditation_categories' => 
        array (
          0 => 'Local Journalist',
          1 => 'Foreign Journalist',
          2 => 'Student Journalist',
        ),
        'registration_categories' => 
        array (
          0 => 'Mass Media Service',
        ),
        'validity_period_months' => 
        array (
          'accreditation' => 12,
          'registration' => 12,
        ),
        'renewal_rules' => 
        array (
          'grace_period_days' => 30,
          'reaccreditation_conditions' => '',
        ),
        'required_documents' => 
        array (
          'default' => 
          array (
            0 => 'National ID/Passport',
            1 => 'Passport Photo',
          ),
        ),
        'document_expiry_rules' => 
        array (
          'enforce' => false,
        ),
        'status_progression_rules' => 
        array (
          'use_strict_transitions' => true,
        ),
      ),
      'payments_finance' => 
      array (
        'rounding' => 'none',
        'paynow_enabled' => true,
        'paynow_callback_url' => NULL,
        'paynow_timeout_minutes' => 30,
        'payment_proof' => 
        array (
          'required' => true,
          'formats' => 
          array (
            0 => 'pdf',
            1 => 'jpg',
            2 => 'jpeg',
            3 => 'png',
          ),
          'max_size_mb' => 10,
        ),
        'waivers' => 
        array (
          'enabled' => true,
          'types' => 
          array (
            0 => 'full',
            1 => 'partial',
          ),
          'partial_max_percent' => 100,
          'eligible_categories' => 
          array (
          ),
          'approval_authority_levels' => 
          array (
            0 => 'registrar',
            1 => 'director',
          ),
          'auto_approval_threshold' => 0,
          'mask_settlement_account' => true,
        ),
      ),
      'payment_proofs' => 
      array (
        'submission_enabled' => true,
        'formats' => 
        array (
          0 => 'pdf',
          1 => 'jpg',
          2 => 'jpeg',
          3 => 'png',
        ),
        'max_size_mb' => 10,
        'review_sla_hours' => 48,
        'rejection_reason_templates' => 
        array (
          0 => 'Unclear proof',
          1 => 'Wrong amount',
          2 => 'Reference mismatch',
        ),
        'resubmission_allowed' => true,
        'auto_link_to_paynow' => true,
      ),
      'waivers' => 
      array (
        'eligibility_criteria' => '',
        'supporting_documents_required' => true,
        'partial_percentage_limit' => 100,
        'approval_levels' => 
        array (
          0 => 'registrar',
          1 => 'director',
        ),
        'audit_flagging_rules' => '',
        'expiry_days' => 0,
        'appeal_enabled' => true,
      ),
      'workflow_approvals' => 
      array (
        'multi_step' => false,
        'escalation_timelines_hours' => 
        array (
        ),
        'auto_status_transitions' => true,
        'override_permissions_roles' => 
        array (
          0 => 'super_admin',
        ),
        'sla_timers_by_role' => 
        array (
        ),
      ),
      'applications_status' => 
      array (
        'definitions' => 
        array (
        ),
        'transition_rules' => 
        array (
        ),
        'auto_reminders' => false,
        'expiry_days' => 0,
      ),
      'notifications_alerts' => 
      array (
        'email_enabled' => true,
        'sms_enabled' => false,
        'in_app_enabled' => true,
        'sender_name' => 'ZMC',
        'sender_email' => 'no-reply@example.com',
        'reminder_schedules' => 
        array (
        ),
      ),
      'content_management' => 
      array (
        'news_categories' => 
        array (
          0 => 'General',
        ),
        'notice_categories' => 
        array (
          0 => 'General',
        ),
        'event_categories' => 
        array (
          0 => 'General',
        ),
        'approval_workflow' => 'none',
        'publish_scheduling' => true,
        'featured_rules' => '',
        'media_upload_max_mb' => 10,
        'archive_days' => 0,
      ),
      'reports_analytics' => 
      array (
        'access_by_role' => 
        array (
        ),
        'default_period_days' => 30,
        'export_formats' => 
        array (
          0 => 'csv',
          1 => 'excel',
        ),
        'data_retention_days' => 0,
        'kpi_config' => 
        array (
        ),
        'dashboard_widgets' => 
        array (
        ),
      ),
      'audit_compliance' => 
      array (
        'audit_logging_enabled' => true,
        'scope' => 'all',
        'retention_days' => 365,
        'user_action_tracking' => true,
        'ip_tracking' => true,
        'evidence_attachment_rules' => '',
        'compliance_tagging' => 
        array (
          0 => 'payments',
          1 => 'waivers',
          2 => 'approvals',
        ),
      ),
      'documents_files' => 
      array (
        'allowed_types' => 
        array (
          0 => 'pdf',
          1 => 'jpg',
          2 => 'jpeg',
          3 => 'png',
        ),
        'max_size_mb' => 10,
        'virus_scanning' => false,
        'storage' => 'local',
        'secure_downloads' => true,
        'auto_expiry_days' => 0,
      ),
      'integrations' => 
      array (
        'paynow' => 
        array (
          'enabled' => true,
          'credentials_set' => false,
        ),
        'sms' => 
        array (
          'provider' => '',
          'credentials_set' => false,
        ),
        'email' => 
        array (
          'driver' => 'smtp',
          'credentials_set' => false,
        ),
        'api_keys' => 
        array (
        ),
        'webhook_retry' => 
        array (
          'attempts' => 3,
        ),
      ),
      'monitoring_maintenance' => 
      array (
        'system_version' => 'v2.8.3.2',
        'modules' => 
        array (
          'notices' => true,
          'news' => true,
          'events' => true,
          'complaints' => true,
          'payments' => true,
        ),
        'feature_flags' => 
        array (
        ),
        'jobs_monitoring' => true,
        'cache_control' => true,
        'error_monitoring' => true,
        'backup_frequency' => 'daily',
        'disaster_recovery_mode' => false,
      ),
      'help_support_legal' => 
      array (
        'helpdesk_contacts' => '',
        'support_ticket_categories' => 
        array (
          0 => 'General',
        ),
        'manuals_guides' => '',
        'faqs' => '',
        'privacy_policy' => '',
        'terms_conditions' => '',
        'legal_disclaimers' => '',
        'cookie_policy' => '',
      ),
      'menu_ui' => 
      array (
        'sidebar_by_role' => 
        array (
        ),
        'menu_order' => 
        array (
        ),
        'hidden_modules' => 
        array (
        ),
        'theme' => 'light',
        'accessibility' => 
        array (
          'high_contrast' => false,
          'font_size' => 'normal',
        ),
      ),
    ),
    'workflow' => 
    array (
      'sla_hours' => 
      array (
        'submitted' => 48,
        'officer_review' => 72,
        'accounts_review' => 48,
        'registrar_review' => 72,
        'production_queue' => 72,
      ),
      'escalations' => 
      array (
        'submitted' => 
        array (
          'after_hours' => 72,
          'notify_roles' => 'it_admin,super_admin',
        ),
        'officer_review' => 
        array (
          'after_hours' => 96,
          'notify_roles' => 'registrar,super_admin',
        ),
        'accounts_review' => 
        array (
          'after_hours' => 72,
          'notify_roles' => 'super_admin',
        ),
        'registrar_review' => 
        array (
          'after_hours' => 96,
          'notify_roles' => 'super_admin,director',
        ),
        'production_queue' => 
        array (
          'after_hours' => 96,
          'notify_roles' => 'super_admin',
        ),
      ),
    ),
    'fees' => 
    array (
      'fees' => 
      array (
        0 => 
        array (
          'name' => 'Accreditation – Local Journalist',
          'amount' => 0,
          'currency' => 'USD',
          'active' => true,
        ),
        1 => 
        array (
          'name' => 'Accreditation – Foreign Journalist',
          'amount' => 0,
          'currency' => 'USD',
          'active' => true,
        ),
        2 => 
        array (
          'name' => 'Registration – Mass Media Service',
          'amount' => 0,
          'currency' => 'USD',
          'active' => true,
        ),
        3 => 
        array (
          'name' => 'Replacement – Card',
          'amount' => 0,
          'currency' => 'USD',
          'active' => true,
        ),
        4 => 
        array (
          'name' => 'Replacement – Certificate',
          'amount' => 0,
          'currency' => 'USD',
          'active' => true,
        ),
      ),
      'payment_channels' => 
      array (
        0 => 
        array (
          'name' => 'PayNow',
          'active' => true,
        ),
        1 => 
        array (
          'name' => 'Bank Transfer',
          'active' => true,
        ),
        2 => 
        array (
          'name' => 'Cash (Office)',
          'active' => false,
        ),
      ),
      'waiver_rules' => '',
      'tax' => 
      array (
        'vat_percent' => 0,
      ),
    ),
    'templates' => 
    array (
      'items' => 
      array (
        'card' => 
        array (
          'label' => 'Accreditation Card Template',
          'active_version' => NULL,
          'versions' => 
          array (
          ),
        ),
        'certificate' => 
        array (
          'label' => 'Certificate Template',
          'active_version' => NULL,
          'versions' => 
          array (
          ),
        ),
        'letters' => 
        array (
          'label' => 'Letters Pack',
          'active_version' => NULL,
          'versions' => 
          array (
          ),
        ),
        'email' => 
        array (
          'label' => 'Email Templates',
          'active_version' => NULL,
          'versions' => 
          array (
          ),
        ),
        'sms' => 
        array (
          'label' => 'SMS Templates',
          'active_version' => NULL,
          'versions' => 
          array (
          ),
        ),
      ),
    ),
    'content_control' => 
    array (
      'modules' => 
      array (
        'notices' => true,
        'news' => true,
        'events' => true,
      ),
      'categories' => 
      array (
        0 => 'General',
      ),
      'moderation_rules' => '',
    ),
    'regions_offices' => 
    array (
      'offices' => 
      array (
        0 => 
        array (
          'name' => 'Head Office (Harare)',
          'code' => 'HQ',
          'region' => 'Harare',
          'schedule' => '',
          'assigned_user_ids' => 
          array (
          ),
        ),
        1 => 
        array (
          'name' => 'Bulawayo Regional Office',
          'code' => 'BYO',
          'region' => 'Bulawayo',
          'schedule' => '',
          'assigned_user_ids' => 
          array (
          ),
        ),
      ),
    ),
    'system_settings' => 
    array (
      'branding' => 
      array (
        'logo_path' => NULL,
        'seal_path' => NULL,
      ),
      'security' => 
      array (
        'password_min' => 8,
        'mfa_enabled' => false,
      ),
      'backups' => 
      array (
        'schedule' => 'daily',
      ),
      'integrations' => 
      array (
        'paynow' => 
        array (
          'enabled' => true,
        ),
        'email' => 
        array (
          'driver' => 'smtp',
        ),
        'sms' => 
        array (
          'provider' => '',
        ),
      ),
    ),
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => '/home/runner/workspace/storage/fonts',
      'font_cache' => '/home/runner/workspace/storage/fonts',
      'temp_dir' => '/tmp',
      'chroot' => '/home/runner/workspace',
      'allowed_protocols' => 
      array (
        'data://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'artifactPathValidation' => NULL,
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => false,
      'allowed_remote_hosts' => NULL,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'ec25d393-35c9-480e-9ff6-5cbaddfac38f-00-ou15qwfsjqgz.worf.replit.dev',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'authenticate_session' => 'Laravel\\Sanctum\\Http\\Middleware\\AuthenticateSession',
      'encrypt_cookies' => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
      'validate_csrf_token' => 'Illuminate\\Foundation\\Http\\Middleware\\ValidateCsrfToken',
    ),
  ),
  'audit' => 
  array (
    'enabled' => true,
    'implementation' => 'OwenIt\\Auditing\\Models\\Audit',
    'user' => 
    array (
      'morph_prefix' => 'user',
      'guards' => 
      array (
        0 => 'web',
        1 => 'api',
      ),
      'resolver' => 'OwenIt\\Auditing\\Resolvers\\UserResolver',
    ),
    'resolvers' => 
    array (
      'ip_address' => 'OwenIt\\Auditing\\Resolvers\\IpAddressResolver',
      'user_agent' => 'OwenIt\\Auditing\\Resolvers\\UserAgentResolver',
      'url' => 'OwenIt\\Auditing\\Resolvers\\UrlResolver',
    ),
    'events' => 
    array (
      0 => 'created',
      1 => 'updated',
      2 => 'deleted',
      3 => 'restored',
    ),
    'strict' => false,
    'exclude' => 
    array (
    ),
    'empty_values' => true,
    'allowed_empty_values' => 
    array (
      0 => 'retrieved',
    ),
    'allowed_array_values' => false,
    'timestamps' => false,
    'threshold' => 0,
    'driver' => 'database',
    'drivers' => 
    array (
      'database' => 
      array (
        'table' => 'audits',
        'connection' => NULL,
      ),
    ),
    'queue' => 
    array (
      'enable' => false,
      'connection' => 'sync',
      'queue' => 'default',
      'delay' => 0,
    ),
    'console' => false,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
