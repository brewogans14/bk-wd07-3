<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Periksa extends CI_Controller
{

    public function index()
    {
        // $data['pasien'] = $this->db->query("SELECT * FROM pasien ORDER BY no_antrian ASC")->result();
        $data['pasien'] = $this->db->query("SELECT * FROM pasien a LEFT JOIN daftar_poli b ON a.id = b.id_pasien LEFT JOIN jadwal_periksa c ON b.id_jadwal = c.id LEFT JOIN periksa d ON a.id = d.id_daftar_poli")->result();
        $data['title'] = 'Riwayat';
        dokter('periksa/index', $data);
    }

    public function riwayat($id)
    {
        $data['pasien'] = $this->db->query("SELECT * FROM pasien a LEFT JOIN daftar_poli b ON a.id = b.id_pasien LEFT JOIN jadwal_periksa c ON b.id_jadwal = c.id LEFT JOIN periksa d ON a.id = d.id_daftar_poli WHERE a.id = '$id'")->row();
        $data['title'] = 'Riwayat Pasien';
        dokter('periksa/riwayat', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('obat');
        $this->session->set_flashdata('pesan', '
				<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-check"></i> Periksa berhasil dihapus!
			</div>
				');

        redirect(base_url('dokter/obat'));
    }
}

/* End of file Periksa.php */
