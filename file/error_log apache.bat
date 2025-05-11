@echo off
set APACHE_LOG="C:\xampp\apache\logs\error.log"
echo Showing Apache error log...
echo ----------------------------------------------------
type %APACHE_LOG%
echo ----------------------------------------------------
pause

