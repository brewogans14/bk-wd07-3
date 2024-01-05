<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['poli'] = $this->db->query("SELECT * FROM poli WHERE id !='0'")->result();
        home('index', $data);
    }

    public function pasien_regist($poli)
    {
        $data['id_poli'] = $poli;
        $data['poli'] = $this->db->query("SELECT * FROM poli WHERE id !='0'")->result();
        $data['poli_sekarang'] = $this->db->get_where('poli', ['id' => $poli])->row();
        
        $data['dokter'] = $this->db->get_where('dokter', ['id_poli' => $poli])->result();
        home('daftar', $data);
    }

    public function pasien_proccess($id_poli)
    {
        $data = $this->input->post();

        $pasien['no_ktp'] = $data['nik'];
        $pasien['nama'] = $data['nama'];
        $pasien['alamat'] = $data['alamat'];
        $pasien['no_hp'] = $data['no_hp'];
        $pasien['no_rm'] = random_int(100000, 999999);
        $this->db->insert('pasien', $pasien);
        $dataPasien = $this->db->get_where('pasien', ['no_ktp' => $pasien['no_ktp'], 'nama' => $pasien['nama'], 'alamat' => $pasien['alamat'], 'no_hp' => $pasien['no_hp'], 'no_rm' => $pasien['no_rm']])->row();

        $getJadwal = $this->db->get_where('daftar_poli', ['id_jadwal' => $data['jadwal']])->num_rows();
        $insertPoli['id_pasien'] = $dataPasien->id;
        $insertPoli['id_jadwal'] = $data['jadwal'];
        $insertPoli['keluhan'] = $data['keluhan'];
        $insertPoli['no_antrian'] = $getJadwal + 1;
        $this->db->insert('daftar_poli', $insertPoli);
        $getDokter = $this->db->get_where('dokter', ['id_poli' => $id_poli])->row();
        $getPoli = $this->db->get_where('poli', ['id' => $getDokter->id_poli])->row();
        $jdwl = $this->db->get_where('jadwal_periksa', ['id' => $data['jadwal']])->row();
        
        

        $this->session->set_flashdata('pesan', '
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center" id="myModalLabel">HOSPITAL</h3>
      </div>
      <div class="modal-body">
        <div class="text-center" style="text-transform:uppercase;">
            <h4>POLI ' . $getPoli->nama_poli . '</h4>
            <h1>' . $insertPoli['no_antrian'] . '</h1>
            <h4>
                ' . $pasien['no_rm'] . '
                <br>
                ' . $pasien['nama'] . '
                <br>
                ' . $pasien['no_ktp'] . '
                <br>
                ' . $pasien['alamat'] . '
                <br>
                ' . $pasien['no_hp'] . '
            </h4>
            <h4>
                Hadir Pada : '. $jdwl->hari . ' / ' . $jdwl->jam_mulai . ' - ' . $jdwl->jam_selesai . '
            </h4>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <!-- <button type="button" class="btn btn-primary">Print</button> -->
      </div>
    </div>
  </div>
</div>
        ');

        redirect(base_url('pasien/daftar/' . $id_poli));
    }

    
    
}
