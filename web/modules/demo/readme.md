
# Identificar si el modulo y la configuracion se han instalado correctamente

Prueba recuperando la configuración con Drush
Podemos comprobar que Drupal reconoce nuestra nueva configuración al recuperarla con Drush. Abra una utilidad de línea de comandos, navegue hasta su sitio Drupal e ingrese:

drush cget demo.settings
(Nota: drush cgetes un alias abreviado tanto para el comando Drush 8 como para el comando Drush 9 ).drush config-getdrush config:get

La salida (en este punto) debe ser idéntica al contenido de su configuración predeterminada en modules/custom/demo/config/install/demo.settings.yml