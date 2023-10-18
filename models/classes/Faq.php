<?php
class Faq{

    private $idFaq;
    private $question;
    private $answer;

    private $faqs;

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
        $sql = "call get_faq()";
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

}
?>