<?PHP

require_once APP_ROOT . '/app/models/Student.php';

class StudentService{

    //Ham goi lay du lieu cac sinh vien
    public function getAllStudents(){
        $students = [];
        $dbConnection = new DBConnection();

        if ($dbConnection != null){

            $conn = $dbConnection->getConnection();

            if ($conn != null){
                $sql = "SELECT * FROM students";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch()){
                    $student = new Student($row['id'], $row['student_code'], $row['full_name'], $row['email'], $row['phone'], $row['class_name'], $row['date_of_birth'], $row['gender']);
                    $students[] = $student;
                }
                return $students;
            }
        }
    }

    //Ham them sinh vien 
    public function addStudent(Student $student){
        $dbConnection = new DBConnection();

        if ($dbConnection != null){
            $conn = $dbConnection->getConnection();

            if ($conn != null){
                $student_code = $student->getStudentCode();
                $full_name = $student->getFullName();
                $email = $student->getEmail();
                $phone = $student->getPhone();
                $class_name = $student->getClassName();
                $date_of_birth = $student->getDateOfBirth();
                $gender = $student->getGender();
                $sql = "INSERT INTO students (student_code, full_name, email, phone, class_name, date_of_birth, gender) VALUES ('$student_code','$full_name','$email','$phone','$class_name','$date_of_birth','$gender')";
                $conn->exec($sql);
            }
        }
    }

    //Ham goi du lieu sinh vien theo ID
    public function getStudentById($id){
        $dbConnection = new DBConnection();

        if ($dbConnection != null){
            $conn = $dbConnection->getConnection();

            if ($conn != null){
                $sql = "SELECT * FROM students WHERE id = '$id'";
                $stmt = $conn->query($sql);
                if ($stmt->rowCount() > 0){
                    $row = $stmt->fetch();
                    $student = new Student($row['id'], $row['student_code'], $row['full_name'], $row['email'], $row['phone'], $row['class_name'], $row['date_of_birth'], $row['gender']);
                    return $student;
                }
            }
        }
    }

    //Ham cap nhat  sinh vien

    public function updateStudent(Student $student){
        $dbConnection = new DBConnection();

        if ($dbConnection != null){
            $conn = $dbConnection->getConnection();

            if ($conn != null){
                $id = $student->getId();
                $student_code = $student->getStudentCode();
                $full_name = $student->getFullName();
                $email = $student->getEmail();
                $phone = $student->getPhone();
                $class_name = $student->getClassName();
                $date_of_birth = $student->getDateOfBirth();
                $gender = $student->getGender();
                $sql = "UPDATE students SET student_code = '$student_code', full_name = '$full_name', email = '$email', phone = '$phone', class_name = '$class_name', date_of_birth = '$date_of_birth', gender = '$gender' WHERE id = '$id'";
                $conn->exec($sql);
            }
        }
    }

    //Ham xoa sinh vien
    public function deleteStudent(Student $student){
        $dbConnection = new DBConnection();

        if ($dbConnection != null){
            $conn = $dbConnection->getConnection();

            if ($conn != null){
                $id = $student->getId();
                $sql = "DELETE FROM students WHERE id = '$id'";
                $conn->exec($sql);
            }
        }
    }

}

?>
