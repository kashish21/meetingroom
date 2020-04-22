<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Manager_model');
    }

    // Login Admin Users
    public function login()
    {
        if ($this->session->userdata('logged_in')) {
          if ($this->session->userdata('role_id') == '5') {
            redirect('admin/index');
          }elseif ($this->session->userdata('role_id') == '1') {
            redirect('admin/administrators');
          }else {
            redirect('admin/company');
          }  
        }
        // Title & Menu
        $data['title'] = 'Login';
        $data['menu'] = 'login';

        // Meta Tags
        $data['meta_tags'] = array(
            '<meta charset="UTF-8">',
            '<meta name="viewport" content="width=device-width, initial-scale=1">',
            '<meta http-equiv="X-UA-Compatible" content="ie=edge">',
            '<link rel="shortcut icon" href="' . base_url() . 'assets/images/favicon.png" type="image/x-icon">'
        );

        // Stylesheets
        $data['stylesheets'] = array(
            '<link rel="stylesheet" href="' . base_url() . 'assets/vendors/bundle.css" type="text/css">',
            '<link rel="stylesheet" href="' . base_url() . 'assets/css/app.min.css" type="text/css">'
        );

        // Scripts
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/vendors/bundle.js"></script>',
            '<script src="' . base_url() . 'assets/js/borderless.min.js"></script>'
        );

        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
        if ($this->form_validation->run('webmaster') == FALSE) {
            // false
            $this->load->view('admin/login_view', $data);
        } else {
            //true
            $userData = array(
                'email' => $this->input->post('auth_email'),
                'password' => $this->input->post('auth_password')
            );
            // check user exits or not
            $_isExits = $this->Auth_model->check_user_exits($userData);
            if ($_isExits) {
                // active or invalid password
                $_checkPassword = $this->Auth_model->login($userData);
                if ($_checkPassword) {
                    // set session data
                    $this->Auth_model->setSession($userData);
                    redirect('webmaster');
                }
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Wrong password! Reset if you forgot password.</div>');
                redirect('webmaster');
            }else {
              $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Your email not found! Please contact admin.</div>');
              redirect('webmaster');
           }
        }
    }

    // Logout Admin Users
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('webmaster');
    }
}
