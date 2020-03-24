<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('My_model');
        $this->load->helper('download');
        $this->load->helper(array('url'));
        $this->load->library('pagination');
        ini_set('date.timezone', 'Asia/Jakarta');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata("msg", "<div class='card bg-danger text-white shadow mb-3'><div class='card-body'>Silahkan login terlebih dahulu</div></div>");
            redirect('kelolaweb');
        }
    }

    function index()
    {
        $data['title'] = 'Dashboard Monitoring PA';
        $data['judul'] = 'Dashboard';

        $wherey = array('a.verifikasi' => 'Y', 'b.id_prodi' => $this->session->userdata('level'));
        $this->db->order_by('a.tgl', 'DESC');
        $this->db->select('a.nim,b.nama,a.tgl,a.status,b.nama_dspembimbing');
        $this->db->join('d_mhs b', 'a.nim=b.nim');
        $dseminar = $this->My_model->cek_data("d_seminar a", $wherey);
        $data['dseminar'] = $dseminar->num_rows();
        $data['dataseminar'] = $dseminar->result();

        $wheren = array('a.verifikasi' => 'N', 'b.id_prodi' => $this->session->userdata('level'));
        $this->db->order_by('a.tgl', 'DESC');
        $this->db->select('a.nim,b.nama,a.tgl,a.status,b.nama_dspembimbing');
        $this->db->join('d_mhs b', 'a.nim=b.nim');
        $dseminarn = $this->My_model->cek_data("d_seminar a", $wheren);
        $data['dseminarn'] = $dseminarn->num_rows();
        $data['dataseminno'] = $dseminarn->result();

        $wheresidangy = array('verifikasi' => 'Y');
        $dsidangya = $this->My_model->cek_data("d_sidang", $wheresidangy);
        $data['dsidangya'] = $dsidangya->num_rows();

        $wheresidangn = array('verifikasi' => 'N');
        $dsidangno = $this->My_model->cek_data("d_sidang", $wheresidangn);
        $data['dsidangno'] = $dsidangno->num_rows();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('Dashboard', $data);
        $this->load->view('templates/footer', $data);
    }
}
