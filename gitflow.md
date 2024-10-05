# Convenciones para Commits en Git

## 🖐️ `settings`
Para añadir configuraciones en el proyecto.
- **Ejemplo**: `settings: changes in ENV archive`

## 🔧 `feat`
Para añadir nuevas funcionalidades.
- **Ejemplo**: `feat: add login functionality`

## 🐞 `fix`
Para corregir errores en el código.
- **Ejemplo**: `fix: resolve issue with user authentication`

## 📚 `docs`
Para cambios en la documentación.
- **Ejemplo**: `docs: update README with installation instructions`

## 🎨 `style`
Para cambios que no afectan la lógica del código (espacios en blanco, formato, etc.).
- **Ejemplo**: `style: format code with Prettier`

## 🛠 `refactor`
Para mejorar el código sin corregir errores ni añadir nuevas funcionalidades.
- **Ejemplo**: `refactor: simplify authentication logic`

## 🧪 `test`
Para agregar o modificar pruebas.
- **Ejemplo**: `test: add unit tests for authentication module`

## 🧹 `chore`
Para tareas de mantenimiento y configuración que no afectan el código fuente ni las pruebas.
- **Ejemplo**: `chore: update dependencies`

## ⚡ `perf`
Para mejorar el rendimiento.
- **Ejemplo**: `perf: optimize query execution time`

## 🚧 `WIP`
Para indicar que el trabajo está en progreso y aún no está completo.
- **Ejemplo**: `WIP: add user profile page`

## 🔄 `revert`
Para revertir cambios previos.
- **Ejemplo**: `revert: undo changes to login functionality`

## 🔀 `merge`
Para indicar la fusión de ramas.
- **Ejemplo**: `merge: branch 'feature/login' into 'main'`

## 🚨 `hotfix`
Para corregir un error crítico que necesita atención inmediata.
- **Ejemplo**: `hotfix: fix broken login in production`

## 📦 `build`
Para cambios que afectan el sistema de construcción o dependencias externas (compiladores, herramientas de construcción, etc.).
- **Ejemplo**: `build: update webpack config for production`

## 🎉 `init`
Para inicializar un proyecto o componente.
- **Ejemplo**: `init: initial commit of project setup`

## 🔧 `config`
Para cambios en configuraciones específicas, como archivos `.env` o ajustes de herramientas de desarrollo.
- **Ejemplo**: `config: update database environment variables`

## ⚙️ `ci`
Para cambios en archivos y scripts de integración continua (CI) como GitHub Actions, Travis, Circle, etc.
- **Ejemplo**: `ci: add GitHub Actions for automated testing`

## 📦 `deps`
Para cambios relacionados con dependencias.
- **Ejemplo**: `deps: update Vue.js to version 3.2`

## 📦 `vendor`
Para indicar cambios en bibliotecas o dependencias externas sin modificaciones propias.
- **Ejemplo**: `vendor: update third-party library`

## 🌍 `i18n`
Para cambios relacionados con la internacionalización y localización.
- **Ejemplo**: `i18n: add Spanish translation for the login page`

## 🔒 `security`
Para solucionar problemas relacionados con la seguridad.
- **Ejemplo**: `security: fix XSS vulnerability in user input`
## `closed`
Para indicar cierre de alguna seccion o pagina
- **Ejemplo**: `closed: end home page`


# Estrategia de Ramas en Git

## 1. `main` o `master` (Rama Principal)
- **Propósito**: Esta rama siempre debe estar en un estado completamente estable y lista para ser desplegada en producción.
- **Commits**: Sólo se aceptan commits después de haber pasado por pruebas y revisiones.
- **Buena Práctica**: Las fusiones hacia `main` deben realizarse solo desde una rama de `release` o `hotfix`.

## 2. `develop` (Rama de Desarrollo)
- **Propósito**: Es la rama donde se integran los cambios de todas las funcionalidades nuevas antes de que lleguen a producción.
- **Commits**: Se aceptan cambios que están completos y han pasado pruebas locales o CI.
- **Buena Práctica**: Todas las nuevas características o correcciones se deben fusionar aquí antes de pasar a producción.

## 3. `feature/` (Ramas de Funcionalidad)
- **Convención de Nombre**: `feature/nueva-funcionalidad`
- **Propósito**: Ramas para el desarrollo de nuevas características. Se crean a partir de `develop`.
- **Commits**: Aquí van todos los cambios relacionados con el desarrollo de una funcionalidad específica.
- **Buena Práctica**: Cuando la funcionalidad esté completa y testeada, la rama debe fusionarse en `develop` y luego eliminarse.
- **Ejemplo**: `feature/add-login`

## 4. `bugfix/` (Ramas de Corrección de Errores)
- **Convención de Nombre**: `bugfix/issue-identificado`
- **Propósito**: Ramas para corregir errores no críticos. Se crean a partir de `develop`.
- **Commits**: Incluye solo las correcciones del error específico.
- **Buena Práctica**: Una vez corregido, se fusiona en `develop` y se elimina.
- **Ejemplo**: `bugfix/fix-login-validation`

## 5. `hotfix/` (Ramas de Corrección Rápida)
- **Convención de Nombre**: `hotfix/descripcion-del-error`
- **Propósito**: Ramas para corregir errores críticos que necesitan atención inmediata en producción. Se crean a partir de `main`.
- **Commits**: Contienen solo los cambios necesarios para corregir el error.
- **Buena Práctica**: Una vez corregido, se fusiona en `main` y `develop` para que ambas ramas estén actualizadas.
- **Ejemplo**: `hotfix/fix-critical-security-bug`

## 6. `release/` (Ramas de Lanzamiento)
- **Convención de Nombre**: `release/version-x.y.z`
- **Propósito**: Preparar versiones para producción. Se crean a partir de `develop` cuando las funcionalidades están listas para ser lanzadas.
- **Commits**: Incluyen solo ajustes finales (como correcciones menores o ajustes de configuración).
- **Buena Práctica**: Una vez finalizado, se fusiona en `main` y en `develop`, y se etiqueta con la versión.
- **Ejemplo**: `release/v1.0.0`

## 7. `chore/` (Ramas de Mantenimiento)
- **Convención de Nombre**: `chore/tarea-de-mantenimiento`
- **Propósito**: Para tareas de mantenimiento que no añaden nuevas características ni corrigen errores.
- **Commits**: Pueden incluir actualizaciones de dependencias o cambios en la configuración del proyecto.
- **Buena Práctica**: Se fusiona en `develop` cuando está listo.
- **Ejemplo**: `chore/update-dependencies`

---

# Flujo de Trabajo Sugerido

1. **Crear una rama desde `develop`**: 
   - Para nuevas funcionalidades o correcciones no críticas, crear una rama `feature/` o `bugfix/` a partir de `develop`.
   - Para hotfixes críticos, crear la rama `hotfix/` desde `main`.

2. **Hacer commits regulares**:
   - Mantén tus commits pequeños y enfocados en una sola tarea o corrección.

3. **Realizar PRs (Pull Requests)**:
   - Para fusionar ramas `feature/` o `bugfix/`, crear un PR hacia `develop`.
   - Para `release/`, fusionar primero en `main` y luego en `develop`.
   - Los `hotfixes` deben ser fusionados tanto en `main` como en `develop`.

4. **Pruebas y Revisiones**:
   - Todo el código debe ser probado localmente o a través de una pipeline de CI antes de ser fusionado.

5. **Eliminar ramas**:
   - Después de la fusión, elimina la rama de funcionalidad, corrección de error o hotfix para mantener limpio el repositorio.

---