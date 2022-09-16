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
            "adres"         => $this->input->post("adres"),
            "img_id"        => $_FILES["img_id"]["name"],
        ];

//        "img_id"        =>  $this->input->post("img_id"),


        if($data["personel_ad"] && $data["email"] && $data["telefon"] && $data["departman"] && $data["adres"] && $data["img_id"]){

            $config["upload_path"] = "uploads/"; // yükleme yapılacak klasör
            $config["allowed_types"] = "jpg|png|jpg"; // yüklenecek dosya türleri

            $this->load->library("upload",$config); // yükleme kütüphanesini yükledik (yükleme yapılabilmesi için gerekli olan kütüpane)

            if ($this->upload->do_upload("img_id")){

                $img_id = $this->upload->data("file_name"); // yükleme işlemi başarılı ise yüklenecek dosyanın adını img_id değişkenine atadık

                $data["img_id"] = $img_id; //


                $insert = $this->personel_model->insert($data); // modelden gelen insert fonksiyonuna data değişkenini gönderdik

                if($insert){
                    echo "Kayıt Başarı İle gerçekleştirildi.. <a class='btn' href='".base_url()."'>Tıklayınnız</a>";
                }
                else
                {
                    echo "Hata Kayıt Gerçekleştirilemedi <a class='btn' href='".base_url()."'>Tıklayınnız</a>";
                }

            }else{
                echo "resim yüklenirken bir hata oluştu";
            }
        }
        else{
            echo "Lütfen Tüm Alanları Doldurunuz <a class='btn' href='".base_url()."'>Tıklayınnız</a>";
        }


    }

    public function update_form($id){ // update_form fonksiyonu olmalıdır
        $where = ["id" => $id]; // id değişkenini where değişkenine atadık
        $personel = $this->personel_model->get($where); // modelden tek bir personel getirdik
        $viewData["personel"] = $personel; // viewData değişkenine personel değişkenini atadık

        $this->load->view("personel_duzenle", $viewData); // viewData değişkenini personel_duzenle sayfasına gönderdik
    }

    public function update($id){
        $where = ["id" => $id];

        $data =array(
            "personel_ad" => $this->input->post("personel_ad"), # formdan gelen personel_ad değişkenini personel_ad değişkenine atadık
            "email" => $this->input->post("email"), # formdan gelen email değişkenini email değişkenine atadık
            "telefon" => $this->input->post("telefon"), # formdan gelen telefon değişkenini telefon değişkenine atadık
            "departman" => $this->input->post("departman"), # formdan gelen departman değişkenini
            "adres" => $this->input->post("adres") # formdan gelen adres değişkenini adres değişkenine atadık
        );

        $update = $this->personel_model->update($where,$data); // modelden update fonksiyonunu çağırdık
        if($update){
            echo "Güncelleme Başarı İle gerçekleştirildi.. <a class='btn' href='".base_url()."'>Tıklayınnız</a>";
        }
        else
        {
            echo "Hata Güncelleme Gerçekleştirilemedi <a class='btn' href='".base_url()."'>Tıklayınnız</a>";
        }
    }

    public function delete($id){
        $where = array("id" => $id);
        $this->personel_model->delete($where);
        redirect(base_url());

    }

    public function order($field = "id", $order = "ASC"){

        $list = $this->personel_model->order_by($field, $order);
        $viewData["list"] = $list; // viewData değişkenine list değişkenini atadık
        $this->load->view("personel_liste", $viewData); // viewData değişkenini personel_liste sayfasına gönderdik
    }
}