<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('My_model');
        $this->load->helper('download');
        $this->load->helper(array('url'));
        $this->load->library('pagination');
        ini_set('date.timezone', 'Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Universitas Ubudiyah Indonesia | Monitor PA';
        $this->load->view('login', $data);
    }

    function ceklogin()
    {
        $username = trim($this->security->xss_clean($this->input->post('userlog')));
        $password = trim($this->security->xss_clean($this->input->post('passlog')));

        // echo password_hash($password, PASSWORD_DEFAULT);

        $where = array('username' => $username);
        $akses = $this->My_model->cek_data("pa_user", $where);
        if ($akses->num_rows() >= 1) {
            $data = $akses->row_array();
            if (password_verify($password, $data['pass'])) {
                $session['username'] = $data['username'];
                $session['nama'] = $data['nama'];
                $session['level'] = $data['level'];
                $this->session->set_userdata($session);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata("msg", "<div class='card bg-danger text-white shadow mb-3'><div class='card-body'>Username Tidak ada</div></div>");
                redirect('login');
            }
        } else {
            $this->session->set_flashdata("msg", "<div class='card bg-danger text-white shadow'><div class='card-body'>Username / Password anda salah</div></div>");
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
