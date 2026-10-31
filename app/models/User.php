<?php

class User {
    private $id;
    private $fullname;
    private $email;
    private $password;
    private $role;
    private $created_at;

    public function __construct($id, $fullname, $email, $password, $role = 'admin', $created_at = null) {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->created_at = $created_at;
    }

    public function getId() { return $this->id; }
    public function getFullname() { return $this->fullname; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getRole() { return $this->role; }
    public function getCreatedAt() { return $this->created_at; }

    public function setId($id) { $this->id = $id; }
    public function setFullname($fullname) { $this->fullname = $fullname; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = $password; }
    public function setRole($role) { $this->role = $role; }
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
}
