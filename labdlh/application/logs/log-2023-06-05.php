<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-05 09:16:00 --> 404 Page Not Found: /index
ERROR - 2023-06-05 09:16:51 --> 404 Page Not Found: /index
ERROR - 2023-06-05 09:20:20 --> 404 Page Not Found: /index
ERROR - 2023-06-05 09:25:17 --> 404 Page Not Found: /index
ERROR - 2023-06-05 09:25:53 --> 404 Page Not Found: /index
ERROR - 2023-06-05 09:44:27 --> Query error: Table 'labdlh_use.epad_sim_tarif_pajak' doesn't exist - Invalid query: SELECT *
FROM `master_parameter`
LEFT JOIN (SELECT id_sim_tarif_pajak, uraian_tarif_pajak, nilai_tarif_pajak FROM epad_sim_tarif_pajak WHERE `groups`='dlh' and is_new = '1') as epad_sim_tarif_pajak ON `master_parameter`.`sim_tarif_pajak_id` = `epad_sim_tarif_pajak`.`id_sim_tarif_pajak`
WHERE `soft_delete` = '0'
AND `soft_delete` = '0'
ORDER BY `parameter` ASC
 LIMIT 20
ERROR - 2023-06-05 10:28:49 --> Severity: Notice --> Undefined property: stdClass::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_bantuan.php 15
ERROR - 2023-06-05 10:28:49 --> Query error: Unknown column 'ppc_list_project_id' in 'where clause' - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `ppc_list_project_id` = '5'
AND `ppc_sub_project`.`status` = '1'
ORDER BY `ppc_list_project`.`id` DESC
 LIMIT 1000
ERROR - 2023-06-05 11:41:11 --> Query error: Table 'labdlh_use.sub_project' doesn't exist - Invalid query: select * from ppc_list_project  
				INNER JOIN sub_project ON list_project.project_id = sub_project.id
				INNER JOIN users ON list_project.user_id = users.id		
				where id = '5'
ERROR - 2023-06-05 11:41:56 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: select * from ppc_list_project  
				INNER JOIN ppc_sub_project ON ppc_list_project.project_id = ppc_sub_project.id
				INNER JOIN users ON ppc_list_project.user_id = users.id		
				where id = '5'
ERROR - 2023-06-05 11:41:57 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: select * from ppc_list_project  
				INNER JOIN ppc_sub_project ON ppc_list_project.project_id = ppc_sub_project.id
				INNER JOIN users ON ppc_list_project.user_id = users.id		
				where id = '5'
ERROR - 2023-06-05 11:42:43 --> Query error: Unknown column 'ppc_list_project_id' in 'where clause' - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `ppc_list_project_id` = '5'
AND `ppc_sub_project`.`status` = '1'
ORDER BY `ppc_list_project`.`id` DESC
 LIMIT 1000
ERROR - 2023-06-05 11:42:51 --> Query error: Unknown column 'ppc_list_project_id' in 'where clause' - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `ppc_list_project_id` = '5'
AND `ppc_sub_project`.`status` = '1'
ORDER BY `ppc_list_project`.`id` DESC
 LIMIT 1000
ERROR - 2023-06-05 11:46:23 --> Query error: Unknown column 'ppc_sub_project.status' in 'where clause' - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `ppc_sub_project`.`status` = '1'
ORDER BY `ppc_list_project`.`id` DESC
 LIMIT 1000
ERROR - 2023-06-05 11:46:31 --> Query error: Unknown column 'ppc_sub_project.status' in 'where clause' - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `ppc_sub_project`.`status` = '1'
ORDER BY `ppc_list_project`.`id` DESC
 LIMIT 1000
ERROR - 2023-06-05 13:09:13 --> 404 Page Not Found: ../modules/ppc/controllers/List_project/ubah_bantuan
ERROR - 2023-06-05 14:31:40 --> Severity: Notice --> Undefined variable: jenis_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_ubah.php 9
ERROR - 2023-06-05 14:31:40 --> Severity: Notice --> Undefined variable: karyawan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_ubah.php 15
ERROR - 2023-06-05 14:32:45 --> 404 Page Not Found: /index
ERROR - 2023-06-05 14:40:19 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 343
ERROR - 2023-06-05 14:44:08 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 343
ERROR - 2023-06-05 14:46:42 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 343
ERROR - 2023-06-05 14:57:03 --> 404 Page Not Found: /index
ERROR - 2023-06-05 15:00:17 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 343
ERROR - 2023-06-05 15:00:19 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 343
ERROR - 2023-06-05 15:00:22 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 343
ERROR - 2023-06-05 15:04:59 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:05:00 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:05:00 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:34 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:37 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:42 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:43 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:44 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:44 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:44 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:44 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:44 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:45 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:55 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:56 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:56 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:56 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:57 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:06:57 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:09:51 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 341
ERROR - 2023-06-05 15:11:12 --> Severity: Notice --> Undefined index: file_pendukung C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 341
ERROR - 2023-06-05 15:12:18 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 340
ERROR - 2023-06-05 15:14:54 --> Severity: Notice --> Undefined index: file_pendukung C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 340
ERROR - 2023-06-05 15:19:20 --> Severity: Notice --> Undefined index: file_pendukung C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:19:26 --> Severity: Notice --> Undefined index: file_pendukung C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:20:02 --> Severity: Notice --> Undefined index: file C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
ERROR - 2023-06-05 15:21:25 --> Severity: Notice --> Undefined index: file_pendukung C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 339
