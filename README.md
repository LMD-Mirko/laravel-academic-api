<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="500" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# API de Gestión Educativa

API REST desarrollada con Laravel para la gestión de estudiantes y profesores. Proporciona operaciones CRUD completas con validación de datos y respuestas JSON estructuradas.

## Descripción

Sistema de gestión académica que permite administrar información de estudiantes y profesores mediante una API RESTful. Incluye validación de datos, manejo de errores y soporte para actualizaciones parciales de recursos.

## Características Principales

- Operaciones CRUD completas (Create, Read, Update, Delete)
- Validación de datos con mensajes de error personalizados
- Actualización parcial de recursos mediante método PATCH
- Respuestas JSON estructuradas con códigos de estado HTTP apropiados
- Gestión independiente de estudiantes y profesores
- Validación de campos requeridos y formatos específicos

## Endpoints Disponibles

### Estudiantes

- `GET /api/students` - Listar todos los estudiantes
- `GET /api/students/{id}` - Obtener un estudiante específico
- `POST /api/students` - Crear un nuevo estudiante
- `PUT /api/students/{id}` - Actualizar un estudiante completo
- `PATCH /api/students/{id}` - Actualizar parcialmente un estudiante
- `DELETE /api/students/{id}` - Eliminar un estudiante

### Profesores

- `GET /api/teachers` - Listar todos los profesores
- `GET /api/teachers/{id}` - Obtener un profesor específico
- `POST /api/teachers` - Crear un nuevo profesor
- `PUT /api/teachers/{id}` - Actualizar un profesor completo
- `PATCH /api/teachers/{id}` - Actualizar parcialmente un profesor
- `DELETE /api/teachers/{id}` - Eliminar un profesor

## Tecnologías Utilizadas

- **Laravel** - Framework PHP
- **PHP** - Lenguaje de programación
- **SQLite/MySQL** - Base de datos

## Requisitos

- PHP >= 8.1
- Composer
- Laravel 11.x

## Instalación

1. Clonar el repositorio
2. Instalar dependencias: `composer install`
3. Configurar el archivo `.env`
4. Ejecutar migraciones: `php artisan migrate`
5. Iniciar el servidor: `php artisan serve`

## Estructura del Proyecto

```
app/
├── Http/
│   └── Controllers/
│       └── Api/
│           ├── studentController.php
│           └── teacherController.php
├── Models/
│   ├── Student.php
│   └── Teachers.php
routes/
└── api.php
```

## Licencia

Este proyecto está bajo la licencia MIT.
