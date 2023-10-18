<?php


class FaqController{

    private Faq $modelo;
    

    public function __construct(Faq $modelo)
    {
        $this->modelo = $modelo;
    }

    public function setFaqs(Conexion $conn)
    {        
        $this->modelo->setFaqs($conn);
    }

}
?>