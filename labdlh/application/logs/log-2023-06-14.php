<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-14 13:22:03 --> 404 Page Not Found: /index
ERROR - 2023-06-14 13:22:13 --> 404 Page Not Found: /index
ERROR - 2023-06-14 13:23:24 --> 404 Page Not Found: /index
ERROR - 2023-06-14 13:23:28 --> 404 Page Not Found: /index
ERROR - 2023-06-14 13:30:09 --> Severity: 4096 --> Object of class CI_Session could not be converted to string C:\xampp\htdocs\labdlh_use\application\views\template\admin_side.php 33
ERROR - 2023-06-14 13:30:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '>userdata('user_id')' at line 9 - Invalid query: 
      select 
      count(*) as jum 
      from ppc_penugasan
      where 
      (status = '0'
      or
      status = '4')
      and
      user_id = ->userdata('user_id')

      
ERROR - 2023-06-14 13:58:20 --> 404 Page Not Found: /index
ERROR - 2023-06-14 14:49:59 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 24
ERROR - 2023-06-14 14:51:12 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 24
ERROR - 2023-06-14 19:09:22 --> 404 Page Not Found: /index
ERROR - 2023-06-14 19:21:30 --> 404 Page Not Found: /index
ERROR - 2023-06-14 19:21:40 --> 404 Page Not Found: /index
ERROR - 2023-06-14 19:24:27 --> 404 Page Not Found: /index
ERROR - 2023-06-14 19:24:35 --> 404 Page Not Found: /index
ERROR - 2023-06-14 19:33:56 --> Query error: No tables used - Invalid query: SELECT *
WHERE 0 = 'Inovasi'
 LIMIT 1
ERROR - 2023-06-14 19:34:19 --> 404 Page Not Found: /index
ERROR - 2023-06-14 19:34:56 --> Query error: No tables used - Invalid query: SELECT *
WHERE 0 = 'ipal'
 LIMIT 1
ERROR - 2023-06-14 19:44:21 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh\application\modules\ppc\controllers\Penugasan.php 262
ERROR - 2023-06-14 20:20:17 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh\application\modules\ppc\controllers\Penugasan.php 179
ERROR - 2023-06-14 20:20:54 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh\application\modules\ppc\controllers\Penugasan.php 179
ERROR - 2023-06-14 20:50:30 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh\application\modules\ppc\controllers\Penugasan.php 179
ERROR - 2023-06-14 22:01:21 --> Severity: Notice --> Undefined property: stdClass::$first_name C:\xampp\htdocs\labdlh\application\modules\ppc\views\penugasan\v_detail.php 14
ERROR - 2023-06-14 22:04:32 --> Query error: Table 'labdlh.spek_alat' doesn't exist - Invalid query: select * from ppc_penugasan 
		INNER JOIN spek_alat ON ppc_penugasan.jenis_tugas_id = ppc_jenis_tugas.id
		INNER JOIN users ON ppc_penugasan.user_id = users.id
 		where id = "33"
ERROR - 2023-06-14 22:04:41 --> Query error: Table 'labdlh.spek_alat' doesn't exist - Invalid query: select * from ppc_penugasan 
		INNER JOIN spek_alat ON ppc_penugasan.jenis_tugas_id = ppc_jenis_tugas.id
		INNER JOIN users ON ppc_penugasan.user_id = users.id
 		where id = "33"
ERROR - 2023-06-14 22:05:27 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: select * from ppc_penugasan 
		INNER JOIN ppc_jenis_tugas ON ppc_penugasan.jenis_tugas_id = ppc_jenis_tugas.id
		INNER JOIN users ON ppc_penugasan.user_id = users.id
 		where id = "33"
ERROR - 2023-06-14 22:05:33 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: select * from ppc_penugasan 
		INNER JOIN ppc_jenis_tugas ON ppc_penugasan.jenis_tugas_id = ppc_jenis_tugas.id
		INNER JOIN users ON ppc_penugasan.user_id = users.id
 		where id = "33"
ERROR - 2023-06-14 22:31:56 --> Severity: Notice --> Undefined property: stdClass::$hasil_tugas C:\xampp\htdocs\labdlh\application\modules\ppc\views\penugasan\v_detail.php 124
ERROR - 2023-06-14 23:28:51 --> 404 Page Not Found: /index
