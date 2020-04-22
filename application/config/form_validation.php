<?php
defined('BASEPATH') or exit('No direct script access allowed');

$todayDate = date('Y-m-d');
$config = array(

    // Add admin user
    'add_admin_users' => array(
        array(
            'field' => 'admin_username',
            'label' => 'Username',
            'rules' => 'trim|required|min_length[4]|xss_clean'
        ),
        array(
            'field' => 'admin_company',
            'label' => 'Company or Institute',
            'rules' => 'trim|required|min_length[4]|xss_clean'
        ),
        array(
            'field' => 'admin_email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|is_unique[admin_users.email]|xss_clean',
            'errors' => array('valid_email' => 'Please make sure your email is correct.')
        ),
        array(
            'field' => 'admin_mobile',
            'label' => 'Mobile',
            'rules' => 'trim|required|min_length[10]|max_length[10]|is_unique[admin_users.phone]|xss_clean',
            'errors' => array('min_lenght' => 'Please make sure your mobile is correct.')
        ),
        array(
            'field' => 'admin_password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[5]|max_length[20]|xss_clean'
        )
    ),

    // Add Companies
    'add_company' => array(
        array(
            'field' => 'company',
            'label' => 'Company Name',
            'rules' => 'trim|required|is_unique[company_name.company_name]|min_length[4]|xss_clean'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean',
            'errors' => array('valid_email' => 'Please make sure your email is correct.')
        ),
        array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'trim|required|min_length[10]|max_length[10]|xss_clean',
            'errors' => array('min_lenght' => 'Please make sure your mobile is correct.')
        ),
        array(
            'field' => 'location',
            'label' => 'Company Location',
            'rules' => 'trim|required|min_length[4]|xss_clean',
            'errors' => array('min_lenght' => 'Please make sure your Location is correct.')
        )
    ),

    // Edit Company data
    'edit_company' => array(
        array(
            'field' => 'company',
            'label' => 'Company Name',
            'rules' => 'trim|required|min_length[4]|xss_clean'
        ),
        array(
            'field' => 'location',
            'label' => 'Company Location',
            'rules' => 'trim|required|min_length[4]|xss_clean',
            'errors' => array('min_lenght' => 'Please make sure your Location is correct.')
        )
    ),

    // Add manager
    'add_manager_users' => array(
        array(
            'field' => 'manager_username',
            'label' => 'Username',
            'rules' => 'trim|required|min_length[4]|xss_clean'
        ),
        array(
            'field' => 'manager_email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|is_unique[manager.email]|xss_clean',
            'errors' => array('valid_email' => 'Please make sure your email is correct.')
        ),
        array(
            'field' => 'manager_mobile',
            'label' => 'Mobile',
            'rules' => 'trim|required|min_length[10]|max_length[10]|is_unique[manager.phone]|xss_clean',
            'errors' => array('min_lenght' => 'Please make sure your mobile is correct.')
        ),
        array(
            'field' => 'manager_password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[5]|max_length[20]|xss_clean'
        )
    ),

    // Edit Manager Data
    'edit_manager_users' => array(
        array(
            'field' => 'admin_username',
            'label' => 'Username',
            'rules' => 'trim|required|min_length[4]|xss_clean'
        ),
        array(
            'field' => 'admin_email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean',
            'errors' => array('valid_email' => 'Please make sure your email is correct.')
        ),
        array(
            'field' => 'admin_mobile',
            'label' => 'Mobile',
            'rules' => 'trim|required|min_length[10]|max_length[10]|xss_clean',
            'errors' => array('min_lenght' => 'Please make sure your mobile is correct.')
        )
    ),

    // Add Conference
    'add_conference' => array(
        array(
            'field' => 'conference_name',
            'label' => 'Conference Name',
            'rules' => 'trim|required|min_length[4]|xss_clean'
        ),
    ),

    // search
    'search' => array(
        array(
            'field' => 'searchKeyword',
            'label' => 'Search Keyword',
            'rules' => 'trim|required|min_length[4]|xss_clean'
        ),
    ),

    // Add Meeting
    'add_meeting' => array(
        array(
            'field' => 'meeting_name',
            'label' => 'Meeting Name',
            'rules' => 'trim|required|min_length[4]|xss_clean'
        ),
        array(
            'field' => 'date',
            'label' => 'Date',
            'rules' => 'trim|required|xss_clean',
        ),
        array(
            'field' => 'time_slot',
            'label' => 'Start Time',
            'rules' => 'trim|required|xss_clean',
        ),
        array(
            'field' => 'end_time_slot',
            'label' => 'End Time',
            'rules' => 'trim|required|xss_clean',
        )
    ),

    // Add  user
    'add_users' => array(
        array(
            'field' => 'admin_username',
            'label' => 'Username',
            'rules' => 'trim|required|min_length[4]|xss_clean'
        ),

        array(
            'field' => 'admin_email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|is_unique[users.email]|xss_clean',
            'errors' => array('valid_email' => 'Please make sure your email is correct.')
        ),
        array(
            'field' => 'admin_mobile',
            'label' => 'Mobile',
            'rules' => 'trim|required|min_length[10]|max_length[10]|is_unique[users.phone]|xss_clean',
            'errors' => array('min_lenght' => 'Please make sure your mobile is correct.')
        ),
        array(
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'trim|required',
            'errors' => array('min_lenght' => 'Please make sure your mobile is correct.')
        ),

    array(
                'field' => 'dob',
                'label' => 'Dob',
                'rules' => 'trim|required',
            ),

    array(
                'field' => 'user_type',
                'label' => 'User Type',
                'rules' => 'trim|required',
            ),

    array(
                'field' => 'country_code',
                'label' => 'Country Code',
                'rules' => 'trim|required',
            ),
    array(
            'field' => 'admin_password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[5]|max_length[20]|xss_clean'
        )
    ),

    // Add  add_address
    'add_address' => array(
        array(
            'field' => 'user_address',
            'label' => 'Address',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'city',
            'label' => 'City',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'pincode',
            'label' => 'pincode',
            'rules' => 'trim|numeric|required',
        ),
         array(
            'field' => 'state',
            'label' => 'State',
            'rules' => 'trim|required',
        ),
    ),

    'webmaster' => array(
        array(
            'field' => 'auth_email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean',
            'errors' => array('valid_email' => 'Please make sure your email is correct.')
        ),
        array(
            'field' => 'auth_password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[4]|xss_clean'
        )
    ),
    'reset' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean',
            'errors' => array('valid_email' => 'Please make sure your email is correct.')
        )
    )
);
