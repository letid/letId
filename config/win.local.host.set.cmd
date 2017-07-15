SET NEWLINE=^& echo.

FIND /C /I "myordbok.local" %WINDIR%\system32\drivers\etc\hosts
IF %ERRORLEVEL% NEQ 0 ECHO %NEWLINE%^127.0.0.1                   myordbok.local>>%WINDIR%\system32\drivers\etc\hosts