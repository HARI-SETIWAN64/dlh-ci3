<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-09 06:10:35 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:09:11 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:09:22 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:09:26 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:09:41 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:22:45 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:33:24 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:34:29 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:34:34 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:41:55 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:44:24 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:48:08 --> 404 Page Not Found: /index
ERROR - 2022-02-09 07:48:40 --> 404 Page Not Found: /index
ERROR - 2022-02-09 08:01:28 --> 404 Page Not Found: /index
ERROR - 2022-02-09 08:01:31 --> 404 Page Not Found: /index
ERROR - 2022-02-09 08:06:41 --> 404 Page Not Found: /index
ERROR - 2022-02-09 08:07:48 --> 404 Page Not Found: /index
ERROR - 2022-02-09 08:09:54 --> 404 Page Not Found: /index
ERROR - 2022-02-09 08:23:33 --> 404 Page Not Found: /index
ERROR - 2022-02-09 08:23:44 --> 404 Page Not Found: /index
ERROR - 2022-02-09 08:23:47 --> 404 Page Not Found: /index
ERROR - 2022-02-09 08:58:59 --> 404 Page Not Found: /index
ERROR - 2022-02-09 08:59:14 --> 404 Page Not Found: /index
ERROR - 2022-02-09 09:07:16 --> Severity: Notice --> Trying to get property of non-object /home/labdlh/public_html/application/modules/laporan/controllers/Laporan.php 136
ERROR - 2022-02-09 09:10:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 1000' at line 6 - Invalid query: SELECT `perusahaan`.`nama`, sum(if(MONTH(tgl_penyetoran) = '01', `pajak_retribusi`.`total`, 0)) AS januari, sum(if(MONTH(tgl_penyetoran) = '02', `pajak_retribusi`.`total`, 0)) AS februari, sum(if(MONTH(tgl_penyetoran) = '03', `pajak_retribusi`.`total`, 0)) AS maret, sum(if(MONTH(tgl_penyetoran) = '04', `pajak_retribusi`.`total`, 0)) AS april, sum(if(MONTH(tgl_penyetoran) = '05', `pajak_retribusi`.`total`, 0)) AS mei, sum(if(MONTH(tgl_penyetoran) = '06', `pajak_retribusi`.`total`, 0)) AS juni, sum(if(MONTH(tgl_penyetoran) = '07', `pajak_retribusi`.`total`, 0)) AS juli, sum(if(MONTH(tgl_penyetoran) = '08', `pajak_retribusi`.`total`, 0)) AS agustus, sum(if(MONTH(tgl_penyetoran) = '09', `pajak_retribusi`.`total`, 0)) AS sepetember, sum(if(MONTH(tgl_penyetoran) = '10', `pajak_retribusi`.`total`, 0)) AS oktober, sum(if(MONTH(tgl_penyetoran) = '11', `pajak_retribusi`.`total`, 0)) AS november, sum(if(MONTH(tgl_penyetoran) = '12', `pajak_retribusi`.`total`, 0)) AS desember
FROM `master_perusahaan` as `perusahaan`
JOIN `epad_pajak_retribusi` as `pajak_retribusi` ON `perusahaan`.`wajib_pajak_id` = `pajak_retribusi`.`wajib_pajak_id`
JOIN `fpps` ON `perusahaan`.`id` = `fpps`.`id_pelanggan` and `pajak_retribusi`.`id_pajak_retribusi`=`fpps`.`pajak_retribusi_id`
WHERE YEAR(pajak_retribusi.tgl_penyetoran) = '2022'
AND pajak_retribusi.status_penyetoran is  'null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 100000
ERROR - 2022-02-09 09:12:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 1000' at line 6 - Invalid query: SELECT `perusahaan`.`nama`, sum(if(MONTH(tgl_penyetoran) = '01', `pajak_retribusi`.`total`, 0)) AS januari, sum(if(MONTH(tgl_penyetoran) = '02', `pajak_retribusi`.`total`, 0)) AS februari, sum(if(MONTH(tgl_penyetoran) = '03', `pajak_retribusi`.`total`, 0)) AS maret, sum(if(MONTH(tgl_penyetoran) = '04', `pajak_retribusi`.`total`, 0)) AS april, sum(if(MONTH(tgl_penyetoran) = '05', `pajak_retribusi`.`total`, 0)) AS mei, sum(if(MONTH(tgl_penyetoran) = '06', `pajak_retribusi`.`total`, 0)) AS juni, sum(if(MONTH(tgl_penyetoran) = '07', `pajak_retribusi`.`total`, 0)) AS juli, sum(if(MONTH(tgl_penyetoran) = '08', `pajak_retribusi`.`total`, 0)) AS agustus, sum(if(MONTH(tgl_penyetoran) = '09', `pajak_retribusi`.`total`, 0)) AS sepetember, sum(if(MONTH(tgl_penyetoran) = '10', `pajak_retribusi`.`total`, 0)) AS oktober, sum(if(MONTH(tgl_penyetoran) = '11', `pajak_retribusi`.`total`, 0)) AS november, sum(if(MONTH(tgl_penyetoran) = '12', `pajak_retribusi`.`total`, 0)) AS desember
FROM `master_perusahaan` as `perusahaan`
JOIN `epad_pajak_retribusi` as `pajak_retribusi` ON `perusahaan`.`wajib_pajak_id` = `pajak_retribusi`.`wajib_pajak_id`
JOIN `fpps` ON `perusahaan`.`id` = `fpps`.`id_pelanggan` and `pajak_retribusi`.`id_pajak_retribusi`=`fpps`.`pajak_retribusi_id`
WHERE YEAR(pajak_retribusi.tgl_penyetoran) = '2022'
AND pajak_retribusi.status_penyetoran is 'null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 100000
ERROR - 2022-02-09 09:12:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 1000' at line 6 - Invalid query: SELECT `perusahaan`.`nama`, sum(if(MONTH(tgl_penyetoran) = '01', `pajak_retribusi`.`total`, 0)) AS januari, sum(if(MONTH(tgl_penyetoran) = '02', `pajak_retribusi`.`total`, 0)) AS februari, sum(if(MONTH(tgl_penyetoran) = '03', `pajak_retribusi`.`total`, 0)) AS maret, sum(if(MONTH(tgl_penyetoran) = '04', `pajak_retribusi`.`total`, 0)) AS april, sum(if(MONTH(tgl_penyetoran) = '05', `pajak_retribusi`.`total`, 0)) AS mei, sum(if(MONTH(tgl_penyetoran) = '06', `pajak_retribusi`.`total`, 0)) AS juni, sum(if(MONTH(tgl_penyetoran) = '07', `pajak_retribusi`.`total`, 0)) AS juli, sum(if(MONTH(tgl_penyetoran) = '08', `pajak_retribusi`.`total`, 0)) AS agustus, sum(if(MONTH(tgl_penyetoran) = '09', `pajak_retribusi`.`total`, 0)) AS sepetember, sum(if(MONTH(tgl_penyetoran) = '10', `pajak_retribusi`.`total`, 0)) AS oktober, sum(if(MONTH(tgl_penyetoran) = '11', `pajak_retribusi`.`total`, 0)) AS november, sum(if(MONTH(tgl_penyetoran) = '12', `pajak_retribusi`.`total`, 0)) AS desember
FROM `master_perusahaan` as `perusahaan`
JOIN `epad_pajak_retribusi` as `pajak_retribusi` ON `perusahaan`.`wajib_pajak_id` = `pajak_retribusi`.`wajib_pajak_id`
JOIN `fpps` ON `perusahaan`.`id` = `fpps`.`id_pelanggan` and `pajak_retribusi`.`id_pajak_retribusi`=`fpps`.`pajak_retribusi_id`
WHERE YEAR(pajak_retribusi.tgl_penyetoran) = '2022'
AND pajak_retribusi.status_penyetoran is 'null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 100000
ERROR - 2022-02-09 09:13:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 1000' at line 6 - Invalid query: SELECT `perusahaan`.`nama`, sum(if(MONTH(tgl_penyetoran) = '01', `pajak_retribusi`.`total`, 0)) AS januari, sum(if(MONTH(tgl_penyetoran) = '02', `pajak_retribusi`.`total`, 0)) AS februari, sum(if(MONTH(tgl_penyetoran) = '03', `pajak_retribusi`.`total`, 0)) AS maret, sum(if(MONTH(tgl_penyetoran) = '04', `pajak_retribusi`.`total`, 0)) AS april, sum(if(MONTH(tgl_penyetoran) = '05', `pajak_retribusi`.`total`, 0)) AS mei, sum(if(MONTH(tgl_penyetoran) = '06', `pajak_retribusi`.`total`, 0)) AS juni, sum(if(MONTH(tgl_penyetoran) = '07', `pajak_retribusi`.`total`, 0)) AS juli, sum(if(MONTH(tgl_penyetoran) = '08', `pajak_retribusi`.`total`, 0)) AS agustus, sum(if(MONTH(tgl_penyetoran) = '09', `pajak_retribusi`.`total`, 0)) AS sepetember, sum(if(MONTH(tgl_penyetoran) = '10', `pajak_retribusi`.`total`, 0)) AS oktober, sum(if(MONTH(tgl_penyetoran) = '11', `pajak_retribusi`.`total`, 0)) AS november, sum(if(MONTH(tgl_penyetoran) = '12', `pajak_retribusi`.`total`, 0)) AS desember
FROM `master_perusahaan` as `perusahaan`
JOIN `epad_pajak_retribusi` as `pajak_retribusi` ON `perusahaan`.`wajib_pajak_id` = `pajak_retribusi`.`wajib_pajak_id`
JOIN `fpps` ON `perusahaan`.`id` = `fpps`.`id_pelanggan` and `pajak_retribusi`.`id_pajak_retribusi`=`fpps`.`pajak_retribusi_id`
WHERE YEAR(pajak_retribusi.tgl_penyetoran) = '2022'
AND `pajak_retribusi`.`status_penyetoran` is NULL 'null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 100000
ERROR - 2022-02-09 09:14:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 1000' at line 6 - Invalid query: SELECT `perusahaan`.`nama`, sum(if(MONTH(tgl_penyetoran) = '01', `pajak_retribusi`.`total`, 0)) AS januari, sum(if(MONTH(tgl_penyetoran) = '02', `pajak_retribusi`.`total`, 0)) AS februari, sum(if(MONTH(tgl_penyetoran) = '03', `pajak_retribusi`.`total`, 0)) AS maret, sum(if(MONTH(tgl_penyetoran) = '04', `pajak_retribusi`.`total`, 0)) AS april, sum(if(MONTH(tgl_penyetoran) = '05', `pajak_retribusi`.`total`, 0)) AS mei, sum(if(MONTH(tgl_penyetoran) = '06', `pajak_retribusi`.`total`, 0)) AS juni, sum(if(MONTH(tgl_penyetoran) = '07', `pajak_retribusi`.`total`, 0)) AS juli, sum(if(MONTH(tgl_penyetoran) = '08', `pajak_retribusi`.`total`, 0)) AS agustus, sum(if(MONTH(tgl_penyetoran) = '09', `pajak_retribusi`.`total`, 0)) AS sepetember, sum(if(MONTH(tgl_penyetoran) = '10', `pajak_retribusi`.`total`, 0)) AS oktober, sum(if(MONTH(tgl_penyetoran) = '11', `pajak_retribusi`.`total`, 0)) AS november, sum(if(MONTH(tgl_penyetoran) = '12', `pajak_retribusi`.`total`, 0)) AS desember
FROM `master_perusahaan` as `perusahaan`
JOIN `epad_pajak_retribusi` as `pajak_retribusi` ON `perusahaan`.`wajib_pajak_id` = `pajak_retribusi`.`wajib_pajak_id`
JOIN `fpps` ON `perusahaan`.`id` = `fpps`.`id_pelanggan` and `pajak_retribusi`.`id_pajak_retribusi`=`fpps`.`pajak_retribusi_id`
WHERE YEAR(pajak_retribusi.tgl_penyetoran) = '2022'
AND `pajak_retribusi`.`status_penyetoran` is NULL 'null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 100000
ERROR - 2022-02-09 09:14:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 1000' at line 6 - Invalid query: SELECT `perusahaan`.`nama`, sum(if(MONTH(tgl_penyetoran) = '01', `pajak_retribusi`.`total`, 0)) AS januari, sum(if(MONTH(tgl_penyetoran) = '02', `pajak_retribusi`.`total`, 0)) AS februari, sum(if(MONTH(tgl_penyetoran) = '03', `pajak_retribusi`.`total`, 0)) AS maret, sum(if(MONTH(tgl_penyetoran) = '04', `pajak_retribusi`.`total`, 0)) AS april, sum(if(MONTH(tgl_penyetoran) = '05', `pajak_retribusi`.`total`, 0)) AS mei, sum(if(MONTH(tgl_penyetoran) = '06', `pajak_retribusi`.`total`, 0)) AS juni, sum(if(MONTH(tgl_penyetoran) = '07', `pajak_retribusi`.`total`, 0)) AS juli, sum(if(MONTH(tgl_penyetoran) = '08', `pajak_retribusi`.`total`, 0)) AS agustus, sum(if(MONTH(tgl_penyetoran) = '09', `pajak_retribusi`.`total`, 0)) AS sepetember, sum(if(MONTH(tgl_penyetoran) = '10', `pajak_retribusi`.`total`, 0)) AS oktober, sum(if(MONTH(tgl_penyetoran) = '11', `pajak_retribusi`.`total`, 0)) AS november, sum(if(MONTH(tgl_penyetoran) = '12', `pajak_retribusi`.`total`, 0)) AS desember
FROM `master_perusahaan` as `perusahaan`
JOIN `epad_pajak_retribusi` as `pajak_retribusi` ON `perusahaan`.`wajib_pajak_id` = `pajak_retribusi`.`wajib_pajak_id`
JOIN `fpps` ON `perusahaan`.`id` = `fpps`.`id_pelanggan` and `pajak_retribusi`.`id_pajak_retribusi`=`fpps`.`pajak_retribusi_id`
WHERE YEAR(pajak_retribusi.tgl_penyetoran) = '2022'
AND pajak_retribusi.status_penyetoran is 'null'
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 100000
ERROR - 2022-02-09 09:47:39 --> Severity: Notice --> Undefined variable: item /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 185
ERROR - 2022-02-09 09:47:39 --> Severity: Notice --> Trying to get property of non-object /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 185
ERROR - 2022-02-09 09:47:39 --> Severity: Notice --> Undefined variable: item /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 186
ERROR - 2022-02-09 09:47:39 --> Severity: Notice --> Trying to get property of non-object /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 186
ERROR - 2022-02-09 09:48:08 --> Severity: Notice --> Undefined variable: tgl2 /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_cetak_skrd_pdf.php 11
ERROR - 2022-02-09 09:51:21 --> Severity: Warning --> Missing argument 3 for Laporan_model::get_list(), called in /home/labdlh/public_html/application/modules/laporan/controllers/Laporan.php on line 133 and defined /home/labdlh/public_html/application/modules/laporan/models/Laporan_model.php 6
ERROR - 2022-02-09 09:51:21 --> Severity: Warning --> Missing argument 4 for Laporan_model::get_list(), called in /home/labdlh/public_html/application/modules/laporan/controllers/Laporan.php on line 133 and defined /home/labdlh/public_html/application/modules/laporan/models/Laporan_model.php 6
ERROR - 2022-02-09 09:51:21 --> Severity: Notice --> Undefined variable: like /home/labdlh/public_html/application/modules/laporan/models/Laporan_model.php 28
ERROR - 2022-02-09 09:51:21 --> Severity: Notice --> Undefined variable: offset /home/labdlh/public_html/application/modules/laporan/models/Laporan_model.php 38
ERROR - 2022-02-09 09:52:06 --> Severity: Notice --> Undefined variable: limit /home/labdlh/public_html/application/modules/laporan/models/Laporan_model.php 73
ERROR - 2022-02-09 09:52:06 --> Severity: Notice --> Undefined variable: offset /home/labdlh/public_html/application/modules/laporan/models/Laporan_model.php 73
ERROR - 2022-02-09 09:53:28 --> Severity: Notice --> Undefined property: stdClass::$nomor /home/labdlh/public_html/application/modules/fpps/controllers/Fpps_pelanggan.php 851
ERROR - 2022-02-09 09:53:28 --> Severity: Notice --> Undefined property: stdClass::$nomor /home/labdlh/public_html/application/modules/fpps/controllers/Fpps_pelanggan.php 855
ERROR - 2022-02-09 10:05:31 --> Severity: Notice --> Undefined variable: item /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 185
ERROR - 2022-02-09 10:05:31 --> Severity: Notice --> Trying to get property of non-object /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 185
ERROR - 2022-02-09 10:05:31 --> Severity: Notice --> Undefined variable: item /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 186
ERROR - 2022-02-09 10:05:31 --> Severity: Notice --> Trying to get property of non-object /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 186
ERROR - 2022-02-09 10:06:07 --> Severity: Notice --> Undefined variable: tgl2 /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_cetak_skrd_pdf.php 11
ERROR - 2022-02-09 10:57:00 --> 404 Page Not Found: /index
ERROR - 2022-02-09 11:02:48 --> 404 Page Not Found: /index
ERROR - 2022-02-09 11:04:12 --> Severity: Notice --> Trying to get property of non-object /home/labdlh/public_html/application/modules/laporan/controllers/Laporan.php 108
ERROR - 2022-02-09 11:07:09 --> 404 Page Not Found: /index
ERROR - 2022-02-09 11:07:44 --> 404 Page Not Found: /index
ERROR - 2022-02-09 11:09:06 --> Severity: Notice --> Undefined variable: item /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 185
ERROR - 2022-02-09 11:09:06 --> Severity: Notice --> Trying to get property of non-object /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 185
ERROR - 2022-02-09 11:09:06 --> Severity: Notice --> Undefined variable: item /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 186
ERROR - 2022-02-09 11:09:06 --> Severity: Notice --> Trying to get property of non-object /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_form_pengesahan_pajak.php 186
ERROR - 2022-02-09 11:09:13 --> Severity: Notice --> Undefined variable: tgl2 /home/labdlh/public_html/application/modules/fpps/views/fpps_pelanggan/v_cetak_skrd_pdf.php 11
ERROR - 2022-02-09 11:16:19 --> 404 Page Not Found: /index
ERROR - 2022-02-09 11:20:38 --> 404 Page Not Found: /index
ERROR - 2022-02-09 11:30:39 --> 404 Page Not Found: /index
ERROR - 2022-02-09 11:33:25 --> 404 Page Not Found: /index
ERROR - 2022-02-09 11:52:18 --> 404 Page Not Found: /index
ERROR - 2022-02-09 12:26:41 --> 404 Page Not Found: /index
ERROR - 2022-02-09 12:27:00 --> 404 Page Not Found: /index
ERROR - 2022-02-09 12:56:44 --> 404 Page Not Found: /index
ERROR - 2022-02-09 13:00:30 --> 404 Page Not Found: /index
ERROR - 2022-02-09 13:01:00 --> 404 Page Not Found: /index
ERROR - 2022-02-09 13:01:10 --> 404 Page Not Found: /index
ERROR - 2022-02-09 13:21:39 --> 404 Page Not Found: /index
ERROR - 2022-02-09 13:40:02 --> 404 Page Not Found: /index
ERROR - 2022-02-09 14:53:18 --> 404 Page Not Found: /index
ERROR - 2022-02-09 14:53:55 --> 404 Page Not Found: /index
ERROR - 2022-02-09 16:19:25 --> 404 Page Not Found: /index
ERROR - 2022-02-09 17:05:39 --> 404 Page Not Found: /index
ERROR - 2022-02-09 20:33:36 --> 404 Page Not Found: /index
ERROR - 2022-02-09 20:34:03 --> 404 Page Not Found: /index
ERROR - 2022-02-09 20:39:29 --> 404 Page Not Found: /index
ERROR - 2022-02-09 21:45:33 --> 404 Page Not Found: /index
ERROR - 2022-02-09 22:07:22 --> 404 Page Not Found: /index
ERROR - 2022-02-09 22:39:38 --> 404 Page Not Found: /index
ERROR - 2022-02-09 23:30:43 --> 404 Page Not Found: /index
ERROR - 2022-02-09 23:50:43 --> 404 Page Not Found: /index
