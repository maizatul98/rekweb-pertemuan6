<?php


class Mahasiswa extends CI_Controller
{
    public function index()
    {
        $this->load->model('Mahasiswa_model');
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        $this->load->view('mahasiswa/index', $data);
    }


    public function tambah()
    {
       $this->load->library('form_validation');
       $this->load->model('Mahasiswa_model');
       
       $this->form_validation->set_rules('name', 'Name', 'required min_length[3]');


       if($this->form_validation->run() === false) {
        $this->load->view('mahasiswa/tambah');                                                               
       } else {
           $data = [
               'name' => $this->input->post('name'),
               'matric no' => $this->input->post('matric no'),
               'email' => $this->input->post('email'),
               'course' => $this->input->post('course')
           ];

           $this->db->insert('mahasiswa', $data);
           redirect('mahasiswa/index');
       }
       
    }
}