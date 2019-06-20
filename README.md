# Laravel-Task-Management
Laravel Task Management Web App along side APi Implement via JWT Package
#Laravel Hosts
127.0.0.1	www.laravel-taskmanagement.local

#VirtualHost Entry

<VirtualHost *:80>
    ServerName www.laravel-taskmanagement.local
    ServerAlias www.laravel-taskmanagement.local

    DocumentRoot /var/www/html/L-TaskManagement/public
    <Directory /var/www/html/L-TaskManagement/public>
        AllowOverride All
    </Directory>
</VirtualHost>
