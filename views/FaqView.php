<?php
class FaqView{
    private Faq $model;
    
    public function __construct(Faq $model)
    {
        $this->model = $model;
    }

    public function render()
    {
        require_once __DIR__ . '/' . './html/faqi.php';

    }



}
?>