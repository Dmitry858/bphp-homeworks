<?php

class User extends DataRecordModel
{
    public $name;
    public $email;
    public $password;
    public $rate;

    public function addUserFromForm($data_arr)
    {
        $this->name = $data_arr['name'];
        $this->email = $data_arr['email'];
        $this->password = $data_arr['password'];
        $this->rate = $data_arr['rate'];
    }
}