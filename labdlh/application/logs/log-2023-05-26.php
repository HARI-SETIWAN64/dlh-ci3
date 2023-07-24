<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-26 09:48:00 --> 404 Page Not Found: /index
ERROR - 2023-05-26 09:48:12 --> 404 Page Not Found: /index
ERROR - 2023-05-26 09:48:26 --> 404 Page Not Found: /index
ERROR - 2023-05-26 10:30:07 --> 404 Page Not Found: /index
ERROR - 2023-05-26 10:32:55 --> 404 Page Not Found: /index
ERROR - 2023-05-26 10:33:58 --> 404 Page Not Found: /index
ERROR - 2023-05-26 10:34:40 --> 404 Page Not Found: /index
ERROR - 2023-05-26 13:30:39 --> 404 Page Not Found: /index
ERROR - 2023-05-26 13:35:04 --> Severity: Notice --> Undefined variable: items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_bantuan.php 8
ERROR - 2023-05-26 13:35:04 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_bantuan.php 8
ERROR - 2023-05-26 13:35:30 --> Severity: Notice --> Undefined variable: items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_bantuan.php 8
ERROR - 2023-05-26 13:35:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_bantuan.php 8
ERROR - 2023-05-26 13:38:03 --> Severity: Notice --> Undefined variable: items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_bantuan.php 8
ERROR - 2023-05-26 13:38:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_bantuan.php 8
ERROR - 2023-05-26 13:40:50 --> Severity: Notice --> Undefined variable: items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_bantuan.php 8
ERROR - 2023-05-26 13:40:50 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_form_bantuan.php 8
ERROR - 2023-05-26 14:25:38 --> Severity: Compile Error --> Cannot redeclare Jenis_sampel::jenis_sampel_list() C:\xampp\htdocs\labdlh_use\application\modules\ujibanding\controllers\Jenis_sampel.php 86
ERROR - 2023-05-26 14:25:44 --> Query error: Table 'labdlh_use.epad_sim_tarif_pajak' doesn't exist - Invalid query: SELECT *
FROM `master_parameter`
LEFT JOIN (SELECT id_sim_tarif_pajak, uraian_tarif_pajak, nilai_tarif_pajak FROM epad_sim_tarif_pajak WHERE `groups`='dlh' and is_new = '1') as epad_sim_tarif_pajak ON `master_parameter`.`sim_tarif_pajak_id` = `epad_sim_tarif_pajak`.`id_sim_tarif_pajak`
WHERE `soft_delete` = '0'
AND `soft_delete` = '0'
ORDER BY `parameter` ASC
 LIMIT 20
ERROR - 2023-05-26 14:29:18 --> Query error: Table 'labdlh_use.epad_sim_tarif_pajak' doesn't exist - Invalid query: SELECT *
FROM `master_parameter`
LEFT JOIN (SELECT id_sim_tarif_pajak, uraian_tarif_pajak, nilai_tarif_pajak FROM epad_sim_tarif_pajak WHERE `groups`='dlh' and is_new = '1') as epad_sim_tarif_pajak ON `master_parameter`.`sim_tarif_pajak_id` = `epad_sim_tarif_pajak`.`id_sim_tarif_pajak`
WHERE `soft_delete` = '0'
AND `soft_delete` = '0'
ORDER BY `parameter` ASC
 LIMIT 20
