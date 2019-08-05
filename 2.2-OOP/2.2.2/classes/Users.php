<?php

class Users extends JsonDataArray
{
    public $users;

    public function __construct($sort_param = null)
    {
        parent::__construct('users');
        if ($sort_param === null) {
            $this->users = $this->newQuery()->getObjs();
        } else {
            $this->users = $this->newQuery()->orderBy($sort_param)->getObjs();
        }
    }

    public function displaySortedList()
    {
        foreach ($this->users as $value) {
            echo '<h3>' . $value->name . '</h3><p>e-mail: ' . $value->email . '</p><p>rate: ' . $value->rate . '</p><hr/>';
        }
    }
} 