<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-30 09:43:06 --> 404 Page Not Found: /index
ERROR - 2023-05-30 11:53:02 --> Query error: Unknown column 'kode' in 'where clause' - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `kode` LIKE '%Operator%' ESCAPE '!'
OR  `nama` LIKE '%Operator%' ESCAPE '!'
OR  `no_urut_dokumen` LIKE '%Operator%' ESCAPE '!'
ORDER BY `ppc_sub_project`.`id` DESC, `ppc_list_project`.`id` DESC
 LIMIT 10
ERROR - 2023-05-30 11:53:46 --> Query error: Unknown column 'kode' in 'where clause' - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `kode` LIKE '%operator%' ESCAPE '!'
OR  `nama` LIKE '%operator%' ESCAPE '!'
OR  `no_urut_dokumen` LIKE '%operator%' ESCAPE '!'
ORDER BY `ppc_sub_project`.`id` DESC, `ppc_list_project`.`id` DESC
 LIMIT 10
ERROR - 2023-05-30 11:54:42 --> Query error: Unknown column 'kode' in 'where clause' - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `kode` LIKE '%Niken%' ESCAPE '!'
OR  `nama` LIKE '%Niken%' ESCAPE '!'
OR  `no_urut_dokumen` LIKE '%Niken%' ESCAPE '!'
ORDER BY `ppc_sub_project`.`id` DESC, `ppc_list_project`.`id` DESC
 LIMIT 10
ERROR - 2023-05-30 11:55:29 --> Query error: Column 'project_id' in where clause is ambiguous - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `project_id` LIKE '%operator%' ESCAPE '!'
OR  `user_id` LIKE '%operator%' ESCAPE '!'
ORDER BY `ppc_sub_project`.`id` DESC, `ppc_list_project`.`id` DESC
 LIMIT 10
ERROR - 2023-05-30 13:32:10 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Rekap.php 164
ERROR - 2023-05-30 13:32:10 --> Severity: Notice --> Undefined variable: items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-30 13:32:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-30 13:33:25 --> 404 Page Not Found: /index
ERROR - 2023-05-30 13:46:32 --> Severity: Error --> Call to undefined function form_date() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_ubah.php 39
ERROR - 2023-05-30 14:03:49 --> Severity: Notice --> Undefined property: stdClass::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-30 14:03:49 --> Severity: Notice --> Undefined property: stdClass::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-30 14:14:33 --> 404 Page Not Found: /index
ERROR - 2023-05-30 14:22:09 --> Severity: Notice --> Undefined variable: list_project C:\xampp\htdocs\labdlh_use\application\views\template\admin_side.php 116
ERROR - 2023-05-30 14:22:09 --> Severity: Notice --> Undefined property: stdClass::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-30 14:22:09 --> Severity: Notice --> Undefined property: stdClass::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-30 14:25:47 --> Severity: Notice --> Undefined property: stdClass::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-30 14:25:47 --> Severity: Notice --> Undefined property: stdClass::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-30 14:32:39 --> 404 Page Not Found: ../modules/fpps/controllers//index
