<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Obat';
        admin('obat/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_obat', 'nama_obat', 'trim|required', [
            'required' => 'kolom wajib di isi.'
        ]);
        $this->form_validation->set_rules('kemasan', 'kemasan', 'trim|required', [
            'required' => 'kolom wajib di isi.'
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'trim|required', [
            'required' => 'kolom wajib di isi.'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Obat';
            admin('obat/add', $data);
        } else {
            $data['nama_obat'] = $this->input->post('nama_obat');
            $data['kemasan'] = $this->input->post('kemasan');
            $data['harga'] = $this->input->post('harga');

            $this->db->insert('obat', $data);
            $this->session->set_flashdata('pesan', '
				<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-check"></i> Obat berhasil ditambahkan!
			</div>
				');

            redirect(base_url('admin/obat'));
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_obat', 'nama_obat', 'trim|required', [
            'required' => 'kolom wajib di isi.'
        ]);
        $this->form_validation->set_rules('kemasan', 'kemasan', 'trim|required', [
            'required' => 'kolom wajib di isi.'
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'trim|required', [
            'required' => 'kolom wajib di isi.'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data['obat'] = $this->db->get_where('obat', ['id' => $id])->row();
            $data['title'] = 'Edit Obat';
            admin('obat/update', $data);
        } else {
            $data['nama_obat'] = $this->input->post('nama_obat');
            $data['kemasan'] = $this->input->post('kemasan');
            $data['harga'] = $this->input->post('harga');

            $this->db->where('id', $id);
            $this->db->update('obat', $data);
            $this->session->set_flashdata('pesan', '
				<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-check"></i> Obat berhasil diedit!
			</div>
				');

            redirect(base_url('admin/obat'));
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
            $this->db->delete('obat');
            $this->session->set_flashdata('pesan', '
				<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-check"></i> Obat berhasil dihapus!
			</div>
				');

            redirect(base_url('admin/obat'));
    }
}

/* End of file Obat.php */
