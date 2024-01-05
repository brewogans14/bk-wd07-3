<?php

function admin($path, $data = null)
{
    $ci = &get_instance();
    $session = $ci->session->userdata("users");
    $data['users'] = $ci->db->get_where('dokter', ['id' => $session->id])->row();
    $ci->load->view('admin/templates/head', $data);
    $ci->load->view('admin/templates/sidebar', $data);
    $ci->load->view("admin/" . $path, $data);
    $ci->load->view('admin/templates/footer', $data);
}

function home($path, $data = null)
{
    $ci = &get_instance();
    // $session = $ci->session->userdata("users");
    // $data['users'] = $ci->db->get_where('dokter', ['id' => $session->id])->row();
    $ci->load->view('home/templates/head', $data);
    $ci->load->view("home/" . $path, $data);
    $ci->load->view('home/templates/footer', $data);
}

function dokter($path, $data = null)
{
    $ci = &get_instance();
    $session = $ci->session->userdata("users");
    $data['users'] = $ci->db->get_where('dokter', ['id' => $session->id])->row();
    $data['poli_dokter'] = $ci->db->get_where('poli', ['id' => $session->id_poli])->row();
    $ci->load->view('dokter/templates/head', $data);
    $ci->load->view('dokter/templates/sidebar', $data);
    $ci->load->view("dokter/" . $path, $data);
    $ci->load->view('dokter/templates/footer', $data);
}

function login()
{
    $ci = get_instance();
    $users = $ci->session->userdata("users");

    if ($users && $users["role"] == "Admin") {
        redirect("admin/dashboard");
    }
}

function auth($auth)
{
    $ci = get_instance();
    $session = $ci->session->userdata("users");
    if (empty($session)) {
        redirect(base_url("auth"));
    } else {
        if ($session["role"] != $auth) {
            redirect(base_url("auth"));
        }
    }
}