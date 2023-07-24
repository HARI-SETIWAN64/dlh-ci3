<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_list($where,$limit,$offset,$like)
	{
		$this->db->select("
			perusahaan.nama, 
			sum(if(MONTH(tgl_penyetoran) = '01', pajak_retribusi.total, 0)) AS januari, 
			sum(if(MONTH(tgl_penyetoran) = '02', pajak_retribusi.total, 0)) AS februari, 
			sum(if(MONTH(tgl_penyetoran) = '03', pajak_retribusi.total, 0)) AS maret, 
			sum(if(MONTH(tgl_penyetoran) = '04', pajak_retribusi.total, 0)) AS april, 
			sum(if(MONTH(tgl_penyetoran) = '05', pajak_retribusi.total, 0)) AS mei, 
			sum(if(MONTH(tgl_penyetoran) = '06', pajak_retribusi.total, 0)) AS juni, 
			sum(if(MONTH(tgl_penyetoran) = '07', pajak_retribusi.total, 0)) AS juli, 
			sum(if(MONTH(tgl_penyetoran) = '08', pajak_retribusi.total, 0)) AS agustus, 
			sum(if(MONTH(tgl_penyetoran) = '09', pajak_retribusi.total, 0)) AS sepetember, 
			sum(if(MONTH(tgl_penyetoran) = '10', pajak_retribusi.total, 0)) AS oktober, 
			sum(if(MONTH(tgl_penyetoran) = '11', pajak_retribusi.total, 0)) AS november, 
			sum(if(MONTH(tgl_penyetoran) = '12', pajak_retribusi.total, 0)) AS desember
			");
		if($where)
		{
			$this->db->where($where);
		}

		if ($like) {
			$this->db_sikd->group_start();
			$this->db_sikd->or_like($like);
			$this->db_sikd->group_end();
		}
		$this->db->join('epad_pajak_retribusi as pajak_retribusi','perusahaan.wajib_pajak_id = pajak_retribusi.wajib_pajak_id');
		$this->db->join('fpps','perusahaan.id = fpps.id_pelanggan and pajak_retribusi.id_pajak_retribusi=fpps.pajak_retribusi_id');
		$this->db->group_by('perusahaan.nama');
		$this->db->order_by('perusahaan.nama','asc');

		return $this->db->get('master_perusahaan as perusahaan', $limit, $offset);
	}

	function get_list_belum($where, $like)
	{
		$this->db->select("
			perusahaan.nama, 
			sum(if(MONTH(tgl_terima) = '01', pajak_retribusi.total, 0)) AS januari, 
			sum(if(MONTH(tgl_terima) = '02', pajak_retribusi.total, 0)) AS februari, 
			sum(if(MONTH(tgl_terima) = '03', pajak_retribusi.total, 0)) AS maret, 
			sum(if(MONTH(tgl_terima) = '04', pajak_retribusi.total, 0)) AS april, 
			sum(if(MONTH(tgl_terima) = '05', pajak_retribusi.total, 0)) AS mei, 
			sum(if(MONTH(tgl_terima) = '06', pajak_retribusi.total, 0)) AS juni, 
			sum(if(MONTH(tgl_terima) = '07', pajak_retribusi.total, 0)) AS juli, 
			sum(if(MONTH(tgl_terima) = '08', pajak_retribusi.total, 0)) AS agustus, 
			sum(if(MONTH(tgl_terima) = '09', pajak_retribusi.total, 0)) AS sepetember, 
			sum(if(MONTH(tgl_terima) = '10', pajak_retribusi.total, 0)) AS oktober, 
			sum(if(MONTH(tgl_terima) = '11', pajak_retribusi.total, 0)) AS november, 
			sum(if(MONTH(tgl_terima) = '12', pajak_retribusi.total, 0)) AS desember
			");
		if($where)
		{
			$this->db->where($where);
		}

		if ($like) {
			$this->db_sikd->group_start();
			$this->db_sikd->or_like($like);
			$this->db_sikd->group_end();
		}
		$this->db->join('epad_pajak_retribusi as pajak_retribusi','perusahaan.wajib_pajak_id = pajak_retribusi.wajib_pajak_id');
		$this->db->join('fpps','perusahaan.id = fpps.id_pelanggan and pajak_retribusi.id_pajak_retribusi=fpps.pajak_retribusi_id');
		$this->db->group_by('perusahaan.nama');
		$this->db->order_by('perusahaan.nama','asc');

		return $this->db->get('master_perusahaan as perusahaan');
	}


	function get_list_total($where,$like)
	{

		$this->db->select('count(*) as count');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}
		$this->db->join('epad_pajak_retribusi as pajak_retribusi','perusahaan.wajib_pajak_id = pajak_retribusi.wajib_pajak_id');
		$this->db->join('fpps','perusahaan.id = fpps.id_pelanggan and pajak_retribusi.id_pajak_retribusi=fpps.pajak_retribusi_id');
		$this->db->group_by('perusahaan.nama');
		$this->db->order_by('perusahaan.nama','asc');

		return $this->db->get('master_perusahaan as perusahaan');
	}


    public function data_uji_perbulan($where, $like)
    {
        $this->db->select("
        	master_perusahaan.id,
			master_perusahaan.nama,
			sum(if(MONTH(tanggal_penerimaan) = '01', 1, 0)) as januari,
			sum(if(MONTH(tanggal_penerimaan) = '02', 1, 0)) as februari,
			sum(if(MONTH(tanggal_penerimaan) = '03', 1, 0)) as maret,
			sum(if(MONTH(tanggal_penerimaan) = '04', 1, 0)) as april,
			sum(if(MONTH(tanggal_penerimaan) = '05', 1, 0)) as mei,
			sum(if(MONTH(tanggal_penerimaan) = '06', 1, 0)) as juni,
			sum(if(MONTH(tanggal_penerimaan) = '07', 1, 0)) as juli,
			sum(if(MONTH(tanggal_penerimaan) = '08', 1, 0)) as agustus,
			sum(if(MONTH(tanggal_penerimaan) = '09', 1, 0)) as sepetember,
			sum(if(MONTH(tanggal_penerimaan) = '10', 1, 0)) as oktober,
			sum(if(MONTH(tanggal_penerimaan) = '11', 1, 0)) as november,
			sum(if(MONTH(tanggal_penerimaan) = '12', 1, 0)) as desember
        ");
		if($where)
		{
			$this->db->where($where);
		}

		if ($like) {
			$this->db->group_start();
			$this->db->or_like($like);
			$this->db->group_end();
		}
        $this->db->from('fpps');

		$this->db->join('master_perusahaan','master_perusahaan.id = fpps.id_pelanggan');
		$this->db->order_by('master_perusahaan.nama','asc');
		$this->db->order_by('MONTH(tanggal_penerimaan)','asc');
		$this->db->group_by('master_perusahaan.nama');
        return $this->db->get()->result();
    }


    public function data_grafik_uji_perbulan($where, $like)
    {
        $this->db->select('
        	MONTH(tanggal_penerimaan) as bulan1,
			CASE
			    WHEN MONTH(tanggal_penerimaan) = 1 THEN "Januari"
			    WHEN MONTH(tanggal_penerimaan) = 2 THEN "Februari"
			    WHEN MONTH(tanggal_penerimaan) = 3 THEN "Maret"
			    WHEN MONTH(tanggal_penerimaan) = 4 THEN "April"
			    WHEN MONTH(tanggal_penerimaan) = 5 THEN "Mei"
			    WHEN MONTH(tanggal_penerimaan) = 6 THEN "Juni"
			    WHEN MONTH(tanggal_penerimaan) = 7 THEN "Juli"
			    WHEN MONTH(tanggal_penerimaan) = 8 THEN "Agustus"
			    WHEN MONTH(tanggal_penerimaan) = 9 THEN "September"
			    WHEN MONTH(tanggal_penerimaan) = 10 THEN "Oktobeber"
			    WHEN MONTH(tanggal_penerimaan) = 11 THEN "November"
			    WHEN MONTH(tanggal_penerimaan) = 12 THEN "Desemmber"
			    ELSE "Invalid"
			END as bulan2,
				count(MONTH(tanggal_penerimaan)) as jumlah
        ');

		if($where)
		{
			$this->db->where($where);
		}

		if ($like) {
			$this->db->group_start();
			$this->db->or_like($like);
			$this->db->group_end();
		}
        $this->db->from('fpps');

		$this->db->join('master_perusahaan','master_perusahaan.id = fpps.id_pelanggan');
		$this->db->order_by('MONTH(tanggal_penerimaan)','asc');
		$this->db->group_by('MONTH(tanggal_penerimaan)');
        return $this->db->get()->result();
    }


    public function data_grafik_parameter($where, $like)
    {
        $this->db->select('
			concat(master_parameter.parameter," (",COUNT(fpps_parameter.parameter_id),")") as parameter,
			COUNT(fpps_parameter.parameter_id) AS jumlah 
        ');

		if($where)
		{
			$this->db->where($where);
		}

		if ($like) {
			$this->db->group_start();
			$this->db->or_like($like);
			$this->db->group_end();
		}
        $this->db->from('master_parameter');

		$this->db->join('fpps_parameter','master_parameter.id = fpps_parameter.parameter_id');
		$this->db->join('fpps','fpps_parameter.fpps_id = fpps.id');
		$this->db->order_by('master_parameter.parameter','asc');
		$this->db->group_by('master_parameter.id');
        return $this->db->get()->result();
    }
}
