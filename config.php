<?php
$CONFIG = array (
  'htaccess.RewriteBase' => '/',
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'apps_paths' => 
  array (
    0 => 
    array (
      'path' => '/var/www/html/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 => 
    array (
      'path' => '/var/www/html/custom_apps',
      'url' => '/custom_apps',
      'writable' => true,
    ),
  ),
  'upgrade.disable-web' => true,
  'instanceid' => 'ocn2hdsg9uav',
  'passwordsalt' => 'KHdUcs3dpUy3iu3UQzQ6xuwLnvpYqg',
  'secret' => 'ZDkzSrVbZDia+4rYui6vTgi1Nl8BvkPHZwVJZW+dQaBryOqb',
  'trusted_domains' => 
  array (
   0 => 'localhost',
   1 => 'cloud.theodosiou.me'
  ),
  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'mysql',
  'version' => '29.0.1.1',
  'overwrite.cli.url' => 'https://cloud.theodosiou.me',
  'dbname' => 'nextcloud',
  'dbhost' => 'mariadb',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'nextcloud',
  'dbpassword' => 'MySqlP@ssw0rd',
  'installed' => true,
);
