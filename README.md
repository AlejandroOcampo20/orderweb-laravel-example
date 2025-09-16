# 🛠️ Order Web

**Order Web** es una aplicación web desarrollada con **Laravel 10.x** y **MySQL** para gestionar órdenes de trabajo, actividades y técnicos. Incluye funcionalidades para exportar listados a PDF.

---

## 📋 Funcionalidades principales
<picture> <img align="right" src="https://certificadossena.net/wp-content/uploads/2022/10/logo-sena-verde-complementario-svg-2022.svg" width="250px"></picture>

- 📦 **Gestión de entidades**:
  - Órdenes (`Order`)
  - Actividades (`Activity`)
  - Técnicos (`Technician`)
  - Roles, causas y observaciones

- 📅 Manejo completo de fecha de legalización

- 💾 Exportación de listados a:
  - **PDF** (Dompdf): con estilos y tablas personalizadas

- 🧭 Navegación intuitiva por secciones: órdenes, actividades, técnicos y roles

---

## 🚀 Comenzando

### Requisitos previos

- PHP 8.1 o superior
- Composer
- MySQL
- Node.js y npm (para assets frontend)

### Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/Sebas18Rodriguez18/OrderWeb.git
   cd orderweb-laravel-example/orderweb
   ```
2. Instala dependencias de PHP y JavaScript:
   ```bash
   composer install
   npm install && npm run build
   ```
3. Copia el archivo de entorno y configura tus credenciales:
   ```bash
   cp .env.example .env
   ```
   Edita `.env` y ajusta:
   ```
   DB_DATABASE=bd_order
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```
   En el repositorio se encuentra el archivo SQL en la carpeta tools.
   
4. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```
5. Ejecuta migraciones y (opcional) seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Inicia el servidor:
   ```bash
   php artisan serve
   ```
7. Accede en tu navegador:
   ```
   http://localhost:8000/
   ```
  En la BD todos los usuarios ingresan con el correo de la BD de cualquier usuario y de contraseña "password"
---

## 📌 Estructura del proyecto

```
orderweb/
├── app/
│   ├── Models/         # Modelos Eloquent (Order, Activity, Technician, etc.)
│   ├── Http/
│   │   ├── Controllers/ # Controladores web y API
│   │   └── ...
│   └── ...
├── resources/
│   ├── views/          # Vistas Blade (home, order, activity, technician…)
│   └── ...
├── routes/
│   └── web.php         # Rutas principales
├── database/
│   ├── migrations/     # Migraciones de base de datos
│   └── seeders/
├── public/
├── composer.json       # Dependencias PHP (Laravel, Dompdf, etc.)
└── package.json        # Dependencias JS (Vite, etc.)
```

---

## 📄 Exportar listados

- **PDF**: botón “Exportar PDF” genera un reporte estilizado usando Dompdf.

---

## 🧩 Personalizaciones

- Los estilos de PDF pueden editarse en los controladores y vistas Blade correspondientes.
- Las columnas que se muestran se configuran en los archivos Blade y métodos del controlador.

---

## 🛠️ Buenas prácticas

- Controladores organizados en `app/Http/Controllers`
- Rutas limpias en `routes/web.php`
- Exportación gestionada con Dompdf y Laravel Excel
- Tablas HTML responsivas con Bootstrap 5

---

## Actividad SENA
Este proyecto fue desarrollado como actividad del <a href="https://www.sena.edu.co/es-co/Paginas/default.aspx" target="_blank">SENA (Servicio Nacional de Aprendizaje)</a> <a href="https://sena-clem.blogspot.com" target="_blank">CLEM (Centro Latinoámericano de Especies Menores)</a> dentro del programa de análisis y desarrollo de software (ADSO).

---

## Connect with Me
<p align="center">
 <img src="https://github.com/Sebas18Rodriguez18/Sebas18Rodriguez18/blob/main/logo-page.png" width="210">
<p align="center">
  <a href="mailto:sr1290853@gmail.com" target="_blank">
    <img src="https://img.shields.io/badge/Email-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Email">
  </a>
  &nbsp;
  <a href="https://t.me/SebasDevCruz26" target="_blank">
    <img src="https://img.shields.io/badge/Telegram-26A5E4?style=for-the-badge&logo=telegram&logoColor=white" alt="Telegram">
  </a>
  &nbsp;
  <a href="https://www.instagram.com/srcj_26/" target="_blank">
    <img src="https://img.shields.io/badge/Instagram-E4405F?style=for-the-badge&logo=instagram&logoColor=white" alt="Instagram">
  </a>
  &nbsp;
  <a href="https://www.linkedin.com/in/sebastian-cruz-43b733343/" target="_blank">
    <img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white" alt="LinkedIn">
  </a>
  &nbsp;
  <a href="https://github.com/Sebas18Rodriguez18" target="_blank">
    <img src="https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub">
  </a>
</p>

<p align="center">
  <img src="https://media.giphy.com/media/jpVnC65DmYeyRL4LHS/giphy.gif" width="300">
