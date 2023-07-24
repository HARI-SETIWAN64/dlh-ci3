<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-12 07:59:33 --> 404 Page Not Found: /index
ERROR - 2023-06-12 08:00:47 --> 404 Page Not Found: /index
ERROR - 2023-06-12 08:00:51 --> 404 Page Not Found: ../modules/ppc/controllers//index
ERROR - 2023-06-12 08:01:09 --> 404 Page Not Found: /index
ERROR - 2023-06-12 08:04:09 --> 404 Page Not Found: /index
ERROR - 2023-06-12 08:21:03 --> Query error: Unknown column 'kode' in 'where clause' - Invalid query: SELECT `users`.*, `groups`.`description`
FROM `users`
JOIN `users_groups` ON `users`.`id` = `users_groups`.`user_id`
JOIN `groups` ON `users_groups`.`group_id` = `groups`.`id`
WHERE `kode` LIKE '%Ahmad%' ESCAPE '!'
OR  `nama` LIKE '%Ahmad%' ESCAPE '!'
OR  `no_urut_dokumen` LIKE '%Ahmad%' ESCAPE '!'
AND `groups`.`name` IN ("analis","manager_teknis","ka_lab","admin_pelayanan")
ORDER BY `first_name` ASC
 LIMIT 10
ERROR - 2023-06-12 09:01:35 --> Severity: Error --> Call to undefined method Rekap::get_dropdown_jenis_tugas() C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Rekap.php 35
ERROR - 2023-06-12 09:03:04 --> Severity: Notice --> Undefined property: Rekap::$db_sikd C:\xampp\htdocs\labdlh_use\system\core\Model.php 77
ERROR - 2023-06-12 09:03:04 --> Severity: Error --> Call to a member function group_start() on null C:\xampp\htdocs\labdlh_use\application\modules\ppc\models\Rekap_model.php 20
ERROR - 2023-06-12 09:03:07 --> Severity: Notice --> Undefined property: Rekap::$db_sikd C:\xampp\htdocs\labdlh_use\system\core\Model.php 77
ERROR - 2023-06-12 09:03:07 --> Severity: Error --> Call to a member function group_start() on null C:\xampp\htdocs\labdlh_use\application\modules\ppc\models\Rekap_model.php 20
ERROR - 2023-06-12 09:04:50 --> Severity: Notice --> Undefined property: Rekap::$db_sikd C:\xampp\htdocs\labdlh_use\system\core\Model.php 77
ERROR - 2023-06-12 09:04:50 --> Severity: Error --> Call to a member function group_start() on null C:\xampp\htdocs\labdlh_use\application\modules\ppc\models\Rekap_model.php 20
ERROR - 2023-06-12 09:06:36 --> Severity: Notice --> Undefined property: Rekap::$db_sikd C:\xampp\htdocs\labdlh_use\system\core\Model.php 77
ERROR - 2023-06-12 09:06:36 --> Severity: Error --> Call to a member function group_start() on null C:\xampp\htdocs\labdlh_use\application\modules\ppc\models\Rekap_model.php 20
ERROR - 2023-06-12 09:20:42 --> 404 Page Not Found: /index
ERROR - 2023-06-12 09:30:37 --> 404 Page Not Found: /index
ERROR - 2023-06-12 10:46:51 --> Query error: Unknown column 'mulai' in 'where clause' - Invalid query: SELECT `ppc_penugasan`.*, `users`.`first_name`, `ppc_jenis_tugas`.`jenis_tugas`
FROM `ppc_penugasan`
JOIN `ppc_jenis_tugas` ON `ppc_jenis_tugas`.`id` = `ppc_penugasan`.`jenis_tugas_id`
JOIN `users` ON `users`.`id` = `ppc_penugasan`.`user_id`
WHERE YEAR(mulai) = '2023'
AND MONTH(mulai) = '06'
ORDER BY `ppc_penugasan`.`id` DESC
 LIMIT 10
ERROR - 2023-06-12 10:49:15 --> Query error: Unknown column 'mulai' in 'where clause' - Invalid query: SELECT `ppc_penugasan`.*, `users`.`first_name`, `ppc_jenis_tugas`.`jenis_tugas`
FROM `ppc_penugasan`
JOIN `ppc_jenis_tugas` ON `ppc_jenis_tugas`.`id` = `ppc_penugasan`.`jenis_tugas_id`
JOIN `users` ON `users`.`id` = `ppc_penugasan`.`user_id`
WHERE YEAR(mulai) = '2023'
AND MONTH(mulai) = '06'
ORDER BY `ppc_penugasan`.`id` DESC
 LIMIT 10
ERROR - 2023-06-12 10:49:18 --> Query error: Unknown column 'mulai' in 'where clause' - Invalid query: SELECT `ppc_penugasan`.*, `users`.`first_name`, `ppc_jenis_tugas`.`jenis_tugas`
FROM `ppc_penugasan`
JOIN `ppc_jenis_tugas` ON `ppc_jenis_tugas`.`id` = `ppc_penugasan`.`jenis_tugas_id`
JOIN `users` ON `users`.`id` = `ppc_penugasan`.`user_id`
WHERE YEAR(mulai) = '2023'
AND MONTH(mulai) = '06'
ORDER BY `ppc_penugasan`.`id` DESC
 LIMIT 10
ERROR - 2023-06-12 10:49:24 --> Query error: Unknown column 'mulai' in 'where clause' - Invalid query: SELECT `ppc_penugasan`.*, `users`.`first_name`, `ppc_jenis_tugas`.`jenis_tugas`
FROM `ppc_penugasan`
JOIN `ppc_jenis_tugas` ON `ppc_jenis_tugas`.`id` = `ppc_penugasan`.`jenis_tugas_id`
JOIN `users` ON `users`.`id` = `ppc_penugasan`.`user_id`
WHERE YEAR(mulai) = '2023'
AND MONTH(mulai) = '06'
ORDER BY `ppc_penugasan`.`id` DESC
 LIMIT 10
ERROR - 2023-06-12 13:14:05 --> 404 Page Not Found: ../modules/fpps/controllers//index
ERROR - 2023-06-12 13:28:33 --> 404 Page Not Found: /index
ERROR - 2023-06-12 13:28:43 --> 404 Page Not Found: /index
ERROR - 2023-06-12 13:35:21 --> Severity: Notice --> Undefined variable: jenis_tugas C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 81
ERROR - 2023-06-12 13:36:53 --> Severity: Notice --> Undefined variable: jenis_tugas C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 87
ERROR - 2023-06-12 13:37:37 --> Severity: Notice --> Undefined variable: jenis_tugas C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 87
ERROR - 2023-06-12 13:38:14 --> Severity: Notice --> Undefined variable: jenis_tugas C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 87
ERROR - 2023-06-12 13:38:38 --> Severity: Notice --> Undefined variable: jenis_tugas C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 87
ERROR - 2023-06-12 13:39:01 --> Severity: Notice --> Undefined variable: jenis_tugas C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 87
ERROR - 2023-06-12 13:39:37 --> Severity: Notice --> Undefined variable: jenis_tugas C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 87
ERROR - 2023-06-12 13:39:47 --> Severity: Notice --> Undefined variable: jenis_tugas C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 87
ERROR - 2023-06-12 13:41:12 --> Severity: Notice --> Undefined variable: jenis_tugas C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 87
ERROR - 2023-06-12 13:41:13 --> Severity: Notice --> Undefined variable: jenis_tugas C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\penugasan\v_index.php 87
ERROR - 2023-06-12 14:23:27 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 106
ERROR - 2023-06-12 14:23:27 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 106
ERROR - 2023-06-12 14:26:03 --> 404 Page Not Found: /index
ERROR - 2023-06-12 14:26:53 --> 404 Page Not Found: /index
ERROR - 2023-06-12 14:38:31 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 14:38:33 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 14:40:36 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 14:41:54 --> Severity: Notice --> Undefined index: file_pendukung C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 14:42:46 --> Severity: Notice --> Undefined index: file_pendukung C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 14:42:46 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 226
ERROR - 2023-06-12 14:44:45 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 201
ERROR - 2023-06-12 14:46:07 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 14:46:07 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 226
ERROR - 2023-06-12 14:50:03 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 14:51:03 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 106
ERROR - 2023-06-12 14:51:03 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 106
ERROR - 2023-06-12 15:01:52 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 15:01:52 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 226
ERROR - 2023-06-12 15:01:54 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 15:01:54 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 226
ERROR - 2023-06-12 15:02:09 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 15:02:09 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 226
ERROR - 2023-06-12 15:02:54 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 15:02:54 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 226
ERROR - 2023-06-12 15:03:53 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 196
ERROR - 2023-06-12 15:13:12 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 106
ERROR - 2023-06-12 15:13:12 --> Severity: Notice --> Undefined variable: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Penugasan.php 106
