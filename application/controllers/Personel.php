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
       $this->load->view("personel_ekle"); //$this->load->view("personel_insert");  // view dosyasını çağırmak için kullanılır
    }

    public function insert()
    {

        $data = [
            "personel_ad"   => $this->input->post("personel_ad"),  # formdan gelen personel_ad değişkenini personel_ad değişkenine atadık
            "email"         => $this->input->post("email"),
            "telefon"       => $this->input->post("telefon"),
            "departman"     => $this->input->post("departman"),
            "adres"         =>  $this->input->post("adres")
        ];

        $insert = $this->personel_model->insert($data);

        if($insert){
            echo "Kayıt Başarı İle gerçekleştirildi.. <a class='btn' href='".base_url()."'>Tıklayınnız</a>";
        }
        else
        {
            echo "Hata Kayıt Gerçekleştirilemedi <a class='btn' href='".base_url()."'>Tıklayınnız</a>";
        }
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