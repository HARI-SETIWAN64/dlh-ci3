<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-11-09 05:32:20 --> 404 Page Not Found: /index
ERROR - 2021-11-09 05:38:21 --> 404 Page Not Found: /index
ERROR - 2021-11-09 07:17:25 --> 404 Page Not Found: /index
ERROR - 2021-11-09 07:17:38 --> 404 Page Not Found: /index
ERROR - 2021-11-09 07:17:40 --> 404 Page Not Found: /index
ERROR - 2021-11-09 07:46:24 --> 404 Page Not Found: /index
ERROR - 2021-11-09 07:56:01 --> 404 Page Not Found: /index
ERROR - 2021-11-09 08:57:32 --> 404 Page Not Found: /index
ERROR - 2021-11-09 09:03:20 --> 404 Page Not Found: /index
ERROR - 2021-11-09 09:03:31 --> 404 Page Not Found: /index
ERROR - 2021-11-09 09:09:46 --> 404 Page Not Found: /index
ERROR - 2021-11-09 09:09:55 --> 404 Page Not Found: /index
ERROR - 2021-11-09 09:11:14 --> 404 Page Not Found: /index
ERROR - 2021-11-09 09:43:06 --> Severity: Notice --> Undefined property: Laporan::$Laporan_model /home/labdlh/public_html/application/modules/laporan/controllers/Laporan.php 102
ERROR - 2021-11-09 09:43:06 --> Severity: Error --> Call to a member function get_list() on a non-object /home/labdlh/public_html/application/modules/laporan/controllers/Laporan.php 102
ERROR - 2021-11-09 09:43:25 --> Query error: Unknown column 'pajak.tgl_penyetoran' in 'where clause' - Invalid query: SELECT `master_perusahaan`.`alamat`, `master_perusahaan`.`kab`, `kec`.`NAMA_KEC`, `kel`.`NAMA_KEL`, `master_perusahaan`.`nib`, `master_perusahaan`.`perlin`, `master_perusahaan`.`ipal`, `master_perusahaan`.`npwp`, `master_perusahaan`.`nama`, `master_perusahaan`.`telp`, `master_perusahaan`.`email`, `master_perusahaan`.`jenis_usaha`
FROM `master_perusahaan`
LEFT JOIN `kec` ON `master_perusahaan`.`no_kec` = `kec`.`NO_KEC`
LEFT JOIN `kel` ON `master_perusahaan`.`no_kel` = `kel`.`NO_KEL` AND `kec`.`NO_KEC` = `kel`.`NO_KEC`
WHERE YEAR(pajak.tgl_penyetoran) = '2021'
AND MONTH(pajak.tgl_penyetoran) = '11'
AND `soft_delete` = '0'
ORDER BY `nama` ASC
 LIMIT 100000
ERROR - 2021-11-09 09:45:49 --> Query error: Unknown column 'pajak.tgl_penyetoran' in 'where clause' - Invalid query: SELECT `master_perusahaan`.`alamat`, `master_perusahaan`.`kab`, `kec`.`NAMA_KEC`, `kel`.`NAMA_KEL`, `master_perusahaan`.`nib`, `master_perusahaan`.`perlin`, `master_perusahaan`.`ipal`, `master_perusahaan`.`npwp`, `master_perusahaan`.`nama`, `master_perusahaan`.`telp`, `master_perusahaan`.`email`, `master_perusahaan`.`jenis_usaha`
FROM `master_perusahaan`
LEFT JOIN `kec` ON `master_perusahaan`.`no_kec` = `kec`.`NO_KEC`
LEFT JOIN `kel` ON `master_perusahaan`.`no_kel` = `kel`.`NO_KEL` AND `kec`.`NO_KEC` = `kel`.`NO_KEC`
WHERE YEAR(pajak.tgl_penyetoran) = '2021'
AND MONTH(pajak.tgl_penyetoran) = '11'
AND `soft_delete` = '0'
ORDER BY `nama` ASC
 LIMIT 100000
ERROR - 2021-11-09 09:47:13 --> Severity: Notice --> Undefined property: Laporan::$Laporan_model /home/labdlh/public_html/application/modules/laporan/controllers/Laporan.php 102
ERROR - 2021-11-09 09:47:13 --> Severity: Error --> Call to a member function get_list() on a non-object /home/labdlh/public_html/application/modules/laporan/controllers/Laporan.php 102
ERROR - 2021-11-09 09:48:08 --> Query error: Unknown column 'master_perusahaan.nama' in 'field list' - Invalid query: SELECT `master_perusahaan`.`nama`, sum(if(MONTH(tgl_penyetoran) = '01', `total`, 0)) as januaru, sum(if(MONTH(tgl_penyetoran) = '02', `total`, 0)) as februari, sum(if(MONTH(tgl_penyetoran) = '03', `total`, 0)) as maret, sum(if(MONTH(tgl_penyetoran) = '04', `total`, 0)) as april, sum(if(MONTH(tgl_penyetoran) = '05', `total`, 0)) as mei, sum(if(MONTH(tgl_penyetoran) = '06', `total`, 0)) as juni, sum(if(MONTH(tgl_penyetoran) = '07', `total`, 0)) as juli, sum(if(MONTH(tgl_penyetoran) = '08', `total`, 0)) as agustus, sum(if(MONTH(tgl_penyetoran) = '09', `total`, 0)) as sepetember, sum(if(MONTH(tgl_penyetoran) = '10', `total`, 0)) as oktober, sum(if(MONTH(tgl_penyetoran) = '11', `total`, 0)) as november, sum(if(MONTH(tgl_penyetoran) = '12', `total`, 0)) as desember
FROM `fpps`
JOIN `master_perusahaan` as `perusahaan` ON `fpps`.`id_pelanggan` = `perusahaan`.`id`
JOIN `epad_pajak_retribusi` as `pajak` ON `perusahaan`.`wajib_pajak_id` = `pajak`.`wajib_pajak_id`
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 100000
ERROR - 2021-11-09 09:49:02 --> Query error: Unknown column 'master_perusahaan.nama' in 'field list' - Invalid query: SELECT `master_perusahaan`.`nama`, sum(if(MONTH(tgl_penyetoran) = '01', `total`, 0)) as januaru, sum(if(MONTH(tgl_penyetoran) = '02', `total`, 0)) as februari, sum(if(MONTH(tgl_penyetoran) = '03', `total`, 0)) as maret, sum(if(MONTH(tgl_penyetoran) = '04', `total`, 0)) as april, sum(if(MONTH(tgl_penyetoran) = '05', `total`, 0)) as mei, sum(if(MONTH(tgl_penyetoran) = '06', `total`, 0)) as juni, sum(if(MONTH(tgl_penyetoran) = '07', `total`, 0)) as juli, sum(if(MONTH(tgl_penyetoran) = '08', `total`, 0)) as agustus, sum(if(MONTH(tgl_penyetoran) = '09', `total`, 0)) as sepetember, sum(if(MONTH(tgl_penyetoran) = '10', `total`, 0)) as oktober, sum(if(MONTH(tgl_penyetoran) = '11', `total`, 0)) as november, sum(if(MONTH(tgl_penyetoran) = '12', `total`, 0)) as desember
FROM `fpps`
JOIN `master_perusahaan` as `perusahaan` ON `fpps`.`id_pelanggan` = `perusahaan`.`id`
JOIN `epad_pajak_retribusi` as `pajak` ON `perusahaan`.`wajib_pajak_id` = `pajak`.`wajib_pajak_id`
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 100000
ERROR - 2021-11-09 09:49:45 --> Query error: Unknown column 'master_perusahaan.nama' in 'field list' - Invalid query: SELECT `master_perusahaan`.`nama`, sum(if(MONTH(tgl_penyetoran) = '01', `total`, 0)) as januaru, sum(if(MONTH(tgl_penyetoran) = '02', `total`, 0)) as februari, sum(if(MONTH(tgl_penyetoran) = '03', `total`, 0)) as maret, sum(if(MONTH(tgl_penyetoran) = '04', `total`, 0)) as april, sum(if(MONTH(tgl_penyetoran) = '05', `total`, 0)) as mei, sum(if(MONTH(tgl_penyetoran) = '06', `total`, 0)) as juni, sum(if(MONTH(tgl_penyetoran) = '07', `total`, 0)) as juli, sum(if(MONTH(tgl_penyetoran) = '08', `total`, 0)) as agustus, sum(if(MONTH(tgl_penyetoran) = '09', `total`, 0)) as sepetember, sum(if(MONTH(tgl_penyetoran) = '10', `total`, 0)) as oktober, sum(if(MONTH(tgl_penyetoran) = '11', `total`, 0)) as november, sum(if(MONTH(tgl_penyetoran) = '12', `total`, 0)) as desember
FROM `fpps`
JOIN `master_perusahaan` as `perusahaan` ON `fpps`.`id_pelanggan` = `perusahaan`.`id`
JOIN `epad_pajak_retribusi` as `pajak` ON `perusahaan`.`wajib_pajak_id` = `pajak`.`wajib_pajak_id`
GROUP BY `perusahaan`.`nama`
ORDER BY `perusahaan`.`nama` ASC
 LIMIT 100000
ERROR - 2021-11-09 09:49:54 --> Severity: Error --> Class 'Laporan_model' not found /home/labdlh/public_html/application/third_party/MX/Loader.php 228
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 09:54:37 --> Severity: Notice --> Undefined property: stdClass::$januari /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 22
ERROR - 2021-11-09 10:02:41 --> 404 Page Not Found: /index
ERROR - 2021-11-09 10:19:38 --> Severity: Parsing Error --> syntax error, unexpected 'echo' (T_ECHO) /home/labdlh/public_html/application/modules/laporan/views/laporan/v_lap_pendapatan_perbulan.php 71
ERROR - 2021-11-09 11:55:24 --> 404 Page Not Found: /index
ERROR - 2021-11-09 12:06:12 --> 404 Page Not Found: /index
ERROR - 2021-11-09 12:06:16 --> 404 Page Not Found: /index
ERROR - 2021-11-09 12:06:27 --> 404 Page Not Found: /index
ERROR - 2021-11-09 12:15:23 --> 404 Page Not Found: /index
ERROR - 2021-11-09 12:15:29 --> 404 Page Not Found: /index
ERROR - 2021-11-09 12:40:12 --> 404 Page Not Found: /index
ERROR - 2021-11-09 14:14:10 --> 404 Page Not Found: /index
ERROR - 2021-11-09 14:14:21 --> 404 Page Not Found: /index
ERROR - 2021-11-09 15:42:09 --> 404 Page Not Found: /index
ERROR - 2021-11-09 15:42:17 --> 404 Page Not Found: /index
ERROR - 2021-11-09 15:42:20 --> 404 Page Not Found: /index
ERROR - 2021-11-09 15:58:24 --> 404 Page Not Found: /index
ERROR - 2021-11-09 15:58:27 --> 404 Page Not Found: /index
ERROR - 2021-11-09 17:50:20 --> 404 Page Not Found: /index
ERROR - 2021-11-09 20:10:26 --> 404 Page Not Found: /index
ERROR - 2021-11-09 20:45:58 --> 404 Page Not Found: /index
ERROR - 2021-11-09 20:56:30 --> 404 Page Not Found: /index
ERROR - 2021-11-09 22:03:56 --> 404 Page Not Found: /index
