<?php
class Main extends CI_Controller{
	const sys_id = "com.lauvic.hores";
	const per_page = 25;
	const code1 = "verification";
	const code2 = "recovery";
	const user1 = "client";
	const user2 = "admin";
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->library('mainhandler');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->model('main_model');
	}
	public function index(){
		if(isset($_SESSION['hores_userid']))
		{
			//prevents coming back after login -> if admin
			redirect($_SESSION['hores_current_link']);
		}
		else
		{
			$data['hores_details'] = $this->main_model->get_hores_details();//constant
			$hores_details = $data['hores_details'];
			$data['title'] = ucwords('rooms | '.$hores_details['sys_name']);//constant
			$data['copyright_yr'] = date("Y");//constant
			$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
			$data['page_heading'] = "rooms";
			//check if client had logged in
			if(isset($_SESSION['hores_client_id']))
			{
				//get client
				$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
				if(!empty($client))
				{
					$data['client_details'] = $client;
				}
				else
				{
					$this->delete_session(self::user1);
					$this->session->set_flashdata('login_msg','Please login first to continue');
					redirect('client-login');
				}
			}
			$this->session->set_flashdata('hores_current_link','home');
			$this->session->set_flashdata('hores_current_category','home');
			//get available rooms
			$data['rooms'] = $this->main_model->get_available_active_rooms();
			//load views
			$this->load->view('constants/header',$data);
			$this->load->view('constants/client_navigation',$data);
			$this->load->view('pages/home',$data);
			$this->load->view('constants/footer',$data);
		}
	}
	public function add_review($var){
		if(isset($_SESSION['hores_client_id']))
		{
			//get client
			$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
			if(!empty($client))
			{
				$data['hores_details'] = $this->main_model->get_hores_details();//constant
				$hores_details = $data['hores_details'];
				$data['title'] = ucwords('add review | '.$hores_details['sys_name']);//constant
				$data['copyright_yr'] = date("Y");//constant
				$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
				$data['page_heading'] = "add review";
				$data['client_details'] = $client;
				//sanitize input
				$var = $this->mainhandler->sanitize_input($var);
				$this->session->set_userdata('hores_current_link','add-review/'.$var);
				$this->session->set_userdata('hores_current_category','add-review');
				//check var
				if(strcmp($var,"new") !== 0)
				{
					//get room details
					$target_room = $this->main_model->check_room_id($var);
					if(!empty($target_room))
					{
						$data['target_room'] = $target_room;
					}
				}
				//get available active rooms
				$data['rooms'] = $this->main_model->get_available_active_rooms();
				//load views
				$this->load->view('constants/header',$data);
				$this->load->view('constants/client_navigation',$data);
				$this->load->view('pages/add_review',$data);
				$this->load->view('constants/footer',$data);
			}
			else
			{
				$this->delete_session(self::user1);
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('client-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('client-login');
		}
	}
	public function room_details($room_id){
		
			$data['hores_details'] = $this->main_model->get_hores_details();//constant
			$hores_details = $data['hores_details'];
			//sanitize
			$room_id = $this->mainhandler->sanitize_input($room_id);
			//check room id
			$room = $this->main_model->check_room_id($room_id);
			if(!empty($room))
			{
				$data['title'] = ucwords($room['type'].' | '.$hores_details['sys_name']);
				$data['page_heading'] = $room['type'];
			}
			else
			{
				$data['title'] = ucwords('room details | '.$hores_details['sys_name']);//constant
				$data['page_heading'] = "room details";
			}
			$data['copyright_yr'] = date("Y");//constant
			$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
			$data['room_details'] = $room;
			//get room imagess
			$data['room_images'] = $this->main_model->get_room_images($room_id);
			//get room reviews
			$data['reviews'] = $this->main_model->get_room_reviews($room_id);
			//check if client had logged in
			if(isset($_SESSION['hores_client_id']))
			{
				//get client
				$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
				if(!empty($client))
				{
					$data['client_details'] = $client;
				}
				else
				{
					$this->delete_session(self::user1);
					$this->session->set_flashdata('login_msg','Please login first to continue');
					redirect('client-login');
				}
			}
			$this->session->set_flashdata('hores_current_link','room-details/'.$room_id);
			$this->session->set_flashdata('hores_current_category','room-details');
			//load views
			$this->load->view('constants/header',$data);
			//check if admin had logged in
			if(isset($_SESSION['hores_userid']))
			{

				$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
				$data['user_perm'] = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				$data['user_details'] = $user;
				$this->load->view('constants/admin_navigation',$data);
			}
			else
			{
				$this->load->view('constants/client_navigation',$data);
			}
			$this->load->view('pages/room_details',$data);
			$this->load->view('constants/footer',$data);
		
	}
	public function add_booking($var){
		if(isset($_SESSION['hores_client_id']))
		{
			//get client
			$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
			if(!empty($client))
			{
				$data['hores_details'] = $this->main_model->get_hores_details();//constant
				$hores_details = $data['hores_details'];
				$data['title'] = ucwords('new booking | '.$hores_details['sys_name']);//constant
				$data['copyright_yr'] = date("Y");//constant
				$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
				$data['page_heading'] = "new booking";
				$data['client_details'] = $client;
				$this->session->set_userdata('hores_current_link','add-booking/'.$var);
				$this->session->set_userdata('hores_current_category','add-booking');
				//check var
				$var = $this->mainhandler->sanitize_input($var);
				if(strcmp($var,"new") !== 0)
				{
					//get room details
					$target_room = $this->main_model->check_room_id($var);
					if(!empty($target_room))
					{
						$data['target_room'] = $target_room;
					}
				}
				//get available active rooms
				$data['rooms'] = $this->main_model->get_available_active_rooms();
				//load views
				$this->load->view('constants/header',$data);
				$this->load->view('constants/client_navigation',$data);
				$this->load->view('pages/add_booking',$data);
				$this->load->view('constants/footer',$data);
			}
			else
			{
				$this->delete_session(self::user1);
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('client-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('client-login');
		}
	}
	public function client_bookings($category,$offset = 0){
		if(isset($_SESSION['hores_client_id']))
		{
			//get client
			$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
			if(!empty($client))
			{
				$data['hores_details'] = $this->main_model->get_hores_details();//constant
				$hores_details = $data['hores_details'];
				$data['title'] = ucwords('my bookings | '.$hores_details['sys_name']);//constant
				$data['copyright_yr'] = date("Y");//constant
				$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
				$data['page_heading'] = "my bookings";
				$data['client_details'] = $client;
				$category = $this->mainhandler->sanitize_input($category);
				$this->session->set_userdata('hores_current_link','client_bookings/'.$category);
				$this->session->set_userdata('hores_current_category','client-bookings');
				$config['base_url'] = base_url()."main/".$_SESSION['hores_current_link'];
				//update current link
				$this->session->set_userdata('hores_current_link','client-bookings/'.$category.'/'.$offset);
				if(strcmp($category,"all") === 0)
				{
					//get total client bookings
					$data['total_bookings'] = $this->main_model->get_total_client_bookings($this->session->userdata('hores_client_id'));
				}
				elseif(strcmp($category,"starred") === 0)
				{
					$data['total_bookings'] = $this->main_model->get_total_starred_client_bookings($this->session->userdata('hores_client_id'));
				}
				$config['total_rows'] = $data['total_bookings'];
						$config['per_page'] = self::per_page;
						$config['full_tag_open'] = "<ul class='pagination'>";
						$config['full_tag_close'] ="</ul>";
						$config['num_tag_open'] = '<li>';
						$config['num_tag_close'] = '</li>';
						$config['cur_tag_open'] = "<li class='active'><a>";
						$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
						$config['next_tag_open'] = "<li>";
						$config['next_tagl_close'] = "</li>";
						$config['prev_tag_open'] = "<li>";
						$config['prev_tagl_close'] = "</li>";
						$config['first_tag_open'] = "<li>";
						$config['first_tagl_close'] = "</li>";
						$config['last_tag_open'] = "<li>";
						$config['last_tagl_close'] = "</li>";
						$this->pagination->initialize($config);
						$data['links'] = $this->pagination->create_links();
						$data['bookings'] = $this->main_model->get_client_bookings($config['per_page'],$offset,$category,$this->session->userdata('hores_client_id'));
						//load views
						$this->load->view('constants/header',$data);
						$this->load->view('constants/client_navigation',$data);
						$this->load->view('pages/client_bookings',$data);
						$this->load->view('constants/footer',$data);
			}
			else
			{
				$this->delete_session(self::user1);
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('client-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('client-login');
		}
	}
	public function edit_profile(){
		if(isset($_SESSION['hores_client_id']))
		{
			//get client
			$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
			if(!empty($client))
			{
				$data['hores_details'] = $this->main_model->get_hores_details();//constant
				$hores_details = $data['hores_details'];
				$data['title'] = ucwords('edit profile | '.$hores_details['sys_name']);//constant
				$data['copyright_yr'] = date("Y");//constant
				$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
				$data['page_heading'] = "my profile";
				$data['client_details'] = $client;
				$this->session->set_flashdata('hores_current_link','edit-profile');
				$this->session->set_flashdata('hores_current_category','edit-profile');
				//load views
				$this->load->view('constants/header',$data);
				$this->load->view('constants/client_navigation',$data);
				$this->load->view('pages/edit_profile',$data);
				$this->load->view('constants/footer',$data);
			}
			else
			{
				$this->delete_session(self::user1);
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('client-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('client-login');
		}
	}
	public function client_profile(){
		if(isset($_SESSION['hores_client_id']))
		{
			//get client
			$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
			if(!empty($client))
			{
				$data['hores_details'] = $this->main_model->get_hores_details();//constant
				$hores_details = $data['hores_details'];
				$data['title'] = ucwords('my profile | '.$hores_details['sys_name']);//constant
				$data['copyright_yr'] = date("Y");//constant
				$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
				$data['page_heading'] = "my profile";
				$data['client_details'] = $client;
				$this->session->set_flashdata('hores_current_link','client-profile');
				$this->session->set_flashdata('hores_current_category','client-profile');
				//load views
				$this->load->view('constants/header',$data);
				$this->load->view('constants/client_navigation',$data);
				$this->load->view('pages/client_profile',$data);
				$this->load->view('constants/footer',$data);
			}
			else
			{
				$this->delete_session(self::user1);
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('client-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('client-login');
		}
	}
	public function admin_login(){
		if(isset($_SESSION['hores_client_id']) || isset($_SESSION['hores_userid']))
		{
			//prevents coming back after login
			redirect($_SESSION['hores_current_link']);
		}
		else
		{
			$data['hores_details'] = $this->main_model->get_hores_details();//constant
			$hores_details = $data['hores_details'];
			$data['title'] = ucwords('admin login | '.$hores_details['sys_name']);//constant
			$data['copyright_yr'] = date("Y");//constant
			$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
			$data['utype_id'] = $this->mainhandler->encrypt_data(self::user2); 
			$data['page_heading'] = "admin login";
			$this->session->set_flashdata('hores_current_link','admin-login');
			$this->session->set_flashdata('hores_current_category','admin-login');
			//load views
			$this->load->view('constants/header',$data);
			$this->load->view('constants/client_navigation',$data);
			$this->load->view('pages/login',$data);
			$this->load->view('constants/footer',$data);	
		}
	}
	public function client_login(){
		if(isset($_SESSION['hores_client_id']) || isset($_SESSION['hores_userid']))
		{
			//prevents coming back after login
			redirect($_SESSION['hores_current_link']);
		}
		else
		{
			$data['hores_details'] = $this->main_model->get_hores_details();//constant
			$hores_details = $data['hores_details'];
			$data['title'] = ucwords('client login | '.$hores_details['sys_name']);//constant
			$data['copyright_yr'] = date("Y");//constant
			$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
			$data['utype_id'] = $this->mainhandler->encrypt_data(self::user1); 
			$data['page_heading'] = "client login";
			$this->session->set_flashdata('hores_current_link','client-login');
			$this->session->set_flashdata('hores_current_category','client-login');
			//load views
			$this->load->view('constants/header',$data);
			$this->load->view('constants/client_navigation',$data);
			$this->load->view('pages/login',$data);
			$this->load->view('constants/footer',$data);
		}
	}
	public function client_register(){
		if(isset($_SESSION['hores_userid']))
		{
			//prevents coming back after login
			redirect($_SESSION['hores_current_link']);
		}
		else
		{
			$data['hores_details'] = $this->main_model->get_hores_details();//constant
			$hores_details = $data['hores_details'];
			$data['title'] = ucwords('client register | '.$hores_details['sys_name']);//constant
			$data['copyright_yr'] = date("Y");//constant
			$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
			$data['page_heading'] = "client register";
			$this->session->set_flashdata('hores_current_link','client-register');
			$this->session->set_flashdata('hores_current_category','client-register');
			//load views
			$this->load->view('constants/header',$data);
			$this->load->view('constants/client_navigation',$data);
			$this->load->view('pages/register',$data);
			$this->load->view('constants/footer',$data);
		}
	}
	public function client_forgot_password(){
		if(isset($_SESSION['hores_userid']))
		{
			//prevents coming back after login
			redirect($_SESSION['hores_current_link']);
		}
		else
		{
			$data['hores_details'] = $this->main_model->get_hores_details();//constant
			$hores_details = $data['hores_details'];
			$data['title'] = ucwords('forgot password | '.$hores_details['sys_name']);//constant
			$data['copyright_yr'] = date("Y");//constant
			$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
			$data['utype_id'] = $this->mainhandler->encrypt_data(self::user1);
			$data['page_heading'] = "forgot password";
			$this->session->set_flashdata('hores_current_link','client-forgot-password');
			$this->session->set_flashdata('hores_current_category','client-forgot-password');
			//load views
			$this->load->view('constants/header',$data);
			$this->load->view('constants/client_navigation',$data);
			$this->load->view('pages/forgot_password',$data);
			$this->load->view('constants/footer',$data);
		}
	}
	public function client_reset_password(){
		if(isset($_SESSION['hores_userid']))
		{
			//prevents coming back after login
			redirect($_SESSION['hores_current_link']);
		}
		else
		{
			$data['hores_details'] = $this->main_model->get_hores_details();//constant
			$hores_details = $data['hores_details'];
			$data['title'] = ucwords('reset password | '.$hores_details['sys_name']);//constant
			$data['copyright_yr'] = date("Y");//constant
			$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
			$data['utype_id'] = $this->mainhandler->encrypt_data(self::user1);
			$data['page_heading'] = "reset password";
			$this->session->set_flashdata('hores_current_link','client-reset-password');
			$this->session->set_flashdata('hores_current_category','client-reset-password');
			//load views
			$this->load->view('constants/header',$data);
			$this->load->view('constants/client_navigation',$data);
			$this->load->view('pages/reset_password',$data);
			$this->load->view('constants/footer',$data);
		}
	}
	//bookings
	public function bookings($category,$offset = 0){
		//check userid
		if(isset($_SESSION['hores_userid']))
		{
			//get user
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				//get user perm
				$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				if(!empty($user_perm))
				{
					if($user_perm['bookings'] == 1)
					{
						$data['hores_details'] = $this->main_model->get_hores_details();//constant
						$hores_details = $data['hores_details'];
						$data['title'] = ucwords('bookings | '.$hores_details['sys_name']);//constant
						$data['copyright_yr'] = date("Y");//constant
						$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
						//get user details
						$data['user_details'] = $user;
						$data['page_heading'] = "bookings";//constant
						$category = $this->mainhandler->sanitize_input($category);
						$this->session->set_userdata('hores_current_link','bookings/'.$category);
						$this->session->set_userdata('hores_current_category','bookings');
						//user perm
						$data['user_perm'] = $user_perm;
						$config['base_url'] = base_url()."main/".$_SESSION['hores_current_link'];
						//update current link
						$this->session->set_userdata('hores_current_link','bookings/'.$category.'/'.$offset);
						if(strcmp($category,"all") === 0)
						{
							//get total bookings
							$data['total_bookings'] = $this->main_model->get_total_bookings();
						}
						elseif(strcmp($category,"starred") === 0)
						{
							//get total starred bookings
							$data['total_bookings'] = $this->main_model->get_total_starred_bookings();
						}
						$config['total_rows'] = $data['total_bookings'];
						$config['per_page'] = self::per_page;
						$config['full_tag_open'] = "<ul class='pagination'>";
						$config['full_tag_close'] ="</ul>";
						$config['num_tag_open'] = '<li>';
						$config['num_tag_close'] = '</li>';
						$config['cur_tag_open'] = "<li class='active'><a>";
						$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
						$config['next_tag_open'] = "<li>";
						$config['next_tagl_close'] = "</li>";
						$config['prev_tag_open'] = "<li>";
						$config['prev_tagl_close'] = "</li>";
						$config['first_tag_open'] = "<li>";
						$config['first_tagl_close'] = "</li>";
						$config['last_tag_open'] = "<li>";
						$config['last_tagl_close'] = "</li>";
						$this->pagination->initialize($config);
						$data['links'] = $this->pagination->create_links();
						$data['bookings'] = $this->main_model->get_bookings($config['per_page'],$offset,$category);
						//load views
						$this->load->view('constants/header',$data);
						$this->load->view('constants/admin_navigation',$data);
						$this->load->view('pages/bookings',$data);
						$this->load->view('constants/footer',$data);
					}
					else
					{
						$this->session->set_userdata('page_denied','bookings');
						redirect('access-denied');
					}
				}
				else
				{
					$this->session->set_userdata('page_denied','bookings');
					redirect('access-denied');
				}
			}
			else
			{
				$this->session->unset_userdata('hores_userid');
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('admin-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('admin-login');
		}
	}
	//clients
	public function clients($category,$offset = 0){
		//check userid
		if(isset($_SESSION['hores_userid']))
		{
			//get user
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				//get user perm
				$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				if(!empty($user_perm))
				{
					if($user_perm['clients'] == 1)
					{
						$data['hores_details'] = $this->main_model->get_hores_details();//constant
						$hores_details = $data['hores_details'];
						$data['title'] = ucwords('clients | '.$hores_details['sys_name']);//constant
						$data['copyright_yr'] = date("Y");//constant
						$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
						//get user details
						$data['user_details'] = $user;
						$data['page_heading'] = "clients";//constant
						$category = $this->mainhandler->sanitize_input($category);
						$this->session->set_userdata('hores_current_link','clients/'.$category);
						$this->session->set_userdata('hores_current_category','clients');
						//user perm
						$data['user_perm'] = $user_perm;
						$config['base_url'] = base_url()."main/".$_SESSION['hores_current_link'];
						//update current link
						$this->session->set_userdata('hores_current_link','clients/'.$category.'/'.$offset);
						if(strcmp($category,"all") === 0)
						{
							//get total clients
							$data['total_clients'] = $this->main_model->get_total_clients();
						}
						elseif(strcmp($category,"starred") === 0)
						{
							//get total starred clients
							$data['total_clients'] = $this->main_model->get_total_starred_clients();
						}
						$config['total_rows'] = $data['total_clients'];
						$config['per_page'] = self::per_page;
						$config['full_tag_open'] = "<ul class='pagination'>";
						$config['full_tag_close'] ="</ul>";
						$config['num_tag_open'] = '<li>';
						$config['num_tag_close'] = '</li>';
						$config['cur_tag_open'] = "<li class='active'><a>";
						$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
						$config['next_tag_open'] = "<li>";
						$config['next_tagl_close'] = "</li>";
						$config['prev_tag_open'] = "<li>";
						$config['prev_tagl_close'] = "</li>";
						$config['first_tag_open'] = "<li>";
						$config['first_tagl_close'] = "</li>";
						$config['last_tag_open'] = "<li>";
						$config['last_tagl_close'] = "</li>";
						$this->pagination->initialize($config);
						$data['links'] = $this->pagination->create_links();
						$data['clients'] = $this->main_model->get_clients($config['per_page'],$offset,$category);
						//load views
						$this->load->view('constants/header',$data);
						$this->load->view('constants/admin_navigation',$data);
						$this->load->view('pages/clients',$data);
						$this->load->view('constants/footer',$data);
					}
					else
					{
						$this->session->set_userdata('page_denied','clients');
						redirect('access-denied');
					}
				}
				else
				{
					$this->session->set_userdata('page_denied','clients');
					redirect('access-denied');
				}
			}
			else
			{
				$this->session->unset_userdata('hores_userid');
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('admin-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('admin-login');
		}
	}
	//rooms
	public function add_room(){
		//check userid
		if(isset($_SESSION['hores_userid']))
		{
			//get user
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				//get user perm
				$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				if(!empty($user_perm))
				{
					if($user_perm['rooms'] == 1)
					{
						$data['hores_details'] = $this->main_model->get_hores_details();//constant
						$hores_details = $data['hores_details'];
						$data['title'] = ucwords('add room | '.$hores_details['sys_name']);//constant
						$data['copyright_yr'] = date("Y");//constant
						$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
						//get user details
						$data['user_details'] = $user;
						$data['page_heading'] = "add room";//constant
						$this->session->set_userdata('hores_current_link','add-room');
						$this->session->set_userdata('hores_current_category','rooms');
						//user perm
						$data['user_perm'] = $user_perm;
						//load views
						$this->load->view('constants/header',$data);
						$this->load->view('constants/admin_navigation',$data);
						$this->load->view('pages/add_room',$data);
						$this->load->view('constants/footer',$data);
					}
					else
					{
						$this->session->set_userdata('page_denied','rooms');
						redirect('access-denied');
					}
				}
				else
				{
					$this->session->set_userdata('page_denied','rooms');
					redirect('access-denied');
				}
			}
			else
			{
				$this->session->unset_userdata('hores_userid');
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('admin-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('admin-login');
		}
	}
	public function rooms($category,$offset = 0){
		//check userid
		if(isset($_SESSION['hores_userid']))
		{
			//get user
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				//get user perm
				$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				if(!empty($user_perm))
				{
					if($user_perm['rooms'] == 1)
					{
						$data['hores_details'] = $this->main_model->get_hores_details();//constant
						$hores_details = $data['hores_details'];
						$data['title'] = ucwords('rooms | '.$hores_details['sys_name']);//constant
						$data['copyright_yr'] = date("Y");//constant
						$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
						//get user details
						$data['user_details'] = $user;
						$data['page_heading'] = "rooms";//constant
						$category = $this->mainhandler->sanitize_input($category);
						$this->session->set_userdata('hores_current_link','rooms/'.$category);
						$this->session->set_userdata('hores_current_category','rooms');
						//user perm
						$data['user_perm'] = $user_perm;
						$config['base_url'] = base_url()."main/".$_SESSION['hores_current_link'];
						//update current link
						$this->session->set_userdata('hores_current_link','rooms/'.$category.'/'.$offset);
						if(strcmp($category,"all") === 0)
						{
							//get total rooms
							$data['total_rooms'] = $this->main_model->get_total_rooms();
						}
						elseif(strcmp($category,"starred") === 0)
						{
							//get total starred rooms
							$data['total_rooms'] = $this->main_model->get_total_starred_rooms();
						}
						$config['total_rows'] = $data['total_rooms'];
						$config['per_page'] = self::per_page;
						$config['full_tag_open'] = "<ul class='pagination'>";
						$config['full_tag_close'] ="</ul>";
						$config['num_tag_open'] = '<li>';
						$config['num_tag_close'] = '</li>';
						$config['cur_tag_open'] = "<li class='active'><a>";
						$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
						$config['next_tag_open'] = "<li>";
						$config['next_tagl_close'] = "</li>";
						$config['prev_tag_open'] = "<li>";
						$config['prev_tagl_close'] = "</li>";
						$config['first_tag_open'] = "<li>";
						$config['first_tagl_close'] = "</li>";
						$config['last_tag_open'] = "<li>";
						$config['last_tagl_close'] = "</li>";
						$this->pagination->initialize($config);
						$data['links'] = $this->pagination->create_links();
						$data['rooms'] = $this->main_model->get_rooms($config['per_page'],$offset,$category);
						//load views
						$this->load->view('constants/header',$data);
						$this->load->view('constants/admin_navigation',$data);
						$this->load->view('pages/rooms',$data);
						$this->load->view('constants/footer',$data);
					}
					else
					{
						$this->session->set_userdata('page_denied','rooms');
						redirect('access-denied');
					}
				}
				else
				{
					$this->session->set_userdata('page_denied','rooms');
					redirect('access-denied');
				}
			}
			else
			{
				$this->session->unset_userdata('hores_userid');
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('admin-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('admin-login');
		}
	}
	//reports
	public function reports(){
		//check userid
		if(isset($_SESSION['hores_userid']))
		{
			//get user
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				//get user perm
				$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				if(!empty($user_perm))
				{
					if($user_perm['reports'] == 1)
					{
						$data['hores_details'] = $this->main_model->get_hores_details();//constant
						$hores_details = $data['hores_details'];
						$data['title'] = ucwords('reports | '.$hores_details['sys_name']);//constant
						$data['copyright_yr'] = date("Y");//constant
						$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
						$data['page_heading'] = "reports";//constant
						//get user details
						$data['user_details'] = $user;
						//get user perm
						$data['user_perm'] = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
						$this->session->set_userdata('hores_current_link','reports');
						$this->session->set_userdata('hores_current_category','reports');
						//load views
						$this->load->view('constants/header',$data);
						$this->load->view('constants/navigation',$data);
						$this->load->view('pages/reports',$data);
						$this->load->view('constants/footer',$data);
					}
					else
					{
						$this->session->set_userdata('page_denied','reports');
						redirect('access-denied');
					}
				}
				else
				{
					$this->session->set_userdata('page_denied','reports');
					redirect('access-denied');
				}
			}
			else
			{
				$this->session->unset_userdata('hores_userid');
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('admin-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('admin-login');
		}
	}
	//users
	public function add_user(){
		//check userid
		if(isset($_SESSION['hores_userid']))
		{
			//get user
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				//get user perm
				$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				if(!empty($user_perm))
				{
					if($user_perm['users'] == 1)
					{
						$data['hores_details'] = $this->main_model->get_hores_details();//constant
						$hores_details = $data['hores_details'];
						$data['title'] = ucwords('add user | '.$hores_details['sys_name']);//constant
						$data['copyright_yr'] = date("Y");//constant
						$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
						//get user details
						$data['user_details'] = $user;
						$data['page_heading'] = "add user";//constant
						$this->session->set_userdata('hores_current_link','add-user');
						$this->session->set_userdata('hores_current_category','users');
						//user perm
						$data['user_perm'] = $user_perm;
						//load views
						$this->load->view('constants/header',$data);
						$this->load->view('constants/admin_navigation',$data);
						$this->load->view('pages/add_user',$data);
						$this->load->view('constants/footer',$data);
					}
					else
					{
						$this->session->set_userdata('page_denied','users');
						redirect('access-denied');
					}
				}
				else
				{
					$this->session->set_userdata('page_denied','users');
					redirect('access-denied');
				}
			}
			else
			{
				$this->session->unset_userdata('hores_userid');
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('admin-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('admin-login');
		}
	}
	public function users($category,$offset = 0){
		//check userid
		if(isset($_SESSION['hores_userid']))
		{
			//get user
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				//get user perm
				$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				if(!empty($user_perm))
				{
					if($user_perm['users'] == 1)
					{
						$data['hores_details'] = $this->main_model->get_hores_details();//constant
						$hores_details = $data['hores_details'];
						$data['title'] = ucwords('users | '.$hores_details['sys_name']);//constant
						$data['copyright_yr'] = date("Y");//constant
						$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
						//get user details
						$data['user_details'] = $user;
						$data['page_heading'] = "users";//constant
						$category = $this->mainhandler->sanitize_input($category);
						$this->session->set_userdata('hores_current_link','users/'.$category);
						$this->session->set_userdata('hores_current_category','users');
						//user perm
						$data['user_perm'] = $user_perm;
						$config['base_url'] = base_url()."main/".$_SESSION['hores_current_link'];
						//update current link
						$this->session->set_userdata('hores_current_link','users/'.$category.'/'.$offset);
						if(strcmp($category,"all") === 0)
						{
							//get total users
							$data['total_users'] = $this->main_model->get_total_users();
						}
						elseif(strcmp($category,"starred") === 0)
						{
							//get total starred users
							$data['total_users'] = $this->main_model->get_total_starred_users();
						}
						elseif(strcmp($category,"active") === 0 || strcmp($category,"inactive") === 0)
						{
							//get total users by account status
							$data['total_users'] = $this->main_model->get_total_users_by_account_status($category);
						}
						elseif(strcmp($category,"online") === 0 || strcmp($category,"offline") === 0)
						{
							//get total users by login status
							$data['total_users'] = $this->main_model->get_total_users_by_login_status($category);
						}
						$config['total_rows'] = $data['total_users'];
						$config['per_page'] = self::per_page;
						$config['full_tag_open'] = "<ul class='pagination'>";
						$config['full_tag_close'] ="</ul>";
						$config['num_tag_open'] = '<li>';
						$config['num_tag_close'] = '</li>';
						$config['cur_tag_open'] = "<li class='active'><a>";
						$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
						$config['next_tag_open'] = "<li>";
						$config['next_tagl_close'] = "</li>";
						$config['prev_tag_open'] = "<li>";
						$config['prev_tagl_close'] = "</li>";
						$config['first_tag_open'] = "<li>";
						$config['first_tagl_close'] = "</li>";
						$config['last_tag_open'] = "<li>";
						$config['last_tagl_close'] = "</li>";
						$this->pagination->initialize($config);
						$data['links'] = $this->pagination->create_links();
						$data['users'] = $this->main_model->get_users($config['per_page'],$offset,$category);
						//load views
						$this->load->view('constants/header',$data);
						$this->load->view('constants/admin_navigation',$data);
						$this->load->view('pages/users',$data);
						$this->load->view('constants/footer',$data);
					}
					else
					{
						$this->session->set_userdata('page_denied','users');
						redirect('access-denied');
					}
				}
				else
				{
					$this->session->set_userdata('page_denied','users');
					redirect('access-denied');
				}
			}
			else
			{
				$this->session->unset_userdata('hores_userid');
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('admin-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('admin-login');
		}
	}
	//user logs
	public function user_logs($category,$offset = 0){
		//check userid
		if(isset($_SESSION['hores_userid']))
		{
			//get user
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				//get user perm
				$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				if(!empty($user_perm))
				{
					if($user_perm['user_logs'] == 1)
					{
						$data['hores_details'] = $this->main_model->get_hores_details();//constant
						$hores_details = $data['hores_details'];
						$data['title'] = ucwords('user logs | '.$hores_details['sys_name']);//constant
						$data['copyright_yr'] = date("Y");//constant
						$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
						//get user details
						$data['user_details'] = $user;
						$data['page_heading'] = "user logs";//constant
						$category = $this->mainhandler->sanitize_input($category);
						$this->session->set_userdata('hores_current_link','user-logs/'.$category);
						$this->session->set_userdata('hores_current_category','user-logs');
						//user perm
						$data['user_perm'] = $user_perm;
						$config['base_url'] = base_url()."main/".$_SESSION['hores_current_link'];
						//update current link
						$this->session->set_userdata('hores_current_link','user-logs/'.$category.'/'.$offset);
						if(strcmp($category,"all") === 0)
						{
							//get total user logs
							$data['total_user_logs'] = $this->main_model->get_total_user_logs();
						}
						elseif(strcmp($category,"starred") === 0)
						{
							//get total starred user logs
							$data['total_user_logs'] = $this->main_model->get_total_starred_user_logs();
						}
						$config['total_rows'] = $data['total_user_logs'];
						$config['per_page'] = self::per_page;
						$config['full_tag_open'] = "<ul class='pagination'>";
						$config['full_tag_close'] ="</ul>";
						$config['num_tag_open'] = '<li>';
						$config['num_tag_close'] = '</li>';
						$config['cur_tag_open'] = "<li class='active'><a>";
						$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
						$config['next_tag_open'] = "<li>";
						$config['next_tagl_close'] = "</li>";
						$config['prev_tag_open'] = "<li>";
						$config['prev_tagl_close'] = "</li>";
						$config['first_tag_open'] = "<li>";
						$config['first_tagl_close'] = "</li>";
						$config['last_tag_open'] = "<li>";
						$config['last_tagl_close'] = "</li>";
						$this->pagination->initialize($config);
						$data['links'] = $this->pagination->create_links();
						$data['user_logs'] = $this->main_model->get_user_logs($config['per_page'],$offset,$category);
						//load views
						$this->load->view('constants/header',$data);
						$this->load->view('constants/admin_navigation',$data);
						$this->load->view('pages/user_logs',$data);
						$this->load->view('constants/footer',$data);
					}
					else
					{
						$this->session->set_userdata('page_denied','user logs');
						redirect('access-denied');
					}
				}
				else
				{
					$this->session->set_userdata('page_denied','user logs');
					redirect('access-denied');
				}
			}
			else
			{
				$this->session->unset_userdata('hores_userid');
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('admin-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('admin-login');
		}
	}
	public function config(){
		//check userid
		if(isset($_SESSION['hores_userid']))
		{
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				//get user perm
				$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				if(!empty($user_perm))
				{
					if($user_perm['config'] == 1)
					{
						$data['hores_details'] = $this->main_model->get_hores_details();//constant
						$hores_details = $data['hores_details'];
						$data['title'] = ucwords('config | '.$hores_details['sys_name']);//constant
						$data['copyright_yr'] = date("Y");//constant
						$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
						$data['page_heading'] = "config";//constant
						//get user details
						$data['user_details'] = $user;
						//get user perm
						$data['user_perm'] = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
						$this->session->set_userdata('hores_current_link','config');
						$this->session->set_userdata('hores_current_category','config');
						//load views
						$this->load->view('constants/header',$data);
						$this->load->view('constants/navigation',$data);
						$this->load->view('pages/config',$data);
						$this->load->view('constants/footer',$data);
					}
					else
					{
						$this->session->set_userdata('page_denied','config');
						redirect('access-denied');
					}
				}
				else
				{
					$this->session->set_userdata('page_denied','config');
					redirect('access-denied');
				}
			}
			else
			{
				$this->session->unset_userdata('hores_userid');
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('admin-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('admin-login');
		}
	}
	public function access_denied(){
		//check userid
		if(isset($_SESSION['hores_userid']))
		{	
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				$data['hores_details'] = $this->main_model->get_hores_details();//constant
				$hores_details = $data['hores_details'];
				$data['title'] = ucwords('access denied | '.$hores_details['sys_name']);//constant
				$data['copyright_yr'] = date("Y");//constant
				$data['sys_id'] = $this->mainhandler->encrypt_data(self::sys_id);//constant
				$data['page_heading'] = "access denied";//constant
				//get user details
				$data['user_details'] = $user;
				//get user perm
				$data['user_perm'] = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
				$this->session->set_userdata('hores_current_link','access-denied');
				$this->session->set_userdata('hores_current_category','access-denied');
				//load views
				$this->load->view('constants/header',$data);
				$this->load->view('constants/admin_navigation',$data);
				$this->load->view('pages/access_denied',$data);
				$this->load->view('constants/footer',$data);
			}
			else
			{
				$this->session->unset_userdata('hores_userid');
				$this->session->set_flashdata('login_msg','Please login first to continue');
				redirect('admin-login');
			}
		}
		else
		{
			$this->session->set_flashdata('login_msg','Please login first to continue');
			redirect('admin-login');
		}
	}
	//processes
	public function new_review(){
		if(isset($_POST['add-review-btn']))
		{
			$add_review_sys_id = $this->mainhandler->sanitize_input($this->input->post('add-review-sys-id'));
			$response = $this->mainhandler->decrypt_data($add_review_sys_id);
			if(strcmp($response,self::sys_id) === 0)
			{
				//get input
				$room_id = $this->mainhandler->sanitize_input($this->input->post('room-id'));
				$review = $this->mainhandler->sanitize_input($this->input->post('review'));
				$r_rating = $this->mainhandler->sanitize_input($this->input->post('r-rating'));
				//check if empty
				if(empty($review))
				{
					$this->session->set_flashdata('review_empty','Please enter review.');
					$this->session->set_flashdata('room_id_temp',$room_id);
					$this->session->set_flashdata('review_temp',$review);
					redirect($_SESSION['hores_current_link']);
				}
				else
				{
					//check if room exists
					$room = $this->main_model->check_room_id($room_id);
					if(!empty($room))
					{
						//check if client had logged in
						if(isset($_SESSION['hores_client_id']))
						{
							$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
							if(!empty($client))
							{
								//generate review id
								$review_id = $this->mainhandler->generate_invoice_no();
								//add review
								$this->main_model->new_review($review_id,$room_id,$this->session->userdata('hores_client_id'),$r_rating,$review,$this->mainhandler->current_date(),$this->mainhandler->current_time());
								$this->session->set_flashdata('add_review_success','The review has been added.');
								redirect($_SESSION['hores_current_link']);
							}
							else
							{
								$this->client_logout();
							}
						}
						else
						{
							$this->client_logout();
						}
					}
					else
					{
						$this->session->set_flashdata('add_review_error','Unable to add this review.');
						redirect($_SESSION['hores_current_link']);
					}
				}
			}
			else
			{
				redirect($_SESSION['hores_current_link']);
			}
		}
		else
		{
			redirect($_SESSION['hores_current_link']);
		}
	}
	public function new_booking(){
		if(isset($_POST['add-booking-btn']))
		{
			$add_booking_sys_id = $this->mainhandler->sanitize_input($this->input->post('add-booking-sys-id'));
			$response = $this->mainhandler->decrypt_data($add_booking_sys_id);
			if(strcmp($response,self::sys_id) === 0)
			{
				//get input
				$room_id = $this->mainhandler->sanitize_input($this->input->post('room-id'));
				$rooms_booked = $this->mainhandler->sanitize_input($this->input->post('rooms-booked'));
				$guests = $this->mainhandler->sanitize_input($this->input->post('guests'));
				$mode = $this->mainhandler->sanitize_input($this->input->post('mode'));
				$check_in_date = $this->mainhandler->sanitize_input($this->input->post('check-in-date'));
				$check_in_time = $this->mainhandler->sanitize_input($this->input->post('check-in-time'));
				$check_out_date = $this->mainhandler->sanitize_input($this->input->post('check-out-date'));
				$check_out_time = $this->mainhandler->sanitize_input($this->input->post('check-out-time'));
				//check if empty
				if(empty($rooms_booked))
				{
					$this->session->set_flashdata('rooms_booked_empty','Please enter the number of rooms booking.');
					$this->session->set_flashdata('room_id_temp',$room_id);
					$this->session->set_flashdata('rooms_booked_temp',$rooms_booked);
					$this->session->set_flashdata('guests_temp',$guests);
					$this->session->set_flashdata('check_in_date_temp',$check_in_date);
					$this->session->set_flashdata('check_in_time_temp',$check_in_time);
					$this->session->set_flashdata('check_out_date_temp',$check_out_date);
					$this->session->set_flashdata('check_out_time_temp',$check_out_time);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($guests))
				{
					$this->session->set_flashdata('guests_empty','Please enter the number of guests.');
					$this->session->set_flashdata('room_id_temp',$room_id);
					$this->session->set_flashdata('rooms_booked_temp',$rooms_booked);
					$this->session->set_flashdata('guests_temp',$guests);
					$this->session->set_flashdata('check_in_date_temp',$check_in_date);
					$this->session->set_flashdata('check_in_time_temp',$check_in_time);
					$this->session->set_flashdata('check_out_date_temp',$check_out_date);
					$this->session->set_flashdata('check_out_time_temp',$check_out_time);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($check_in_date))
				{
					$this->session->set_flashdata('check_in_date_empty','Please enter the check in date.');
					$this->session->set_flashdata('room_id_temp',$room_id);
					$this->session->set_flashdata('rooms_booked_temp',$rooms_booked);
					$this->session->set_flashdata('guests_temp',$guests);
					$this->session->set_flashdata('check_in_date_temp',$check_in_date);
					$this->session->set_flashdata('check_in_time_temp',$check_in_time);
					$this->session->set_flashdata('check_out_date_temp',$check_out_date);
					$this->session->set_flashdata('check_out_time_temp',$check_out_time);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($check_in_time))
				{
					$this->session->set_flashdata('check_in_time_empty','Please enter the check in time.');
					$this->session->set_flashdata('room_id_temp',$room_id);
					$this->session->set_flashdata('rooms_booked_temp',$rooms_booked);
					$this->session->set_flashdata('guests_temp',$guests);
					$this->session->set_flashdata('check_in_date_temp',$check_in_date);
					$this->session->set_flashdata('check_in_time_temp',$check_in_time);
					$this->session->set_flashdata('check_out_date_temp',$check_out_date);
					$this->session->set_flashdata('check_out_time_temp',$check_out_time);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($check_out_date))
				{
					$this->session->set_flashdata('check_out_date_empty','Please enter the check out date.');
					$this->session->set_flashdata('room_id_temp',$room_id);
					$this->session->set_flashdata('rooms_booked_temp',$rooms_booked);
					$this->session->set_flashdata('guests_temp',$guests);
					$this->session->set_flashdata('check_in_date_temp',$check_in_date);
					$this->session->set_flashdata('check_in_time_temp',$check_in_time);
					$this->session->set_flashdata('check_out_date_temp',$check_out_date);
					$this->session->set_flashdata('check_out_time_temp',$check_out_time);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($check_out_time))
				{
					$this->session->set_flashdata('check_out_time_empty','Please enter the check out time.');
					$this->session->set_flashdata('room_id_temp',$room_id);
					$this->session->set_flashdata('rooms_booked_temp',$rooms_booked);
					$this->session->set_flashdata('guests_temp',$guests);
					$this->session->set_flashdata('check_in_date_temp',$check_in_date);
					$this->session->set_flashdata('check_in_time_temp',$check_in_time);
					$this->session->set_flashdata('check_out_date_temp',$check_out_date);
					$this->session->set_flashdata('check_out_time_temp',$check_out_time);
					redirect($_SESSION['hores_current_link']);
				}
				else
				{
					//process
					//convert the dates to int date
					$check_in_date1 = $this->mainhandler->int_date($check_in_date);
					$check_out_date1 = $this->mainhandler->int_date($check_out_date);
					//get the difference
					$days = $check_out_date1 - $check_in_date1;
					if($days < 0)
					{
						$days = $days * - 1;
					}
					elseif($days == 0)
					{
						$days = 1;
					}
					//get room details
					$room = $this->main_model->check_room_id($room_id);
					if(!empty($room))
					{
						//check if available rooms is less than rooms booked
						$available_rooms = $room['available'];
						if($rooms_booked <= $available_rooms)
						{
							//check if guests outnumber capacity
							$capacity = $room['capacity'];
							if($guests <= $capacity)
							{
								//compute total charges
								$daily_charges = $room['charges'];
								$total_charges = $daily_charges * $days;
								//generate booking id
								$booking_id = $this->mainhandler->generate_invoice_no();
								//set defaults
								$status = "pending";//until payment made
								$starred = "no";
								//update available rooms
								$available_rooms = $available_rooms - $rooms_booked;
								if(isset($_SESSION['hores_client_id']))
								{
									$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
									if(!empty($client))
									{
										//update available rooms
										$this->main_model->update_available_rooms($available_rooms,$room_id);
										//save booking
										$this->main_model->new_booking($booking_id,$this->session->userdata('hores_client_id'),$room_id,$rooms_booked,$guests,$days,$total_charges,$mode,$check_in_date,$check_in_time,$check_out_date,$check_out_time,$this->mainhandler->current_date(),$this->mainhandler->current_time(),$status,$starred);
										$this->session->set_flashdata('add_booking_success','The booking has been made.');
										redirect($_SESSION['hores_current_link']);
									}
									else
									{
										$this->client_logout();
									}
								}
								else
								{
									$this->client_logout();
								}
							}
							elseif($guests > $capacity)
							{
								$this->session->set_flashdata('capacity_less','The number of guests per room is more than the room capacity. Room capacity is: '.$capacity);
								$this->session->set_flashdata('room_id_temp',$room_id);
					$this->session->set_flashdata('rooms_booked_temp',$rooms_booked);
					$this->session->set_flashdata('guests_temp',$guests);
					$this->session->set_flashdata('check_in_date_temp',$check_in_date);
					$this->session->set_flashdata('check_in_time_temp',$check_in_time);
					$this->session->set_flashdata('check_out_date_temp',$check_out_date);
					$this->session->set_flashdata('check_out_time_temp',$check_out_time);
					redirect($_SESSION['hores_current_link']);
							}
						}
						elseif($rooms_booked > $available_rooms)
						{
							$this->session->set_flashdata('available_rooms_less','The rooms booked are more than the available rooms. Available rooms are: '.$available_rooms);
							$this->session->set_flashdata('room_id_temp',$room_id);
					$this->session->set_flashdata('rooms_booked_temp',$rooms_booked);
					$this->session->set_flashdata('guests_temp',$guests);
					$this->session->set_flashdata('check_in_date_temp',$check_in_date);
					$this->session->set_flashdata('check_in_time_temp',$check_in_time);
					$this->session->set_flashdata('check_out_date_temp',$check_out_date);
					$this->session->set_flashdata('check_out_time_temp',$check_out_time);
					redirect($_SESSION['hores_current_link']);
						}


					}
					else
					{
						$this->session->set_flashdata('booking_error','Unable to book this room.');
						redirect($_SESSION['hores_current_link']);
					}
				}
			}
			else
			{
				redirect($_SESSION['hores_current_link']);
			}
		}
		else
		{
			redirect($_SESSION['hores_current_link']);
		}
	}
	public function cancel_booking($booking_id){
		//check if client logged in
		if(isset($_SESSION['hores_client_id']))
		{
			$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
			if(!empty($client))
			{
				//sanitize
				$booking_id = $this->mainhandler->sanitize_input($booking_id);
				//check booking id
				$booking = $this->main_model->check_booking_id($booking_id);
				if(!empty($booking))
				{
					//check if booking belongs to client
					if(strcmp($client['client_id'],$booking['client_id']) === 0)
					{
						$this->main_model->delete_booking($booking_id);
						$this->session->set_flashdata('cancel_booking_success','The booking #'.$booking['id'].' has been canceled.');
						redirect($_SESSION['hores_current_link']);
					}
					else
					{
						$this->session->set_flashdata('cancel_booking_error','Unable to cancel booking.');
						redirect($_SESSION['hores_current_link']);
					}
				}
				else
				{
					$this->session->set_flashdata('cancel_booking_error','Unable to cancel booking.');
					redirect($_SESSION['hores_current_link']);
				}
			}
			else
			{
				$this->client_logout();
			}
		}
		else
		{
			$this->client_logout();
		}
	}
	public function client_logout(){
		if(isset($_SESSION['hores_client_id']))
		{
			$client = $this->main_model->check_client_id($this->session->userdata('hores_client_id'));
			if(!empty($client))
			{
				//update login status
				$login_status = "offline";
				$this->main_model->update_login_status($login_status,self::user1,$this->session->userdata('hores_client_id'));
				//record logout time
				$this->main_model->new_logout_time($this->session->userdata('hores_client_id'),$this->mainhandler->current_date(),$this->mainhandler->current_time());
			}
			//delete session
			$this->delete_session(self::user1);
			redirect('client-login');
		}
		else
		{
			redirect('client-login');
		}
	}
	public function admin_logout(){
		if(isset($_SESSION['hores_userid']))
		{
			$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
			if(!empty($user))
			{
				//update login status
				$login_status = "offline";
				$this->main_model->update_login_status($login_status,self::user2,$this->session->userdata('hores_userid'));
				//record logout time
				$this->main_model->new_logout_time($this->session->userdata('hores_userid'),$this->mainhandler->current_date(),$this->mainhandler->current_time());
			}
			//delete session
			$this->delete_session(self::user2);
			redirect('client-login');
		}
		else
		{
			redirect('client-login');
		}
	}
	public function new_room(){
		if(isset($_POST['add-room-btn']))
		{
			//get sys id
			$add_room_sys_id = $this->mainhandler->sanitize_input($this->input->post('add-room-sys-id'));
			$response = $this->mainhandler->decrypt_data($add_room_sys_id);
			if(strcmp($response,self::sys_id) === 0)
			{
				//get input
				$type = $this->mainhandler->sanitize_input($this->input->post('type'));
				$capacity = $this->mainhandler->sanitize_input($this->input->post('capacity'));
				$total = $this->mainhandler->sanitize_input($this->input->post('total'));
				$charges = $this->mainhandler->sanitize_input($this->input->post('charges'));
				$desc = $this->mainhandler->sanitize_input($this->input->post('desc'));
				//check if empty
				if(empty($type))
				{
					$this->session->set_flashdata('type_empty','Please enter room type.');
					$this->session->set_flashdata('type_temp',$type);
					$this->session->set_flashdata('capacity_temp',$capacity);
					$this->session->set_flashdata('total_temp',$total);
					$this->session->set_flashdata('charges_temp',$charges);
					$this->session->set_flashdata('desc_temp',$desc);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($capacity))
				{
					$this->session->set_flashdata('capacity_empty','Please enter room capacity');
					$this->session->set_flashdata('type_temp',$type);
					$this->session->set_flashdata('capacity_temp',$capacity);
					$this->session->set_flashdata('total_temp',$total);
					$this->session->set_flashdata('charges_temp',$charges);
					$this->session->set_flashdata('desc_temp',$desc);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($total))
				{
					$this->session->set_flashdata('total_empty','Please enter total rooms.');
					$this->session->set_flashdata('type_temp',$type);
					$this->session->set_flashdata('capacity_temp',$capacity);
					$this->session->set_flashdata('total_temp',$total);
					$this->session->set_flashdata('charges_temp',$charges);
					$this->session->set_flashdata('desc_temp',$desc);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($charges))
				{
					$this->session->set_flashdata('charges_empty','Please enter daily charges.');
					$this->session->set_flashdata('type_temp',$type);
					$this->session->set_flashdata('capacity_temp',$capacity);
					$this->session->set_flashdata('total_temp',$total);
					$this->session->set_flashdata('charges_temp',$charges);
					$this->session->set_flashdata('desc_temp',$desc);
					redirect($_SESSION['hores_current_link']);
				}
				else
				{
					//process
					$response = $this->mainhandler->validate_number($capacity);
					if(strcmp($response,"valid") === 0)
					{
						$response = $this->mainhandler->validate_number($total);
						if(strcmp($response,"valid") === 0)
						{
							$response = $this->mainhandler->validate_number($charges);
							if(strcmp($response,"valid") === 0)
							{
								//check if type exists
								$type = strtolower($type);
								$room = $this->main_model->check_room_type($type);
								if(empty($room))
								{
									//check if image one set
									if($_FILES['image1']['size'] != 0)
									{
										//process image1
										$upload_path = "./assets/media/uploads/rooms/";
										$config['upload_path'] = $upload_path;
										$config['allowed_types'] = 'jpg|png|jpeg|jfif';
										$config['max_size'] = 500;//500 kb
										$this->load->library('upload',$config);
										if($this->upload->do_upload('image1'))
										{
											//get image path
											$image_name = $this->upload->data('file_name');//with extension
											$image_raw_name = $this->upload->data('raw_name');//without extension
											$image_ext = $this->upload->data('file_ext');
											$image_path = $upload_path.$image_name;
											//generate thumbnail
											$config['image_library'] = 'gd2';
											$config['source_image'] = $image_path;
											$config['create_thumb'] = TRUE;
											$config['maintain_ratio'] = FALSE;
											$config['width'] = 330;
											$config['height'] = 186;
											$this->load->library('image_lib', $config);
											$this->image_lib->resize();
											//get thumbnail path
											$thumbnail_name = $image_raw_name."_thumb".$image_ext;
											$thumbnail_path = $upload_path.$thumbnail_name;
											$image1 = $image_path;
											$image1_thumb = $thumbnail_path;
											$image_count = 1;
											$proceed = "okay";
										}
										else
										{
											$proceed = "no";
										}
									}
									if(strcmp($proceed,"okay") === 0)
									{
										//check if image two set
										if($_FILES['image2']['size'] != 0)
										{
											//process image2
											$upload_path = "./assets/media/uploads/rooms/";
											$config['upload_path'] = $upload_path;
											$config['allowed_types'] = 'jpg|png|jpeg|jfif';
											$config['max_size'] = 500;//500 kb
											$this->load->library('upload',$config);
											if($this->upload->do_upload('image2'))
											{
												//get image path
												$image_name = $this->upload->data('file_name');//with extension
												$image_raw_name = $this->upload->data('raw_name');//without extension
												$image_ext = $this->upload->data('file_ext');
												$image_path = $upload_path.$image_name;
												//generate thumbnail
												$config['image_library'] = 'gd2';
												$config['source_image'] = $image_path;
												$config['create_thumb'] = TRUE;
												$config['maintain_ratio'] = FALSE;
												$config['width'] = 330;
												$config['height'] = 186;
												$this->load->library('image_lib', $config);
												$this->image_lib->resize();
												//get thumbnail path
												$thumbnail_name = $image_raw_name."_thumb".$image_ext;
												$thumbnail_path = $upload_path.$thumbnail_name;
												$image2 = $image_path;
												$image2_thumb = $thumbnail_path;
												$proceed = "okay";
											}
											else
											{
												$proceed = "no";
											}
										}
										if(strcmp($proceed,"okay") === 0)
										{
											//check if image three set
											if($_FILES['image3']['size'] != 0)
											{
												//process image3
												$upload_path = "./assets/media/uploads/rooms/";
												$config['upload_path'] = $upload_path;
												$config['allowed_types'] = 'jpg|png|jpeg|jfif';
												$config['max_size'] = 500;//500 kb
												$this->load->library('upload',$config);
												if($this->upload->do_upload('image3'))
												{
													//get image path
													$image_name = $this->upload->data('file_name');//with extension
													$image_raw_name = $this->upload->data('raw_name');//without extension
													$image_ext = $this->upload->data('file_ext');
													$image_path = $upload_path.$image_name;
													//generate thumbnail
													$config['image_library'] = 'gd2';
													$config['source_image'] = $image_path;
													$config['create_thumb'] = TRUE;
													$config['maintain_ratio'] = FALSE;
													$config['width'] = 330;
													$config['height'] = 186;
													$this->load->library('image_lib', $config);
													$this->image_lib->resize();
													//get thumbnail path
													$thumbnail_name = $image_raw_name."_thumb".$image_ext;
													$thumbnail_path = $upload_path.$thumbnail_name;
													$image3 = $image_path;
													$image3_thumb = $thumbnail_path;
													$proceed = "okay";
												}
												else
												{
													$proceed = "no";
												}
											}
											if(strcmp($proceed,"okay") === 0)
											{
												//generate room id
												$room_id = $this->mainhandler->generate_invoice_no();
												//set defaults
												$starred = "no";
												$status = "active";
												//set available
												$available = $total;
												//get user
												if(isset($_SESSION['hores_userid']))
												{
													$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
													if(!empty($user))
													{
														//get user perm
														$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
														if(!empty($user_perm))
														{
															if($user_perm['users'] == 1)
															{
																//save room
																$this->main_model->new_room($room_id,$image1_thumb,$type,$capacity,$total,$available,$desc,$charges,$this->mainhandler->current_date(),$this->mainhandler->current_time(),$this->session->userdata('hores_userid'),$starred,$status);
																//save room images
																$this->main_model->new_room_image($room_id,$image1,$image1_thumb,$this->mainhandler->current_date(),$this->mainhandler->current_time());
																$this->main_model->new_room_image($room_id,$image2,$image2_thumb,$this->mainhandler->current_date(),$this->mainhandler->current_time());
																$this->main_model->new_room_image($room_id,$image3,$image3_thumb,$this->mainhandler->current_date(),$this->mainhandler->current_time());
																//log event
																$action = ucwords($user['username'])." added a new room:".ucwords($type);
																$this->main_model->new_user_log($this->session->userdata('hores_userid'),$action,$this->mainhandler->current_date(),$this->mainhandler->current_time(),$starred);
																$this->session->set_flashdata('add_room_success','The room details have been saved.');
																redirect($_SESSION['hores_current_link']);

															}
															else
															{
																$this->session->set_userdata('page_denied','users');
																redirect('access-denied');
															}
														}
														else
														{
															$this->session->set_userdata('page_denied','users');
															redirect('access-denied');
														}
													}
													else
													{
														$this->admin_logout();
													}
												}
												else
												{
													$this->admin_logout();
												}
											}
											elseif(strcmp($proceed,"no") === 0)
											{
												$this->session->set_flashdata('image3_invalid','Please select an image not exceeding 500Kb of type jpg,png,jpeg or jfif.');
												$this->session->set_flashdata('type_temp',$type);
												$this->session->set_flashdata('capacity_temp',$capacity);
												$this->session->set_flashdata('total_temp',$total);
												$this->session->set_flashdata('charges_temp',$charges);
												$this->session->set_flashdata('desc_temp',$desc);
												redirect($_SESSION['hores_current_link']);
											}
										}
										elseif(strcmp($proceed,"no") === 0)
										{
											$this->session->set_flashdata('image2_invalid','Please select an image not exceeding 500Kb of type jpg,png,jpeg or jfif.');
											$this->session->set_flashdata('type_temp',$type);
											$this->session->set_flashdata('capacity_temp',$capacity);
											$this->session->set_flashdata('total_temp',$total);
											$this->session->set_flashdata('charges_temp',$charges);
											$this->session->set_flashdata('desc_temp',$desc);
											redirect($_SESSION['hores_current_link']);
										}
									}
									elseif(strcmp($proceed,"no") === 0)
									{
										$this->session->set_flashdata('image1_invalid','Please select an image not exceeding 500Kb of type jpg,png,jpeg or jfif.');
										$this->session->set_flashdata('type_temp',$type);
										$this->session->set_flashdata('capacity_temp',$capacity);
										$this->session->set_flashdata('total_temp',$total);
										$this->session->set_flashdata('charges_temp',$charges);
										$this->session->set_flashdata('desc_temp',$desc);
										redirect($_SESSION['hores_current_link']);
									}
								}
								else
								{
									$this->session->set_flashdata('type_exists','The room type entered already exists.');
									$this->session->set_flashdata('type_temp',$type);
									$this->session->set_flashdata('capacity_temp',$capacity);
									$this->session->set_flashdata('total_temp',$total);
									$this->session->set_flashdata('charges_temp',$charges);
									$this->session->set_flashdata('desc_temp',$desc);
									redirect($_SESSION['hores_current_link']);
								}
							}
							else
							{
								$this->session->set_flashdata('charges_invalid','Please enter a number.');
								$this->session->set_flashdata('type_temp',$type);
								$this->session->set_flashdata('capacity_temp',$capacity);
								$this->session->set_flashdata('total_temp',$total);
								$this->session->set_flashdata('charges_temp',$charges);
								$this->session->set_flashdata('desc_temp',$desc);
								redirect($_SESSION['hores_current_link']);
							}
						}
						else
						{
							$this->session->set_flashdata('total_invalid','Please enter a number.');
							$this->session->set_flashdata('type_temp',$type);
							$this->session->set_flashdata('capacity_temp',$capacity);
							$this->session->set_flashdata('total_temp',$total);
							$this->session->set_flashdata('charges_temp',$charges);
							$this->session->set_flashdata('desc_temp',$desc);
							redirect($_SESSION['hores_current_link']);
						}
					}
					else
					{
						$this->session->set_flashdata('capacity_invalid','Please enter a number.');
						$this->session->set_flashdata('type_temp',$type);
						$this->session->set_flashdata('capacity_temp',$capacity);
						$this->session->set_flashdata('total_temp',$total);
						$this->session->set_flashdata('charges_temp',$charges);
						$this->session->set_flashdata('desc_temp',$desc);
						redirect($_SESSION['hores_current_link']);
					}
				}
			}
			else
			{
				redirect($_SESSION['hores_current_link']);
			}
		}
		else
		{
			redirect($_SESSION['hores_current_link']);
		}
	}
	public function new_user(){
		if(isset($_POST['add-user-btn']))
		{
			//get sys id
			$add_user_sys_id = $this->mainhandler->sanitize_input($this->input->post('add-user-sys-id'));
			$response = $this->mainhandler->decrypt_data($add_user_sys_id);
			if(strcmp($response,self::sys_id) === 0)
			{
				//get input
				$name = $this->mainhandler->sanitize_input($this->input->post('name'));
				$email = $this->mainhandler->sanitize_input($this->input->post('email'));
				$pass1 = $this->mainhandler->sanitize_input($this->input->post('pass1'));
				$pass2 = $this->mainhandler->sanitize_input($this->input->post('pass2'));
				//check if empty
				if(empty($name))
				{
					$this->session->set_flashdata('name_empty','Please enter name.');
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($email))
				{
					$this->session->set_flashdata('email_empty','Please enter email.');
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($pass1))
				{
					$this->session->set_flashdata('pass1_empty','Please enter password.');
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($pass2))
				{
					$this->session->set_flashdata('pass2_empty','Please confirm password.');
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(strcmp($pass1,$pass2) !== 0)
				{
					$this->session->set_flashdata('pass_mismatch','The passwords entered do not match.');
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				else
				{
					//process
					$response = $this->mainhandler->validate_name($name);
					if(strcmp($response,"valid") === 0)
					{
						$response = $this->mainhandler->validate_email($email);
						if(strcmp($response,"valid") === 0)
						{
							$response = $this->mainhandler->validate_pass($pass1);
							if(strcmp($response,"valid") === 0)
							{
								//check if email exists
								$user = $this->main_model->check_user_email($email);
								if(empty($user))
								{
									//check if profile image set
									if($_FILES['profile-image']['size'] != 0)
									{
										//process profile image
										$upload_path = "./assets/media/uploads/profile_images/";
										$config['upload_path'] = $upload_path;
										$config['allowed_types'] = 'jpg|png|jpeg|jfif';
										$config['max_size'] = 500;//500 kb
										$this->load->library('upload',$config);
										if($this->upload->do_upload('profile-image'))
										{
											//get image path
											$image_name = $this->upload->data('file_name');//with extension
											$image_raw_name = $this->upload->data('raw_name');//without extension
											$image_ext = $this->upload->data('file_ext');
											$image_path = $upload_path.$image_name;
											//generate thumbnail
											$config['image_library'] = 'gd2';
											$config['source_image'] = $image_path;
											$config['create_thumb'] = TRUE;
											$config['maintain_ratio'] = FALSE;
											$config['width'] = 330;
											$config['height'] = 186;
											$this->load->library('image_lib', $config);
											$this->image_lib->resize();
											//get thumbnail path
											$thumbnail_name = $image_raw_name."_thumb".$image_ext;
											$thumbnail_path = $upload_path.$thumbnail_name;
											$profile_image = $image_path;
											$profile_image_thumb = $thumbnail_path;
											$proceed = "okay";
										}
										else
										{
											$proceed = "no";
										}
									}
									else
									{
										//set default profile image
										$profile_image = "assets/media/profile_images/profile_image.png";
										$profile_image_thumb = $profile_image;
										$proceed = "okay";
									}
									if(strcmp($proceed,"okay") === 0)
									{
										//generate userid
										$userid = $this->mainhandler->generate_id($email);
										//encrypt password
										$enc_pass = $this->mainhandler->generate_hash($pass1);
										//generate code
										$verification_code = $this->mainhandler->generateCode();
										//set defaults
										$role = "employee";
										$login_status = "offline";
										$account_status = "active";
										$starred = "no";
										if(isset($_SESSION['hores_userid']))
										{
											$user = $this->main_model->check_userid($this->session->userdata('hores_userid'));
											if(!empty($user))
											{
												$user_perm = $this->main_model->get_user_perm($this->session->userdata('hores_userid'));
												if(!empty($user_perm))
												{
													if($user_perm['users'] == 1)
													{
														//save user
														$this->main_model->new_user($userid,$role,$profile_image,$profile_image_thumb,$name,$email,$enc_pass,$verification_code,$login_status,$account_status,$this->mainhandler->current_date(),$this->mainhandler->current_time(),$starred);
														//log event
														$action = ucwords($user['username'])." added a new user: ".ucwords($name);
														$this->main_model->new_user_log($this->session->userdata('hores_userid'),$action,$this->mainhandler->current_date(),$this->mainhandler->current_time(),$starred);
														$this->session->set_flashdata('add_user_success','The user has been saved.');
														redirect($_SESSION['hores_current_link']);
													}
													else
													{
														$this->session->set_userdata('page_denied','users');
														redirect('access-denied');
													}
												}
												else
												{
													$this->session->set_userdata('page_denied','users');
													redirect('access-denied');
												}
											}
											else
											{
												$this->admin_logout();
											}
										}
										else
										{
											$this->admin_logout();
										}
									}
									elseif(strcmp($proceed,"no") === 0)
									{
										$this->session->set_flashdata('profile_image_invalid','Please select an image not exceeding 500Kb of type jpg,png,jpeg or jfif.');
										$this->session->set_flashdata('name_temp',$name);
										$this->session->set_flashdata('email_temp',$email);
										$this->session->set_flashdata('pass1_temp',$pass1);
										$this->session->set_flashdata('pass2_temp',$pass2);
										redirect($_SESSION['hores_current_link']);
									}
								}
								else
								{
									$this->session->set_flashdata('email_exists','The email entered is associated with another user.');
									$this->session->set_flashdata('name_temp',$name);
									$this->session->set_flashdata('email_temp',$email);
									$this->session->set_flashdata('pass1_temp',$pass1);
									$this->session->set_flashdata('pass2_temp',$pass2);
									redirect($_SESSION['hores_current_link']);
								}
							}
							else
							{
								$this->session->set_flashdata('pass1_invalid','Please enter a valid password.Should have a minimum of 8 characters.Should have atleast 1 number,1 small letter,1 capital letter and 1 special symbol.');
								$this->session->set_flashdata('name_temp',$name);
								$this->session->set_flashdata('email_temp',$email);
								$this->session->set_flashdata('pass1_temp',$pass1);
								$this->session->set_flashdata('pass2_temp',$pass2);
								redirect($_SESSION['hores_current_link']);
							}
						}
						else
						{
							$this->session->set_flashdata('email_invalid','Please enter a valid email.');
							$this->session->set_flashdata('name_temp',$name);
							$this->session->set_flashdata('email_temp',$email);
							$this->session->set_flashdata('pass1_temp',$pass1);
							$this->session->set_flashdata('pass2_temp',$pass2);
							redirect($_SESSION['hores_current_link']);
						}
					}
					else
					{
						$this->session->set_flashdata('name_invalid','Please enter a valid name. Should have a minimum of 3 letters and should not start with a number.');
						$this->session->set_flashdata('name_temp',$name);
						$this->session->set_flashdata('email_temp',$email);
						$this->session->set_flashdata('pass1_temp',$pass1);
						$this->session->set_flashdata('pass2_temp',$pass2);
						redirect($_SESSION['hores_current_link']);
					}
				}
			}
			else
			{
				redirect($_SESSION['hores_current_link']);
			}
		}
		else
		{
			redirect($_SESSION['hores_current_link']);
		}
	}
	public function star_item(){
		//sanitize 
		$target_id = $this->mainhandler->sanitize_input($this->input->post('targetId'));
		$target_column = $this->mainhandler->sanitize_input($this->input->post('targetColumn'));
		$target_table = $this->mainhandler->sanitize_input($this->input->post('targetTable'));
		$starred = $this->mainhandler->sanitize_input($this->input->post('Starred'));
		//update
		$this->main_model->star_item($starred,$target_id,$target_column,$target_table);
		echo "star success";
	}
	//delete session
	public function delete_session($user){
		if(strcmp($user,self::user1) === 0)
		{
			if(isset($_SESSION['hores_client_id']))
			{
				$this->session->unset_userdata('hores_client_id');
			}
		}
		elseif(strcmp($user,self::user2) === 0)
		{
			if(isset($_SESSION['hores_userid']))
			{
				$this->session->unset_userdata('hores_userid');
			}
		}
	}
	public function new_client(){
		if(isset($_POST['register-btn']))
		{
			$register_sys_id = $this->mainhandler->sanitize_input($this->input->post('register-sys-id'));
			$response = $this->mainhandler->decrypt_data($register_sys_id);
			if(strcmp($response,self::sys_id) === 0)
			{
				//get input
				$title = $this->mainhandler->sanitize_input($this->input->post('title'));
				$name = $this->mainhandler->sanitize_input($this->input->post('name'));
				$email = $this->mainhandler->sanitize_input($this->input->post('email'));
				$phone = $this->mainhandler->sanitize_input($this->input->post('phone'));
				$pass1 = $this->mainhandler->sanitize_input($this->input->post('pass1'));
				$pass2 = $this->mainhandler->sanitize_input($this->input->post('pass2'));
				//check if empty
				if(empty($name))
				{
					$this->session->set_flashdata('name_empty','Please enter name');
					$this->session->set_flashdata('title_temp',$title);
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('phone_temp',$phone);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($email))
				{
					$this->session->set_flashdata('email_empty','Please enter email.');
					$this->session->set_flashdata('title_temp',$title);
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('phone_temp',$phone);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($phone))
				{
					$this->session->set_flashdata('phone_empty','Please enter phone.');
					$this->session->set_flashdata('title_temp',$title);
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('phone_temp',$phone);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($pass1))
				{
					$this->session->set_flashdata('pass1_empty','Please enter password.');
					$this->session->set_flashdata('title_temp',$title);
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('phone_temp',$phone);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($pass2))
				{
					$this->session->set_flashdata('pass2_empty','Please confirm password.');
					$this->session->set_flashdata('title_temp',$title);
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('phone_temp',$phone);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(strcmp($pass1,$pass2) !== 0)
				{
					$this->session->set_flashdata('pass_mismatch','The passwords entered do not match.');
					$this->session->set_flashdata('title_temp',$title);
					$this->session->set_flashdata('name_temp',$name);
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('phone_temp',$phone);
					$this->session->set_flashdata('pass1_temp',$pass1);
					$this->session->set_flashdata('pass2_temp',$pass2);
					redirect($_SESSION['hores_current_link']);
				}
				else
				{
					//process
					//check if name valid
					$response = $this->mainhandler->validate_name($name);
					if(strcmp($response,"valid") === 0)
					{
						//check if email valid
						$response = $this->mainhandler->validate_email($email);
						if(strcmp($response,"valid") === 0)
						{
							//check if phone valid
							$response = $this->mainhandler->validate_phone($phone);
							if(strcmp($response,"valid") === 0)
							{
								//check if password valid
								$response = $this->mainhandler->validate_pass($pass1);
								if(strcmp($response,"valid") === 0)
								{
									//check if email exists
									$client = $this->main_model->check_client_email($email);
									if(empty($client))
									{
										//check if phone exists
										$client = $this->main_model->check_client_phone($phone);
										if(empty($client))
										{
											//generate client id
											$client_id = $this->mainhandler->generate_id($email);
											//generate verification code
											$verification_code = $this->mainhandler->generateCode();
											//has password
											$enc_pass = $this->mainhandler->generate_hash($pass1);
											//set defaults
											$starred = "no";
											$account_status = "active";
											$login_status = "offline";
											$email_verified = "no";
											$profile_image = "assets/media/profile_images/profile_image.png";
											$profile_image_thumb = $profile_image;
											//save client details
											$this->main_model->new_client($client_id,$profile_image,$profile_image_thumb,$title,$name,$email,$phone,$enc_pass,$verification_code,$email_verified,$login_status,$account_status,$this->mainhandler->current_date(),$this->mainhandler->current_time(),$starred);
											//start session
											$this->session->set_userdata('hores_client_id',$client_id);
											redirect('client-profile');
										}
										else
										{
											$this->session->set_flashdata('phone_exists','The phone number entered is associated with another user.');
											$this->session->set_flashdata('title_temp',$title);
											$this->session->set_flashdata('name_temp',$name);
											$this->session->set_flashdata('email_temp',$email);
											$this->session->set_flashdata('phone_temp',$phone);
											$this->session->set_flashdata('pass1_temp',$pass1);
											$this->session->set_flashdata('pass2_temp',$pass2);
											redirect($_SESSION['hores_current_link']);
										}
									}
									else
									{
										$this->session->set_flashdata('email_exists','The email entered is associated with another user.');
										$this->session->set_flashdata('title_temp',$title);
										$this->session->set_flashdata('name_temp',$name);
										$this->session->set_flashdata('email_temp',$email);
										$this->session->set_flashdata('phone_temp',$phone);
										$this->session->set_flashdata('pass1_temp',$pass1);
										$this->session->set_flashdata('pass2_temp',$pass2);
										redirect($_SESSION['hores_current_link']);
									}
								}
								else
								{
									$this->session->set_flashdata('pass1_invalid','Please enter a valid password.Should have a minimum of 8 characters.Should have atleast 1 number,1 small letter,1 capital letter and 1 special symbol.');
									$this->session->set_flashdata('title_temp',$title);
									$this->session->set_flashdata('name_temp',$name);
									$this->session->set_flashdata('email_temp',$email);
									$this->session->set_flashdata('phone_temp',$phone);
									$this->session->set_flashdata('pass1_temp',$pass1);
									$this->session->set_flashdata('pass2_temp',$pass2);
									redirect($_SESSION['hores_current_link']);
								}
							}
							else
							{
								$this->session->set_flashdata('phone_invalid','Please eneter a valid phone number.Should start with the country code.eg.254********');
								$this->session->set_flashdata('title_temp',$title);
								$this->session->set_flashdata('name_temp',$name);
								$this->session->set_flashdata('email_temp',$email);
								$this->session->set_flashdata('phone_temp',$phone);
								$this->session->set_flashdata('pass1_temp',$pass1);
								$this->session->set_flashdata('pass2_temp',$pass2);
								redirect($_SESSION['hores_current_link']);
							}
						}
						else
						{
							$this->session->set_flashdata('email_invalid','Please enter a valid email.');
							$this->session->set_flashdata('title_temp',$title);
							$this->session->set_flashdata('name_temp',$name);
							$this->session->set_flashdata('email_temp',$email);
							$this->session->set_flashdata('phone_temp',$phone);
							$this->session->set_flashdata('pass1_temp',$pass1);
							$this->session->set_flashdata('pass2_temp',$pass2);
							redirect($_SESSION['hores_current_link']);
						}
					}
					else
					{
						$this->session->set_flashdata('name_invalid','Please enter a valid name. Should have a minimum of 3 letters and should not start with a number.');
						$this->session->set_flashdata('title_temp',$title);
						$this->session->set_flashdata('name_temp',$name);
						$this->session->set_flashdata('email_temp',$email);
						$this->session->set_flashdata('phone_temp',$phone);
						$this->session->set_flashdata('pass1_temp',$pass1);
						$this->session->set_flashdata('pass2_temp',$pass2);
						redirect($_SESSION['hores_current_link']);
					}
				}
			}
			else
			{
				redirect($_SESSION['hores_current_link']);
			}
		}
		else
		{
			redirect($_SESSION['hores_current_link']);
		}
	}
	public function process_login(){
		if(isset($_POST['login-btn']))
		{
			$login_sys_id = $this->mainhandler->sanitize_input($this->input->post('login-sys-id'));
			$response = $this->mainhandler->decrypt_data($login_sys_id);
			if(strcmp($response,self::sys_id) === 0)
			{
				//get input
				$email = $this->mainhandler->sanitize_input($this->input->post('email'));
				$pass = $this->mainhandler->sanitize_input($this->input->post('pass'));
				$utype_id = $this->mainhandler->sanitize_input($this->input->post('utype-id'));
				//check if empty
				if(empty($email))
				{
					$this->session->set_flashdata('email_empty','Please enter email.');
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('pass_temp',$pass);
					redirect($_SESSION['hores_current_link']);
				}
				elseif(empty($pass))
				{
					$this->session->set_flashdata('pass_empty','Please enter password.');
					$this->session->set_flashdata('email_temp',$email);
					$this->session->set_flashdata('pass_temp',$pass);
					redirect($_SESSION['hores_current_link']);
				}
				else
				{
					//check utype
					$response = $this->mainhandler->decrypt_data($utype_id);
					if(strcmp($response,self::user1) === 0)
					{
						//process client login
						//block start
						//check if valid
					$response = $this->mainhandler->validate_email($email);
					if(strcmp($response,"valid") === 0)
					{
						//check client email
						$client = $this->main_model->check_client_email($email);
						if(!empty($client))
						{
							$client_pass = $client['password'];
							if(password_verify($pass,$client_pass))
							{
								//update login status
								$login_status = "online";
								$this->main_model->update_login_status($login_status,self::user1,$client['client_id']);
								//destroy admin session
								$this->delete_session(self::user2);
								//start session
								$this->session->set_userdata('hores_client_id',$client['client_id']);
								//record login time
								$this->main_model->new_login_time($client['client_id'],$this->mainhandler->current_date(),$this->mainhandler->current_time());
								//redirect home
								redirect('home');
							}
							else
							{
								$this->session->set_flashdata('invalid_credentials','Wrong email or password.');
								$this->session->set_flashdata('email_temp',$email);
								$this->session->set_flashdata('pass_temp',$pass);
								redirect($_SESSION['hores_current_link']);
							}
						}
						else
						{
							$this->session->set_flashdata('invalid_credentials','Wrong email or password.');
							$this->session->set_flashdata('email_temp',$email);
							$this->session->set_flashdata('pass_temp',$pass);
							redirect($_SESSION['hores_current_link']);
						}
					}
					else
					{
						$this->session->set_flashdata('email_invalid','Please enter a valid email.');
						$this->session->set_flashdata('email_temp',$email);
						$this->session->set_flashdata('pass_temp',$pass);
						redirect($_SESSION['hores_current_link']);
					}
						//block end
						
					}
					elseif(strcmp($response,self::user2) === 0)
					{
						//process admin login
						//block start
						//check if email valid
						$response = $this->mainhandler->validate_email($email);
						if(strcmp($response,"valid") === 0)
						{
							//check user email
							$user = $this->main_model->check_user_email($email);
							if(!empty($user))
							{
								$user_pass = $user['password'];
								if(password_verify($pass,$user_pass))
								{
									//update login status
									$login_status = "online";
									$this->main_model->update_login_status($login_status,self::user2,$user['userid']);
									//destroy client session
									$this->delete_session(self::user1);
									//start session
									$this->session->set_userdata('hores_userid',$user['userid']);
									//record login time
									$this->main_model->new_login_time($user['userid'],$this->mainhandler->current_date(),$this->mainhandler->current_time());
									//redirect to bookings
									redirect('bookings/all/0');
								}
								else
								{
									$this->session->set_flashdata('invalid_credentials','Wrong email or password.');
									$this->session->set_flashdata('email_temp',$email);
									$this->session->set_flashdata('pass_temp',$pass);
									redirect($_SESSION['hores_current_link']);
								}
							}
							else
							{
								$this->session->set_flashdata('invalid_credentials','Wrong email or password.');
								$this->session->set_flashdata('email_temp',$email);
								$this->session->set_flashdata('pass_temp',$pass);
								redirect($_SESSION['hores_current_link']);
							}
						}
						else
						{
							$this->session->set_flashdata('email_invalid','Please enter a valid email.');
							$this->session->set_flashdata('email_temp',$email);
							$this->session->set_flashdata('pass_temp',$pass);
							redirect($_SESSION['hores_current_link']);
						}
						//block end
					}
					else
					{
						redirect($_SESSION['hores_current_link']);
					}
				}
			}
			else
			{
				redirect($_SESSION['hores_current_link']);
			}
		}
		else
		{
			redirect($_SESSION['hores_current_link']);
		}
	}
	public function process_forgot_password(){

	}
	public function process_reset_password(){

	}
	//sends specified code to target email ->code_type can be verification or recovery
	public function send_code($code_type,$recipient_email,$recipient_name,$code){
	//check code_type
	switch($code_type){
		case self::code1:
			$email_subject = "Verify Your Email";
			$url = site_url('verify-email/'.$code);
			$email_body = "
			<!doctype html>
			<html>
			<head>
			<title>".$email_subject."</title>
			<style>
			h1
			{
				font-weight:bold;
			}
			h1,p
			{
				text-align:center;
			}
			a
			{
				border-radius:4px;
				padding:10px;
				border:none;
				background:#2196F3;
				text-decoration:none;
				text-transform:capitalize;
				color:#4CAF50;
			}
			</style>
			</head>
			<body>
			<h1>Hello ".ucwords($recipient_name).",</h1>
			<br>
			<p>Please click the button below to verify your email address.</p>
			<p>
				<a href=".$url.">
					<span>verify</span>
				</a>
			</p>
			<p>Please ignore if you did not create an account or change your email address.</p>
			</body>
			</html>
			";
			break;
		case self::code2:
			$email_subject = "Reset Password";
			$url = site_url('reset-password/');
			$email_body = "
			<!doctype html>
			<html>
			<head>
			<title>".$email_subject."</title>
			<style>
			h1
			{
				font-weight:bold;
			}
			h1,p
			{
				text-align:center;
			}
			a
			{
				border-radius:4px;
				padding:10px;
				border:none;
				background:#2196F3;
				text-decoration:none;
				text-transform:capitalize;
				color:#4CAF50;
			}
			</style>
			</head>
			<body>
			<h1>Hello ".ucwords($recipient_name).",</h1>
			<br>
			<p>Please click the button below to reset your password.</p>
			<p>
				<a href=".$url.">
					<span>verify</span>
				</a>
			</p>
			<p>Please ignore if you did not make this request.</p>
			</body>
			</html>";
			break;
	}
	//send email
	$host_email = "security@mechapp.co.ke";
	$config['protocol'] = 'mail';
    $config['smtp_host'] = 'mail.mechapp.co.ke'; //to be changed depending on host
    $config['smtp_port'] = '21';
    $config['smtp_user'] = $host_email;
    $config['smtp_pass'] = 'Victor24#'; //to be changed later
    $config['mailtype'] = 'text';
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;
    $config['newline'] = "\r\n"; 
    $this->email->initialize($config);
    $this->email->from($host_email,$company_name);
	$this->email->to($recipient_name);
	$this->email->subject($email_subject);
	$this->email->message($email_body);
	if($this->email->send())
	{
		$email_response['host_email'] = $host_email;
		$email_response['email_msg'] = self::email_success_msg;
		$email_response['email_status'] = "success";
		$email_response['date_sent'] = $this->mainhandler->current_date();
		$email_response['time_sent'] = $this->mainhandler->current_time();
		$email_response['log_status'] = "unread";
		$email_response['star'] = "no";
		return $email_response;
	}
	else
	{
		$email_response['host_email'] = $host_email;
		$email_response['email_msg'] = self::email_fail_msg;
		$email_response['email_status'] = "fail";
		$email_response['date_sent'] = $this->mainhandler->current_date();
		$email_response['time_sent'] = $this->mainhandler->current_time();
		$email_response['log_status'] = "unread";
		$email_response['star'] = "no";
		return $email_response;
	}
	}
}
?>