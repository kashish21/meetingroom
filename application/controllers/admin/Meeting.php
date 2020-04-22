<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('auth_model','Manager_model','dashboard_model','Main_model','Meeting_model'));
        $this->perPage = 2;
    }

    // View Meeting
    public function index()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'Meeting';
        $data['main_menu'] = 'manager_management';
        $data['menu'] = 'Meeting';

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
            '<link rel="stylesheet" href="' . base_url() . 'assets/vendors/select2/css/select2.min.css" type="text/css">',
            '<link rel="stylesheet" href="' . base_url() . 'assets/css/app.min.css" type="text/css">',
            '<link rel="stylesheet" href="' . base_url() . 'assets/css/custom.css" type="text/css">'
        );

        // Scripts
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/vendors/bundle.js"></script>',
            '<script src="' . base_url() . 'assets/vendors/select2/js/select2.min.js"></script>',
            '<script src="' . base_url() . 'assets/js/examples/select2.js"></script>',
            '<script src="' . base_url() . 'assets/vendors/input-mask/jquery.mask.js"></script>',
            '<script src="' . base_url() . 'assets/js/examples/input-mask.js"></script>',
            '<script src="' . base_url() . 'assets/js/examples/select2.js"></script>',
            '<script src="' . base_url() . 'assets/js/custom.js"></script>',
            '<script src="' . base_url() . 'assets/js/borderless.min.js"></script>'
        );

        $company = $this->Conference_model->get_company_nam($this->session->userdata('phone'));
        foreach ($company as $key) {
          $company_id = $key->company_id;
        }
        if ($this->input->post('searchKeyword')) {
          $searchKeyword = $this->input->post('searchKeyword');
          $data['company_id'] = $company_id;
          $data['admin_users'] = $this->Meeting_model->search($searchKeyword, $company_id);
          $data['conference_names'] = $this->Manager_model->get_conference($company_id);
          $this->load->view('admin_includes/header', $data);
          $this->load->view('admin_includes/left_nav', $data);
          $this->load->view('admin_includes/top_nav', $data);
          $this->load->view('admin/meeting/meeting_view', $data);
          $this->load->view('admin_includes/footer', $data);
        } else {
          $rows = $this->Meeting_model->record_count($company_id);
          //Pagintion Config
          $config['base_url'] = base_url().'admin/index/';
          $config['uri_segment'] = 3;
          $config['total_rows'] = $rows;
          $config['per_page'] = $this->perPage;
          $config['full_tag_open'] = '<li class="page-item">';
          $config['full_tag_open'] = '</li>';
          $config['first_link'] = 'First';
          $config['last_link'] = 'Last';
          $config['cur_tag_open'] = '&nbsp;<a class="page-link">';
          $config['cur_tag_close'] = '</a>';
          $config['attributes'] = array('class' => 'page-link');
          //initialize pagination config
          $this->pagination->initialize($config);

          //Define Offset
          $page = $this->uri->segment(3);
          $offset = !$page?0:$page;

          // Get Rows
          $condition['returnType'] = '';
          $condition['start'] = $offset;
          $condition['limit'] = $this->perPage;
          $condition['company_id'] = $company_id;
          $data['company_id'] = $company_id;
          $data['admin_users'] = $this->Meeting_model->fetch_data($condition['limit'], $condition['company_id'], $condition['start']);
          $data['conference_names'] = $this->Manager_model->get_conference($condition['company_id']);

          if (!empty($data['admin_users'])) {
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/meeting/meeting_view', $data);
            $this->load->view('admin_includes/footer', $data);
          } else {
            $this->session->set_flashdata('record', '<div class="alert alert-danger" role="record">No Record Found</div>');
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/meeting/meeting_view', $data);
            $this->load->view('admin_includes/footer', $data);
          }
        }

    }

    // Add Meeting
    public function add()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'Meeting';
        $data['main_menu'] = 'manager_management';
        $data['menu'] = 'Meeting';

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
            '<link rel="stylesheet" href="' . base_url() . 'assets/vendors/select2/css/select2.min.css" type="text/css">',
            '<link rel="stylesheet" href="' . base_url() . 'assets/css/app.min.css" type="text/css">',
            '<link rel="stylesheet" href="' . base_url() . 'assets/css/custom.css" type="text/css">'
        );

        // Scripts
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/vendors/bundle.js"></script>',
            '<script src="' . base_url() . 'assets/vendors/select2/js/select2.min.js"></script>',
            '<script src="' . base_url() . 'assets/js/examples/select2.js"></script>',
            '<script src="' . base_url() . 'assets/vendors/input-mask/jquery.mask.js"></script>',
            '<script src="' . base_url() . 'assets/js/examples/input-mask.js"></script>',
            '<script src="' . base_url() . 'assets/js/examples/select2.js"></script>',
            '<script src="' . base_url() . 'assets/js/custom.js"></script>',
            '<script src="' . base_url() . 'assets/js/borderless.min.js"></script>'
        );

        $data['role_id'] = $this->session->userdata('role_id');
        $company = $this->Conference_model->get_company_nam($this->session->userdata('phone'));
        $data['get_conferences'] = $this->Conference_model->get_conference($company);
        $data['get_am_pms'] = $this->Meeting_model->get_am_pm();
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run('add_meeting') == FALSE) {
            // False
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/meeting/add_meeting_view', $data);
            $this->load->view('admin_includes/footer', $data);
        } else {
          foreach ($company as $key) {
            $company_id = $key->company_id;
          }
            $conferenceData = array(
                'conference_id' => $this->input->post('conference_company'),
                'company_id' => $company_id,
                'meeting_name' => $this->input->post('meeting_name'),
                'manager' => $this->session->userdata('username'),
                'phone' => $this->session->userdata('phone'),
                'date' => $this->input->post('date'),
                'time' => $this->input->post('time_slot'),
                'am_pm_' => $this->input->post('am_pm_'),
                'end_time' => $this->input->post('end_time_slot'),
                'am_pm' => $this->input->post('am_pm'),
                'active' => $this->input->post('active'),
            );
            $checkReg = $this->Meeting_model->register_meeting($conferenceData);
            if ($checkReg) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully registered!</div>');
                  redirect('admin/meeting/add');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">At this Date and Time Conferrence is already booked</div>');
                redirect('admin/meeting/add');
            }
        }
    }
}
