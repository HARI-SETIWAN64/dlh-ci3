<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-29 13:32:56 --> 404 Page Not Found: /index
ERROR - 2023-05-29 13:33:08 --> 404 Page Not Found: /index
ERROR - 2023-05-29 13:33:45 --> 404 Page Not Found: /index
ERROR - 2023-05-29 13:34:05 --> 404 Page Not Found: /index
ERROR - 2023-05-29 13:37:28 --> 404 Page Not Found: /index
ERROR - 2023-05-29 13:49:53 --> 404 Page Not Found: /index
ERROR - 2023-05-29 13:53:26 --> Query error: Table 'labdlh_use.epad_pajak_retribusi' doesn't exist - Invalid query: SELECT `perusahaan`.`nama`, sum(if(MONTH(tgl_penyetoran) = '01', `pajak_retribusi`.`total`, 0)) AS januari, sum(if(MONTH(tgl_penyetoran) = '02', `pajak_retribusi`.`total`, 0)) AS februari, sum(if(MONTH(tgl_penyetoran) = '03', `pajak_retribusi`.`total`, 0)) AS maret, sum(if(MONTH(tgl_penyetoran) = '04', `pajak_retribusi`.`total`, 0)) AS april, sum(if(MONTH(tgl_penyetoran) = '05', `pajak_retribusi`.`total`, 0)) AS mei, sum(if(MONTH(tgl_penyetoran) = '06', `pajak_retribusi`.`total`, 0)) AS juni, sum(if(MONTH(tgl_penyetoran) = '07', `pajak_retribusi`.`total`, 0)) AS juli, sum(if(MONTH(tgl_penyetoran) = '08', `pajak_retribusi`.`total`, 0)) AS agustus, sum(if(MONTH(tgl_penyetoran) = '09', `pajak_retribusi`.`total`, 0)) AS sepetember, sum(if(MONTH(tgl_penyetoran) = '10', `pajak_retribusi`.`total`, 0)) AS oktober, sum(if(MONTH(tgl_penyetoran) = '11', `pajak_retribusi`.`total`, 0)) AS november, sum(if(MONTH(tgl_penyetoran) = '12', `pajak_retribusi`.`total`, 0)) AS desember
FROM `master_perusahaan` as `perusahaan`
JOIN `epad_pajak_retribusi` as `pajak_retribusi` ON `perusahaan`.`wajib_pajak_id` = `pajak_retribusi`.`wajib_pajak_id`
JOIN `fpps` ON `perusahaan`.`id` = `fpps`.`id_pelanggan` and `pajak_retribusi`.`id_pajak_retribusi`=`fpps`.`pajak_retribusi_id`
WHERE YEAR(pajak_retribusi.tgl_penyetoran) = '2023'
AND MONTH(pajak_retribusi.tgl_penyetoran) = '05'
AND `pajak_retribusi`.`status_penyetoran` = '1'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 100000
ERROR - 2023-05-29 13:56:10 --> Query error: Table 'labdlh_use.epad_pajak_retribusi' doesn't exist - Invalid query: SELECT `perusahaan`.`nama`, sum(if(MONTH(tgl_terima) = '01', `pajak_retribusi`.`total`, 0)) AS januari, sum(if(MONTH(tgl_terima) = '02', `pajak_retribusi`.`total`, 0)) AS februari, sum(if(MONTH(tgl_terima) = '03', `pajak_retribusi`.`total`, 0)) AS maret, sum(if(MONTH(tgl_terima) = '04', `pajak_retribusi`.`total`, 0)) AS april, sum(if(MONTH(tgl_terima) = '05', `pajak_retribusi`.`total`, 0)) AS mei, sum(if(MONTH(tgl_terima) = '06', `pajak_retribusi`.`total`, 0)) AS juni, sum(if(MONTH(tgl_terima) = '07', `pajak_retribusi`.`total`, 0)) AS juli, sum(if(MONTH(tgl_terima) = '08', `pajak_retribusi`.`total`, 0)) AS agustus, sum(if(MONTH(tgl_terima) = '09', `pajak_retribusi`.`total`, 0)) AS sepetember, sum(if(MONTH(tgl_terima) = '10', `pajak_retribusi`.`total`, 0)) AS oktober, sum(if(MONTH(tgl_terima) = '11', `pajak_retribusi`.`total`, 0)) AS november, sum(if(MONTH(tgl_terima) = '12', `pajak_retribusi`.`total`, 0)) AS desember
FROM `master_perusahaan` as `perusahaan`
JOIN `epad_pajak_retribusi` as `pajak_retribusi` ON `perusahaan`.`wajib_pajak_id` = `pajak_retribusi`.`wajib_pajak_id`
JOIN `fpps` ON `perusahaan`.`id` = `fpps`.`id_pelanggan` and `pajak_retribusi`.`id_pajak_retribusi`=`fpps`.`pajak_retribusi_id`
WHERE YEAR(pajak_retribusi.tgl_terima) = '2023'
AND MONTH(pajak_retribusi.tgl_terima) = '05'
AND `pajak_retribusi`.`status_penyetoran` is null
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
ERROR - 2023-05-29 13:56:15 --> Query error: Table 'labdlh_use.epad_pajak_retribusi' doesn't exist - Invalid query: SELECT `perusahaan`.`nama`, sum(if(MONTH(tgl_terima) = '01', `pajak_retribusi`.`total`, 0)) AS januari, sum(if(MONTH(tgl_terima) = '02', `pajak_retribusi`.`total`, 0)) AS februari, sum(if(MONTH(tgl_terima) = '03', `pajak_retribusi`.`total`, 0)) AS maret, sum(if(MONTH(tgl_terima) = '04', `pajak_retribusi`.`total`, 0)) AS april, sum(if(MONTH(tgl_terima) = '05', `pajak_retribusi`.`total`, 0)) AS mei, sum(if(MONTH(tgl_terima) = '06', `pajak_retribusi`.`total`, 0)) AS juni, sum(if(MONTH(tgl_terima) = '07', `pajak_retribusi`.`total`, 0)) AS juli, sum(if(MONTH(tgl_terima) = '08', `pajak_retribusi`.`total`, 0)) AS agustus, sum(if(MONTH(tgl_terima) = '09', `pajak_retribusi`.`total`, 0)) AS sepetember, sum(if(MONTH(tgl_terima) = '10', `pajak_retribusi`.`total`, 0)) AS oktober, sum(if(MONTH(tgl_terima) = '11', `pajak_retribusi`.`total`, 0)) AS november, sum(if(MONTH(tgl_terima) = '12', `pajak_retribusi`.`total`, 0)) AS desember
FROM `master_perusahaan` as `perusahaan`
JOIN `epad_pajak_retribusi` as `pajak_retribusi` ON `perusahaan`.`wajib_pajak_id` = `pajak_retribusi`.`wajib_pajak_id`
JOIN `fpps` ON `perusahaan`.`id` = `fpps`.`id_pelanggan` and `pajak_retribusi`.`id_pajak_retribusi`=`fpps`.`pajak_retribusi_id`
WHERE YEAR(pajak_retribusi.tgl_terima) = '2023'
AND MONTH(pajak_retribusi.tgl_terima) = '02'
AND `pajak_retribusi`.`status_penyetoran` is null
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
ERROR - 2023-05-29 14:14:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 252
ERROR - 2023-05-29 14:14:45 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 252
ERROR - 2023-05-29 14:14:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\List_project.php 252
ERROR - 2023-05-29 14:20:17 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:21:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:24:54 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:25:08 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:30:06 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:30:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:30:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:31:30 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:32:41 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:32:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')) AS januari, sum(if(MONTH(input_hasil_project) = '02', status = 3)) AS febr...' at line 1 - Invalid query: SELECT `ppc_list_project`.`project_id`, sum(if(MONTH(input_hasil_project) = '01', status = 3)) AS januari, sum(if(MONTH(input_hasil_project) = '02', status = 3)) AS februari, sum(if(MONTH(input_hasil_project) = '03', status = 3)) AS maret, sum(if(MONTH(input_hasil_project) = '04', status = 3)) AS april, sum(if(MONTH(input_hasil_project) = '05', status = 3)) AS mei, sum(if(MONTH(input_hasil_project) = '06', status = 3)) AS juni, sum(if(MONTH(input_hasil_project) = '07', status = 3)) AS juli, sum(if(MONTH(input_hasil_project) = '08', status = 3)) AS agustus, sum(if(MONTH(input_hasil_project) = '09', status = 3)) AS sepetember, sum(if(MONTH(input_hasil_project) = '10', status = 3)) AS oktober, sum(if(MONTH(input_hasil_project) = '11', status = 3)) AS november, sum(if(MONTH(input_hasil_project) = '12', status = 3)) AS desember
FROM `ppc_list_project`
WHERE YEAR(input_hasil_project) = '2023'
AND MONTH(input_hasil_project) = '05'
AND `status` = '3'
AND `ppc_list_project`.`status` = '3'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
 LIMIT 100000
ERROR - 2023-05-29 14:32:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')) AS januari, sum(if(MONTH(input_hasil_project) = '02', status = 3)) AS febr...' at line 1 - Invalid query: SELECT `ppc_list_project`.`project_id`, sum(if(MONTH(input_hasil_project) = '01', status = 3)) AS januari, sum(if(MONTH(input_hasil_project) = '02', status = 3)) AS februari, sum(if(MONTH(input_hasil_project) = '03', status = 3)) AS maret, sum(if(MONTH(input_hasil_project) = '04', status = 3)) AS april, sum(if(MONTH(input_hasil_project) = '05', status = 3)) AS mei, sum(if(MONTH(input_hasil_project) = '06', status = 3)) AS juni, sum(if(MONTH(input_hasil_project) = '07', status = 3)) AS juli, sum(if(MONTH(input_hasil_project) = '08', status = 3)) AS agustus, sum(if(MONTH(input_hasil_project) = '09', status = 3)) AS sepetember, sum(if(MONTH(input_hasil_project) = '10', status = 3)) AS oktober, sum(if(MONTH(input_hasil_project) = '11', status = 3)) AS november, sum(if(MONTH(input_hasil_project) = '12', status = 3)) AS desember
FROM `ppc_list_project`
WHERE YEAR(input_hasil_project) = '2023'
AND MONTH(input_hasil_project) = '05'
AND `status` = '3'
AND `ppc_list_project`.`status` = '3'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
 LIMIT 100000
ERROR - 2023-05-29 14:33:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')) AS januari, sum(if(MONTH(input_hasil_project) = '02', status = 3)) AS febr...' at line 1 - Invalid query: SELECT `ppc_list_project`.`project_id`, sum(if(MONTH(input_hasil_project) = '01', status = 3)) AS januari, sum(if(MONTH(input_hasil_project) = '02', status = 3)) AS februari, sum(if(MONTH(input_hasil_project) = '03', status = 3)) AS maret, sum(if(MONTH(input_hasil_project) = '04', status = 3)) AS april, sum(if(MONTH(input_hasil_project) = '05', status = 3)) AS mei, sum(if(MONTH(input_hasil_project) = '06', status = 3)) AS juni, sum(if(MONTH(input_hasil_project) = '07', status = 3)) AS juli, sum(if(MONTH(input_hasil_project) = '08', status = 3)) AS agustus, sum(if(MONTH(input_hasil_project) = '09', status = 3)) AS sepetember, sum(if(MONTH(input_hasil_project) = '10', status = 3)) AS oktober, sum(if(MONTH(input_hasil_project) = '11', status = 3)) AS november, sum(if(MONTH(input_hasil_project) = '12', status = 3)) AS desember
FROM `ppc_list_project`
WHERE YEAR(input_hasil_project) = '2023'
AND MONTH(input_hasil_project) = '05'
AND `status` = '3'
AND `ppc_list_project`.`status` = '3'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
 LIMIT 100000
ERROR - 2023-05-29 14:49:37 --> Severity: Notice --> Undefined variable: tot C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Rekap.php 109
ERROR - 2023-05-29 14:49:37 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Rekap.php 109
ERROR - 2023-05-29 14:49:37 --> Severity: Notice --> Undefined property: stdClass::$nama C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-29 14:49:37 --> Severity: Notice --> Undefined property: stdClass::$nama C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-29 14:51:28 --> Severity: Notice --> Undefined property: stdClass::$nama C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-29 14:51:28 --> Severity: Notice --> Undefined property: stdClass::$nama C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-29 14:51:28 --> Severity: Notice --> Undefined variable: total_items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 77
ERROR - 2023-05-29 14:51:28 --> Severity: Notice --> Undefined variable: total_items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 83
ERROR - 2023-05-29 14:52:25 --> Severity: Notice --> Undefined variable: total_items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 77
ERROR - 2023-05-29 14:52:25 --> Severity: Notice --> Undefined variable: total_items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 83
ERROR - 2023-05-29 14:55:38 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:38 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:38 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:39 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:39 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:39 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:39 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:39 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:39 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:40 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:40 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:40 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:40 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:40 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:40 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:40 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:40 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:41 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:41 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:41 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:41 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:41 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:41 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:41 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:42 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:42 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:42 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:42 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:42 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:42 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:42 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:42 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:43 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:43 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:44 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:44 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:45 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:45 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:45 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:45 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:45 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:45 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:45 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:46 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:46 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:46 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:46 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:46 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:46 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:46 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:46 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:46 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:46 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:47 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:48 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:49 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:50 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:51 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:51 --> 404 Page Not Found: /index
ERROR - 2023-05-29 14:55:51 --> 404 Page Not Found: /index
