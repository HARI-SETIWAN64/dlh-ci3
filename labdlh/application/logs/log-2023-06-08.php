<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-08 07:54:50 --> 404 Page Not Found: /index
ERROR - 2023-06-08 07:57:43 --> 404 Page Not Found: /index
ERROR - 2023-06-08 08:00:30 --> Severity: Notice --> Undefined variable: row C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_bantuan.php 103
ERROR - 2023-06-08 08:00:30 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_bantuan.php 103
ERROR - 2023-06-08 08:10:32 --> 404 Page Not Found: /index
ERROR - 2023-06-08 09:00:52 --> Query error: Unknown column 'ppc_penugasan_id' in 'where clause' - Invalid query: SELECT `ppc_penugasan`.*, `users`.`first_name`, `ppc_jenis_tugas`.`jenis_tugas`
FROM `ppc_penugasan`
JOIN `ppc_jenis_tugas` ON `ppc_jenis_tugas`.`id` = `ppc_penugasan`.`jenis_tugas_id`
JOIN `users` ON `users`.`id` = `ppc_penugasan`.`user_id`
WHERE `ppc_penugasan_id` = '10'
AND `ppc_penugasan`.`status` = '1'
ORDER BY `ppc_penugasan`.`id` DESC
 LIMIT 1000
ERROR - 2023-06-08 09:07:26 --> Severity: Notice --> Undefined variable: row C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_bantuan.php 45
ERROR - 2023-06-08 09:07:26 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_bantuan.php 45
ERROR - 2023-06-08 09:14:37 --> Query error: Unknown column 'ppc_penugasan.id*' in 'field list' - Invalid query: SELECT `ppc_penugasan`.`id*`, `users`.`first_name`, `ppc_jenis_tugas`.`jenis_tugas`
FROM `ppc_penugasan`
JOIN `ppc_jenis_tugas` ON `ppc_jenis_tugas`.`id` = `ppc_penugasan`.`jenis_tugas_id`
JOIN `users` ON `users`.`id` = `ppc_penugasan`.`user_id`
WHERE `ppc_penugasan`.`id` = '1'
ORDER BY `ppc_penugasan`.`id` DESC
 LIMIT 1000
ERROR - 2023-06-08 09:14:46 --> Query error: Unknown column 'ppc_penugasan.id*' in 'field list' - Invalid query: SELECT `ppc_penugasan`.`id*`, `users`.`first_name`, `ppc_jenis_tugas`.`jenis_tugas`
FROM `ppc_penugasan`
JOIN `ppc_jenis_tugas` ON `ppc_jenis_tugas`.`id` = `ppc_penugasan`.`jenis_tugas_id`
JOIN `users` ON `users`.`id` = `ppc_penugasan`.`user_id`
WHERE `ppc_penugasan`.`id` = '1'
ORDER BY `ppc_penugasan`.`id` DESC
 LIMIT 1000
ERROR - 2023-06-08 09:18:32 --> Severity: Notice --> Undefined variable: total_items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 35
ERROR - 2023-06-08 09:18:32 --> Severity: Notice --> Undefined variable: total_items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 41
ERROR - 2023-06-08 09:18:43 --> Severity: Notice --> Undefined variable: total_items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 35
ERROR - 2023-06-08 09:18:43 --> Severity: Notice --> Undefined variable: total_items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 41
ERROR - 2023-06-08 09:24:09 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 108
ERROR - 2023-06-08 09:24:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 12
ERROR - 2023-06-08 09:24:33 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 12
ERROR - 2023-06-08 09:25:58 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 14
ERROR - 2023-06-08 09:25:58 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 17
ERROR - 2023-06-08 09:25:58 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 20
ERROR - 2023-06-08 09:25:58 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 23
ERROR - 2023-06-08 09:26:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 12
ERROR - 2023-06-08 09:29:08 --> Severity: Warning --> Missing argument 1 for Penugasan::bantuan_list() C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 95
ERROR - 2023-06-08 09:29:08 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 108
ERROR - 2023-06-08 09:32:34 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 105
ERROR - 2023-06-08 09:32:34 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_list_bantuan.php 12
ERROR - 2023-06-08 09:50:17 --> 404 Page Not Found: /index
ERROR - 2023-06-08 13:37:48 --> Query error: Unknown column 'users.id' in 'where clause' - Invalid query: SELECT `ppc_penugasan`.*, `ppc_jenis_tugas`.`jenis_tugas`
FROM `ppc_penugasan`
JOIN `ppc_jenis_tugas` ON `ppc_jenis_tugas`.`id` = `ppc_penugasan`.`jenis_tugas_id`
WHERE `users`.`id` = '275'
AND `ppc_penugasan`.`status` = '1'
ORDER BY `ppc_penugasan`.`id` DESC
 LIMIT 1000
ERROR - 2023-06-08 13:37:52 --> Query error: Column 'create_by' in where clause is ambiguous - Invalid query: SELECT `penilaian`.*, `users`.`first_name`, `master_penilaian`.`keterangan`
FROM `penilaian`
JOIN `master_penilaian` ON `master_penilaian`.`id` = `penilaian`.`master_penilaian_id`
JOIN `users` ON `users`.`id` = `penilaian`.`user_id`
WHERE `create_by` = '275'
ORDER BY `master_penilaian`.`id` DESC, `penilaian`.`id` DESC
 LIMIT 10
ERROR - 2023-06-08 13:48:31 --> Query error: Unknown column 'users.id' in 'where clause' - Invalid query: SELECT `ppc_penugasan`.*, `ppc_jenis_tugas`.`jenis_tugas`
FROM `ppc_penugasan`
JOIN `ppc_jenis_tugas` ON `ppc_jenis_tugas`.`id` = `ppc_penugasan`.`jenis_tugas_id`
WHERE `users`.`id` = '275'
AND `ppc_penugasan`.`status` = '1'
ORDER BY `ppc_penugasan`.`id` DESC
 LIMIT 1000
ERROR - 2023-06-08 13:48:50 --> Query error: Unknown column 'users.id' in 'where clause' - Invalid query: SELECT `ppc_penugasan`.*, `ppc_jenis_tugas`.`jenis_tugas`
FROM `ppc_penugasan`
JOIN `ppc_jenis_tugas` ON `ppc_jenis_tugas`.`id` = `ppc_penugasan`.`jenis_tugas_id`
WHERE `users`.`id` = '275'
AND `ppc_penugasan`.`status` = '1'
ORDER BY `ppc_penugasan`.`id` DESC
 LIMIT 1000
