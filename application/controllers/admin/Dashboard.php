<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dashboard_model');
    }
    public function index()
    {
        // exit;
        if ($this->session->userdata('logged_in') == false) {
            redirect('webmaster');
        }
        // Title & Menu
        $data['title'] = 'Admin Dashboard';
        $data['menu'] = 'dashboard';

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
            '<link rel="stylesheet" href="' . base_url() . 'assets/vendors/datepicker/daterangepicker.css">',
            '<link rel="stylesheet" href="' . base_url() . 'assets/vendors/vmap/jqvmap.min.css">',
            '<link rel="stylesheet" href="' . base_url() . 'assets/css/app.min.css" type="text/css">',
            '<link rel="stylesheet" href="' . base_url() . 'assets/css/custom.css" type="text/css">'
        );

        // Scripts
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/vendors/bundle.js"></script>',
            '<script src="' . base_url() . 'assets/vendors/charts/chartjs/chart.min.js"></script>',
            '<script src="' . base_url() . 'assets/vendors/charts/sparkline/sparkline.min.js"></script>',
            '<script src="' . base_url() . 'assets/vendors/circle-progress/circle-progress.min.js"></script>',
            '<script src="' . base_url() . 'assets/js/examples/charts.js"></script>',
            '<script src="' . base_url() . 'assets/vendors/datepicker/daterangepicker.js"></script>',
            '<script src="' . base_url() . 'assets/js/examples/dashboard.js"></script>',
            '<script src="' . base_url() . 'assets/vendors/vmap/jquery.vmap.min.js"></script>',
            '<script src="' . base_url() . 'assets/vendors/vmap/maps/jquery.vmap.usa.js"></script>',
            '<script src="' . base_url() . 'assets/js/examples/vmap.js"></script>',
            '<script src="' . base_url() . 'assets/js/custom.js"></script>',
            '<script src="' . base_url() . 'assets/js/borderless.min.js"></script>'
        );

        $data['role_id'] = $this->session->userdata('role_id');

        $this->load->view('admin_includes/header', $data);
        $this->load->view('admin_includes/left_nav', $data);
        $this->load->view('admin_includes/top_nav', $data);
        $this->load->view('admin/dashboard_view', $data);
        $this->load->view('admin_includes/footer', $data);
    }
}
