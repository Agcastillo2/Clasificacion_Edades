
# Sistema de Clasificación por Edades

<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" width="100" alt="Laravel Logo">
  <h2 align="center">Sistema de Gestión por Grupos Etarios</h2>
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?logo=laravel" alt="Laravel Version"></a>
  <a href="#"><img src="https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php" alt="PHP Version"></a>
  <a href="#"><img src="https://img.shields.io/badge/MySQL-Compatible-4479A1?logo=mysql" alt="MySQL"></a>
  <a href="#"><img src="https://img.shields.io/badge/License-MIT-blue.svg" alt="License"></a>
</p>

## 📌 Tabla de Contenidos
- [Descripción del Proyecto](#-descripción-del-proyecto)
- [Características](#-características)
- [Grupos Etarios](#-grupos-etarios)
- [Requisitos](#-requisitos)
- [Instalación](#-instalación)
- [Configuración](#-configuración)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Uso del Sistema](#-uso-del-sistema)
- [Rutas API](#-rutas)
- [Middleware](#-middleware)
- [Licencia](#-licencia)

## 🚀 Descripción del Proyecto
Sistema web desarrollado en Laravel que clasifica automáticamente a los usuarios en diferentes grupos etarios mediante autenticación por edad, proporcionando interfaces específicas para cada grupo.

## ✨ Características
- ✔️ Sistema de autenticación por edad
- ✔️ 7 categorías etarias con lógica específica
- ✔️ Middleware de verificación de edad personalizado
- ✔️ Rutas protegidas por grupo etario
- ✔️ Diseño adaptado para cada franja de edad
- ✔️ Fácil integración con bases de datos

## 👥 Grupos Etarios
| Grupo | Rango de Edad | Ruta | Controlador |
|-------|---------------|------|-------------|
| 👶 Bebés | 0-2 años | `/bebes` | `BebeController` |
| 🧒 Niños | 3-12 años | `/ninos` | `NinoController` |
| 🧑 Adolescentes | 13-17 años | `/adolescentes` | `AdolecenteController` |
| 🧑‍💼 Jóvenes Adultos | 18-35 años | `/jovenes-adultos` | `JovenAdultoController` |
| 👨‍💼 Adultos | 36-65 años | `/adultos` | `AdultoController` |
| 👴 Adultos Mayores | 66-90 años | `/adultos-mayores` | `AdultoMayorController` |
| 🧙 Personas Longevas | 91+ años | `/personas-longevas` | `PersonaLongevaController` |

## 📋 Requisitos
- **Servidor**: PHP 8.2+, MySQL 5.7+
- **Dependencias**:
  - Composer 2.x
  - Node.js 16+ (para desarrollo)
- **Extensiones PHP**:
  - BCMath
  - Ctype
  - JSON
  - Mbstring
  - PDO MySQL

## 🛠️ Instalación
```bash
# 1. Clonar repositorio
git clone [url-del-repositorio]
cd clasificacion-edad

# 2. Instalar dependencias
composer install
npm install

# 3. Configurar entorno
cp .env.example .env
php artisan key:generate

# 4. Configurar base de datos (editar .env)
nano .env

# 5. Ejecutar migraciones
php artisan migrate

# 6. Iniciar servidor
php artisan serve
npm run dev
```

## ⚙️ Configuración

Archivo `.env` mínimo requerido:

```env
APP_NAME=ClasificacionEdad
APP_ENV=local
APP_KEY=[generado automáticamente]
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clasificacion_edad
DB_USERNAME=root
DB_PASSWORD=
```

## 📂 Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── BebeController.php
│   │   ├── NinoController.php
│   │   ├── AdolecenteController.php
│   │   ├── JovenAdultoController.php
│   │   ├── AdultoController.php
│   │   ├── AdultoMayorController.php
│   │   ├── PersonaLongevaController.php
│   │   └── LoginController.php
│   ├── Middleware/
│   │   └── CheckAge.php
│   └── Models/
│       ├── Edad.php
│       └── User.php
routes/
├── web.php (contiene todas las rutas del sistema)
```

## 🖥️ Uso del Sistema

1. Acceder a la ruta `/login`
2. Ingresar la edad del usuario
3. El sistema:
   - Valida la edad ingresada
   - Determina el grupo etario correspondiente
   - Redirecciona a la vista específica
   - Muestra contenido adaptado al grupo etario

## 🌐 Rutas

| Método | Ruta | Controlador | Acción | Middleware |
|--------|------|-------------|--------|------------|
| GET | /login | LoginController | index | - |
| POST | /login/validar | LoginController | validarEdad | - |
| GET | /bebes | BebeController | index | CheckAge:bebe |
| GET | /ninos | NinoController | index | CheckAge:nino |
| GET | /adolescentes | AdolecenteController | index | CheckAge:adolescente |
| GET | /jovenes-adultos | JovenAdultoController | index | CheckAge:joven-adulto |
| GET | /adultos | AdultoController | index | CheckAge:adulto |
| GET | /adultos-mayores | AdultoMayorController | index | CheckAge:adulto-mayor |
| GET | /personas-longevas | PersonaLongevaController | index | CheckAge:persona-longeva |

## 🔒 Middleware CheckAge

Middleware personalizado que verifica si el usuario pertenece al grupo etario requerido:

```php
// Uso en rutas:
Route::middleware(CheckAge::class.':bebe')->group(function () {
    // Rutas para bebés
});

// Lógica principal:
public function handle($request, Closure $next, $grupoEtario)
{
    if ($request->session()->get('edadGrupo') !== $grupoEtario) {
        return redirect('/login');
    }
    return $next($request);
}
```

## 📜 Licencia

Este proyecto está licenciado bajo la Licencia MIT.
