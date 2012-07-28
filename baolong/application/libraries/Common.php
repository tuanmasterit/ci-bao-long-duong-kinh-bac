<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common{
    function generatePassword($length, $strength) {
		/*$vowels = 'aeuy';
		$consonants = 'bdghjmnpqrstvz';
		if ($strength & 1) {
			$consonants .= 'BDGHJLMNPQRSTVWXZ';
		}
		if ($strength & 2) {
			$vowels .= "AEUY";
		}
		if ($strength & 4) {
			$consonants .= '23456789';
		}
		if ($strength & 8) {
			$consonants .= '@#$%';
		}
	 
		$password = '';
		$alt = time() % 2;
		for ($i = 0; $i < $length; $i++) {
			if ($alt == 1) {
				$password .= $consonants[(rand() % strlen($consonants))];
				$alt = 0;
			} else {
				$password .= $vowels[(rand() % strlen($vowels))];
				$alt = 1;
			}
		}*/
		return '1234567';
	}
	function getObject($name)
	{
		if($name=="naptien"){return '1';}
		if($name=="quydoi"){return '2';}
		if($name=="diemthuong"){return '3';}
		if($name=="thuongcanve"){return '4';}
	}
	function getStatus($name)
	{
		if($name=="choxuly"){return '1';}
		if($name=="duyet"){return '2';}
		if($name=="tralai"){return '3';}
		if($name=="chuanhantien"){return '4';}
		if($name=="danhan"){return '5';}
	}
	function getObjectName($name)
	{
		if($name=="1"){return 'Nạp tiền';}
		if($name=="2"){return 'Quy đổi';}
		if($name=="3"){return 'Điểm thưởng';}
		if($name=="4"){return 'Thưởng cân vế';}
	}
	function getObjectKey($number)
	{
		if($number=="1"){return 'naptien';}
		if($number=="2"){return 'quydoi';}
		if($number=="3"){return 'diemthuong';}
		if($number=="4"){return 'thuongcanve';}
	}
	function getStatusName($name)
	{
		if($name=="1"){return 'Chờ xử lý';}
		if($name=="2"){return 'Duyệt';}
		if($name=="3"){return 'Trả lại';}
		if($name=="4"){return 'Chưa nhận tiền';}
		if($name=="5"){return 'Đã nhận tiền';}
	}		
}