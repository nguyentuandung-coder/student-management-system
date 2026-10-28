
<?php
require_once APP_ROOT . '/app/models/Grade.php';

class GradeService
{

    public function getAllGrades()
    {
        $grades = [];
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                // Tu dong tao bang diem neu chua co
                $createTableSql = "CREATE TABLE IF NOT EXISTS grades (
                    id INT PRIMARY KEY AUTO_INCREMENT,
                    student_id INT NOT NULL,
                    subject_id INT NOT NULL,
                    score DECIMAL(4,2) NOT NULL,
                    FOREIGN KEY (student_id) REFERENCES students(id),
                    FOREIGN KEY (subject_id) REFERENCES subjects(id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

                $conn->exec($createTableSql);

                // Lay danh sach diem
                $sql = "SELECT * FROM grades ORDER BY id ASC";
                $stmt = $conn->query($sql);

                if ($stmt) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $grade = new Grade(
                            $row['id'],
                            $row['student_id'],
                            $row['subject_id'],
                            $row['score']
                        );

                        $grades[] = $grade;
                    }
                }
            }
        }

        return $grades;
    }

    public function getAllGrade()
    {
        return $this->getAllGrades();
    }

    public function getGradeById($id)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "SELECT * FROM grades WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->execute(['id' => $id]);

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    return new Grade(
                        $row['id'],
                        $row['student_id'],
                        $row['subject_id'],
                        $row['score']
                    );
                }
            }
        }

        return null;
    }

    public function addGrade(Grade $grade)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "INSERT INTO grades (student_id, subject_id, score)
                        VALUES (:student_id, :subject_id, :score)";

                $stmt = $conn->prepare($sql);

                $stmt->execute([
                    'student_id' => $grade->getStudentId(),
                    'subject_id' => $grade->getSubjectId(),
                    'score' => $grade->getScore()
                ]);
            }
        }
    }

    public function updateGrade(Grade $grade)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "UPDATE grades
                        SET student_id = :student_id,
                            subject_id = :subject_id,
                            score = :score
                        WHERE id = :id";

                $stmt = $conn->prepare($sql);

                $stmt->execute([
                    'student_id' => $grade->getStudentId(),
                    'subject_id' => $grade->getSubjectId(),
                    'score' => $grade->getScore(),
                    'id' => $grade->getId()
                ]);
            }
        }
    }

    public function deleteGrade($id)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "DELETE FROM grades WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->execute(['id' => $id]);
            }
        }
    }
}
