<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/index', $data);
    }

    public function userprofile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/userprofile', $data);
    }

    public function guidebook()
    {
        $this->load->view('user/guidebook');
    }

    public function jagungarticle()
    {
        $this->load->view('user/jagungarticle');
    }

    public function post()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/post', $data);
    }

    public function blogwrite()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/blogwrite', $data);
    }
    public function blogview()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/blogview', $data);
    }

    public function weatherforecast()
    {
        $this->load->view('user/weatherforecast');
    }
}
