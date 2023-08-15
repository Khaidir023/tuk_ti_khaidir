<?php
defined('BASEPATH') or exit('No direct script access allowed');



use Dompdf\Dompdf;
use Dompdf\Options;

class Dashboard extends CI_Controller
{
    private function _upload_file()
    {
        // Configuration for file upload
        $config['upload_path'] = './uploads/'; // Define the upload directory
        $config['allowed_types'] = 'gif|jpg|png'; // Allowed file types
        $config['max_size'] = 2048; // Maximum file size in kilobytes

        // Load the upload library
        $this->load->library('upload', $config);

        // Perform the upload
        if ($this->upload->do_upload('file')) {
            $upload_data = $this->upload->data();
            return $upload_data['file_name'];
        } else {
            // Handle upload error
            $error = $this->upload->display_errors();
            // You can redirect with an error message or handle it as needed
            Example:
            $this->session->set_flashdata('error_msg', $error);
            // Redirect to the form with an error message
            redirect('dashboard/mahasiswa');
        }
    }
    public function index()
    {
        $this->load->model('m_mahasiswa');

        $data = array(
            'page_title' => 'Dashboard',
            'mhs' => $this->m_mahasiswa->get_mhs(),
            'bs' => $this->m_mahasiswa->get_bs(),
        );
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function mahasiswa()
    {
        $this->load->model('m_mahasiswa');
        $data = array(
            'page_title' => 'Mahasiswa',
            'mhs' => $this->m_mahasiswa->get_mhs(),
            'bs' => $this->m_mahasiswa->get_bs(),
        );
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/mahasiswa', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function beasiswa()
    {
        $this->load->model('m_mahasiswa');
        $data = array(
            'page_title' => 'Beasiswa',
            'mhs' => $this->m_mahasiswa->get_mhs(),
            'bs' => $this->m_mahasiswa->get_bs(),
        );
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/beasiswa', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function kost()
    {
        $this->load->model('m_kost');
        $data = array(
            'page_title' => 'kost',
            'mhs' => $this->m_kost->get_mhs(),
        );
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/kost', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function tambah_mhs()
    {
        // Check if the form has been submitted
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Retrieve form data
            $nim = $this->input->post('nim');
            $beasiswa = $this->input->post('beasiswa');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');

            // Handle file upload if needed
            if (!empty($_FILES['file']['name'])) {
                // Handle file upload and get the file name
                $file_name = $this->_upload_file(); // Define the _upload_file() function for file handling
            } else {
                $file_name = ''; // No file uploaded
            }

            // Assuming you have a model for database operations, adjust accordingly
            $this->load->model('m_mahasiswa'); // Load the model

            // Create an array with data to insert
            $data = array(
                'NIM' => $nim,
                // 'id_beasiswa' => $beasiswa,
                'nama' => $nama,
                'alamat' => $alamat,
                // 'file' => $file_name
            );

            // Call the model's method to insert data into the database
            $this->m_mahasiswa->insert_mhs($data);

            // Redirect or display a success message
            // Redirect to a success page or back to the dashboard
            $this->session->set_flashdata('success_message', 'Student data added successfully.');
            redirect('dashboard/mahasiswa'); // Adjust the URL

            // Alternatively, you can display a success message
            // redirect('dashboard');
        }
    }   

    public function tambah_kost()
    {
        // Check if the form has been submitted
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Retrieve form data
            $no_kost = $this->input->post('no_kost');
            $nama = $this->input->post('nama');
            $telpon = $this->input->post('telpon');

            // Handle file upload if needed
            if (!empty($_FILES['file']['name'])) {
                // Handle file upload and get the file name
                $file_name = $this->_upload_file(); // Define the _upload_file() function for file handling
            } else {
                $file_name = ''; // No file uploaded
            }

            // Assuming you have a model for database operations, adjust accordingly
            $this->load->model('m_kost'); // Load the model

            // Create an array with data to insert
            $data = array(
                'no_kost' => $no_kost,
                'nama' => $nama,
                'telpon' => $telpon,
            );

            // Call the model's method to insert data into the database
            $this->m_kost->insert_mhs($data);

            // Redirect or display a success message
            // Redirect to a success page or back to the dashboard
            $this->session->set_flashdata('success_msg', 'Student data added successfully.');
            redirect('dashboard/kost'); // Adjust the URL

            // Alternatively, you can display a success message
            // redirect('dashboard');
        }
    }


public function edit_kost()
    {
        $this->load->model('m_kost');
        // Retrieve form data
        $id = $this->input->post('kode');
        $no_kost = $this->input->post('no_kost');
        $nama = $this->input->post('nama');
        $telpon = $this->input->post('telpon');
        
            if ($this->m_kost->edit_kost($id, $no_kost, $nama, $telpon)) {
                $this->session->set_flashdata('success_msg', 'Kost Berhasil Diedit.');
            } else {
                $this->session->set_flashdata('error_msg', 'Terjadi error ketika Mengedit Kost.');
            }
        redirect('dashboard/kost');
    }

    public function hapus_kost()
    {
        $this->load->model('m_kost');

        $id = $this->input->post('kode');

            if ($this->m_kost->hapus_kost($id)) {
                $this->session->set_flashdata('success_msg', 'Kost Berhasil Dihapus.');
            } else {
                $this->session->set_flashdata('error_msg', 'Terjadi error ketika Menghapus Kost.');
            }
        
        redirect('dashboard/kost');
    }

    public function edit_mhs()
    {
        $this->load->model('m_mahasiswa');
        // Retrieve form data
        $id = $this->input->post('kode');
        $nim = $this->input->post('nim');
        $beasiswa = $this->input->post('beasiswa');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        if ($this->m_mahasiswa->cek_nim_terbaru($nim, $id)) {
            $this->session->set_flashdata('warning_msg', 'Data Mahasiswa dengan NIM tersebut sudah ada.');
        } else {
            if ($this->m_mahasiswa->edit_mhs($id, $nim, $beasiswa, $nama, $alamat)) {
                $this->session->set_flashdata('success_msg', 'Mahasiswa Berhasil Diedit.');
            } else {
                $this->session->set_flashdata('error_msg', 'Terjadi error ketika Mengedit Mahasiswa.');
            }
        }
        redirect('dashboard/mahasiswa');
    }

    public function hapus_mhs()
    {
        $this->load->model('m_mahasiswa');

        $nim = $this->input->post('kode');

        if ($this->m_mahasiswa->is_nim_exists($nim)) {
            if ($this->m_mahasiswa->hapus_mhs($nim)) {
                $this->session->set_flashdata('success_msg', 'Mahasiswa Berhasil Dihapus.');
            } else {
                $this->session->set_flashdata('error_msg', 'Terjadi error ketika Menghapus Mahasiswa.');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'Mahasiswa dengan NIM tersebut tidak ditemukan.');
        }

        redirect('dashboard/mahasiswa');
    }

    // ============== Cetak halaman ===========================

    public function cetak_pdf()
    {
        $this->load->model('m_mahasiswa');

        $data = array(
            'page_title' => 'Cetak',
            'mhs' => $this->m_mahasiswa->get_mhs(),
            'bs' => $this->m_mahasiswa->get_bs(),
        );

        $this->load->view('admin/cetak', $data);
    }

}