<?php
class Student {
    private $id;
    private $student_code;
    private $full_name;
    private $email;
    private $phone;
    private $class_name;
    private $date_of_birth;
    private $gender;

    public function __construct($id, $student_code, $full_name, $email, $phone, $class_name, $date_of_birth, $gender) {
        $this->id = $id;
        $this->student_code = $student_code;
        $this->full_name = $full_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->class_name = $class_name;
        $this->date_of_birth = $date_of_birth;
        $this->gender = $gender;
    }

    public function getId() { return $this->id; }
    public function getStudentCode() { return $this->student_code; }
    public function getFullName() { return $this->full_name; }
    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
    public function getClassName() { return $this->class_name; }
    public function getDateOfBirth() { return $this->date_of_birth; }
    public function getGender() { return $this->gender; }

    public function setId($id) { $this->id = $id; }
    public function setStudentCode($student_code) { $this->student_code = $student_code; }
    public function setFullName($full_name) { $this->full_name = $full_name; }
    public function setEmail($email) { $this->email = $email; }
    public function setPhone($phone) { $this->phone = $phone; }
    public function setClassName($class_name) { $this->class_name = $class_name; }
    public function setDateOfBirth($date_of_birth) { $this->date_of_birth = $date_of_birth; }
    public function setGender($gender) { $this->gender = $gender; }
}
