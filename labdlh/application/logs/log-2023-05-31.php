<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-31 08:31:07 --> 404 Page Not Found: /index
ERROR - 2023-05-31 08:31:15 --> 404 Page Not Found: /index
ERROR - 2023-05-31 08:31:56 --> 404 Page Not Found: /index
ERROR - 2023-05-31 08:32:08 --> 404 Page Not Found: /index
ERROR - 2023-05-31 08:34:27 --> Severity: Notice --> Undefined property: stdClass::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-31 08:34:27 --> Severity: Notice --> Undefined property: stdClass::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 24
ERROR - 2023-05-31 08:42:57 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Rekap.php 110
ERROR - 2023-05-31 08:44:00 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Rekap.php 110
ERROR - 2023-05-31 09:00:33 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\labdlh_use\system\database\DB_query_builder.php 662
ERROR - 2023-05-31 09:00:33 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `ppc_list_project`.`project_id`, `ppc_sub_project`.`sub_project`, sum(if(MONTH(mulai) = '01', 1, 0)) AS januari, sum(if(MONTH(mulai) = '02', 1, 0)) AS februari, sum(if(MONTH(mulai) = '03', 1, 0)) AS maret, sum(if(MONTH(mulai) = '04', 1, 0)) AS april, sum(if(MONTH(mulai) = '05', 1, 0)) AS mei, sum(if(MONTH(mulai) = '06', 1, 0)) AS juni, sum(if(MONTH(mulai) = '07', 1, 0)) AS juli, sum(if(MONTH(mulai) = '08', 1, 0)) AS agustus, sum(if(MONTH(mulai) = '09', 1, 0)) AS sepetember, sum(if(MONTH(mulai) = '10', 1, 0)) AS oktober, sum(if(MONTH(mulai) = '11', 1, 0)) AS november, sum(if(MONTH(mulai) = '12', 1, 0)) AS desember
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
WHERE YEAR(mulai) = '2023'
AND MONTH(mulai) = '05'
AND `status` = '1'
AND 0 = '0'
AND `ppc_list_project`.`status` = `Array`
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 09:04:13 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Rekap.php 166
ERROR - 2023-05-31 09:04:13 --> Severity: Notice --> Undefined variable: items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 09:04:13 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined variable: maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 57
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined variable: april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 58
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined variable: mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 59
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined variable: juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 60
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined variable: juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 61
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined variable: agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 62
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined variable: sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 63
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined variable: oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 64
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined variable: november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 65
ERROR - 2023-05-31 09:14:19 --> Severity: Notice --> Undefined variable: desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 66
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined variable: maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 57
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined variable: april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 58
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined variable: mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 59
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined variable: juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 60
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined variable: juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 61
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined variable: agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 62
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined variable: sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 63
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined variable: oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 64
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined variable: november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 65
ERROR - 2023-05-31 09:15:16 --> Severity: Notice --> Undefined variable: desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 66
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined variable: maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 57
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined variable: april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 58
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined variable: mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 59
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined variable: juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 60
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined variable: juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 61
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined variable: agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 62
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined variable: sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 63
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined variable: oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 64
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined variable: november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 65
ERROR - 2023-05-31 09:15:52 --> Severity: Notice --> Undefined variable: desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 66
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined variable: maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 57
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined variable: april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 58
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined variable: mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 59
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined variable: juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 60
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined variable: juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 61
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined variable: agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 62
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined variable: sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 63
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined variable: oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 64
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined variable: november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 65
ERROR - 2023-05-31 09:17:19 --> Severity: Notice --> Undefined variable: desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 66
ERROR - 2023-05-31 09:17:40 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:17:40 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:17:40 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:17:40 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:17:40 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:17:40 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:17:40 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:17:40 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined variable: maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 57
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined variable: april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 58
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined variable: mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 59
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined variable: juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 60
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined variable: juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 61
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined variable: agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 62
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined variable: sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 63
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined variable: oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 64
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined variable: november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 65
ERROR - 2023-05-31 09:17:41 --> Severity: Notice --> Undefined variable: desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 66
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 27
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 28
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 29
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 30
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 31
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 32
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 33
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 34
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 35
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined property: stdClass::$desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 36
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined variable: maret C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 57
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined variable: april C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 58
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined variable: mei C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 59
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined variable: juni C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 60
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined variable: juli C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 61
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined variable: agustus C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 62
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined variable: sepetember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 63
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined variable: oktober C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 64
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined variable: november C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 65
ERROR - 2023-05-31 09:18:08 --> Severity: Notice --> Undefined variable: desember C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_project_selesai.php 66
ERROR - 2023-05-31 09:34:06 --> Severity: Notice --> Undefined variable: tot_belum C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_belum_selesai.php 29
ERROR - 2023-05-31 09:34:06 --> Severity: Notice --> Undefined variable: tot_sedang C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_belum_selesai.php 30
ERROR - 2023-05-31 09:35:14 --> Severity: Notice --> Undefined variable: tot_sedang C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_belum_selesai.php 38
ERROR - 2023-05-31 09:35:14 --> Severity: Notice --> Undefined variable: tot_belum C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_belum_selesai.php 38
ERROR - 2023-05-31 09:38:00 --> 404 Page Not Found: /index
ERROR - 2023-05-31 09:38:08 --> 404 Page Not Found: /index
ERROR - 2023-05-31 09:38:21 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\labdlh_use\application\modules\ppc\controllers\Rekap.php 168
ERROR - 2023-05-31 09:38:21 --> Severity: Notice --> Undefined variable: items C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 09:38:21 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 10:20:43 --> Severity: Notice --> Undefined variable: status_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_list.php 39
ERROR - 2023-05-31 10:20:43 --> Severity: Notice --> Undefined variable: status_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_list.php 39
ERROR - 2023-05-31 10:20:43 --> Severity: Notice --> Undefined variable: status_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_list.php 39
ERROR - 2023-05-31 10:20:43 --> Severity: Notice --> Undefined variable: status_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_list.php 39
ERROR - 2023-05-31 10:20:43 --> Severity: Notice --> Undefined variable: status_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_list.php 39
ERROR - 2023-05-31 10:20:43 --> Severity: Notice --> Undefined variable: status_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\list_project\v_list.php 39
ERROR - 2023-05-31 11:07:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`projec...' at line 2 - Invalid query: SELECT `ppc_list_project`.`project_id`, `ppc_sub_project`.`sub_project`, sum(if(status = '0', 1, 0)) AS belum_dikerjakan, sum(if(status = '1', 1, 0)) AS sedang_dikerjakan, sum(if(status_project = 1, 1, 0)) AS on_late, sum(if(status_project = 3, 1, 0)) AS on_time
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 11:08:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`projec...' at line 2 - Invalid query: SELECT `ppc_list_project`.`project_id`, `ppc_sub_project`.`sub_project`, sum(if(status = '0', 1, 0)) AS belum_dikerjakan, sum(if(status = '1', 1, 0)) AS sedang_dikerjakan, sum(if(status_project = 1, 1, 0)) AS on_late, sum(if(status_project = 3, 1, 0)) AS on_time
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 11:08:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`projec...' at line 2 - Invalid query: SELECT `ppc_list_project`.`project_id`, `ppc_sub_project`.`sub_project`, sum(if(status = '0', 1, 0)) AS belum_dikerjakan, sum(if(status = '1', 1, 0)) AS sedang_dikerjakan, sum(if(status_project = 1, 1, 0)) AS on_late, sum(if(status_project = 3, 1, 0)) AS on_time
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 11:08:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`projec...' at line 2 - Invalid query: SELECT `ppc_list_project`.`project_id`, `ppc_sub_project`.`sub_project`, sum(if(status = '0', 1, 0)) AS belum_dikerjakan, sum(if(status = '1', 1, 0)) AS sedang_dikerjakan, sum(if(status_project = 1, 1, 0)) AS on_late, sum(if(status_project = 3, 1, 0)) AS on_time
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 19
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 20
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 21
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 19
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 20
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 21
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Undefined property: mysqli_result::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 19
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 20
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 21
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 19
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 20
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 21
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 19
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 20
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 21
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:10:23 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 19
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 20
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 21
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 19
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 20
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 21
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 19
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 20
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 21
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:10:24 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli_result::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli_result::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli_result::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli_result::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli_result::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli_result::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli_result::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli_result::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Undefined property: mysqli_result::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 27
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 28
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 33
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 34
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 35
ERROR - 2023-05-31 11:18:07 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 36
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli_result::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli_result::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli_result::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli_result::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli_result::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli_result::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli_result::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli_result::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Undefined property: mysqli_result::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:24:54 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli_result::$sub_project C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli_result::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli_result::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli_result::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli_result::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli_result::$belum_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli_result::$sedang_dikerjakan C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli_result::$on_time C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Undefined property: mysqli_result::$on_late C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:26:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 22
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 23
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 24
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 25
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 26
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 29
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 30
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 31
ERROR - 2023-05-31 11:26:20 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\labdlh_use\application\modules\ppc\views\rekap\v_lap_total.php 32
ERROR - 2023-05-31 11:28:57 --> Query error: Unknown column 'sub_project' in 'where clause' - Invalid query: SELECT count(*) as count
FROM `ppc_list_project`
WHERE `sub_project` = '1'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 11:34:00 --> Query error: Unknown column 'sub_project' in 'where clause' - Invalid query: SELECT count(*) as count
FROM `ppc_list_project`
WHERE `sub_project` = '2'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 11:34:13 --> Query error: Unknown column 'sub_project' in 'where clause' - Invalid query: SELECT count(*) as count
FROM `ppc_list_project`
WHERE `sub_project` = '1'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 11:39:29 --> Query error: Unknown column 'ppc_sub_project.sub_project' in 'field list' - Invalid query: SELECT count(*) as count, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
WHERE `status` = '3'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 11:40:13 --> Query error: Unknown column 'sub_project' in 'where clause' - Invalid query: SELECT count(*) as count
FROM `ppc_list_project`
WHERE `sub_project` = '1'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 11:45:24 --> Query error: Unknown column 'sub_project' in 'where clause' - Invalid query: SELECT count(*) as count
FROM `ppc_list_project`
WHERE `sub_project` = '1'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 11:46:03 --> Query error: Unknown column 'sub_project' in 'where clause' - Invalid query: SELECT count(*) as count
FROM `ppc_list_project`
WHERE `sub_project` = '1'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 12:00:37 --> 404 Page Not Found: /index
ERROR - 2023-05-31 14:04:27 --> 404 Page Not Found: /index
ERROR - 2023-05-31 14:40:02 --> 404 Page Not Found: /index
ERROR - 2023-05-31 14:45:26 --> Query error: Unknown column 'users.id' in 'where clause' - Invalid query: SELECT `ppc_list_project`.`project_id`, `ppc_sub_project`.`sub_project`, sum(if(status_project = 1, 1, 0)) AS on_late, sum(if(status_project = 3, 1, 0)) AS on_time
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
WHERE `status` = '3'
AND `users`.`id` = '275'
AND `ppc_list_project`.`status` = '3'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
 LIMIT 100000
ERROR - 2023-05-31 14:46:21 --> Query error: Unknown column 'users.id' in 'where clause' - Invalid query: SELECT `ppc_list_project`.`project_id`, `ppc_sub_project`.`sub_project`, sum(if(status_project = 1, 1, 0)) AS on_late, sum(if(status_project = 3, 1, 0)) AS on_time
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
WHERE `status` = '3'
AND `users`.`id` = '275'
AND `ppc_list_project`.`status` = '3'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
 LIMIT 100000
ERROR - 2023-05-31 14:47:19 --> Query error: Unknown column 'users.id' in 'where clause' - Invalid query: SELECT `ppc_list_project`.`project_id`, `ppc_list_project`.`user_id`, `ppc_sub_project`.`sub_project`, sum(if(status_project = 1, 1, 0)) AS on_late, sum(if(status_project = 3, 1, 0)) AS on_time
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
WHERE `status` = '3'
AND `users`.`id` = '275'
AND `ppc_list_project`.`status` = '3'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
 LIMIT 100000
ERROR - 2023-05-31 14:48:25 --> Query error: Unknown column 'users.id' in 'where clause' - Invalid query: SELECT `ppc_list_project`.`project_id`, `ppc_sub_project`.`sub_project`, sum(if(status_project = 1, 1, 0)) AS on_late, sum(if(status_project = 3, 1, 0)) AS on_time
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
WHERE `status` = '3'
AND `users`.`id` IS NULL
AND `ppc_list_project`.`status` = '3'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
 LIMIT 100000
ERROR - 2023-05-31 14:51:27 --> Query error: Unknown column 'users.id' in 'where clause' - Invalid query: SELECT `ppc_list_project`.`project_id`, `ppc_sub_project`.`sub_project`, sum(if(status = '0', 1, 0)) AS belum_dikerjakan, sum(if(status = '1', 1, 0)) AS sedang_dikerjakan, sum(if(status_project = 1, 1, 0)) AS on_late, sum(if(status_project = 3, 1, 0)) AS on_time
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
WHERE `users`.`id` = '275'
GROUP BY `ppc_list_project`.`project_id`
ORDER BY `ppc_list_project`.`project_id` ASC
ERROR - 2023-05-31 18:27:52 --> 404 Page Not Found: /index
ERROR - 2023-05-31 18:33:34 --> 404 Page Not Found: /index
ERROR - 2023-05-31 18:39:42 --> Query error: Column 'create_by' in where clause is ambiguous - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `users`.`id` = '277'
AND `create_by` = '277'
ORDER BY `ppc_list_project`.`id` DESC
 LIMIT 10
ERROR - 2023-05-31 18:41:03 --> Query error: Column 'create_by' in where clause is ambiguous - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `users`.`id` = '277'
AND `create_by` = '277'
ORDER BY `ppc_list_project`.`id` DESC
 LIMIT 10
ERROR - 2023-05-31 18:41:20 --> Query error: Column 'create_by' in where clause is ambiguous - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `users`.`id` = '277'
AND `create_by` = '277'
ORDER BY `ppc_list_project`.`id` DESC
 LIMIT 10
ERROR - 2023-05-31 18:41:34 --> Query error: Column 'create_by' in where clause is ambiguous - Invalid query: SELECT `ppc_list_project`.*, `users`.`first_name`, `ppc_sub_project`.`sub_project`
FROM `ppc_list_project`
JOIN `ppc_sub_project` ON `ppc_sub_project`.`id` = `ppc_list_project`.`project_id`
JOIN `users` ON `users`.`id` = `ppc_list_project`.`user_id`
WHERE `users`.`id` = '277'
AND `create_by` = '277'
ORDER BY `ppc_list_project`.`id` DESC
 LIMIT 10
