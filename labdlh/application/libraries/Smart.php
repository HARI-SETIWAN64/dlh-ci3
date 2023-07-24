<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Smart
{
    function Smart()
    {
        $this->CI =& get_instance();
    }
	
	function date_diff($d1, $d2)
	{
		$d1 = (is_string($d1) ? strtotime($d1) : $d1);
		$d2 = (is_string($d2) ? strtotime($d2) : $d2);
		$diff_secs = abs($d1 - $d2);
		$base_year = min(date("Y", $d1), date("Y", $d2));
		$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
	
		$year=date("Y", $diff) - $base_year;
		if($year==1){
		$year='1 tahun ';
		}elseif($year>1){
		$year=$year.' tahun ';
		}else{
		$year='';
		}
		$month=date("n", $diff) - 1;
		if($month==1){
		$month='1 bulan ';
		}elseif($month>1){
		$month=$month.' bulan ';
		}else{
		$month='';
		}
		$day=date("j", $diff) - 1;
		if($day==1){
		$day='1 hari';
		}elseif($day>1){
		$day=$day.' hari';
		}else{
		$day='';
		}
		return $year.$month.$day;
	}
	function selisih_tanggal ($t1, $t2, $precision = 6, $abbr = false) 
	{
		if (preg_match('/\D/', $t1) && ($t1 = strtotime($t1)) === false)
			return false;

		if (preg_match('/\D/', $t2) && ($t2 = strtotime($t2)) === false)
			return false;

		if ($t1 > $t2)
			list($t1, $t2) = array($t2, $t1);

		$diffs = array(
			'year' => 0,
		   'month' => 0, 'day' => 0,
		  
		);

		$abbrs = array(
				'year' => 'year',
			 'month' => 'mth', 'day' => 0,
		);

		foreach (array_keys($diffs) as $interval) {
			while ($t2 >= ($t3 = strtotime("+1 ${interval}", $t1))) {
				$t1 = $t3;
				++$diffs[$interval];
			}
		}

		$stack = array();
		foreach ($diffs as $interval => $num)
			$stack[] = array($num, ($abbr ? $abbrs[$interval] : $interval) . ($num != 1 ? 's' : ''));

		$ret = array();
		while (count($ret) < $precision && ($item = array_shift($stack)) !== null) {
			if ($item[0] >= 0)
				$ret[] = "{$item[0]} {$item[1]}";
		}
		return implode(', ', $ret);
	}
	function date_bulan($d1, $d2)
	{
		$d1 = (is_string($d1) ? strtotime($d1) : $d1);
		$d2 = (is_string($d2) ? strtotime($d2) : $d2);
		$diff_secs = abs($d1 - $d2);
		$base_year = min(date("Y", $d1), date("Y", $d2));
		$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
	
		$year=date("m", $diff) - $base_year;
		
		if($year==1)
		{
			$year='1 tahun ';
		}
		elseif($year>1)
		{
			$year=$year.' tahun ';
		}
		else
		{
			$year='';
		}
		
		$month=date("n", $diff) - 1;
		if($month==1){
		$month='1';
		}elseif($month>1){
		$month=$month.'';
		}else{
		$month='';
		}
		$day=date("j", $diff) - 1;
		if($day==1){
		$day='1 hari';
		}elseif($day>1){
		$day=$day.' hari';
		}else{
		$day='';
		}
		return $month;
	}
	
	
		
}?>