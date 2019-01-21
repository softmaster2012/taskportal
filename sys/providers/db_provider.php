<?php
    class DbProvider {
        protected $db_conn;

        public function __construct() {
            require_once('sys/config/db_config.php');
            $this->db_conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }

        public function execute_dml($query) {
            $this->db_conn->query($query);
        }

        public function execute_dql($query) {
            $res_array = [];
            $result = $this->db_conn->query($query);
            if ($result == TRUE) {
                while ($row = $result->fetch_assoc())
                {
                    $res_array[] = $row;
                }
            }
            return $res_array;
        }
    }