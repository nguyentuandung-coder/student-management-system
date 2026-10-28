<?PHP

    require_once APP_ROOT . '/app/services/StudentService.php';

    class StudentController{

        // HIEN FORM THEM SINH VIen
        public function add(){
            include_once APP_ROOT . '/app/views/student/add.php';
        }

        //Luu sinh vien 
        public function store(){
            $student_code  = $_POST['student_code'];
            $full_name     = $_POST['full_name'];
            $email         = $_POST['email'];
            $phone         = $_POST['phone'];
            $class_name    = $_POST['class_name'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender        = $_POST['gender'];

            $student = new Student(null, $student_code, $full_name, $email, $phone, $class_name, $date_of_birth, $gender);

            $studentService = new StudentService();
            $studentService->addStudent($student);

            header('Location: ?controller=home');
        }

        // Sua sinh vien
        public function edit($id){
            if(isset($id)){
                $studentService = new StudentService();
                $student = $studentService->getStudentById($id);

                include APP_ROOT . '/app/views/student/edit.php';
            }
            else{
                echo 'Id is null';
            }
        }

        //Cap nhat sinh vien
        public function update($id){
            $student_code  = $_POST['student_code'];
            $full_name     = $_POST['full_name'];
            $email         = $_POST['email'];
            $phone         = $_POST['phone'];
            $class_name    = $_POST['class_name'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender        = $_POST['gender'];

            $student_new = new Student($id, $student_code, $full_name, $email, $phone, $class_name, $date_of_birth, $gender);

            $studentService = new StudentService();
            $studentService->updateStudent($student_new);

            header('Location: ?controller=home');
        }

        //Xoa sinh vien
        public function destroy($id){
            $studentService = new StudentService();
            $student = $studentService->getStudentById($id);
            $studentService->deleteStudent($student);

            header('Location: ?controller=home');
        }

        // Hien trang xac nhan xoa
        public function delete($id){
            if(isset($id)){
                $studentService = new StudentService();
                $student = $studentService->getStudentById($id);

                include APP_ROOT . '/app/views/student/delete.php';
            }
            else{
                echo 'Id is null';
            }
        }

    }

?>
