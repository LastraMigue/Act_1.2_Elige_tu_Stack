# Informe de Consultoría Técnica
## Arquitectura y Ecosistema de Desarrollo Web

---

## 1. Cliente vs. Servidor

El código de una aplicación web se ejecuta en dos entornos distintos:

*   **El Cliente (Navegador):** Es el entorno del usuario, donde corren **HTML, CSS y JavaScript** para mostrar la interfaz gráfica y gestionar la interacción.
*   **El Servidor (Backend):** Es la máquina remota de la empresa. Aquí se ejecuta **PHP** y se gestionan elementos críticos como la **base de datos, la lógica de negocio y la seguridad**.

> **Regla de Oro de la Seguridad Web:**
> **Nunca confiar en los datos que vienen del cliente.**
>
> El navegador está bajo control total del usuario, por lo que cualquier precio, validación o dato enviado desde él puede ser manipulado (por ejemplo, forzando que un producto cueste 0 €). 
> 
> **Solución:** Toda validación crítica y todo cálculo financiero deben repetirse y verificarse siempre en el servidor, el único entorno cerrado y confiable.

---

## 2. Web Estática vs. Dinámica

Existen dos enfoques principales a la hora de servir páginas web:

*   **Web Estática:** Entrega el mismo archivo HTML a todos los usuarios.
    *   *Ventaja:* Es muy rápida.
    *   *Desventaja:* Es completamente inflexible.
*   **Web Dinámica:** Construye la página en cada petición, consultando la base de datos y adaptando el contenido a cada usuario.

### La necesidad del dinamismo en E-commerce
Para una tienda online, la generación **dinámica** es totalmente imprescindible. Permite:
*   Reconocer usuarios autenticados.
*   Mantener el carrito de la compra entre sesiones.
*   Actualizar el stock en tiempo real.
*   Ofrecer recomendaciones personalizadas.

> **Evolución Tecnológica:** Esta misma base dinámica es la que permite evolucionar hacia arquitecturas híbridas (como **SPA + API**), donde el servidor envía datos en formato JSON a una aplicación cliente (como React o Vue) para lograr una experiencia de usuario fluida y sin recargas de página.

---

## 3. La Infraestructura: Servidores

El procesamiento de las peticiones web se divide en varias capas:

1.  **El Servidor Web (Nginx / Apache):** Es la puerta de entrada del negocio. Recibe las peticiones HTTP, sirve directamente los archivos estáticos (imágenes, CSS, JS) y redirige las peticiones dinámicas al motor de procesamiento.
2.  **PHP-FPM (FastCGI Process Manager):** Es el motor de procesamiento que ha sustituido al antiguo modelo **CGI**.
    *   *El problema de CGI:* Creaba un proceso nuevo por cada visitante, lo que consumía muchos recursos y colapsaba ante picos de tráfico.
    *   *La solución de PHP-FPM:* Mantiene un *pool* de procesos ya activos y listos para trabajar, reduciendo drásticamente el consumo de memoria y permitiendo soportar miles de visitas simultáneas (como en un Black Friday).
3.  **El Framework (Laravel):** Sobre esta infraestructura base, asume el rol de servidor de aplicaciones. Coordina la conexión a la base de datos, la gestión de sesiones de usuario, la seguridad y la formulación de las respuestas HTTP, apoyándose en la agilidad y el rendimiento que le proporciona PHP-FPM.

---

## 4. Evaluación de Herramientas: PHP y Laravel 12

Se recomienda firmemente construir el proyecto utilizando **PHP** junto con el framework **Laravel 12**.

> **Laravel vs. Desarrollo Nativo:** Laravel es el estándar actual de la industria. Optar por él es infinitamente superior a desarrollar una solución "nativa" sin framework, la cual sería mucho más propensa a fallos de seguridad y extremadamente difícil de mantener a largo plazo.

### Ventajas clave de Laravel 12:

- **Patrón MVC** (Modelo-Vista-Controlador): separa la gestión de datos (Eloquent ORM), la interfaz (Blade) y la lógica de negocio (Controlador), permitiendo rediseñar la web sin arriesgar los cálculos de facturación.
- **Seguridad por defecto:** protección nativa frente a inyección SQL, XSS y CSRF, aplicada automáticamente sin depender de que el equipo la active manualmente.
- **Ecosistema completo:** módulos integrados de autenticación, APIs REST y tareas programadas (como recordatorios de carritos abandonados), que reducen el tiempo y coste de desarrollo.