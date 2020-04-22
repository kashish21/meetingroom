<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conference extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('auth_model', 'conference_model', 'dashboard_model','Main_model', 'Manager_model'));
        $this->perPage = 10;
    }

    //View Conferences
    public function index()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }
        // Title & Menu
        $data['title'] = 'Conference';
         $data['main_menu'] = 'company_management';
        $data['menu'] = 'Conference';

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
        $data['conferences'] = $this->conference_model->get_conferences($this->session->userdata('user_id'));
        if ($data['conferences']) {
          foreach ($data['conferences'] as $conference) {
            $data['active'] = $conference->active ;
          }
        }
        $data['company_names'] = $this->conference_model->get_company_name();

        //search
        if ($this->input->post('searchKeyword')) {
          $searchKeyword = $this->input->post('searchKeyword');
          $data['conferences'] = $this->conference_model->search($searchKeyword, $this->session->userdata('user_id'));
          $this->load->view('admin_includes/header', $data);
          $this->load->view('admin_includes/left_nav', $data);
          $this->load->view('admin_includes/top_nav', $data);
          $this->load->view('admin/conference/conference_view', $data);
          $this->load->view('admin_includes/footer', $data);
        } else {
          $rows = $this->conference_model->record_count($this->session->userdata('user_id'));
          //Pagintion Config
          $config['base_url'] = base_url().'admin/conference/';
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
          $condition['start'] = $offset;
          $condition['limit'] = $this->perPage;
          $data['conferences'] = $this->conference_model->fetch_data($condition['limit'], $condition['start'], $this->session->userdata('user_id'));

          if (!empty($data['conferences'])) {
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/conference/conference_view', $data);
            $this->load->view('admin_includes/footer', $data);
          } else {
            $this->session->set_flashdata('record', '<div class="alert alert-danger" role="record">No Record Found</div>');
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/conference/conference_view', $data);
            $this->load->view('admin_includes/footer', $data);
          }
        }

    }

    // Add Conference
    public function add()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'Conference';
         $data['main_menu'] = 'company_management';
        $data['menu'] = 'Conference';

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
        $data['get_companies'] = $this->Manager_model->get_company_name($this->session->userdata('user_id'));
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run('add_conference') == FALSE) {
            // False
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/conference/conference_add_view', $data);
            $this->load->view('admin_includes/footer', $data);
        } else {
            $conferenceData = array(
                'conference_name' => $this->input->post('conference_name'),
                'company_id' => $this->input->post('conference_company'),
                'admin_id' => $this->session->userdata('user_id'),
                'active' => $this->input->post('active')
            );
            $checkReg = $this->conference_model->register_conference($conferenceData, $conferenceData['company_id']);
            if ($checkReg) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully registered!</div>');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Something went wrong! please try again.</div>');
            }
            redirect('admin/conference/add/'.$data['company_id']);
        }
    }

    // Book Conference
    public function book($id)
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }
        // Title & Menu
        $data['title'] = 'Conference';
         $data['main_menu'] = 'company_management';
        $data['menu'] = 'Conference';

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
        $data['company_id'] = $this->session->userdata('company');

        $responce = array(
          'active' =>  $this->input->post('active')
        );

        if ($this->conference_model->update_conference($responce, $id) == True) {
          $data['company_users'] = $this->conference_model->get_conference($data['company_id']);

          $this->load->view('admin_includes/header', $data);
          $this->load->view('admin_includes/left_nav', $data);
          $this->load->view('admin_includes/top_nav', $data);
          $this->load->view('admin/conference/conference_view', $data);
          $this->load->view('admin_includes/footer', $data);
          $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully booked!</div>');
        } else {
          $data['company_users'] = $this->conference_model->get_conference($data['company_id']);

          $this->load->view('admin_includes/header', $data);
          $this->load->view('admin_includes/left_nav', $data);
          $this->load->view('admin_includes/top_nav', $data);
          $this->load->view('admin/conference/conference_view', $data);
          $this->load->view('admin_includes/footer', $data);
        }
    }

    //Edit Conference
    public function edit($id)
    {

        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'Admin Users';
         $data['main_menu'] = 'user_management';
        $data['menu'] = 'administrators';

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
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
        $this->form_validation->set_rules('admin_email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            // False
            $role_id = array(1);
            $data['get_roles'] = $this->Main_model->get_where_not_in('roles', 'id', $role_id, "id, role");
            $data['get_users'] = $this->Main_model->get_where('admin_users', 'id', $id, "id,role_id, username,password,company,email,phone,image,active");

            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/admin_users/edit_admin_users_view', $data);
            $this->load->view('admin_includes/footer', $data);
        } else {
            $image_path = '';
            $admin_userData = array(
                'role_id' => $this->input->post('role_id'),
                'username' => $this->input->post('admin_username'),
                'company' => $this->input->post('admin_company'),
                'email' => $this->input->post('admin_email'),
                'phone' => $this->input->post('admin_mobile'),
                'active' => $this->input->post('admin_active'),
            );
            $checkReg = $this->Main_model->update('admin_users', $admin_userData, [ "id" => $id ]);
            if ($checkReg) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully Updated!</div>');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Something went wrong! please try again.</div>');
            }
            redirect('admin/administrators/edit/'.$id);
        }
    }

    public function change_status($id, $bool)
    {
        $flag = 0;
        if ($bool == 'true') {
            $flag = 1;
        }
        $data = array(
            'active' => $flag
        );

        $status = $this->admin_model->changeStatus($id, $data);
        echo $status;
    }

    public function delete_user($id)
    {
        $uploads = $this->Main_model->get_where('admin_users','id',$id,'id');

        if(!empty($uploads))
        {
            $this->Main_model->delete('admin_users',['id'=>$id]);
        }
        redirect('admin/administrators');
    }

    /*Admin User permission*/
     public function user_permission($user_id)
    {

        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }
        // Title & Menu
        $data['title'] = 'Admin Users';
        $data['main_menu'] = 'user_management';
        $data['menu'] = 'administrators';

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

        $data['admin_users'] = $this->admin_model->admin_users_by_id($user_id);
        $role_id = $data['admin_users']->role_id;
        $data['getMapModules'] = $this->admin_model->getMapModules($role_id);
        $data['module_permission_gp'] = $this->Main_model->get_where('module_permission_gp','user_id',$user_id,'id,user_id,module_id,permission');

        // echo "<pre>";print_r($data['module_permission_gp']);exit;
        $this->load->view('admin_includes/header', $data);
        $this->load->view('admin_includes/left_nav', $data);
        $this->load->view('admin_includes/top_nav', $data);
        $this->load->view('admin/admin_users/admin_user_permission_view', $data);
        $this->load->view('admin_includes/footer', $data);
    }

    public function permission_save()
    {

        $module_id = $this->input->post('module_id');
        $user_id = $this->input->post('user_id');
        $permission = $this->input->post('permission_val');
        $ckb = $this->input->post('ckb');

        if($ckb == "true")
        {
           $data = array(
            'user_id'=>$user_id,
            'module_id'=>$module_id,
            'permission'=>$permission,
            );
            $this->db->insert('module_permission_gp',$data);
        }

        if($ckb == "false")
        {
           $data = array(
            'user_id'=>$user_id,
            'module_id'=>$module_id,
            'permission'=>$permission,
            );

            $uploads = $this->Main_model->get_where_as('module_permission_gp',['user_id'=>$user_id,'module_id'=>$module_id,'permission'=>$permission],'id');
            if(!empty($uploads))
            {

              $this->Main_model->delete('module_permission_gp',['user_id'=>$user_id,'module_id'=>$module_id,'permission'=>$permission]);
            }
        }
       echo "1";
    }
}
