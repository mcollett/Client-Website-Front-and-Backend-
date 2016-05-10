January 1 2013:<br>
<?php
echo strtotime("January 1st 2013");
?><br><br>

December 31 2013:<br>
<?php
echo strtotime("December 31st 2013");
?><br><br>

January 1 2014:<br>
<?php
echo strtotime("January 1st 2014");
?><br><br>

December 31 2014:<br>
<?php
echo strtotime("December 31st 2014");
?><br><br>

2015:<br>
<?php
echo strtotime("December 31st 2015");
?><br><br>

SELECT * FROM schedule WHERE finalized => '1357020000' AND finalized <= '1388469600'

SELECT id FROM schedule WHERE (tank_id LIKE '%1%' OR healer_id LIKE '%1%' OR dps1_id LIKE '%1%' OR dps2_id LIKE '%1%' OR dps3_id LIKE '%1%')

mysql_num_rows(mysql_query("SELECT id FROM schedule WHERE (staff_tank_id LIKE '%".$$staff_data['id']."%' OR staff_healer_id LIKE '%".$$staff_data['id']."%' OR staff_dps1_id LIKE '%".$$staff_data['id']."%' OR staff_dps2_id LIKE '%".$$staff_data['id']."%' OR staff_dps3_id LIKE '%".$$staff_data['id']."%') AND finalized <= '1388469600' AND finalized != ''"));