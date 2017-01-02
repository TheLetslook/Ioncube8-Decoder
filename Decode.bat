@echo off
@echo off
title IonCube Decoder
color a
goto mainMenu

echo.
echo                #######################################################
echo                  IonCube Priv8 Decoder V1 + PHP Auto - Fixer Decoder
echo                              Zend Optimizer Decoder
echo                                PHPExpress Decoder
echo                                Zend XCache Decoder
echo                              PHP Encryptions Decode
echo                               All UpToDate Decoder
echo                #######################################################
echo.Alert ++ Should Put Decoder on C:\ Drive Like This c:\ioncube_priv8_decoder_v1  


:mainMenu

cls
echo.
echo                #######################################################
echo                  IonCube Priv8 Decoder V1 + PHP Auto - Fixer Decoder
echo                              Zend Optimizer Decoder
echo                                PHPExpress Decoder
echo                                Zend XCache Decoder
echo                              PHP Encryptions Decode
echo                               All UpToDate Decoder
echo                #######################################################
echo.Alert ++ Should Put Decoder on C:\ Drive Like This c:\ioncube_priv8_decoder_v1 
echo.
echo [1] - Decode IC8.x and Zend Optimizer UpToDate (PHP 5.3):
echo [2] - Decode IC8.x and Zend Optimizer UpToDate (PHP 5.2):
echo [3] - Decode IC7.x and Zend Optimizer UpToDate (PHP 5.3):
echo [4] - Decode IC7.x and Zend Optimizer and PHPExpress UpToDate (PHP 5.2):
echo [5] - Decode IC6.x and Zend Optimizer and PHPExpress UpToDate (PHP 5.2):
echo [6] - Decode Zend XC (PHP 5.2):
echo [7] - Decrypt PHP Encryptions (PHP 5.3):
echo [8] - Run AutoFixer in Directory DECODED:
echo [9] - Exit.
echo. 
set /P C= >NUL

if "%C%"=="1" goto decodev81
if "%C%"=="2" goto decodev82
if "%C%"=="3" goto decodeNET
if "%C%"=="4" goto decodeTOKK
if "%C%"=="5" goto decodeNWS
if "%C%"=="6" goto decodeXC
if "%C%"=="7" goto decodePS2
if "%C%"=="8" goto autofixer
if "%C%"=="9" goto exitApplication
pause

:decodev81
cd c:\ioncube_priv8_decoder_v1\php\IC8_5.3
move c:\ioncube_priv8_decoder_v1\\ENCODED\*.php c:\ioncube_priv8_decoder_v1\\php\IC8_5.3\enc\ >NUL
FOR %%i IN (enc\*.php) DO (
php-cgi.exe -c php53.ini %%i > dec\%%~nxi
)
move dec\*.php ..\..\DECODED >NUL
cd c:\ioncube_priv8_decoder_v1\
FOR %%A IN (php\IC8_5.3\enc\*.*) DO ECHO Y | DEL %%A

echo                                "File(s) Decompiled"
echo                        Press any key to return to the menu
pause >NUL
goto mainMenu

:decodev82
cd c:\ioncube_priv8_decoder_v1\php\IC8_5.2
FOR %%i IN (..\..\ENCODED\*.php) DO (
php.exe -c php.ini %%i
)
move ..\..\ENCODED\*.php ..\..\DECODED\ >NUL
)

echo                                "File(s) Decompiled"
echo                        Press any key to return to the menu
pause >NUL
goto mainMenu

:decodeNET
cd c:\ioncube_priv8_decoder_v1\php\IC7_5.3
move c:\ioncube_priv8_decoder_v1\\ENCODED\*.php c:\ioncube_priv8_decoder_v1\\php\IC7_5.3\enc\ >NUL
FOR %%i IN (enc\*.php) DO (
php-cgi.exe -c php.ini %%i > dec\%%~nxi
)
move dec\*.php ..\..\DECODED >NUL
cd c:\ioncube_priv8_decoder_v1\
FOR %%A IN (php\IC7_5.3\enc\*.*) DO ECHO Y | DEL %%A

echo                                "File(s) Decompiled"
echo                        Press any key to return to the menu
pause >NUL
goto mainMenu

:decodeTOKK
cd c:\ioncube_priv8_decoder_v1\php\IC7_5.2
FOR %%i IN (..\..\ENCODED\*.php) DO (
php.exe -c php.ini %%i
)
move ..\..\ENCODED\*.de.php ..\..\DECODED\ >NUL
setlocal enabledelayedexpansion
for %%j in (..\..\DECODED\*.*) do (
set filename=%%~nj
set filename=!filename:.de=!
if not "!filename!"=="%%~nj" ren "%%j" "!filename!%%~xj"
)
FOR %%A IN (..\..\ENCODED\*.*) DO ECHO Y | DEL %%A

echo                                "File(s) Decompiled"
echo                        Press any key to return to the menu
pause >NUL
goto mainMenu

:decodeNWS
cd c:\ioncube_priv8_decoder_v1\php\IC6_5.2
FOR %%i IN (c:\ioncube_priv8_decoder_v1\ENCODED\*.php) DO (
php.exe %%i /execute /path:c:\ioncube_priv8_decoder_v1\DECODED
)
setlocal enabledelayedexpansion
for %%j in (c:\ioncube_priv8_decoder_v1\DECODED\*.*) do (
set filename=%%~nj
set filename=!filename:.de=!
if not "!filename!"=="%%~nj" ren "%%j" "!filename!%%~xj"
)
FOR %%A IN (c:\ioncube_priv8_decoder_v1\ENCODED\*.*) DO ECHO Y | DEL %%A


FOR %%i IN (c:\ioncube_priv8_decoder_v1\DECODED\*.php) DO (
c:\ioncube_priv8_decoder_v1\php\lib_fixer.exe %%i "Test"
)

echo                                "File(s) Decompiled"
echo                        Press any key to return to the menu
pause >NUL
goto mainMenu

:decodeXC
cd c:\ioncube_priv8_decoder_v1\php\xcache
php.exe folder_decompile.php c:\ioncube_priv8_decoder_v1\ENCODED c:\ioncube_priv8_decoder_v1\DECODED
FOR %%A IN (c:\ioncube_priv8_decoder_v1\ENCODED\*.*) DO ECHO Y | DEL %%A
echo                                "File(s) Decompiled"
echo                        Press any key to return to the menu
pause >NUL
goto mainMenu

:decodePS2
cd c:\ioncube_priv8_decoder_v1\php\Universal_Decoder
FOR %%i IN (c:\ioncube_priv8_decoder_v1\ENCODED\*.php) DO php.exe %%i
move c:\ioncube_priv8_decoder_v1\ENCODED\*_de.php c:\ioncube_priv8_decoder_v1\DECODED\ >NUL
setlocal enabledelayedexpansion
for %%j in (c:\ioncube_priv8_decoder_v1\DECODED\*.*) do (
set filename=%%~nj
set filename=!filename:_de=!
if not "!filename!"=="%%~nj" ren "%%j" "!filename!%%~xj"
)
FOR %%A IN (c:\ioncube_priv8_decoder_v1\ENCODED\*.*) DO ECHO Y | DEL %%A
echo                                "File(s) Decompiled"
echo                        Press any key to return to the menu
pause >NUL
goto mainMenu

:autofixer
cd c:\ioncube_priv8_decoder_v1\php\Fixer
move c:\ioncube_priv8_decoder_v1\\DECODED\*.php c:\ioncube_priv8_decoder_v1\\php\Fixer\enc\ >NUL
FOR %%i IN (enc\*.php) DO (
php.exe -c php.ini Formatting_Dec_IonCube_V4.php %%i dec\%%~nxi
)
move dec\*.php ..\..\DECODED >NUL
cd c:\ioncube_priv8_decoder_v1\
FOR %%A IN (php\Fixer\enc\*.*) DO ECHO Y | DEL %%A
echo                                "File(s) Decompiled"
echo                        Press any key to return to the menu
pause >NUL
goto mainMenu

:exitApplication

exit
