@echo off
echo ========================================
echo Limpiando cache de Laravel...
echo ========================================
echo.

cd C:\laragon\www\proyecto_negocios_electronicos

REM Limpiar vistas cacheadas
echo [1/4] Limpiando vistas cacheadas...
if exist "storage\framework\views\*" (
    del /q "storage\framework\views\*"
    echo   OK - Vistas eliminadas
) else (
    echo   OK - No habia vistas cacheadas
)

REM Limpiar cache de bootstrap
echo [2/4] Limpiando cache de bootstrap...
if exist "bootstrap\cache\config.php" del /q "bootstrap\cache\config.php"
if exist "bootstrap\cache\packages.php" del /q "bootstrap\cache\packages.php"
if exist "bootstrap\cache\services.php" del /q "bootstrap\cache\services.php"
if exist "bootstrap\cache\*.php" del /q "bootstrap\cache\*.php"
echo   OK

REM Limpiar cache de aplicacion
echo [3/4] Limpiando cache de aplicacion...
if exist "bootstrap\cache\.gitignore" goto skip_app_cache
if exist "storage\framework\cache\data\*" (
    del /q "storage\framework\cache\data\*" 2>nul
)
:skip_app_cache
echo   OK

REM Refrescar productos
echo [4/4] Refrescando productos en BD...
C:\laragon\bin\php\php-8.3.16-Win32-vs16-x64\php.exe artisan app:refresh-products

echo.
echo ========================================
echo LIMPIEZA COMPLETADA
echo Ahora puedes recargar la pagina (F5)
echo ========================================
pause
