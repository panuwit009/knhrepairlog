@echo off
set MYSQL_LOG="C:\xampp\mysql\data\mysql_error.log"
echo Showing MySQL error log...
echo ----------------------------------------------------
type %MYSQL_LOG%
echo ----------------------------------------------------
pause

