<?php

class User {
    private $id;
    private $student_code;
    private $fullname;
    private $email;
    private $password;
    private $class_name;
    private $role;
    private $created_at;

    public function __construct($id, $student_code, $fullname, $email, $password, $class_name = '', $role = 'student', $created_at = null) {
        $this->id = $id;
        $this->student_code = $student_code;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->class_name = $class_name;
        $this->role = $role;
        $this->created_at = $created_at;
    }

    public function getId() { return $this->id; }
    public function getStudentCode() { return $this->student_code; }
    public function getFullname() { return $this->fullname; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getClassName() { return $this->class_name; }
    public function getRole() { return $this->role; }
    public function getCreatedAt() { return $this->created_at; }

    public function setId($id) { $this->id = $id; }
    public function setStudentCode($student_code) { $this->student_code = $student_code; }
    public function setFullname($fullname) { $this->fullname = $fullname; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = $password; }
    public function setClassName($class_name) { $this->class_name = $class_name; }
    public function setRole($role) { $this->role = $role; }
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }
}
