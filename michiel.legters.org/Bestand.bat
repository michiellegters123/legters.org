@echo off
cls
set stop = [10];
:loop

set /A COUNTER=%COUNTER%+1
echo %COUNTER%
echo.>%COUNTER%

goto loop;
