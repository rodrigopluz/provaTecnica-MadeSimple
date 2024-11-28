<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function Login()
    {
        parent::__construct();

        $this->load->library('session');
    }

    public function index($msg = NULL)
    {
        $data['title'] = "Login - Sistema de cadastro de Musicas";
        $data['headline'] = "Sistema de cadastro de Musicas";
        $data['msg'] = $msg;
        $data['include'] = "login_view";
        $this->load->view('template/template2', $data);
    }

    public function process()
    {
        $this->load->model('MLogin');
        $result = $this->MLogin->validate();
        if (!$result) {
            $msg = 1;
            $this->index($msg);
        } else {
            /*- criada a session -*/
            $array = ['name' => $this->input->post('username')];
            $this->session->set_userdata($array);

            redirect('artist/listing');
        }
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
