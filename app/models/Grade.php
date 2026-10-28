<?php
class Grade
{
    private $id;
    private $student_id;
    private $subject_id;
    private $score;

    public function __construct($id, $student_id, $subject_id, $score)
    {
        $this->id = $id;
        $this->student_id = $student_id;
        $this->subject_id = $subject_id;
        $this->score = $score;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getStudentId()
    {
        return $this->student_id;
    }
    public function getSubjectId()
    {
        return $this->subject_id;
    }
    public function getScore()
    {
        return $this->score;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;
    }
    public function setSubjectId($subject_id)
    {
        $this->subject_id = $subject_id;
    }
    public function setScore($score)
    {
        $this->score = $score;
    }
}
