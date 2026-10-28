<?php
class Subject {
    private $id;
    private $code;
    private $name;
    private $credits;

    public function __construct($id, $code, $name, $credits) {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->credits = $credits;
    }

    public function getId() { return $this->id; }
    public function getCode() { return $this->code; }
    public function getName() { return $this->name; }
    public function getCredits() { return $this->credits; }

    public function setId($id) { $this->id = $id; }
    public function setCode($code) { $this->code = $code; }
    public function setName($name) { $this->name = $name; }
    public function setCredits($credits) { $this->credits = $credits; }
}
