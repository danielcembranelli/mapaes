<?php
// Hora atual
echo date('h:i:s') . "<br>";
set_time_limit(200); 
// Dorme por 10 segundos
sleep(50);

// Acorde!
echo date('h:i:s') . "<br>";
set_time_limit(40); 
sleep(10);
echo date('h:i:s') . "<br>";
?> 