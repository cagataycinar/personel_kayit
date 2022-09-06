<?php
class Personel extends CI_Controller{  // Controller olabilmesi için calss olabilmesi gerekmektedir
    public function index(){  // index fonksiyonu olmalıdır
       // $this->load->view("personel_view");  // view dosyasını çağırmak için kullanılır
        //Personel Listesi Burada Yer Alacaktır.
        $this->load->view("personel_liste");
    }

    public function insert_form(){  // insert_form fonksiyonu olmalıdır
        //$this->load->view("personel_insert");  // view dosyasını çağırmak için kullanılır
    }

    public function insert(){

    }

    public function update_form(){

    }

    public function update(){

    }

    public function delete(){

    }

    public function order(){

    }
}