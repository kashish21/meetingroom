<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Auth__model','Company_model','dashboard_model','Main_model', 'Manager_model'));
        $this->perPage = 10;
    }

    // View Companies
    public function index()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'Company';
        $data['main_menu'] = 'user_management';
        $data['menu'] = 'company';

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

        if ($this->session->userdata('role_id')) {
            $data['role_id'] = $this->session->userdata('role_id');
        }else {
          $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">NO SUCH ROLE IN THE COMPANY</div>');
        }
        if ($this->Company_model->get_conference_name($this->session->userdata('user_id')) == True) {
          $data['getConferences'] = $this->Company_model->get_conference_name($this->session->userdata('user_id'));
          $data['admin_users'] = $this->Company_model->get_all_company($this->session->userdata('user_id'));
        }else{
          $data['admin_users'] = $this->Company_model->get_all_company($this->session->userdata('user_id'));
        }

        //search
        if ($this->input->post('searchKeyword')) {
          $searchKeyword = $this->input->post('searchKeyword');
          $data['admin_users'] = $this->Company_model->search($searchKeyword);
          $this->load->view('admin_includes/header', $data);
          $this->load->view('admin_includes/left_nav', $data);
          $this->load->view('admin_includes/top_nav', $data);
          $this->load->view('admin/company/company_view', $data);
          $this->load->view('admin_includes/footer', $data);
        }else {

          $rows = $this->Company_model->record_count($this->session->userdata('user_id'));

          //Pagintion Config
          $config['base_url'] = base_url().'admin/company/';
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
          $data['admin_users'] = $this->Company_model->fetch_data($condition['limit'], $condition['start'], $this->session->userdata('user_id'));

          if (!empty($data['admin_users'])) {
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/company/company_view', $data);
            $this->load->view('admin_includes/footer', $data);
          }else {
            $this->session->set_flashdata('record', '<div class="alert alert-danger" role="record">No Record Found</div>');
            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/company/company_view', $data);
            $this->load->view('admin_includes/footer', $data);
          }
        }
    }

    // Add Company
    public function add()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'Company';
         $data['main_menu'] = 'company_management';
        $data['menu'] = 'company';

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

        if ($this->form_validation->run('add_company') == FALSE) {

            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/company/company_add_view', $data);
            $this->load->view('admin_includes/footer', $data);
        } else {
            $admin_userData = array(
                'company' => $this->input->post('company'),
                'active' => $this->input->post('active'),
                'location' => $this->input->post('location'),
                'user_id' => $this->session->userdata('user_id')
            );
            if ($data['role_id']) {
              $data['admin_users'] = $this->Company_model->register_company($admin_userData);
              $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully Inserted!!</div>');
            }else{
              $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Something went wrong!!</div>');
            }
            redirect('admin/company/add');
        }
    }

    // Edit Company Data
    public function edit($id)
    {

        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }

        // Title & Menu
        $data['title'] = 'Company';
        $data['main_menu'] = 'company_management';
        $data['menu'] = 'company';

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

        if ($this->form_validation->run('edit_company') == FALSE) {

            // False
            $data['get_users'] = $this->Company_model->get_where('company_name', 'id', $id, "id, company_name, location, active");

            $this->load->view('admin_includes/header', $data);
            $this->load->view('admin_includes/left_nav', $data);
            $this->load->view('admin_includes/top_nav', $data);
            $this->load->view('admin/company/edit_company_users_view', $data);
            $this->load->view('admin_includes/footer', $data);
        } else {

            $admin_userData = array(
                'company_name' => $this->input->post('company'),
                'location' => $this->input->post('location'),
                'active' => $this->input->post('active')
            );

            $checkReg = $this->Main_model->update('company_name', $admin_userData, [ "id" => $id ]);

            if ($checkReg) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Successfully Updated!</div>');
                redirect('admin/company/edit/'.$id);

            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Something went wrong! please try again.</div>');
            }
            redirect('admin/company/edit/'.$id);
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

    // Delete Company
    public function delete_user($id)
    {
      $company_name = $this->Main_model->get_company_by_company_id($id);
      foreach ($company_name as $key) {
        $company = $key->company_name;
      }
      if (!empty($company)) {
        $this->Main_model->delete('admin_users',['company'=>$company]);
        $uploads = $this->Main_model->get_where('company_name','id',$id,'id');
        if(!empty($uploads))
        {
          $this->Main_model->delete('company_name',['id'=>$id]);
          $uploads = $this->Main_model->get_where('manager','company_id',$id,'user_id');
          if (!empty($uploads)) {
            $this->Main_model->delete('manager',['company_id'=>$id]);$uploads = $this->Main_model->get_where('conference','company_id',$id,'id');
            if (!empty($uploads)) {
              $this->Main_model->delete('conference',['company_id'=>$id]);
              $uploads = $this->Main_model->get_where('meeting','company_id',$id,'id');
              if (!empty($uploads)) {
                $this->Main_model->delete('meeting',['company_id'=>$id]);
              }
            }
          }
        }
      }
      redirect('admin/company/index');
    }

    /*Admin User permission*/
     public function user_permission($user_id)
    {

        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }
        // Title & Menu
        $data['title'] = 'Company';
        $data['main_menu'] = 'company_management';
        $data['menu'] = 'Company';

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
        $this->load->view('admin_includes/_Left_nav', $data);
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
