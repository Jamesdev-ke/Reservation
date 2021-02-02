<?php
class Main_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//get hores details
	public function get_hores_details(){
		$query = $this->db->get('hores_details');
		$hores_details = $query->row_array();
		return $hores_details;
	}
	//get user perm
	public function get_user_perm($userid){
		$query = $this->db->get_where('hores_perm',array('userid'=>$userid));
		$user_perm = $query->row_array();
		return $user_perm;
	}
	//check client id
	public function check_client_id($client_id){
		$query = $this->db->get_where('hores_clients',array('client_id'=>$client_id));
		$client = $query->row_array();
		return $client;
	}
	//check userid
	public function check_userid($userid){
		$query = $this->db->get_where('hores_users',array('userid'=>$userid));
		$user = $query->row_array();
		return $user;
	}
	//get bookings
	public function get_bookings($limit,$offset,$category){
		if(strcmp($category,"all") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get('hores_bookings');
		}
		elseif(strcmp($category,"starred") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get_where('hores_bookings',array('starred'=>'yes'));
		}
		$bookings = $query->result_array();
		return $bookings;
	}
	//get total bookings
	public function get_total_bookings(){
		return $this->db->count_all('hores_bookings');
	}
	//get total starred bookings
	public function get_total_starred_bookings(){
		$query = $this->db->get_where('hores_bookings',array('starred'=>'yes'));
		$total_bookings = $query->num_rows();
		return $total_bookings;
	}
	//get clients
	public function get_clients($limit,$offset,$category){
		if(strcmp($category,"all") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get('hores_clients');
		}
		elseif(strcmp($category,"starred") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get_where('hores_clients',array('starred'=>'yes'));
		}
		$clients = $query->result_array();
		return $clients;
	}
	//get total clients
	public function get_total_clients(){
		return $this->db->count_all('hores_clients');
	}
	//get total starred clients
	public function get_total_starred_clients(){
		$query = $this->db->get_where('hores_clients',array('starred'=>'yes'));
		$total_clients = $query->num_rows();
		return $total_clients;
	}
	//get rooms
	public function get_rooms($limit,$offset,$category){
		if(strcmp($category,"all") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get('hores_rooms');
		}
		elseif(strcmp($category,"starred") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get_where('hores_rooms',array('starred'=>'yes'));
		}
		$rooms = $query->result_array();
		return $rooms;
	}
	//get total rooms
	public function get_total_rooms(){
		return $this->db->count_all('hores_rooms');
	}
	//get total starred rooms
	public function get_total_starred_rooms(){
		$query = $this->db->get_where('hores_rooms',array('starred'=>'yes'));
		$total_rooms = $query->num_rows();
		return $total_rooms;
	}
	//get users
	public function get_users($limit,$offset,$category){
		if(strcmp($category,"all") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get('hores_users');
		}
		elseif(strcmp($category,"starred") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get_where('hores_users',array('starred'=>'yes'));
		}
		elseif(strcmp($category,"active") === 0 || strcmp($category,"inactive") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get_where('hores_users',array('account_status'=>$category));
		}
		elseif(strcmp($category,"online") === 0 || strcmp($category,"offline") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get_where('hores_users',array('login_status'=>$category));
		}
		$users = $query->result_array();
		return $users;
	}
	//get total users
	public function get_total_users(){
		return $this->db->count_all('hores_users');	
	}
	//get total starred users
	public function get_total_starred_users(){
		$query = $this->db->get_where('hores_users',array('starred'=>'yes'));
		$total_users = $query->num_rows();
		return $total_users;
	}
	//get total users by account status
	public function get_total_users_by_account_status($category){
		$query = $this->db->get_where('hores_users',array('account_status'=>$category));
		$total_users = $query->num_rows();
		return $total_users;
	}
	//get total users by login status
	public function get_total_users_by_login_status($category){
		$query = $this->db->get_where('hores_users',array('login_status'=>$category));
		$total_users = $query->num_rows();
		return $total_users;
	}
	//get user logs
	public function get_user_logs($limit,$offset,$category){
		if(strcmp($category,"all") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get('hores_user_logs');
		}
		elseif(strcmp($category,"starred") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get_where('hores_user_logs',array('starred'=>'yes'));
		}
		$user_logs = $query->result_array();
		return $user_logs;
	}
	//get total user logs
	public function get_total_user_logs(){
		return $this->db->count_all('hores_user_logs');
	}
	//get total starred user logs
	public function get_total_starred_user_logs(){
		$query = $this->db->get_where('hores_user_logs',array('starred'=>'yes'));
		$total_user_logs = $query->num_rows();
		return $total_user_logs;
	}
	//check user email
	public function check_user_email($email){
		$query = $this->db->get_where('hores_users',array('email'=>$email));
		$user = $query->row_array();
		return $user;
	}
	//check client email
	public function check_client_email($email){
		$query = $this->db->get_where('hores_clients',array('email'=>$email));
		$client = $query->row_array();
		return $client;
	}
	//check client phone
	public function check_client_phone($phone){
		$query = $this->db->get_where('hores_clients',array('phone'=>$phone));
		$client = $query->row_array();
		return $client;
	}
	//update login status
	public function update_login_status($status,$user,$userid){
		$this->db->set('login_status',$status);
		if(strcmp($user,"client") === 0)
		{
			$this->db->where('client_id',$userid);
			$this->db->update('hores_clients');
		}
		elseif(strcmp($user,"admin") === 0)
		{
			$this->db->where('userid',$userid);
			$this->db->update('hores_users');
		}
	}
	//new login time
	public function new_login_time($userid,$login_date,$login_time){
		$input_data = array(
			'userid'=>$userid,
			'login_date'=>$login_date,
			'login_time'=>$login_time,
		);
		$this->db->insert('hores_login_time',$input_data);
	}
	//new logout time
	public function new_logout_time($userid,$logout_date,$logout_time){
		$input_data = array(
			'userid'=>$userid,
			'logout_date'=>$logout_date,
			'logout_time'=>$logout_time,
		);
		$this->db->insert('hores_logout_time',$input_data);
	}
	//new client
	public function new_client($client_id,$profile_image,$profile_image_thumb,$title,$name,$email,$phone,$password,$verification_code,$email_verified,$login_status,$account_status,$date_added,$time_added,$starred){
		$input_data = array(
			'client_id'=>$client_id,
			'profile_image'=>$profile_image,
			'profile_image_thumb'=>$profile_image_thumb,
			'title'=>$title,
			'name'=>$name,
			'email'=>$email,
			'phone'=>$phone,
			'password'=>$password,
			'verification_code'=>$verification_code,
			'email_verified'=>$email_verified,
			'login_status'=>$login_status,
			'account_status'=>$account_status,
			'date_added'=>$date_added,
			'time_added'=>$time_added,
			'starred'=>$starred
		);
		$this->db->insert('hores_clients',$input_data);
	}
	//star item
	public function star_item($starred,$target_id,$target_column,$target_table){
		$this->db->set('starred',$starred);
		$this->db->where($target_column,$target_id);
		$this->db->update($target_table);
	}
	//new user
	public function new_user($userid,$role,$profile_image,$profile_image_thumb,$username,$email,$password,$verification_code,$login_status,$account_status,$date_added,$time_added,$starred){
		$input_data = array(
			'userid'=>$userid,
			'role'=>$role,
			'profile_image'=>$profile_image,
			'profile_image_thumb'=>$profile_image_thumb,
			'username'=>$username,
			'email'=>$email,
			'password'=>$password,
			'verification_code'=>$verification_code,
			'login_status'=>$login_status,
			'account_status'=>$account_status,
			'date_added'=>$date_added,
			'time_added'=>$time_added,
			'starred'=>$starred
		);
		$this->db->insert('hores_users',$input_data);
	}
	//new user log
	public function new_user_log($userid,$action,$date_occured,$time_occured,$starred){
		$input_data = array(
			'userid'=>$userid,
			'action'=>$action,
			'date_occured'=>$date_occured,
			'time_occured'=>$time_occured,
			'starred'=>$starred
		);
		$this->db->insert('hores_user_logs',$input_data);
	}
	//check room type
	public function check_room_type($room_type){
		$query = $this->db->get_where('hores_rooms',array('type'=>$room_type));
		$room = $query->row_array();
		return $room;
	}
	public function new_room($room_id,$room_image_thumb,$type,$capacity,$total,$available,$description,$charges,$date_added,$time_added,$added_by,$starred,$status){
		$input_data = array(
			'room_id'=>$room_id,
			'room_image_thumb'=>$room_image_thumb,
			'type'=>$type,
			'capacity'=>$capacity,
			'total'=>$total,
			'available'=>$available,
			'description'=>$description,
			'charges'=>$charges,
			'date_added'=>$date_added,
			'time_added'=>$time_added,
			'added_by'=>$added_by,
			'starred'=>$starred,
			'status'=>$status
		);
		$this->db->insert('hores_rooms',$input_data);
	}
	public function new_room_image($room_id,$room_image,$room_image_thumb,$date_added,$time_added){
		$input_data = array(
			'room_id'=>$room_id,
			'room_image'=>$room_image,
			'room_image_thumb'=>$room_image_thumb,
			'date_added'=>$date_added,
			'time_added'=>$time_added
		);
		$this->db->insert('hores_room_images',$input_data);
	}
	public function get_client_bookings($limit,$offset,$category,$client_id){
		if(strcmp($category,"all") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get_where('hores_bookings',array('client_id'=>$client_id));
		}
		elseif(strcmp($category,"starred") === 0)
		{
			$query = $this->db->limit($limit,$offset)->order_by('id','DESC')->get_where('hores_bookings',array('starred'=>'yes','client_id'=>$client_id));
		}
		$bookings = $query->result_array();
		return $bookings;
	}
	public function get_total_client_bookings($client_id){
		$query = $this->db->get_where('hores_bookings',array('client_id'=>$client_id));
		$total_bookings = $query->num_rows();
		return $total_bookings;
	}
	public function get_total_starred_client_bookings($client_id){
		$query = $this->db->get_where('hores_bookings',array('client_id'=>$client_id,'starred'=>'yes'));
		$total_bookings = $query->num_rows();
		return $total_bookings;
	}
	//check room id
	public function check_room_id($room_id){
		$query = $this->db->get_where('hores_rooms',array('room_id'=>$room_id));
		$room = $query->row_array();
		return $room;
	}
	//check booking id
	public function check_booking_id($booking_id){
		$query = $this->db->get_where('hores_bookings',array('booking_id'=>$booking_id));
		$booking = $query->row_array();
		return $booking;
	}
	//delete booking
	public function delete_booking($booking_id){
		$this->db->delete('hores_bookings',array('booking_id'=>$booking_id));
	}
	//new booking
	public function new_booking($booking_id,$client_id,$room_id,$rooms_booked,$guests,$days,$total_charges,$payment_mode,$check_in_date,$check_in_time,$check_out_date,$check_out_time,$booking_date,$booking_time,$status,$starred){
		$input_data = array(
			'booking_id'=>$booking_id,
			'client_id'=>$client_id,
			'room_id'=>$room_id,
			'rooms_booked'=>$rooms_booked,
			'guests'=>$guests,
			'days'=>$days,
			'total_charges'=>$total_charges,
			'payment_mode'=>$payment_mode,
			'check_in_date'=>$check_in_date,
			'check_in_time'=>$check_in_time,
			'check_out_date'=>$check_out_date,
			'check_out_time'=>$check_out_time,
			'booking_date'=>$booking_date,
			'booking_time'=>$booking_time,
			'status'=>$status,
			'starred'=>$starred
		);
		$this->db->insert('hores_bookings',$input_data);
	}
	//get available active rooms
	public function get_available_active_rooms(){
		$query = $this->db->get_where('hores_rooms',array('available >'=>0,'status'=>'active'));
		$rooms = $query->result_array();
		return $rooms;
	}
	//update available rooms
	public function update_available_rooms($available,$room_id){
		$this->db->set('available',$available);
		$this->db->where('room_id',$room_id);
		$this->db->update('hores_rooms');
	}
	//get rooom images
	public function get_room_images($room_id){
		$query = $this->db->get_where('hores_room_images',array('room_id'=>$room_id));
		$room_images = $query->result_array();
		return $room_images;
	}
	//new review
	public function new_review($review_id,$room_id,$client_id,$rating,$review,$review_date,$review_time){
		$input_data = array(
			'review_id'=>$review_id,
			'room_id'=>$room_id,
			'client_id'=>$client_id,
			'rating'=>$rating,
			'review'=>$review,
			'review_date'=>$review_date,
			'review_time'=>$review_time
		);
		$this->db->insert('hores_reviews',$input_data);
	}
	//get room reviews
	public function get_room_reviews($room_id){
		$query = $this->db->limit(25)->order_by('id','DESC')->get_where('hores_reviews',array('room_id'=>$room_id));
		$room_reviews = $query->result_array();
		return $room_reviews;
	}
	//get client reviews
	public function get_client_reviews($room_id){
		$query = $this->db->limit(25)->order_by('id','DESC')->get_where('hores_reviews',array('client_id'=>$client_id));
		$client_reviews = $query->result_array();
		return $client_reviews;
	}
	//delete review
	public function delete_review($review_id){
		$this->db->delete('hores_reviews',array('review_id'=>$review_id));
	}
}
?>