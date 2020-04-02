<?php
echo 'day'."\t".'sale'."\n";

for ($i = 1; $i <= 30; $i++)
{
	foreach ($last_30_days_sale as $sale)
	{
		if ($sale['order_date'] == date('Y-m-d', strtotime('today -'.$i.'days')))
		{
			echo date('d-m', strtotime('today -'.$i.'days'))."\t".$sale['sale']."\n";
		}

		echo date('d-m', strtotime('today -'.$i.'days'))."\t".'0'."\n";
	}
}

?>