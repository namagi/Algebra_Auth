<?php

class User
{
    public function create($user = array()) {
        DB::getInstance()->insert('users', $user);
    }
}
