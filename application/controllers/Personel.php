<?php
class Personel extends CI_Controller{  // Controller olabilmesi için calss olabilmesi gerekmektedir

    public function __construct(){
        parent:: __construct();
        $this->load->model("personel_model"); // tüm metotlerın göremesi için contruruct metodunda modeli yükledik.
    }
    public function index(){  // index fonksiyonu olmalıdır
        $list = $this->personel_model->get_all(); // modelden gelen bütün personel listesini list değişkenine atadık
        $viewData["list"] = $list; // viewData değişkenine list değişkenini atadık
        $this->load->view("personel_liste", $viewData); // viewData değişkenini personel_liste sayfasına gönderdik
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