# SocielMedia
Project Réseau Social, travaille avec Brahim et Vincent

Activer le mode rewrite sur apache 2 :

<code>
sudo a2enmod rewrite
</code>

Ajouter ensuite les lignes suivantes dans le fichier de apache2.conf (normalement situé dans le dossier /etc/apache2/)

<code>
  <pre>
    \<ifModule mod_rewrite.c>
      RewriteEngine On
    \</ifModule>
  </pre>
</code>

Ajouter les lignes suivantes dans le fichier 000-default.conf (normalement situé dans le dossier /etc/apache2/sites-available/000-default.conf)
<code>
   <pre>
        \<Directory /var/www/html>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
        \</Directory>
   </pre>
</code>

redémarrez ensuite le service apache2 avec la commande :

<code>
sudo /etc/init.d/apache2 restart
</code>
