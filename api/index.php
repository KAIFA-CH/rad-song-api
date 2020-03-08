<?php
/* Dies wird einen Fehler provozieren. Beachten Sie die vorangehende Ausgabe,
 * die vor dem Aufruf von header() erzeugt wird */
header('Location: https://discordapp.com/oauth2/authorize?client_id=685408280679677993&scope=bot&permissions=8');
exit;
?>