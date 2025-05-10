@echo off
setlocal enabledelayedexpansion

REM Set working directory to script location
cd /d %~dp0

REM Use the bundled PHP
set PHP_PATH=%~dp0php\php.exe

REM Check if PHP exists
if not exist "!PHP_PATH!" (
    msg * "PHP runtime not found."
    exit /b 1
)

REM Set host and port
set HOST=localhost
set PORT=8000

REM Open browser automatically
start http://%HOST%:%PORT%

REM Start Laravel with internal PHP
"!PHP_PATH!" -S %HOST%:%PORT% -t public
