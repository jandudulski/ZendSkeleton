Big picture
===========

This is my common basic structure, which I am creating after `zf create project name`

In most cases I am repeating the same steps:

- Adding custom.ini config
- Adding Zend_Layout
- Initializing head* helpers with stylesheets, javascripts, meta tags etc
- Initializing Logger
- Initializing Navigation
- Creating HTML5 structure with blueprintcss

Plans
=====

- Add Coffee Scripts
- Add Sass (SCSS)
- Add Sprockets
- Add base.js based on rails.js
- Prepare as Doctrine ready
- Simple Backend with users and static pages
- Better default error page
- Helpers
- Tests!!

Attention
=========

Do not forget to add:

- Zend Framework to library folder or somewhere in php include_path
- jQuery library into public/javascripts folder

Setting Up Your VHOST
=====================

The following is a sample VHOST you might want to consider for your project.

  <VirtualHost *:80>
     DocumentRoot "/path/to/public"
     ServerName application.local
  
     # This should be omitted in the production environment
     SetEnv APPLICATION_ENV development
  
     <Directory "/path/to/public">
         Options Indexes MultiViews FollowSymLinks
         AllowOverride All
         Order allow,deny
         Allow from all
     </Directory>
  
  </VirtualHost>
