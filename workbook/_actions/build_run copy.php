<?php

echo "Tank ID: ";
echo $_POST['tank-userID'];
echo "<br>";
echo "Healer ID: ";
echo $_POST['healer-userID'];
echo "<br>";
echo "DPS 1 ID: ";
echo $_POST['dps-userID'][0];
echo "<br>";
echo "DPS 2 ID: ";
echo $_POST['dps-userID'][1];
echo "<br>";
echo "DPS 3 ID: ";
echo $_POST['dps-userID'][2];
echo "<br><br>";
echo "Time (Hourly) ";
$time = $_POST['input-timepicker'];
echo $time;
echo "<br><br>";
echo "Time (Date): ";
$date = $_POST['input-datepicker'];
echo $date;
echo "<br><br>";
echo "Timestamp? ";
$run_timestamp = strtotime("$date $time");
echo $run_timestamp;
echo "<br><br>";
echo "Recall timestamp: ";
echo date("m/d/Y @ h:i A", $run_timestamp);

echo "<hr>";

echo "Thing: ";
echo $_POST['tank-staff-spot'];
echo "<br><br>";
echo "Thing: ";
echo $_POST['healer-staff-spot'];
echo "<br><br>";
echo "Thing: ";
echo $_POST['dps1-staff-spot'];
echo "<br><br>";
echo "Thing: ";
echo $_POST['dps2-staff-spot'];
echo "<br><br>";
echo "Thing: ";
echo $_POST['dps3-staff-spot'];
echo "<br><br>";
?>