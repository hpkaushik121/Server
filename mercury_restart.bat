@echo off
cd /D %~dp0
apache\bin\pv -f -k mercury.exe -q
echo mercury stopped
echo restarting mercury

start /d "MercuryMail/" mercury.exe

exit
