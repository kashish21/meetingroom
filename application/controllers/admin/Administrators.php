<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrators extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('auth_model','admin_model','dashboard_model','Main_model','Conference_model'));
        $this->perPage = 10;
    }
    public function index()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'SuperAdmin User';
        $data['main_menu'] = 'user_management';
        $data['menu'] = 'Index';

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
        $data['user_id'] = $this->session->userdata('user_id');
        $data['admin_users'] = $this->admin_model->admin_users($data['user_id'], $data['role_id']);
        //search
        if ($this->input->post('searchKeyword')) {
          $searchKeyword = $this->input->post('searchKeyword');
          $data['admin_users'] = $this->admin_model->search($searchKeyword, $this->session->userdata('user_id'), $this->session->userdata('role_id'));
          $this->load->view('admin_includes/header', $data);
          $this->load->view('admin_includes/left_nav', $data);
          $this->load->view('admin_includes/top_nav', $data);
          $this->load->view('admin/admin_users/admin_users_view', $data);
          $this->load->view('admin_includes/footer', $data);
        }else {
          $rows = $this->admin_model->record_count($this->session->userdata('role_id'), $this->session->userdata('user_id'));
          //Pagintion Config
          $config['base_url'] = base_url().'admin/administrators/';
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
          $data['admin_users'] = $this->admin_model->fetch_data($condition['limit'], $condition['start'], $this->session->userdata('role_id'), $this->session->userdata('user_id'));

          if (!empty($data['admin_users'])) {
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/admin_users/admin_users_view', $data);
            $this->load->view('admin_includes/footer', $data);
          }else {
            $this->session->set_flashdata('record', '<div class="alert alert-danger" role="record">No Record Found</div>');
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/admin_users/admin_users_view', $data);
            $this->load->view('admin_includes/footer', $data);
          }
        }

    }

    // Add Admin Users
    public function add()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'SuperAdmin User';
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

        if ($this->form_validation->run('add_admin_users') == FALSE) {

            // False
            $role_id = $this->session->userdata('role_id');
            $data['get_roles'] = $this->Main_model->get_where_not_in('roles', 'id', "id, role");
            
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/admin_users/add_admin_users_view', $data);
            $this->load->view('admin_includes/footer', $data);
        } else {

          //true
            $image_path = '';

            $admin_userData = array(
                'role_id' => $this->input->post('role_id'),
                'username' => $this->input->post('admin_username'),
                'password' => $this->input->post('admin_password'),
                'company' => $this->input->post('admin_company'),
                'email' => $this->input->post('admin_email'),
                'phone' => $this->input->post('admin_mobile'),
                'active' => $this->input->post('admin_active'),
                'upload_type' => $this->input->post('upload_user_type'),
                'image' => $image_path
            );

            $checkReg = $this->admin_model->register_admin_users($admin_userData);

            if ($checkReg) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully registered!</div>');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Something went wrong! please try again.</div>');
            }
            redirect('admin/administrators/add');
        }
    }

    // Edit Admin user
    public function edit($id)
    {

        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'SuperAdmin User';
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
            $role_id = $this->session->userdata('role_id');
            $data['get_roles'] = $this->Main_model->get_where_not_in('roles', 'id', $role_id, "id, role");
            $data['get_users'] = $this->Main_model->get_where('admin_users', 'user_id', $id, "user_id, role_id, username, password, company, email, phone, image, active");

            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/admin_users/edit_admin_users_view', $data);
            $this->load->view('admin_includes/footer', $data);
        } else {

            $admin_userData = array(
                'role_id' => $this->input->post('role_id'),
                'username' => $this->input->post('admin_username'),
                'company' => $this->input->post('admin_company'),
                'email' => $this->input->post('admin_email'),
                'phone' => $this->input->post('admin_mobile'),
                'active' => $this->input->post('admin_active'),
            );

            $checkReg = $this->Main_model->update('admin_users', $admin_userData, [ "user_id" => $id ]);

            if ($checkReg) {
              if ($admin_userData['role_id'] == 5) {
                $admin_userData = array(
                    'role_id' => $this->input->post('role_id'),
                    'username' => $this->input->post('admin_username'),
                    'company_id' => $this->input->post('admin_company'),
                    'email' => $this->input->post('admin_email'),
                    'phone' => $this->input->post('admin_mobile'),
                    'active' => $this->input->post('admin_active'),
                );
                  $this->Main_model->update('manager', $admin_userData, [ "company_id" => $admin_userData['company_id'] ]);
                  $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully Updated!</div>');
              }else {
                $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully Updated!</div>');
              }
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

    // Delete Admin user
    public function delete_user($id)
    {
        $uploads = $this->Main_model->get_where('admin_users','user_id',$id,'user_id');
        if(!empty($uploads))
        {
          $company_id = $this->Main_model->get_company_by_user_in($id);
          $this->Main_model->delete('admin_users',['user_id'=>$id]);
          foreach ($company_id as $key) {
            $this->Main_model->delete('admin_users',['company'=>$key->id]);
            $this->Main_model->delete('company_name',['id'=>$key->id]);
            $this->Main_model->delete('manager',['company_id'=>$key->id]);
            $this->Main_model->delete('conference',['company_id'=>$key->id]);
          }
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
        $data['title'] = 'SuperAdmin User';
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
