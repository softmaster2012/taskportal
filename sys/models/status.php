<?php
    require_once('sys/providers/db_provider.php');
    class Status extends DbProvider {

        public function __construct() {
            parent::__construct();
        }

        public function get_all_statuses() {
            $query = "SELECT * FROM statuses";
            $res_arr = $this->execute_dql($query);
            return $res_arr;
        }

        public function get_id_by_name($name) {
            $query = "SELECT * FROM statuses WHERE name='$name'";
            $res_arr = $this->execute_dql($query);
            return $res_arr[0]['id'];
        }

        public function get_name_by_id($id) {
            $query = "SELECT * FROM statuses WHERE id=$id";
            $res_arr = $this->execute_dql($query);
            return $res_arr[0]['name'];
        }
    }