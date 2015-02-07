<html>
<title>Actividad de servidores</title>
<body bgcolor="#ffcc66">
 
<center><h2><u>Actividad de servidores</u></h2></center>
<table align=center border=1>
<?
error_reporting(E_ERROR);

// Si quieres añadir alguna maquina cambia el NumServ al numero de servidores i añade bajo $Maquines[numerosiguiente]="IPMAQUINANUEVA";
$NumServ=1;
$Maquines[1]="200.55.245.171";
//$Maquines[2]="173.194.42.81";
 
// Idem si quieres añadir algun puerto a provar
$NumPorts=5;
$Ports[1]=6100;
$Ports[2]=6101;
$Ports[3]=5012;
$Ports[4]=5011;
$Ports[5]=7011;
print ("<tr><td><b>Maquina</b></td>");
for ($k=1 ; $k<$NumPorts+1 ; $k++) {
    print("<td><b>Port ".$Ports[$k]."</b></td>");
}
print ("</tr>");
for ($i=1 ; $i<$NumServ+1 ; $i++){
   print ("<tr><td>$Maquines[$i]</td>");
   for($j=1 ; $j<$NumPorts+1 ; $j++) {
       $fs=fsockopen($Maquines[$i],$Ports[$j],$errno,$errstr,30);	   
					print ("<td align=center>");
       if (!$fs) 
				{
					print "ERROR: $errno - $errstr<br />\n";
					print("<font color=#cc0000><b>ERROR</b></font>"); 
				}else{
					print ("<font color=#006600>OK</font>");
				}	
					print ("</td>");
   }
print("</tr>");
}
?>
</table>
<br>
<br>
<center><a href="index.php">Actualitza</a>
<hr>
<b><i>Hora de el informe:  
<?
$fecha=getdate();
print ($fecha["hours"].":".$fecha["minutes"]);
?>
</b></i></center>
 

</body>
</html>