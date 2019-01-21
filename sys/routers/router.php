<?php
    class Router {
        private $controller_name;
        private $action_name;
        private $param_value;

        public function __construct($request_uri) {
            $this->controller_name = 'tasks';
            $this->action_name = 'index';
            $this->param_value = 'all';

            $uri_sections = explode('/', $request_uri);
            if (isset($uri_sections[1])) {
                if ($uri_sections[1] !== 'tasks' &&
                    $uri_sections[1] !== '') {
                    $this->action_name = 'notfound';
                } else {
                    if (isset($uri_sections[2])) {
                        if ($uri_sections[2] !== 'index' &&
                            $uri_sections[2] !== 'add' &&
                            $uri_sections[2] !== 'edit' &&
                            $uri_sections[2] !== 'addpost') {
                            $this->action_name = 'notfound';
                        } else {
                            $this->action_name = $uri_sections[2];
                            if (isset($uri_sections[3])) {
                                $this->param_value = $uri_sections[3];
                            }
                        }
                    }
                }
            }
        }

        public function route() {
            require_once('app/controllers/'.$this->controller_name.'.php');            
            $controller_class_name = ucfirst($this->controller_name);
            $controller = new $controller_class_name();
            
            $action_name = $this->action_name; 
            $transit_param = $this->param_value;
            $controller->$action_name($transit_param);
        }
    }