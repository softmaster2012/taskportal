<?php
    require_once('sys/providers/db_provider.php');
    class Email extends DbProvider {

        public function __construct() {
            parent::__construct();
        }

        public function check_exists($email) {
            $query = "SELECT * FROM emails WHERE email='$email'";
            $res_arr = $this->execute_dql($query);
            return (count($res_arr) > 0);
        }

        public function add_email($email, $user_id) {
            $query = "INSERT INTO emails (email, user_id) VALUES ('$email', $user_id)";
            $this->execute_dml($query);
        }

        public function get_id_by_email($email) {
            $query = "SELECT * FROM emails WHERE email='$email'";
            $res_arr = $this->execute_dql($query);
            return $res_arr[0]['id'];
        }

        public function get_email_by_id($id) {
            $query = "SELECT * FROM emails WHERE id=$id";
            $res_arr = $this->execute_dql($query);
            return $res_arr[0]['email'];
        }
    }