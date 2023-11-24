<?php
class Faq{

    private $idFaq;
    private $question;
    private $answer;

    private $faqs;
    public $currentRows;

    public function setIdFaq($id)
    {
        $this->idFaq = $id;
    }
    public function setQuestion($question)
    {
        $this->idFaq = $question;
    }
    public function setAnswer($answer)
    {
        $this->idFaq = $answer;
    }

    public function getIdFaq()
    {
       return $this->idFaq;
    }
    public function getQuestion()
    {
       return $this->question;
    }
    public function getAnswer()
    {
        return $this->answer;
    }


    public function setFaqs(Conexion $conn)
    {   
        $dbh = $conn->get_conexion();        
        $sql = "SELECT fq.id_faq, fq.question, fq.answer";
        $sql .= " FROM Faq fq WHERE fq.activo = 1";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $this->faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $dbh = NULL;
        $stmt = NULL;        

    }

    public function getFaqs()
    {
        return $this->faqs;
    }

    public function getNumberOfRegisters(Conexion $conn, $filtro)
    {
        $dbh = $conn->get_conexion();
        $filtros = " WHERE id_faq LIKE :idFaq OR question LIKE :question OR answer LIKE :answer";
        $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
        $sql = "SELECT COUNT(id_faq) FROM Faq" . $filtros;
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idFaq', $filtro);
        $stmt->bindValue(':question', $filtro);
        $stmt->bindValue(':answer', $filtro);
        
        $stmt->execute();
        $this->currentRows = $stmt->fetchColumn();
        $dbh = null;
        $stmt = null;
        return $this->currentRows;
    }

    public function listar(Conexion $conn, $limite = null, $filtro  = null, $offset = null)
    {

        $dbh = $conn->get_conexion();
        // $sql = "SELECT COUNT(id_cuenta) FROM Cuentas";
        // $stmt = $dbh->prepare($sql);
        // $stmt->execute();
        // $currentRows = $stmt->fetchColumn();
        // $totalPag = ceil($currentRows);


        // Si hay limite             
        if(isset($limite))
        {
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $filtros = " WHERE id_faq LIKE :idFaq OR question LIKE :question OR answer LIKE :answer ORDER BY id_faq LIMIT :offset, :limite";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Faq" . $filtros;
            $stmt = $dbh->prepare($sql);
           
            $stmt->bindValue(':idFaq', $filtro);
            $stmt->bindValue(':question', $filtro);
            $stmt->bindValue(':answer', $filtro);
            $stmt->bindValue(':limite', $limite);
            $stmt->bindValue(':offset', $offset);

            $stmt->execute();
            $planes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;
        }

        else
        {
            $filtros = " WHERE id_faq LIKE :idFaq OR question LIKE :question OR answer LIKE :answer ORDER BY id_faq";
            $filtro = isset($filtro) ? (empty($filtro) ? '%' : ('%' . $filtro . '%')) : '%';
            $sql = "SELECT * FROM Faq" . $filtros;
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':idFaq', $filtro);
            $stmt->bindValue(':question', $filtro);
            $stmt->bindValue(':answer', $filtro);
            $stmt->execute();
            $planes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            $stmt = null;
        }

        return $planes;

    }

    public function crear(Conexion $conn, $question, $answer, $activo)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "INSERT INTO Faq (question, answer, activo) ";
        $sql .= "VALUES (:question, :answer, :activo)";
        $stmt = $dbh->prepare($sql);
       
        $stmt->bindValue(':question', $question);
        $stmt->bindValue(':answer', $answer);
        $stmt->bindValue(':activo', $activo);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }

    public function eliminar(Conexion $conn, $id)
    {
        $dbh = $conn->get_conexion();
        $sql = "DELETE FROM Faq WHERE id_faq = :idFaq";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idFaq', $id);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }

    public function actualizar(Conexion $conn, $id, $question, $answer)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "UPDATE Faq SET question = :question, answer = :answer ";
        $sql .= "WHERE id_faq = :idFaq";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idFaq', $id);
        $stmt->bindValue(':question', $question);
        $stmt->bindValue(':answer', $answer);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }

    public function activar(Conexion $conn, $id, $activo)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "UPDATE Faq SET activo = :activo WHERE id_faq = :idFaq";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idFaq', $id);
        $stmt->bindValue(':activo', $activo);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
    }


}
?>