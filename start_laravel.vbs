Set WshShell = CreateObject("WScript.Shell")
WshShell.Run chr(34) & "start_laravel.bat" & chr(34), 0
Set WshShell = Nothing
