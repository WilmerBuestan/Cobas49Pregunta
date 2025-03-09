
## **📜 README.md - Cuestionario Interactivo en Laravel 12**
### **📌 Descripción**
Este es un **aplicativo web en Laravel 12** que permite:
- Crear y gestionar **materias**.
- Cargar archivos **JSON** con preguntas para generar cuestionarios interactivos.
- Realizar cuestionarios con **retroalimentación visual** de respuestas correctas e incorrectas.
- Obtener **calificaciones** al finalizar un cuestionario.

---

## **🚀 Instalación y Configuración**
### **1️⃣ Requisitos Previos**
Antes de comenzar, asegúrate de tener instalado en tu equipo:
- **PHP 8.2 o superior**
- **Composer** ([Descargar aquí](https://getcomposer.org/))
- **XAMPP** (para MySQL y Apache) ([Descargar aquí](https://www.apachefriends.org/es/index.html))
- **Git** (opcional, para clonar el repositorio) ([Descargar aquí](https://git-scm.com/))

---

### **2️⃣ Clonar el Proyecto**
Si tienes Git instalado, usa este comando para clonar el repositorio:
```sh
git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio
```
O simplemente **descarga el código en formato ZIP** y extráelo.

---

### **3️⃣ Instalar Dependencias**
Ejecuta los siguientes comandos en la terminal dentro del proyecto:
```sh
composer install
```

---

### **4️⃣ Configurar el Entorno**
1. **Duplicar el archivo `.env.example` y renombrarlo a `.env`**:
   ```sh
   cp .env.example .env
   ```

2. **Configurar la conexión a la base de datos en el `.env`**:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=cuestionario
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   📌 *Si usas otro usuario de MySQL, cambia `DB_USERNAME` y `DB_PASSWORD`*.

---

### **5️⃣ Generar la Clave de Aplicación**
Laravel necesita una clave de cifrado (`APP_KEY`) para funcionar correctamente.  
Si al ejecutar el proyecto ves el error **"No application encryption key has been specified"**, solucionalo con:

```sh
php artisan key:generate
```
Si el comando se ejecuta correctamente, verás un mensaje como este:
```
Application key set successfully.
```

Para asegurarnos de que Laravel reconoce la clave, ejecuta:
```sh
php artisan config:clear
php artisan cache:clear
```

Finalmente, abre el archivo **`.env`** y verifica que la línea `APP_KEY` tenga un valor generado:
```
APP_KEY=base64:abcdefg123456789hijklmnopqrstuvwxyz=
```

---

### **6️⃣ Crear la Base de Datos**
1. **Abre XAMPP** y activa **Apache** y **MySQL**.
2. **Crea una base de datos** en MySQL llamada `cuestionario`.
3. **Ejecuta las migraciones** para generar las tablas necesarias:
   ```sh
   php artisan migrate --seed
   ```

---

### **7️⃣ Ejecutar el Servidor**
Inicia el servidor local de Laravel con:
```sh
php artisan serve
```
Esto iniciará el proyecto en:
```
http://127.0.0.1:8000
```

---

## **🛠 Funcionalidades**
✔ **Gestión de Materias**: Crear, editar y eliminar materias.  
✔ **Carga de Preguntas en JSON**: Subir archivos JSON para generar cuestionarios.  
✔ **Cuestionarios Interactivos**: Resaltar respuestas correctas y mostrar la calificación final.  
✔ **Barra de Navegación**: Acceso rápido a la página de inicio y opción de cancelar.  

---

## **📂 Estructura del Proyecto**
```
cuestionario-laravel/
│── app/                   # Lógica del backend (Controladores, Modelos)
│── database/              # Migraciones y Seeders
│── public/                # Archivos accesibles públicamente
│── resources/             # Vistas Blade y archivos CSS/JS
│── routes/                # Definición de rutas web y API
│── .env.example           # Archivo de configuración de entorno
│── composer.json          # Dependencias del proyecto
│── README.md              # Documentación del proyecto
```

---

## **📖 Notas Adicionales**
- Si necesitas **resetear la base de datos**, usa:
  ```sh
  php artisan migrate:fresh --seed
  ```
- Para ver errores en Laravel, activa el modo **debug** en `.env`:
  ```ini
  APP_DEBUG=true
  ```

---

## **🙌 Créditos**
📌 Proyecto desarrollado por **Wilmer Buestan**  
🔗 GitHub:https://github.com/WilmerBuestan/Cobas49Pregunta
