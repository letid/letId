SET NEWLINE=^& echo.

FIND /C /I "zotunemyordbok.db.8313981.hostedresource.com" %WINDIR%\system32\drivers\etc\hosts
IF %ERRORLEVEL% NEQ 0 ECHO %NEWLINE%^188.121.44.141:3306                   zotunemyordbok.db.8313981.hostedresource.com>>%WINDIR%\system32\drivers\etc\hosts

