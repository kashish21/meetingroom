<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('auth_model','Manager_model','dashboard_model','Main_model','conference_model', 'Company_model'));
        $this->perPage = 10;
    }

    // View Managers
    public function index()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'Manager';
        $data['main_menu'] = 'company_management';
        $data['menu'] = 'Manager';

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
        $data['admin_users'] = $this->Manager_model->get_managers($this->session->userdata('user_id'));
        //search
        if ($this->input->post('searchKeyword')) {
          $searchKeyword = $this->input->post('searchKeyword');
          $data['admin_users'] = $this->Manager_model->search($searchKeyword, $this->session->userdata('user_id'));
          $this->load->view('admin_includes/header', $data);
          $this->load->view('admin_includes/left_nav', $data);
          $this->load->view('admin_includes/top_nav', $data);
          $this->load->view('admin/manager/manager_view', $data);
          $this->load->view('admin_includes/footer', $data);
        }else {
          $rows = $this->Manager_model->record_count($this->session->userdata('user_id'));

          //Pagintion Config
          $config['base_url'] = base_url().'admin/manager/';
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
          $data['admin_users'] = $this->Manager_model->fetch_data($condition['limit'], $condition['start'], $this->session->userdata('user_id'));

          if (!empty($data['admin_users'])) {
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/manager/manager_view', $data);
            $this->load->view('admin_includes/footer', $data);
          }else {
            $this->session->set_flashdata('record', '<div class="alert alert-danger" role="record">No Record Found</div>');
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/manager/manager_view', $data);
            $this->load->view('admin_includes/footer', $data);
          }
        }
    }


    public function book($id)
    {
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
            'active' =>  $this->input->post('active'),
            'booked_by' => $this->session->userdata('username')
          );

          if ($this->conference_model->update_conference($responce, $id) == True) {
            $data['admin_users'] = $this->Manager_model->get_conferences($data['company_id']);

            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/manager/manager_users_view', $data);
            $this->load->view('admin_includes/footer', $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully booked!</div>');
          } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Something went wrong Please try again !!</div>');
            redirect('admin/manager/index');
          }
      }
    }

    // Add Manager Users
    public function add()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'Manager';
        $data['main_menu'] = 'company_management';
        $data['menu'] = 'Manager';

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

        if ($this->form_validation->run('add_manager_users') == FALSE) {

            $role_id = array(5);
            $data['get_roles'] = $this->Manager_model->get_where_not_in('roles', 'id', "id, role");
            $data['get_companies'] = $this->Manager_model->get_company_name($this->session->userdata('user_id'));

            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/manager/add_manager_users_view', $data);
            $this->load->view('admin_includes/footer', $data);
        } else {

            $image_path = '';

            $manager_userData = array(
                'role_id' => $this->input->post('role_id'),
                'username' => $this->input->post('manager_username'),
                'password' => $this->input->post('manager_password'),
                'company_id' => $this->input->post('manager_company'),
                'user_id' => $this->session->userdata('user_id'),
                'email' => $this->input->post('manager_email'),
                'phone' => $this->input->post('manager_mobile'),
                'active' => $this->input->post('manager_active'),
            );

            $company = $this->Manager_model->get_company($this->input->post('manager_company'));
            $checkReg = $this->Manager_model->register_manager_users($manager_userData, $company);

            if ($checkReg) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully registered!</div>');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Something went wrong! please try again.</div>');
            }
            redirect('admin/manager/add');
        }
    }

    //Edit Manager Data
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

        if ($this->form_validation->run('edit_manager_users') == FALSE) {

            // False
            $data['get_roles'] = $this->Manager_model->get_where_not_in('roles', 'id', "id, role");
            $data['get_companies'] = $this->Manager_model->get_company_name($this->session->userdata('user_id'));
            $data['get_users'] = $this->Manager_model->get_where($id);

            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/manager/edit_manager_users_view', $data);
            $this->load->view('admin_includes/footer', $data);
        } else {

            $admin_userData = array(
                'role_id' => $this->input->post('role_id'),
                'username' => $this->input->post('admin_username'),
                'company_id' => $this->input->post('admin_company'),
                'email' => $this->input->post('admin_email'),
                'phone' => $this->input->post('admin_mobile'),
                'active' => $this->input->post('admin_active'),
            );

            $checkReg = $this->Main_model->update('manager', $admin_userData, [ "user_id" => $id ]);

            if ($checkReg) {
              $admin_userData = array(
                  'role_id' => $this->input->post('role_id'),
                  'username' => $this->input->post('admin_username'),
                  'company' => $this->input->post('admin_company'),
                  'email' => $this->input->post('admin_email'),
                  'phone' => $this->input->post('admin_mobile'),
                  'active' => $this->input->post('admin_active'),
              );
                $this->Main_model->update('admin_users', $admin_userData, [ "company" => $admin_userData['company'] ]);
                $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully Updated!</div>');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Something went wrong! please try again.</div>');
            }

            redirect('admin/manager/edit/'.$id);
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
        $uploads = $this->Main_model->get_where('manager','phone',$id,'user_id');
        if(!empty($uploads))
        {
          $this->Main_model->delete('manager',['phone'=>$id]);
          $uploads = $this->Main_model->get_where('admin_users','phone',$id,'user_id');
          if (!empty($uploads)) {
            $this->Main_model->delete('admin_users',['phone'=>$id]);
            $uploads = $this->Main_model->get_where('meeting','manager_phone',$id,'id');
            if (!empty($uploads)) {
              $this->Main_model->delete('meeting',['manager_phone'=>$id]);
            }
          }
        }
        redirect('admin/manager/index');
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
