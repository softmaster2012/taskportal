<?php
    require_once('sys/models/task.php');
    require_once('sys/models/user.php');
    require_once('sys/models/email.php');
    require_once('sys/models/status.php');

    class Tasks {
        private $tpl_path;
        private $view_path;
        private $view_data;
        private $view_title;

        private $task_model;
        private $user_model;
        private $email_model;
        private $status_model;

        public function __construct() {
            $this->tpl_path = 'app/templates/base_template.php';
            $this->task_model = new Task();
            $this->user_model = new User();
            $this->email_model = new Email();
            $this->status_model = new Status();
        }

        public function index($data) {
            $this->view_path = 'app/views/index.php';
            $tasks1 = $this->task_model->get_all_tasks();
            $tasks2 = [];
            for ($i = 0; $i < count($tasks1); $i++) {
                $tasks2[$i] = [
                    'id' => $tasks1[$i]['id'],
                    'user' => $this->user_model->get_name_by_id($tasks1[$i]['user_id']),
                    'email' => $this->email_model->get_email_by_id($tasks1[$i]['email_id']),
                    'content' => $tasks1[$i]['content'],
                    'start_date' => $tasks1[$i]['start_date'],
                    'fin_date' => $tasks1[$i]['fin_date'],
                    'status' => $this->status_model->get_name_by_id($tasks1[$i]['status_id'])
                ];
            }
            $this->view_data = $tasks2;
            $this->view_title = "Главная страница";
            include_once($this->tpl_path);
        }

        public function add($data) {
            $this->view_path = 'app/views/add.php';            
            $this->view_data = $this->status_model->get_all_statuses();
            $this->view_title = "Добавление задачи";
            include_once($this->tpl_path);
        }

        public function addpost($data) {
            $this->view_path = 'app/views/addpost.php';

            $user = filter_input(INPUT_POST, 'user');
            $email = filter_input(INPUT_POST, 'email');
            $content = filter_input(INPUT_POST, 'content');

            $date = filter_input(INPUT_POST, 'sdate');
            $time = filter_input(INPUT_POST, 'stime');            
            $status_id = filter_input(INPUT_POST, 'status');

            if (!($this->user_model->check_exists($user))) {
                $this->user_model->add_user($user);                
            }
            $user_id = $this->user_model->get_id_by_name($user);

            if (!($this->email_model->check_exists($email))) {
                $this->email_model->add_email($email, $user_id);
            }
            $email_id = $this->email_model->get_id_by_email($email);

            $start_date = $date.' '.$time;
            $fin_date = NULL;
            $this->task_model->add_task($user_id, $email_id, $content, $start_date, $fin_date, $status_id);
            
            $this->view_data = "Задача успешно добавлена";
            $this->view_title = "Подтверждение добавления задачи";
            include_once($this->tpl_path);
        }

        public function edit($data) {
            $this->view_path = 'app/views/edit.php';
            $this->view_data = 'view_data: '.$data;
            $this->view_title = "Редактирование задачи";
            include_once($this->tpl_path);
        }

        public function notfound($data) {
            $this->view_path = 'app/views/notfound.php';
            include_once($this->view_path);
        }
    }