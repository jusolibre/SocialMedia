# SocielMedia
Project Réseau Social, travaille avec Brahim et Vincent

Activer le mode rewrite sur apache 2 :

<code>
sudo a2enmod rewrite
</code>

Ajouter ensuite les lignes suivantes dans le fichier de apache2.conf (normalement situé dans le dossier /etc/apache/)

<code>
  <ifModule mod_rewrite.c>
  RewriteEngine On
  </ifModule>
</code>

redémarrez ensuite le service apache2 avec la commande :

<code>
sudo /etc/init.d/apache2 restart
</code>
