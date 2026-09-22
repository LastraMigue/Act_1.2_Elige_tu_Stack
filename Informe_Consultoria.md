# Informe de Consultoría Técnica: Arquitectura Web

---

## 1. Cliente vs. Servidor
- **Cliente (Navegador):** Ejecuta las tecnologías de interfaz (HTML/CSS/JS). Al residir en el equipo del usuario, puede ser manipulado fácilmente.
- **Servidor (Backend):** Máquina remota segura donde reside la lógica de negocio (PHP) y la base de datos.
- **Seguridad Web:** La regla de oro es *"nunca confiar en los datos que vienen del cliente"*. Toda validación crítica (como el precio de un producto) debe verificarse siempre en el servidor para evitar fraudes, al ser el único entorno bajo nuestro control total.

---

## 2. Web Estática vs. Dinámica
- **Web Estática:** Entrega el mismo contenido pregenerado a todos. Es rápida y barata de alojar, pero inflexible.
- **Web Dinámica:** El servidor procesa datos en tiempo real y construye respuestas a medida, siendo necesario que se compile.
- **Justificación de Negocio:** Para una tienda online, la web dinámica es obligatoria. Permite gestionar autenticación, carritos y control de stock en tiempo real. Además, es la base para evolucionar hacia **arquitecturas híbridas** actuales, donde el servidor envía datos en formato JSON a aplicaciones cliente (SPA como React o Vue).

---

## 3. La Infraestructura (Servidores)
- **Servidor Web (Apache / Nginx):** Es la puerta de entrada. Su función es despachar archivos estáticos masivamente y redirigir las peticiones complejas al motor de procesamiento.
- **Mecanismos de Ejecución (PHP-FPM):** Sustituye al antiguo modelo **CGI**. Mientras CGI abría un proceso nuevo por cada usuario (consumiendo toda la memoria en picos de tráfico), **PHP-FPM** utiliza un sistema de *pool de procesos* ya activos y reciclables. Esto garantiza máxima eficiencia y resistencia ante miles de visitas concurrentes.
- **Framework (Laravel):** Asume el rol de servidor de aplicaciones. Funciona por encima de PHP-FPM para tomar el control de la petición, coordinar la conexión a la base de datos y gestionar las sesiones del usuario de forma estructurada.

---

## 4. Evaluación de Herramientas: PHP y Laravel 12
Recomendamos apostar por PHP junto con **Laravel 12**. Un desarrollo "nativo" (sin framework) es propenso a fallos graves de seguridad y tiene un coste de mantenimiento altísimo a largo plazo.

**Ventajas clave de Laravel 12:**
1. **Patrón Arquitectónico MVC:** Separa de forma limpia los datos (Modelo), la interfaz (Vista) y la lógica de negocio (Controlador), permitiendo ampliar la tienda sin riesgo de romper cálculos existentes.
2. **Seguridad por defecto:** Implementa protección nativa y automática contra las vulnerabilidades web más críticas (Inyección SQL, ataques XSS y CSRF).
3. **Ecosistema Integrado:** Incluye módulos listos para usar (autenticación robusta, desarrollo de APIs, programación de tareas de servidor) que aceleran el desarrollo drásticamente.