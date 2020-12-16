<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	  
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_Model');
           
	}
	

    public function index()
    {
        $this->load->view('template/header_login');
        $this->load->view('user/login');
		$this->load->view('template/footer_login');
		
    }
    
    public function proses_login(){

        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username harus diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password harus diisi!']);

        

        if($this->form_validation->run() == FALSE){
            
            $this->load->view('template/header_login');
            $this->load->view('user/login');
            $this->load->view('template/footer_login');
        }
        else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = $password;

            $cek = $this->Login_Model->cek_login($user, $pass);

            if($cek->num_rows() > 0){
                foreach($cek->result() as $ck){
                    $sess_data['username'] = $ck->username;
					$sess_data['role'] = $ck->role;
					$userdata = array('id' => $ck->id,'username' => $ck->username, 'level' => $ck->role);
					$this->session->set_userdata('datauser', $userdata);
                }
                if($sess_data['role'] == 0){

                    $secret_key = "6LcT1PEUAAAAAE-hCl9QV89kvmbK-qAyPWTLLc69";
                    $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
                    $response = json_decode($verify);

                        if($response->success){ // Jika proses validasi captcha berhasil
                            redirect('admin/barang');
                        }
                        else{ // Jika captcha tidak valid
                            echo "<h2>Captcha Tidak Valid</h2>";
                            echo "Ohh sorry, you're not human (Anda bukan manusia)<hr>";
                            echo "Silahkan klik kotak I'm not robot (reCaptcha) untuk verifikasi";
                            redirect('user/login');
                        } 
                }
                else if($sess_data['role'] == 1){
                    $secret_key = "6LcT1PEUAAAAAE-hCl9QV89kvmbK-qAyPWTLLc69";
                    $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
                    $response = json_decode($verify);

                    if($response->success){ // Jika proses validasi captcha berhasil
                        redirect('user/landing');
                    }
                    else{ // Jika captcha tidak valid
                        echo "<h2>Captcha Tidak Valid</h2>";
                        echo "Ohh sorry, you're not human (Anda bukan manusia)<hr>";
                        echo "Silahkan klik kotak I'm not robot (reCaptcha) untuk verifikasi";
                        redirect('user/login');
                    }
                }
                
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password salah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                    redirect('admin/login');
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('user/login');
    }

}

/* End of file Login.php */
