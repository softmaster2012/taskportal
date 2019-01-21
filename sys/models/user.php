<?php
    require_once('sys/providers/db_provider.php');
    class User extends DbProvider {

        public function __construct() {
            parent::__construct();
        }

        public function check_exists($name) {
            $query = "SELECT * FROM users WHERE name='$name'";
            $res_arr = $this->execute_dql($query);
            return (count($res_arr) > 0);
        }

        public function get_id_by_name($name) {
            $query = "SELECT * FROM users WHERE name='$name'";
            $res_arr = $this->execute_dql($query);
            return $res_arr[0]['id'];
        }

        public function add_user($name) {
            $query = "INSERT INTO users (name) VALUES ('$name')";
            $this->execute_dml($query);
        }

        public function get_name_by_id($id) {
            $query = "SELECT * FROM users WHERE id=$id";
            $res_arr = $this->execute_dql($query);
            return $res_arr[0]['name'];
        }
    }