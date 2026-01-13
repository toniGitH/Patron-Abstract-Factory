# Patrón Abstract Factory - Tienda de Muebles

Este proyecto es un ejemplo didáctico de la implementación del patrón de diseño **Abstract Factory** en PHP.

Simula una tienda de muebles que puede trabajar con diferentes familias de productos (Estilos: Clásico, Moderno, Vintage) sin acoplarse a las clases concretas.

## 📋 Requisitos

- PHP 8.0 o superior.
- [Composer](https://getcomposer.org/) (para la gestión de dependencias y autoload).

## 🚀 Instalación

1.  Clona este repositorio (o descarga los archivos).
2.  Abre una terminal en la carpeta del proyecto.
3.  Ejecuta el siguiente comando para generar el mapa de clases:

    ```bash
    composer install
    ```
    (*) En este pequeño proyecto, tal y como está ahora mismo (sin librerías externas), no sería imprescindible ejecutar *composer install*, sino que sería suficiente con ejecutar *composer dump-autoload*)

## ▶️ Ejecución

Para ejecutar el script principal y ver el patrón en acción:

```bash
php main.php
```

## 📂 Estructura

-   `src/Contracts`: Interfaces que definen el comportamiento abstracto.
-   `src/Styles`: Implementaciones concretas organizadas por estilo.
-   `src/Client`: Cliente que utiliza las fábricas (la Tienda).
-   `main.php`: Punto de entrada del script.
