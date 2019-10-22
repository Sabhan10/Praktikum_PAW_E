<?php 
function validasi_nama(&$errors,$field_list, $field_name ) //pasbay reference
{
	$pattern = "/^[a-zA-Z'-]+$/"; // format surname (alfabet) $akhir ^awal  $reguler expresion
	if (!isset($field_list[$field_name])||empty($field_list[$field_name])){
		$errors = 'isi Terlebih dahulu';
		
	}
	else if (!preg_match($pattern, $field_list[$field_name])){
		$errors = 'isi dengan benar';
	}
	
}
function validasi_price(&$errors,$field_list, $field_name ) //pasbay reference
{
	$pattern = "/^[0-9]+$/"; // format surname (alfabet) $akhir ^awal  $reguler expresion
	if (!isset($field_list[$field_name])||empty($field_list[$field_name])){
		$errors = 'isi Terlebih dahulu';
		
	}
	else if (!preg_match($pattern, $field_list[$field_name])){
		$errors = 'isi dengan benar';
	}
	
}
function validasi_pct(&$errors,$field_list, $field_name ) //pasbay reference
{
	$pattern = "/^[a-zA-Z'-]+$/"; // format surname (alfabet) $akhir ^awal  $reguler expresion
	if (!isset($field_list[$field_name])||empty($field_list[$field_name])){
		$errors = 'isi Terlebih dahulu';
		
	}
	
}
 ?>