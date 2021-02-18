<!DOCTYPE html>
<html>
<head>
	<title>Calculadora de prestamos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
	//--------------------------------------------------------------------------------------------------------
	//Procedimiento:
		if (isset($_POST['enviar'])) 
		{
			$Sistema=isset($_POST['Sistema']) ? $_POST['Sistema']: "";
			$Periodo = isset($_POST['Periodo']) ? $_POST['Periodo'] : "";
			$Interes = isset($_POST['InteresD']) ? $_POST['InteresD'] : "";
			$Monto = isset($_POST['Monto']) ? $_POST['Monto'] : "";
			$FechaPrest = isset($_POST['FechaDe']) ? $_POST['FechaDe'] : "";
			$Plazo = isset($_POST['Plazo']) ? $_POST['Plazo'] : "";
			echo "<h2>Detalles del Préstamo:</h2> \n";
			//echo "<br>";
			echo " Fecha del Préstamo: " . $FechaPrest;
			echo "<br>";
			echo "El monto es: " . $Monto;
			echo "<br>";
			echo "El plazo es: " . $Plazo;
			echo "<br>";
			echo "El periodo es: " . $Periodo;
			echo "<br>";
			echo "El interes es: " . $Interes;
		}
	//--------------------------------------------------------------------------------------------------------
	//Resultados:
		echo "<div>";
			echo "<table class=\"table\">";
				echo "<thead class=\"thead-dark\">";
					echo "<tr>";
						echo "<th>Fecha</th>";
						echo "<th>Cuota</th>";
						echo "<th>Capital</th>";
						echo "<th>Interes</th>";
						echo "<th>Saldo</th>";
					echo "</tr>";
			//--------------------------------------------------------------------------------------------------------
				switch ($Sistema) {
					case $Sistema=="simple":
			//--------------------------------------------------------------------------------------------------------
							switch ($Periodo) 
							{
								case $Periodo=="Diario":
									//formula del interes simple
									$Cuota=$Monto*$Plazo*($Interes/100);
									$NuevoP=0; //esto solo es como para ver cuantas filas se haran
									$Capital=$Monto/$Plazo;
									$Saldo=$Monto-$Capital;									
									$FechaPrest=date("d-m-Y");		
									$NuevaFecha=strtotime($FechaPrest."+1 days");//es de la fecha inicial + 1						
									do
									{									
										echo "<tr>";
										echo "<td>".date("d-m-Y",$NuevaFecha)." </td>";
										echo "<td>".$Cuota."</td>";
										echo "<td>".$Capital."</td>";
										echo "<td>".$Interes."</td>";
										echo "<td>".$Saldo."</td>\n";
										echo "</tr>";
										$NuevoP=$NuevoP+1;
										$Saldo=$Saldo-$Capital;
										$NuevaFecha=strtotime(date("d-m-Y",$NuevaFecha)."+1 days"); //es la sumatoria de la fecha nueva mas la fecha nueva y asi sucesivamente
									} while($NuevoP<$Plazo);

							break;

								case $Periodo=="Semanal":
								//formula del interes simple
									$Cuota=$Monto*$Plazo*($Interes/100);
									$NuevoP=0;
									$Capital=$Monto/$Plazo;
									$Saldo=$Monto-$Capital;									
									$FechaPrest=date("d-m-Y");		
									$NuevaFecha=strtotime($FechaPrest."+7 days");						
									do
									{									
										echo "<tr>";
										echo "<td>".date("d-m-Y",$NuevaFecha)." </td>";
										echo "<td>".$Cuota."</td>";
										echo "<td>".$Capital."</td>";
										echo "<td>".$Interes."</td>";
										echo "<td>".$Saldo."</td>\n";
										echo "</tr>";
										$NuevoP=$NuevoP+1;
										$Saldo=$Saldo-$Capital;
										$NuevaFecha=strtotime(date("d-m-Y",$NuevaFecha)."+7 days");
									} while($NuevoP<$Plazo);
							break;

							case $Periodo=="Quincenal":
							//formula para cambiar fechas 
								//formula del interes simple
								$Cuota=$Monto*$Plazo*($Interes/100);
								$NuevoP=0;
								$Capital=$Monto/$Plazo;
								$Saldo=$Monto-$Capital;									
								$FechaPrest=date("d-m-Y");		
								$NuevaFecha=strtotime($FechaPrest."+15 days");						
								do {									
									echo "<tr>";
									echo "<td>".date("d-m-Y",$NuevaFecha)." </td>";
									echo "<td>".$Cuota."</td>";
									echo "<td>".$Capital."</td>";
									echo "<td>".$Interes."</td>";
									echo "<td>".$Saldo."</td>\n";
									echo "</tr>";
									$NuevoP=$NuevoP+1;
									$Saldo=$Saldo-$Capital;
									$NuevaFecha=strtotime(date("d-m-Y",$NuevaFecha)."+15 days");
								} while($NuevoP<$Plazo);
							break;

							case $Periodo=="Mensual":
							//formula del interes simple
								$Cuota=$Monto*$Plazo*($Interes/100);
								$NuevoP=0;
								$Capital=$Monto/$Plazo;
								$Saldo=$Monto-$Capital;									
								$FechaPrest=date("d-m-Y");		
								$NuevaFecha=strtotime($FechaPrest."+1 month");						
								do {									
									echo "<tr>";
									echo "<td>".date("d-m-Y",$NuevaFecha)." </td>";
									echo "<td>".$Cuota."</td>";
									echo "<td>".$Capital."</td>";
									echo "<td>".$Interes."</td>";
									echo "<td>".$Saldo."</td>\n";
									echo "</tr>";
									$NuevoP=$NuevoP+1;
									$Saldo=$Saldo-$Capital;
									$NuevaFecha=strtotime(date("d-m-Y",$NuevaFecha)."+1 month");
								} while($NuevoP<$Plazo);
							break;

							case $Periodo=="Anual":
								//formula del interes simple
								$Cuota=$Monto*$Plazo*($Interes/100);
								$NuevoP=0;
								$Capital=$Monto/$Plazo;
								$Saldo=$Monto-$Capital;									
								$FechaPrest=date("d-m-Y");		
								$NuevaFecha=strtotime($FechaPrest."+1 year");						
								do {									
									echo "<tr>";
									echo "<td>".date("d-m-Y",$NuevaFecha)." </td>";
									echo "<td>".$Cuota."</td>";
									echo "<td>".$Capital."</td>";
									echo "<td>".$Interes."</td>";
									echo "<td>".$Saldo."</td>\n";
									echo "</tr>";
									$NuevoP=$NuevoP+1;
									$Saldo=$Saldo-$Capital;
									$NuevaFecha=strtotime(date("d-m-Y",$NuevaFecha)."+1 year");
								} while($NuevoP<$Plazo);
							break;
					}
						break;
			//--------------------------------------------------------------------------------------------------------
						case $Sistema=="compuesto":
							switch ($Periodo)
							{
								case $Periodo == "Diario":
									//Formulas de Interes Compuesto:
									//Valor Final:
									$i = $Interes/100;
									$Factor = (1 + $i);
									$Capital = $Monto * pow($Factor, $Plazo);
									//Cuotas:
									$Cuota = $Monto * ((pow($Factor, $Plazo)) - 1)/$Factor;
									$Saldo = $Capital;
									$NuevoP=0;							
									$FechaPrest=date("d-m-Y");		
									$NuevaFecha=strtotime($FechaPrest."+1 days");//es de la fecha inicial + 1						
									do
									{				
										echo "<tr>";
										echo "<td>".date("d-m-Y",$NuevaFecha)." </td>";
										echo "<td>".$Cuota."</td>";
										echo "<td>".$Capital."</td>";
										echo "<td>".$Interes."</td>";
										echo "<td>".$Saldo."</td>\n";
										echo "</tr>";
										$NuevoP=$NuevoP+1;
										$Capital = $Capital + ($Capital * 0.048); 
										$Saldo = $Capital;
										$NuevaFecha=strtotime(date("d-m-Y",$NuevaFecha)."+1 days"); //es la sumatoria de la fecha nueva mas la fecha nueva y asi sucesivamente
									} while($NuevoP<$Plazo);
									break;
								case $Periodo == "Semanal":
									# code...
									//Formulas de Interes Compuesto:
									//Valor Final:
									$i = $Interes/100;
									$Factor = (1 + $i);
									$Capital = $Monto * pow($Factor, $Plazo);
									//Cuotas:
									$Cuota = $Monto * ((pow($Factor, $Plazo)) - 1)/$Factor;
									$Saldo = $Capital;
									$NuevoP=0;							
									$FechaPrest=date("d-m-Y");		
									$NuevaFecha=strtotime($FechaPrest."+7 days");						
									do
									{									
										echo "<tr>";
										echo "<td>".date("d-m-Y",$NuevaFecha)." </td>";
										echo "<td>".$Cuota."</td>";
										echo "<td>".$Capital."</td>";
										echo "<td>".$Interes."</td>";
										echo "<td>".$Saldo."</td>\n";
										echo "</tr>";
										$NuevoP=$NuevoP+1;
										$Capital = $Capital + ($Capital * 0.048); 
										$Saldo = $Capital;
										$NuevaFecha=strtotime(date("d-m-Y",$NuevaFecha)."+7 days");
									} while($NuevoP<$Plazo);
									break;
								case $Periodo == "Quincenal":
									# code...
									//Formulas de Interes Compuesto:
									//Valor Final:
									$i = $Interes/100;
									$Factor = (1 + $i);
									$Capital = $Monto * pow($Factor, $Plazo);
									//Cuotas:
									$Cuota = $Monto * ((pow($Factor, $Plazo)) - 1)/$Factor;
									$Saldo = $Capital;
									$NuevoP=0;								
									$FechaPrest=date("d-m-Y");		
									$NuevaFecha=strtotime($FechaPrest."+15 days");						
									do {									
										echo "<tr>";
										echo "<td>".date("d-m-Y",$NuevaFecha)." </td>";
										echo "<td>".$Cuota."</td>";
										echo "<td>".$Capital."</td>";
										echo "<td>".$Interes."</td>";
										echo "<td>".$Saldo."</td>\n";
										echo "</tr>";
										$NuevoP=$NuevoP+1;
										$Capital = $Capital + ($Capital * 0.048); 
										$Saldo = $Capital;
										$NuevaFecha=strtotime(date("d-m-Y",$NuevaFecha)."+15 days");
									}while($NuevoP<$Plazo);
									break;
								case $Periodo == "Mensual":
									# code...
									//Formulas de Interes Compuesto:
									//Valor Final:
									$i = $Interes/100;
									$Factor = (1 + $i);
									$Capital = $Monto * pow($Factor, $Plazo);
									//Cuotas:
									$Cuota = $Monto * ((pow($Factor, $Plazo)) - 1)/$Factor;
									$Saldo = $Capital;
									$NuevoP=0;								
									$FechaPrest=date("d-m-Y");		
									$NuevaFecha=strtotime($FechaPrest."+1 month");						
									do {									
										echo "<tr>";
										echo "<td>".date("d-m-Y",$NuevaFecha)." </td>";
										echo "<td>".$Cuota."</td>";
										echo "<td>".$Capital."</td>";
										echo "<td>".$Interes."</td>";
										echo "<td>".$Saldo."</td>\n";
										echo "</tr>";
										$NuevoP=$NuevoP+1;
										$Capital = $Capital + ($Capital * 0.048); 
										$Saldo = $Capital;
										$NuevaFecha=strtotime(date("d-m-Y",$NuevaFecha)."+1 month");
									} while($NuevoP<$Plazo);
									break;
								case $Periodo == "Anual":
									# code...
									//Formulas de Interes Compuesto:
									//Valor Final:
									$i = $Interes/100;
									$Factor = (1 + $i);
									$Capital = $Monto * pow($Factor, $Plazo);
									//Cuotas:
									$Cuota = $Monto * ((pow($Factor, $Plazo)) - 1)/$Factor;
									$Saldo = $Capital;
									$NuevoP=0;						
									$FechaPrest=date("d-m-Y");		
									$NuevaFecha=strtotime($FechaPrest."+1 year");						
									do {									
										echo "<tr>";
										echo "<td>".date("d-m-Y",$NuevaFecha)." </td>";
										echo "<td>".$Cuota."</td>";
										echo "<td>".$Capital."</td>";
										echo "<td>".$Interes."</td>";
										echo "<td>".$Saldo."</td>\n";
										echo "</tr>";
										$NuevoP=$NuevoP+1;
										$Capital = $Capital + ($Capital * 0.048); 
										$Saldo = $Capital;
										$NuevaFecha=strtotime(date("d-m-Y",$NuevaFecha)."+1 year");
									} while($NuevoP<$Plazo);
									break;
								default:
									# code...
									break;
							}
						break;
					default:
						break;
				}
					
	?>
	<!----------------------------------------------------------------------------------------------------------->
</body>
</html>