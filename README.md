Certainly! Here's the updated README.md file with the link to the official Nextcloud Docker image added at the beginning:

```markdown
# NextCloud Self-Managed Installation Guide

This guide will help you set up NextCloud using NGINX and Docker Compose.

Before starting, make sure you have Docker and Docker Compose installed on your server. If not, you can install them by following the instructions on the [Docker website](https://docs.docker.com/get-docker/) and [Docker Compose documentation](https://docs.docker.com/compose/install/).

For this setup, we'll be using the official Nextcloud Docker image available on Docker Hub. You can find more information about the Nextcloud Docker image on [Docker Hub](https://hub.docker.com/_/nextcloud).

## Prerequisites

- Docker installed on your server
- Docker Compose installed on your server
- A domain name pointing to your server's IP address

## Steps

### 1. Clone this Repository

```bash
git clone https://github.com/your/repo.git
cd repo
```

### 2. Configure NGINX

Create a file named `nextcloud.conf` with the following content:

```
# Replace 'cloud.yourdomain.com' with your domain name

server {
    server_name cloud.yourdomain.com;

    location / {
        proxy_pass http://127.0.0.1:8080;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
        client_max_body_size 200M;
    }

    listen 443 ssl; # managed by Certbot
    ssl_certificate /etc/letsencrypt/live/cloud.yourdomain.com/fullchain.pem; # managed by Certbot
    ssl_certificate_key /etc/letsencrypt/live/cloud.yourdomain.com/privkey.pem; # managed by Certbot
    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbot
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot
}

server {
    if ($host = cloud.yourdomain.com) {
        return 301 https://$host$request_uri;
    }

    listen 80;
    server_name cloud.yourdomain.com;
    return 404;
}
```

### 3. Configure NextCloud

Create a file named `config.php` with the following content:

```php
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
   1 => 'cloud.yourdomain.com'
  ),
  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'mysql',
  'version' => '29.0.1.1',
  'overwrite.cli.url' => 'https://cloud.yourdomain.com',
  'dbname' => 'nextcloud',
  'dbhost' => 'mariadb',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'nextcloud',
  'dbpassword' => 'MySqlP@ssw0rd',
  'installed' => true,
);
```

### 4. Update Trusted Domains

Access the Nextcloud Docker container:

```bash
docker exec -it nextcloud /bin/bash
```

Edit the Nextcloud configuration file:

```bash
sudo nano config/config.php
```

Add your domain to the `trusted_domains` array.

### 5. Apply Changes

Save the changes and exit the editor.

### 6. Start NextCloud

Run the following command to start NextCloud:

```bash
docker-compose up -d
```

### 7. Access NextCloud

You can now access NextCloud by navigating to `https://cloud.yourdomain.com` in your web browser.

## Notes

- Make sure to replace `cloud.yourdomain.com` with your actual domain name.
- Ensure that your domain name points to your server's IP address.
- Modify any passwords or sensitive information according to your preferences.
```

Replace `cloud.yourdomain.com` with your actual domain name and modify any passwords or sensitive information according to your preferences.