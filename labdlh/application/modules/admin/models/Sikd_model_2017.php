<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sikd_model_2017 extends CI_Model
{		
	private $db_sikd_2017;	
	private $liked;	
	public function __construct()
 	{
 	 	parent::__construct();        
		$this->db_sikd_2017 = $this->load->database('default_sikd_2017', TRUE);			
 	}		
function kgtn_dpa_2017($skpd,$limit,$offset)
	{
	$query = $this->db_sikd_2017->query("SELECT
     sikd_bidang.`id_sikd_bidang` AS sikd_bidang_id_sikd_bidang,
     sikd_prog.`id_sikd_prog` AS sikd_prog_id_sikd_prog,
     sikd_kgtn.`id_sikd_kgtn` AS sikd_kgtn_id_sikd_kgtn,
     SUBSTRING(sikd_kgtn.`kd_kgtn`,3,2) AS sikd_kgtn_kd_kgtn,
     sikd_bidang.`kd_bidang` AS sikd_bidang_kd_bidang,
     sikd_bidang.`nm_bidang` AS sikd_bidang_nm_bidang,
     sikd_kgtn.`nm_kgtn` AS sikd_kgtn_nm_kgtn,
	 dpa_skpd_kgtn.`nm_subkegiatan` AS  nm_subkegiatan,
     sikd_prog.`kd_prog` AS sikd_prog_kd_prog,
     sikd_prog.`nm_prog` AS sikd_prog_nm_prog,
     concat('ems','_',dpa_skpd_kgtn.id_dpa_skpd_kgtn) as id_dpa_skpd_kgtn,
	 dpa_dpa.id_dpa_dpa as dpa_kode_asli,
	 dpa_skpd_kgtn.id_dpa_skpd_kgtn as id_dpa_skpd_kgtn,
     sikd_sumber_anggaran.`nm_sumber_anggaran` AS sikd_sumber_nm_sumber_anggaran,
     IFNULL(dpa_skpd_kgtn.`target_kinerja`,'') AS dpa_skpd_kgtn_target_kinerja,
     SUM(IFNULL(dpa_renc_pencairan.`bulan_1`,0)+IFNULL(dpa_renc_pencairan.`bulan_2`,0)+IFNULL(dpa_renc_pencairan.`bulan_3`,0)) AS jml_twln_1,
     SUM(IFNULL(dpa_renc_pencairan.`bulan_4`,0)+IFNULL(dpa_renc_pencairan.`bulan_5`,0)+IFNULL(dpa_renc_pencairan.`bulan_6`,0)) AS jml_twln_2,
     SUM(IFNULL(dpa_renc_pencairan.`bulan_7`,0)+IFNULL(dpa_renc_pencairan.`bulan_8`,0)+IFNULL(dpa_renc_pencairan.`bulan_9`,0)) AS jml_twln_3,
     SUM(IFNULL(dpa_renc_pencairan.`bulan_10`,0)+IFNULL(dpa_renc_pencairan.`bulan_11`,0)+IFNULL(dpa_renc_pencairan.`bulan_12`,0)) AS jml_twln_4,
     SUM(IFNULL(dpa_mata_anggaran.`sisa_mati`,0)) AS jml_sisa_mati,
     SUM(IF(SUBSTRING(sikd_rek_rincian_obj.`kd_rek_rincian_obj`,1,3)='521',dpa_mata_anggaran.`jml_pagu_rka`,0))AS jml_blnj_pegawai,
     SUM(IF(SUBSTRING(sikd_rek_rincian_obj.`kd_rek_rincian_obj`,1,3)='522',dpa_mata_anggaran.`jml_pagu_rka`,0))AS jml_blnj_barang,
     SUM(IF(SUBSTRING(sikd_rek_rincian_obj.`kd_rek_rincian_obj`,1,3)='523',dpa_mata_anggaran.`jml_pagu_rka`,0))AS jml_blnj_modal,
     (SUM(IF(SUBSTRING(sikd_rek_rincian_obj.`kd_rek_rincian_obj`,1,3)='521',dpa_mata_anggaran.`jml_pagu_rka`,0))+SUM(IF(SUBSTRING(sikd_rek_rincian_obj.`kd_rek_rincian_obj`,1,3)='522',dpa_mata_anggaran.`jml_pagu_rka`,0))+SUM(IF(SUBSTRING(sikd_rek_rincian_obj.`kd_rek_rincian_obj`,1,3)='523',dpa_mata_anggaran.`jml_pagu_rka`,0)))AS jumlah
FROM
     `dpa_skpd` dpa_skpd 
	 INNER JOIN `sikd_satker` sikd_satker ON dpa_skpd.`sikd_skpd_id` = sikd_satker.`id_sikd_satker`
	AND dpa_skpd.`sikd_skpd_id` = $skpd
     
     INNER JOIN `dpa_skpd_kgtn` dpa_skpd_kgtn ON dpa_skpd.`id_dpa_skpd` = dpa_skpd_kgtn.`id_dpa_skpd_kgtn`
     LEFT OUTER JOIN `sikd_sumber_anggaran` sikd_sumber_anggaran ON dpa_skpd_kgtn.`sikd_sumber_anggaran_id` = sikd_sumber_anggaran.`id_sikd_sumber_anggaran`
     INNER JOIN `dpa_dpa` dpa_dpa ON dpa_skpd.`id_dpa_skpd` = dpa_dpa.`id_dpa_dpa`
     AND dpa_dpa.dpa_perubahan = '0'
     AND dpa_dpa.status_dpa IN ('0','1','2','3','4','5')
     INNER JOIN `sikd_kgtn` sikd_kgtn ON dpa_skpd_kgtn.`sikd_kgtn_id` = sikd_kgtn.`id_sikd_kgtn`
     LEFT OUTER JOIN `dpa_mata_anggaran` dpa_mata_anggaran ON dpa_skpd_kgtn.`id_dpa_skpd_kgtn` = dpa_mata_anggaran.`dpa_dpa_id`
     LEFT OUTER JOIN `dpa_renc_pencairan` dpa_renc_pencairan ON dpa_renc_pencairan.`dpa_mata_anggaran_id` = dpa_mata_anggaran.`id_dpa_mata_anggaran`
     LEFT OUTER JOIN `sikd_rek_rincian_obj` sikd_rek_rincian_obj ON dpa_mata_anggaran.`sikd_rek_rincian_obj_id` = sikd_rek_rincian_obj.`id_sikd_rek_rincian_obj`
	AND sikd_rek_rincian_obj.`kd_rek_rincian_obj` LIKE '52%'
     INNER JOIN `sikd_prog` ON sikd_kgtn.`sikd_prog_id` = sikd_prog.`id_sikd_prog`
     INNER JOIN `sikd_bidang` ON dpa_skpd.`sikd_bidang_id` = sikd_bidang.`id_sikd_bidang`
     WHERE sikd_prog.`kd_prog` NOT IN('01','02')	 
GROUP BY
     sikd_bidang.`id_sikd_bidang`,
     sikd_prog.`id_sikd_prog`,
     sikd_kgtn.`id_sikd_kgtn`
ORDER BY
     sikd_bidang.`kd_bidang` ASC,
     sikd_prog.`kd_prog` ASC,
     sikd_kgtn.`kd_kgtn` ASC
	 LIMIT  $limit OFFSET $offset");
	 return $query;	
}
public function get_kgtn_dpa($kode)
	{
		$this->db_sikd_2017->select('dpa_skpd_kgtn.id_dpa_skpd_kgtn,sikd_kgtn.id_sikd_kgtn as kode_kgtn,sikd_kgtn.nm_kgtn,dpa_skpd_kgtn.nm_subkegiatan');
		$this->db_sikd_2017->from('dpa_skpd_kgtn');
		$this->db_sikd_2017->join('sikd_kgtn','sikd_kgtn.id_sikd_kgtn = dpa_skpd_kgtn.sikd_kgtn_id','LEFT');
		$this->db_sikd_2017->where('dpa_skpd_kgtn.id_dpa_skpd_kgtn',$kode);
		$query = $this->db_sikd_2017->get();
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			$fields = $this->db_sikd_2017->list_fields('dpa_skpd_kgtn');
			$all_obj = new stdClass;
			foreach ($fields as $field)
			{
				$all_obj->$field='';
			}
			return $all_obj;
		}
	}
	public function get_kode_dpa($kode)
	{
		$dpa_query = $this->db_sikd_2017->query("SELECT id_dpa_dpa FROM dpa_dpa WHERE id_dpa_dpa = $kode");
		return $dpa_query;
	}
	public function get_kode_dpakgtn($kode)
	{
		$dpa_query = $this->db_sikd_2017->query("SELECT * FROM dpa_skpd_kgtn WHERE id_dpa_skpd_kgtn = $kode GROUP BY id_dpa_skpd_kgtn");
		return $dpa_query;
	}
	function get_field_table($table)
	{
			$fields = $this->db_sikd_2017->list_fields($table);
			$all_obj = new stdClass;
			foreach ($fields as $field)
			{
				$all_obj->$field = '';
			}
			return $all_obj;
	}

}?>

