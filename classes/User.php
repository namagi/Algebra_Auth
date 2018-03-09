<?php

class User
{
    private $db;
    private $data;
    private $sessionName = 'user';
    private $isLoggedIn = false;

    public function __construct() {
        $this->db = DB::getInstance();

        if (Session::exists($this->sessionName)) {
            $user_id = Session::get($this->sessionName);

           if ($this->find($user_id)) {
               $this->isLoggedIn = true;
           } else {

           }
        }
    }

    public function create($fields = array()) {
        if (!$this->db->insert('users', $fields)) {
            throw new Exception('There was problem creating an account.');
        }
    }

    public function find($user = null) {
        if ($user) {
            $field = is_numeric($user) ? 'id' : 'username';
            $data = $this->db->get('*', 'users', array($field, '=', $user));

            if ($data->getCount()) {
                $this->data = $data->first();
                return true;
            }
        }

        return false;
    }

    public function login($username = null, $password = null) {
        $user = $this->find($username);
        var_dump($user);
        if ($user) {
            if ($this->getData()->password === Hash::make($password, $this->getData()->salt)) {
                Session::put($this->sessionName, $this->getData()->id);
                return true;
            }
        }

        return false;
    }

    public function getData() {
        return $this->data;
    }

    public function check() {
        return $this->isLoggedIn;
    }

    public function logout() {
        Session::delete($this->sessionName);
        session_destroy();
    }
}
