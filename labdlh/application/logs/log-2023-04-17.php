<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-04-17 12:42:40 --> 404 Page Not Found: /index
ERROR - 2023-04-17 12:43:33 --> 404 Page Not Found: /index
ERROR - 2023-04-17 12:44:03 --> 404 Page Not Found: ../modules/fpps/controllers//index
ERROR - 2023-04-17 12:44:07 --> 404 Page Not Found: ../modules/fpps/controllers//index
ERROR - 2023-04-17 12:52:49 --> 404 Page Not Found: /index
ERROR - 2023-04-17 12:53:39 --> 404 Page Not Found: /index
ERROR - 2023-04-17 12:55:23 --> Query error: Table 'labdlh.epad_sim_tarif_pajak' doesn't exist - Invalid query: SELECT *
FROM `master_parameter`
LEFT JOIN (SELECT id_sim_tarif_pajak, uraian_tarif_pajak, nilai_tarif_pajak FROM epad_sim_tarif_pajak WHERE `groups`='dlh' and is_new = '1') as epad_sim_tarif_pajak ON `master_parameter`.`sim_tarif_pajak_id` = `epad_sim_tarif_pajak`.`id_sim_tarif_pajak`
WHERE `soft_delete` = '0'
AND `soft_delete` = '0'
ORDER BY `parameter` ASC
 LIMIT 20
ERROR - 2023-04-17 12:57:16 --> 404 Page Not Found: /index
ERROR - 2023-04-17 13:01:39 --> 404 Page Not Found: /index
ERROR - 2023-04-17 13:21:25 --> 404 Page Not Found: /index
