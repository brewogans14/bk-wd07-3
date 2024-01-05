<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required', [
			'required' => 'kolom wajib di isi.'
		]);
		$this->form_validation->set_rules('password', 'password', 'trim|required', [
			'required' => 'kolom wajib di isi.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$checkUser = $this->db->get_where('dokter', ['username' => $username]);

			// Check User
			if ($checkUser->num_rows() > 0) {
				$row = $checkUser->row();
				// Check Password
				if (password_verify($password, $row->password)) {
					// Check Role
					$array = array(
						'users' => $row
					);
					$this->session->set_userdata($array);

					if ($row->id == 0) {
						redirect(base_url('admin/dashboard'));
					} else {
						redirect(base_url('dokter/dashboard'));
					}
				} else {
					$this->session->set_flashdata('pesan', '
				<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-ban"></i> Username atau password salah!
			</div>
				');

					redirect(base_url('auth'));
				}
			} else {
				$this->session->set_flashdata('pesan', '
				<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-ban"></i> Username atau password salah!
			</div>
				');

				redirect(base_url('auth'));
			}
		}
	}

	public function logout()
	{
		
		$this->session->unset_userdata('users');
		redirect(base_url(''));
	}
}
