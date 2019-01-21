<?php
    require_once('sys/providers/db_provider.php');
    require_once('sys/models/user.php');
    require_once('sys/models/email.php');
    require_once('sys/models/status.php');

    class Task extends DbProvider {
        private $user;
        private $email;
        private $status;
        
        public function __construct() {
            parent::__construct();
            $user = new User();
            $email = new Email();
            $status = new Status();
        }

        public function add_task($user_id, $email_id, $content, $start_date, $fin_date, $status_id) {
            $query = "INSERT INTO tasks (user_id, email_id, content, start_date, fin_date, status_id) VALUES ($user_id, $email_id, '$content', '$start_date', '$fin_date', $status_id)";
            $this->execute_dml($query);
        }

        public function get_all_tasks() {
            $query = "SELECT * FROM tasks";
            $res_arr = $this->execute_dql($query);
            return $res_arr;
        }

        public function get_tasks_by_user($user_name) {
            $user_id = $this->user->get_id_by_name($user_name);
            $query = "SELECT * FROM tasks WHERE user_id=$user_id";
            $res_arr = $this->execute_dql($query);
            return $res_arr;
        }

        public function get_tasks_by_email($email_name) {
            $email_id = $this->email->get_id_by_email($email_name);
            $query = "SELECT * FROM tasks WHERE email_id=$email_id";
            $res_arr = $this->execute_dql($query);
            return $res_arr;
        }

        public function get_tasks_by_status($status_name) {
            $status_id = $this->status->get_id_by_name($status_name);
            $query = "SELECT * FROM tasks WHERE status_id=$status_id";
            $res_arr = $this->execute_dql($query);
            return $res_arr;
        }
    }