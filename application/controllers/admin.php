<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/index', $data);
    }
    public function userprofile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/userprofile', $data);
    }

    public function guidebook()
    {
        $this->load->view('admin/guidebook');
    }

    public function jagungarticle()
    {
        $this->load->view('admin/jagungarticle');
    }

    public function post()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/post', $data);
    }

    public function blogwrite()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/blogwrite', $data);
    }
    public function blogview()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/blogview', $data);
    }

    public function weatherforecast()
    {
        $this->load->view('admin/weatherforecast');
    }
}
