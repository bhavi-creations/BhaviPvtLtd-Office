<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('logged_in')) {
            redirect(base_url() . 'login');
        }
    }

    public function index()
    {
        $data['department'] = $this->Department_model->select_departments();
        $data['country'] = $this->Home_model->select_countries();
        $this->load->view('admin/header');
        $this->load->view('admin/add-staff', $data);
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content'] = $this->Staff_model->select_staff();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-staff', $data);
        $this->load->view('admin/footer');
    }

    public function admin_profile()
    {
        $data = $this->session->get_userdata();
        $data['department'] = $this->Department_model->select_departments();
        $data['country'] = $this->Home_model->select_countries();
        $data['content'] = $this->Staff_model->select_staff_byID($data['userid']);
        $this->load->view('admin/header');
        $this->load->view('admin/admin-profile', $data);
        $this->load->view('admin/footer');
    }

    public function profile()
    {
        $data = $this->session->get_userdata();
        $data['department'] = $this->Department_model->select_departments();
        $data['country'] = $this->Home_model->select_countries();
        $data['content'] = $this->Staff_model->select_staff_byID($data['userid']);
        $this->load->view('staff/header');
        $this->load->view('staff/profile', $data);
        $this->load->view('staff/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtmobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required');
        // $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('txtcity', 'City', 'required');
        $this->form_validation->set_rules('txtstate', 'State', 'required');
        $this->form_validation->set_rules('slccountry', 'Country', 'required');

        // --- NEW: Add validation rules for new fields ---
        $this->form_validation->set_rules('txtdesignation', 'Designation', 'trim|required');
        $this->form_validation->set_rules('txtbank_name', 'Bank Name', 'trim');
        $this->form_validation->set_rules('txtbank_account_no', 'Bank Account Number', 'trim');
        $this->form_validation->set_rules('txtifsc_code', 'IFSC Code', 'trim');
        $this->form_validation->set_rules('txtpan_adhar_no', 'PAN/Aadhar Number', 'trim');
        // --- END NEW VALIDATION ---

        $name = $this->input->post('txtname');
        $gender = $this->input->post('slcgender');
        $department = $this->input->post('slcdepartment');
        $email = $this->input->post('txtemail');
        $mobile = $this->input->post('txtmobile');
        $dob = $this->input->post('txtdob');
        $doj = $this->input->post('txtdoj');
        $employee_id = $this->input->post('employee_id');
        $blood_group = $this->input->post('blood_group');
        $city = $this->input->post('txtcity');
        $state = $this->input->post('txtstate');
        $country = $this->input->post('slccountry');
        $address = $this->input->post('txtaddress');
        $salary = $this->input->post('txtsalary');
        $added = $this->session->userdata('userid');
        $files = $_FILES["files"];

        // --- NEW: Retrieve values for newly added fields ---
        $designation = $this->input->post('txtdesignation');
        $bank_account_no = $this->input->post('txtbank_account_no');
        $bank_name = $this->input->post('txtbank_name');
        $ifsc_code = $this->input->post('txtifsc_code');
        $pan_adhar_no = $this->input->post('txtpan_adhar_no');
        // --- END NEW RETRIEVAL ---

        if ($this->form_validation->run() !== false) {
            $this->load->library('upload');
            $config['upload_path'] = 'uploads/staff-files/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|csv|html|mp3|mp4|svg|pdf|txt|xls|xlsx|xml';
            $file_names = [];
            foreach ($files['name'] as $key => $image) {
                $_FILES['files[]']['name'] = $files['name'][$key];
                $_FILES['files[]']['type'] = $files['type'][$key];
                $_FILES['files[]']['tmp_name'] = $files['tmp_name'][$key];
                $_FILES['files[]']['error'] = $files['error'][$key];
                $_FILES['files[]']['size'] = $files['size'][$key];

                $fileName = time() . "_" . $image;

                $files[] = $fileName;

                $config['file_name'] = $fileName;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('files[]')) {
                    $file_data =   $this->upload->data();
                    $file_names[] = $file_data['file_name'];
                }
            }
            $file_names = implode(',', $file_names);

            $config = [];

            // $this->load->library('image_lib');
            $config2['upload_path'] = 'uploads/profile-pic/';
            $config2['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config2);
            $this->upload->initialize($config2);
            if (! $this->upload->do_upload('filephoto')) {
                $image = 'default-pic.jpg';
            } else {
                $image_data =   $this->upload->data();
                $image = $image_data['file_name'];
            }
            $login = $this->Home_model->insert_login(array('username' => $email, 'password' => md5($mobile), 'usertype' => 2));
            if ($login > 0) {
                // --- MODIFIED: Add new fields to the data array sent to the model ---
                $data = $this->Staff_model->insert_staff(array(
                    'id' => $login,
                    'staff_name' => $name,
                    'gender' => $gender,
                    'email' => $email,
                    'mobile' => $mobile,
                    'dob' => $dob,
                    'doj' => $doj,
                    'employee_id' => $employee_id,
                    'blood_group' => $blood_group,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                    'department_id' => $department,
                    'designation' => $designation,          // NEW
                    'bank_account_no' => $bank_account_no,  // NEW
                    'bank_name' => $bank_name,              // NEW
                    'ifsc_code' => $ifsc_code,              // NEW
                    'pan_adhar_no' => $pan_adhar_no,        // NEW
                    'pic' => $image,
                    'files' => $file_names,
                    'added_by' => $added,
                    'salary' => $salary
                ));
                // --- END MODIFIED ---
            }

            if ($data == true) {

                $this->session->set_flashdata('success', "New Staff Added Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, New Staff Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->index();
            return false;
        }
    }

  public function update()
{
    $this->load->helper('form');
    $this->form_validation->set_rules('txtname', 'Full Name', 'required');
    $this->form_validation->set_rules('slcgender', 'Gender', 'required');
    $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
    $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('txtmobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
    $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
    $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
    $this->form_validation->set_rules('employee_id', 'Employee Id', 'required');
    // $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
    $this->form_validation->set_rules('txtcity', 'City', 'required');
    $this->form_validation->set_rules('txtstate', 'State', 'required');
    $this->form_validation->set_rules('slccountry', 'Country', 'required');
    $this->form_validation->set_rules('txtsalary', 'Salary', 'required|numeric');

    // Add validation rules for the new fields
    $this->form_validation->set_rules('txtdesignation', 'Designation', 'trim|required');
    $this->form_validation->set_rules('txtbank_name', 'Bank Name', 'trim|required');
    $this->form_validation->set_rules('txtbank_account_no', 'Bank Account Number', 'trim|required|numeric');
    $this->form_validation->set_rules('txtifsc_code', 'IFSC Code', 'trim|required');
    $this->form_validation->set_rules('txtpan_adhar_no', 'PAN/Aadhar Number', 'trim|required');


    $id = $this->input->post('txtid');
    $name = $this->input->post('txtname');
    $gender = $this->input->post('slcgender');
    $department = $this->input->post('slcdepartment');
    $email = $this->input->post('txtemail');
    $mobile = $this->input->post('txtmobile');
    $dob = $this->input->post('txtdob');
    $doj = $this->input->post('txtdoj');
    $employee_id = $this->input->post('employee_id');
    $blood_group = $this->input->post('blood_group');
    $city = $this->input->post('txtcity');
    $state = $this->input->post('txtstate');
    $country = $this->input->post('slccountry');
    $address = $this->input->post('txtaddress');
    $salary = $this->input->post('txtsalary');

    // Collect data for the new fields
    $designation = $this->input->post('txtdesignation');
    $bank_name = $this->input->post('txtbank_name');
    $bank_account_no = $this->input->post('txtbank_account_no');
    $ifsc_code = $this->input->post('txtifsc_code');
    $pan_adhar_no = $this->input->post('txtpan_adhar_no');


    $prev_files = $this->input->post('prev_files');
    $files = $_FILES["files"];

    if ($this->form_validation->run() !== false) {
        $this->load->library('upload');
        $config['upload_path'] = 'uploads/staff-files/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|csv|html|mp3|mp4|svg|pdf|txt|xls|xlsx|xml';
        $file_names = [];
        foreach ($files['name'] as $key => $image) {
            $_FILES['files[]']['name'] = $files['name'][$key];
            $_FILES['files[]']['type'] = $files['type'][$key];
            $_FILES['files[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['files[]']['error'] = $files['error'][$key];
            $_FILES['files[]']['size'] = $files['size'][$key];

            $fileName = time() . "_" . $image;

            // This line appears to be an error, it should not be $files[] = $fileName;
            // $files[] = $fileName; // Remove or correct this line if it's causing issues.
                                    // It seems like an attempt to add to the $_FILES array, which is incorrect.

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('files[]')) {
                $file_data =  $this->upload->data();
                $file_names[] = $file_data['file_name'];
            }
        }
        if (count($file_names)) {
            $file_names = implode(',', $file_names);
            // Ensure no empty string is added if prev_files is empty
            $file_names = ($prev_files != '') ? $file_names . ',' . $prev_files : $file_names;
        } else {
            $file_names = $prev_files;
        }

        $config = []; // This line clears the config, which might be unintentional before image_lib upload.
                      // It's better to define config2 separately and only for the profile pic upload.

        // $this->load->library('image_lib'); // This line is commented out, keep it if you intend to use image_lib
        $config2['upload_path'] = 'uploads/profile-pic/';
        $config2['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config2); // Re-initialize upload for profile pic
        $this->upload->initialize($config2); // Initialize again for safety

        // Common data array for update
        $update_data = array(
            'staff_name' => $name,
            'gender' => $gender,
            'email' => $email,
            'mobile' => $mobile,
            'dob' => $dob,
            'doj' => $doj,
            'employee_id' => $employee_id,
            'blood_group' => $blood_group,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'department_id' => $department,
            'salary' => $salary,
            'files' => $file_names,
            // Add the new fields here
            'designation' => $designation,
            'bank_name' => $bank_name,
            'bank_account_no' => $bank_account_no,
            'ifsc_code' => $ifsc_code,
            'pan_adhar_no' => $pan_adhar_no
        );

        if (!$this->upload->do_upload('filephoto')) {
            // No new photo uploaded, update with existing data and new fields
            $data = $this->Staff_model->update_staff($update_data, $id);
        } else {
            $image_data =  $this->upload->data();
            // New photo uploaded, add 'pic' to update_data
            $update_data['pic'] = $image_data['file_name'];
            // 'added_by' was present in your original code's else block, ensure its source if needed.
            // $update_data['added_by'] = $added; // Uncomment and define $added if this field is relevant.
            $data = $this->Staff_model->update_staff($update_data, $id);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Staff Updated Successfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Staff Update Failed.");
        }
        redirect(base_url() . "manage-staff");
    } else {
        $this->edit($id);
        return false;
    }
}

    public function updateAdminProfile()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        // $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtmobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required');
        // $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('txtcity', 'City', 'required');
        $this->form_validation->set_rules('txtstate', 'State', 'required');
        $this->form_validation->set_rules('slccountry', 'Country', 'required');

        $id = $this->input->post('txtid');
        $name = $this->input->post('txtname');
        $gender = $this->input->post('slcgender');
        // $department=$this->input->post('slcdepartment');
        $email = $this->input->post('txtemail');
        $mobile = $this->input->post('txtmobile');
        $dob = $this->input->post('txtdob');
        $doj = $this->input->post('txtdoj');
        $employee_id = $this->input->post('employee_id');
        $blood_group = $this->input->post('blood_group');
        $city = $this->input->post('txtcity');
        $state = $this->input->post('txtstate');
        $country = $this->input->post('slccountry');
        $address = $this->input->post('txtaddress');

        if ($this->form_validation->run() !== false) {
            $this->load->library('image_lib');
            $config['upload_path'] = 'uploads/profile-pic/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('filephoto')) {
                $data = $this->Staff_model->update_staff(array('staff_name' => $name, 'gender' => $gender, 'email' => $email, 'mobile' => $mobile, 'dob' => $dob, 'doj' => $doj, 'employee_id' => $employee_id, 'blood_group' => $blood_group, 'address' => $address, 'city' => $city, 'state' => $state, 'country' => $country), $id);
            } else {
                $image_data =   $this->upload->data();

                $configer =  array(
                    'image_library'   => 'gd2',
                    'source_image'    =>  $image_data['full_path'],
                    'maintain_ratio'  =>  TRUE,
                    'width'           =>  150,
                    'height'          =>  150,
                    'quality'         =>  50
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();

                $data = $this->Staff_model->update_staff(array('staff_name' => $name, 'gender' => $gender, 'email' => $email, 'mobile' => $mobile, 'dob' => $dob, 'doj' => $doj, 'employee_id' => $employee_id, 'blood_group' => $blood_group, 'address' => $address, 'city' => $city, 'state' => $state, 'country' => $country, 'department_id' => $department, 'pic' => $image_data['file_name'], 'added_by' => $added), $id);
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Profile Updated Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Profile Update Failed.");
            }
            redirect(base_url() . "admin-profile");
        } else {
            $this->admin_profile();
            return false;
        }
    }

    public function updateAdminPassword()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        $id = $this->input->post('staffid');
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if ($this->form_validation->run() !== false) {
            $check = $this->Staff_model->check_current_password(md5($current_password), $id);
            if ($check) {
                $data = $this->Staff_model->update_password(array('password' => md5($confirm_password)), $id);

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', "Password Updated Succesfully");
                } else {
                    $this->session->set_flashdata('error', "Sorry, Password Update Failed.");
                }
            } else {
                $this->session->set_flashdata('error', "Invalid Current Password.");
            }
            redirect(base_url() . "admin-profile");
        } else {
            $this->admin_profile();
            return false;
        }
    }

    public function updateProfile()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtmobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required');
        // $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('txtcity', 'City', 'required');
        $this->form_validation->set_rules('txtstate', 'State', 'required');
        $this->form_validation->set_rules('slccountry', 'Country', 'required');

        $id = $this->input->post('txtid');
        $name = $this->input->post('txtname');
        $gender = $this->input->post('slcgender');
        $department = $this->input->post('slcdepartment');
        $email = $this->input->post('txtemail');
        $mobile = $this->input->post('txtmobile');
        $dob = $this->input->post('txtdob');
        $doj = $this->input->post('txtdoj');
        $employee_id = $this->input->post('employee_id');
        $blood_group = $this->input->post('blood_group');
        $city = $this->input->post('txtcity');
        $state = $this->input->post('txtstate');
        $country = $this->input->post('slccountry');
        $address = $this->input->post('txtaddress');
        $files = $_FILES["files"];

        if ($this->form_validation->run() !== false) {
            $this->load->library('upload');
            $config['upload_path'] = 'uploads/staff-files/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|csv|html|mp3|mp4|svg|pdf|txt|xls|xlsx|xml';
            $file_names = [];
            foreach ($files['name'] as $key => $image) {
                $_FILES['files[]']['name'] = $files['name'][$key];
                $_FILES['files[]']['type'] = $files['type'][$key];
                $_FILES['files[]']['tmp_name'] = $files['tmp_name'][$key];
                $_FILES['files[]']['error'] = $files['error'][$key];
                $_FILES['files[]']['size'] = $files['size'][$key];

                $fileName = time() . "_" . $image;

                $files[] = $fileName;

                $config['file_name'] = $fileName;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('files[]')) {
                    $file_data =   $this->upload->data();
                    $file_names[] = $file_data['file_name'];
                }
            }
            $file_names = implode(',', $file_names);

            $this->load->library('image_lib');
            $config['upload_path'] = 'uploads/profile-pic/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('filephoto')) {
                $data = $this->Staff_model->update_staff(array('staff_name' => $name, 'gender' => $gender, 'email' => $email, 'mobile' => $mobile, 'dob' => $dob, 'doj' => $doj, 'employee_id' => $employee_id, 'blood_group' => $blood_group, 'address' => $address, 'city' => $city, 'state' => $state, 'country' => $country, 'department_id' => $department), $id);
            } else {
                $image_data =   $this->upload->data();

                $configer =  array(
                    'image_library'   => 'gd2',
                    'source_image'    =>  $image_data['full_path'],
                    'maintain_ratio'  =>  TRUE,
                    'width'           =>  150,
                    'height'          =>  150,
                    'quality'         =>  50
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();

                $data = $this->Staff_model->update_staff(array('staff_name' => $name, 'gender' => $gender, 'email' => $email, 'mobile' => $mobile, 'dob' => $dob, 'doj' => $doj, 'employee_id' => $employee_id, 'blood_group' => $blood_group, 'address' => $address, 'city' => $city, 'state' => $state, 'country' => $country, 'department_id' => $department, 'pic' => $image_data['file_name'], 'added_by' => $added), $id);
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Profile Updated Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Profile Update Failed.");
            }
            redirect(base_url() . "profile");
        } else {
            $this->profile();
            return false;
        }
    }

    public function updatePassword()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        $id = $this->input->post('staffid');
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if ($this->form_validation->run() !== false) {
            $check = $this->Staff_model->check_current_password(md5($current_password), $id);
            if ($check) {
                $data = $this->Staff_model->update_password(array('password' => md5($confirm_password)), $id);

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', "Password Updated Succesfully");
                } else {
                    $this->session->set_flashdata('error', "Sorry, Password Update Failed.");
                }
            } else {
                $this->session->set_flashdata('error', "Invalid Current Password.");
            }
            redirect(base_url() . "profile");
        } else {
            $this->profile();
            return false;
        }
    }

    function edit($id)
    {
        $data['department'] = $this->Department_model->select_departments();
        $data['country'] = $this->Home_model->select_countries();
        $data['content'] = $this->Staff_model->select_staff_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-staff', $data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        $this->Home_model->delete_login_byID($id);
        $data = $this->Staff_model->delete_staff($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Staff Deleted Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Staff Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function deleteFile($id, $filename)
    {
        $result = $this->Staff_model->select_staff_byID($id);
        $prev_files = $result['0']['files'];

        $files = explode(',', $prev_files);
        print_r($files);
        foreach ($files as $key => $value) {
            if ($value == $filename) {
                unlink(FCPATH . 'uploads/staff-files/' . $filename);
                unset($files[$key]);
            }
        }
        $file_names = implode(',', $files);

        $data = $this->Staff_model->delete_staff_file(array('files' => $file_names), $id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Staff File Deleted Succesfully");
        } else {
            $this->session->set_flashdata('error', "Sorry, Staff File Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_staff_permissions()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('staff_id', 'Staff', 'required');
        $this->form_validation->set_rules('module', 'Module', 'required');
        $this->form_validation->set_rules('permission', 'permission', 'required');

        $staff_id = $this->input->post('staff_id');
        $module = $this->input->post('module');
        $permission = $this->input->post('permission');

        if ($this->form_validation->run() !== false) {
            $data = $this->Staff_model->update_permission(array('staff_id' => $staff_id, 'module' => $module, 'permission' => $permission));

            if ($data) {
                $this->session->set_flashdata('success', "Staff Permissions Updated Succesfully");
            } else {
                $this->session->set_flashdata('error', "Sorry, Staff Permissions Update Failed.");
            }
            redirect(base_url() . "manage-staff");
        } else {
            $this->edit($staff_id);
            return false;
        }
    }
}
