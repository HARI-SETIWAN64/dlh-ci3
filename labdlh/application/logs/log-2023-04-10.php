<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-04-10 03:56:27 --> 404 Page Not Found: /index
ERROR - 2023-04-10 03:56:45 --> Query error: Table 'labdlh.epad_pajak_retribusi' doesn't exist - Invalid query: SELECT `fpps`.*, `pajak`.`no_kohir`, `pajak`.`status_penyetoran`, `tgl_penyetoran`
FROM `fpps`
LEFT JOIN `epad_pajak_retribusi` as `pajak` ON `fpps`.`pajak_retribusi_id` = `pajak`.`id_pajak_retribusi`
WHERE `master_paket_id` =0
AND `validasi_fpps` = '1'
AND   (
`validasi_fpps` IN('1')
 )
ORDER BY `date_create` DESC
 LIMIT 20
ERROR - 2023-04-10 03:56:51 --> Query error: Table 'labdlh.epad_pajak_retribusi' doesn't exist - Invalid query: SELECT `fpps`.*, `pajak`.`no_kohir`, `pajak`.`status_penyetoran`, `tgl_penyetoran`
FROM `fpps`
LEFT JOIN `epad_pajak_retribusi` as `pajak` ON `fpps`.`pajak_retribusi_id` = `pajak`.`id_pajak_retribusi`
WHERE `master_paket_id` =0
AND `validasi_fpps` = '1'
AND   (
`validasi_fpps` IN('1')
 )
ORDER BY `date_create` DESC
 LIMIT 20
ERROR - 2023-04-10 03:56:59 --> Query error: Table 'labdlh.epad_pajak_retribusi' doesn't exist - Invalid query: SELECT `fpps`.*, `pajak`.`no_kohir`, `pajak`.`status_penyetoran`, `tgl_penyetoran`
FROM `fpps`
LEFT JOIN `epad_pajak_retribusi` as `pajak` ON `fpps`.`pajak_retribusi_id` = `pajak`.`id_pajak_retribusi`
WHERE `master_paket_id` =0
AND `validasi_fpps` = '1'
AND   (
`validasi_fpps` IN('1')
 )
ORDER BY `date_create` DESC
 LIMIT 20
ERROR - 2023-04-10 03:57:09 --> Query error: Table 'labdlh.epad_pajak_retribusi' doesn't exist - Invalid query: SELECT `fpps`.*, `pajak`.`no_kohir`, `pajak`.`status_penyetoran`, `tgl_penyetoran`
FROM `fpps`
LEFT JOIN `epad_pajak_retribusi` as `pajak` ON `fpps`.`pajak_retribusi_id` = `pajak`.`id_pajak_retribusi`
WHERE `validasi_stp` = '1'
AND `validasi_fpps` = '1'
AND   (
`validasi_fpps` IN('1')
 )
ORDER BY `date_create` DESC
 LIMIT 10
ERROR - 2023-04-10 03:57:14 --> Query error: Table 'labdlh.epad_sim_tarif_pajak' doesn't exist - Invalid query: SELECT *
FROM `master_parameter`
LEFT JOIN (SELECT id_sim_tarif_pajak, uraian_tarif_pajak, nilai_tarif_pajak FROM epad_sim_tarif_pajak WHERE `groups`='dlh' and is_new = '1') as epad_sim_tarif_pajak ON `master_parameter`.`sim_tarif_pajak_id` = `epad_sim_tarif_pajak`.`id_sim_tarif_pajak`
WHERE `soft_delete` = '0'
AND `soft_delete` = '0'
ORDER BY `parameter` ASC
 LIMIT 20
ERROR - 2023-04-10 03:59:13 --> Severity: Compile Error --> Cannot redeclare Jenis_sampel::jenis_sampel_list() C:\laragon\www\labdlh\application\modules\ujibanding\controllers\Jenis_sampel.php 86
ERROR - 2023-04-10 04:04:49 --> Query error: Table 'labdlh.epad_pajak_retribusi' doesn't exist - Invalid query: SELECT `fpps`.*, `pajak`.`no_kohir`, `pajak`.`status_penyetoran`, `tgl_penyetoran`
FROM `fpps`
LEFT JOIN `epad_pajak_retribusi` as `pajak` ON `fpps`.`pajak_retribusi_id` = `pajak`.`id_pajak_retribusi`
WHERE `validasi_stp` = '1'
AND `validasi_fpps` = '1'
AND   (
`validasi_fpps` IN('1')
 )
ORDER BY `date_create` DESC
 LIMIT 10
ERROR - 2023-04-10 04:05:28 --> Severity: Error --> Call to undefined method Lhu::req_tte() C:\laragon\www\labdlh\application\modules\fpps\controllers\Lhu.php 227
ERROR - 2023-04-10 04:05:49 --> Severity: Error --> Call to undefined method Lhu::req_tte() C:\laragon\www\labdlh\application\modules\fpps\controllers\Lhu.php 227
ERROR - 2023-04-10 04:06:00 --> Query error: Table 'labdlh.epad_sim_tarif_pajak' doesn't exist - Invalid query: SELECT *
FROM `master_parameter`
LEFT JOIN (SELECT id_sim_tarif_pajak, uraian_tarif_pajak, nilai_tarif_pajak FROM epad_sim_tarif_pajak WHERE `groups`='dlh' and is_new = '1') as epad_sim_tarif_pajak ON `master_parameter`.`sim_tarif_pajak_id` = `epad_sim_tarif_pajak`.`id_sim_tarif_pajak`
WHERE `soft_delete` = '0'
AND `soft_delete` = '0'
ORDER BY `parameter` ASC
 LIMIT 20
ERROR - 2023-04-10 08:35:50 --> 404 Page Not Found: /index
ERROR - 2023-04-10 08:41:49 --> 404 Page Not Found: /index
ERROR - 2023-04-10 08:42:05 --> 404 Page Not Found: ../modules/fpps/controllers//index
ERROR - 2023-04-10 08:50:27 --> 404 Page Not Found: ../modules/fpps/controllers//index
ERROR - 2023-04-10 08:50:30 --> 404 Page Not Found: ../modules/fpps/controllers//index
ERROR - 2023-04-10 08:50:32 --> 404 Page Not Found: ../modules/fpps/controllers//index
ERROR - 2023-04-10 10:11:02 --> 404 Page Not Found: /index
ERROR - 2023-04-10 10:11:16 --> 404 Page Not Found: ../modules/fpps/controllers//index
ERROR - 2023-04-10 10:11:16 --> 404 Page Not Found: /index
ERROR - 2023-04-10 10:12:09 --> 404 Page Not Found: /index
ERROR - 2023-04-10 10:34:42 --> Query error: Table 'labdlh.epad_sim_tarif_pajak' doesn't exist - Invalid query: SELECT *
FROM `master_parameter`
LEFT JOIN (SELECT id_sim_tarif_pajak, uraian_tarif_pajak, nilai_tarif_pajak FROM epad_sim_tarif_pajak WHERE `groups`='dlh' and is_new = '1') as epad_sim_tarif_pajak ON `master_parameter`.`sim_tarif_pajak_id` = `epad_sim_tarif_pajak`.`id_sim_tarif_pajak`
WHERE `soft_delete` = '0'
AND `soft_delete` = '0'
ORDER BY `parameter` ASC
 LIMIT 20
