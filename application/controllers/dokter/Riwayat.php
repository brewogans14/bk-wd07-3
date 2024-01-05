<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{

    public function index()
    {
        $data['pasien'] = $this->db->query("SELECT * FROM pasien a LEFT JOIN daftar_poli b ON a.id = b.id_pasien LEFT JOIN jadwal_periksa c ON b.id_jadwal = c.id ORDER BY b.no_antrian ASC")->result();
        $data['title'] = 'Periksa Pasien';
        dokter('riwayat/index', $data);
    }

    public function periksa($id)
    {
        $this->form_validation->set_rules('id_daftar_poli', 'id_daftar_poli', 'trim|required', [
            'required' => 'kolom wajib di isi.'
        ]);
        $this->form_validation->set_rules('tanggal_periksa', 'tanggal_periksa', 'trim|required', [
            'required' => 'kolom wajib di isi.'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data['pasien'] = $this->db->query("SELECT * FROM pasien a LEFT JOIN daftar_poli b ON a.id = b.id_pasien LEFT JOIN jadwal_periksa c ON b.id_jadwal = c.id WHERE a.id = '$id' ORDER BY b.no_antrian ASC")->row();
            $data['title'] = 'Periksa Pasien';
            dokter('riwayat/periksa', $data);
        } else {
            $data['id_daftar_poli'] = $this->input->post('id_daftar_poli');
            $data['tgl_periksa'] = $this->input->post('tanggal_periksa');
            $data['catatan'] = $this->input->post('catatan');
            $data['biaya_periksa'] = $this->input->post('total');
            $this->db->insert('periksa', $data);

            $periksa = $this->db->get_where('periksa', $data)->row();


            $id_obat = $this->input->post('id_obat');
            $obat = explode(',', $id_obat);
            foreach ($obat as $row) :
                $insert_obat['id_periksa'] = $periksa->id;
                $insert_obat['id_obat'] = $row;
                $this->db->insert('detail_periksa', $insert_obat);
            endforeach;
            
            $this->session->set_flashdata('pesan', '
				<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-check"></i> Pasien Berhasil di Periksa!
			</div>
				');

            redirect(base_url('dokter/riwayat'));
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('obat');
        $this->session->set_flashdata('pesan', '
				<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-check"></i> Riwayat berhasil dihapus!
			</div>
				');

        redirect(base_url('dokter/obat'));
    }
}

/* End of file Riwayat.php */
