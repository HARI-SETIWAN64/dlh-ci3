<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-04-26 10:50:02 --> Query error: Table 'labdlh.konten' doesn't exist in engine - Invalid query: SELECT * FROM konten where title like 'Slider-%' and catid='4'
ERROR - 2023-04-26 10:50:02 --> 404 Page Not Found: /index
ERROR - 2023-04-26 11:44:43 --> 404 Page Not Found: /index
ERROR - 2023-04-26 14:45:18 --> 404 Page Not Found: /index
ERROR - 2023-04-26 14:45:36 --> 404 Page Not Found: /index
ERROR - 2023-04-26 14:48:27 --> 404 Page Not Found: /index
ERROR - 2023-04-26 14:50:07 --> 404 Page Not Found: /index
ERROR - 2023-04-26 14:50:22 --> Query error: Table 'labdlh.epad_sim_tarif_pajak' doesn't exist - Invalid query: SELECT *
FROM `master_parameter`
LEFT JOIN (SELECT id_sim_tarif_pajak, uraian_tarif_pajak, nilai_tarif_pajak FROM epad_sim_tarif_pajak WHERE `groups`='dlh' and is_new = '1') as epad_sim_tarif_pajak ON `master_parameter`.`sim_tarif_pajak_id` = `epad_sim_tarif_pajak`.`id_sim_tarif_pajak`
WHERE `soft_delete` = '0'
AND `soft_delete` = '0'
ORDER BY `parameter` ASC
 LIMIT 20
ERROR - 2023-04-26 14:50:57 --> Query error: Table 'labdlh.epad_sim_tarif_pajak' doesn't exist - Invalid query: SELECT *
FROM `master_parameter`
LEFT JOIN (SELECT id_sim_tarif_pajak, uraian_tarif_pajak, nilai_tarif_pajak FROM epad_sim_tarif_pajak WHERE `groups`='dlh' and is_new = '1') as epad_sim_tarif_pajak ON `master_parameter`.`sim_tarif_pajak_id` = `epad_sim_tarif_pajak`.`id_sim_tarif_pajak`
WHERE `soft_delete` = '0'
AND `soft_delete` = '0'
ORDER BY `parameter` ASC
 LIMIT 20
ERROR - 2023-04-26 14:59:08 --> 404 Page Not Found: ../modules/fpps/controllers//index
ERROR - 2023-04-26 14:59:51 --> Severity: Compile Error --> Cannot redeclare Jenis_sampel::jenis_sampel_list() C:\xampp\htdocs\labdlh\application\modules\ujibanding\controllers\Jenis_sampel.php 86
ERROR - 2023-04-26 15:00:46 --> 404 Page Not Found: /index
ERROR - 2023-04-26 15:03:35 --> 404 Page Not Found: /index
ERROR - 2023-04-26 15:07:07 --> 404 Page Not Found: /index
