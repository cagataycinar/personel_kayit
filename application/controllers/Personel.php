<?php

class Personel extends CI_Controller
{  // Controller olabilmesi için calss olabilmesi gerekmektedir

    public function __construct()
    {
        parent:: __construct();
        $this->load->model("personel_model"); // tüm metotlerın göremesi için contruruct metodunda modeli yükledik.
    }

    public function index()
    {  // index fonksiyonu olmalıdır
        $list = $this->personel_model->get_all(); // modelden gelen bütün personel listesini list değişkenine atadık
        $viewData["list"] = $list; // viewData değişkenine list değişkenini atadık
        $this->load->view("personel_liste", $viewData); // viewData değişkenini personel_liste sayfasına gönderdik
    }

    public function insert_form()
    {  // insert_form fonksiyonu olmalıdır
        $this->load->view("personel_ekle"); //$this->load->view("personel_insert");  // view dosyasını çağırmak için kullanılır
    }

    public function insert()
    {
        $data = [
            "personel_ad" => $this->input->post("personel_ad"),  # formdan gelen personel_ad değişkenini personel_ad değişkenine atadık
            "email" => $this->input->post("email"),
            "telefon" => $this->input->post("telefon"),
            "departman" => $this->input->post("departman"),
            "adres" => $this->input->post("adres"),
            "img_id" => $_FILES["img_id"]["name"],
        ];

        //"img_id"        =>  $this->input->post("img_id"),


        if ($data["personel_ad"] && $data["email"] && $data["telefon"] && $data["departman"] && $data["adres"] && $data["img_id"]) {

            $config["upload_path"] = "uploads/"; // yükleme yapılacak klasör
            $config["allowed_types"] = "jpg|png|jpg"; // yüklenecek dosya türleri

            $this->load->library("upload", $config); // yükleme kütüphanesini yükledik (yükleme yapılabilmesi için gerekli olan kütüpane)

            if ($this->upload->do_upload("img_id")) {

                $img_id = $this->upload->data("file_name"); // yükleme işlemi başarılı ise yüklenecek dosyanın adını img_id değişkenine atadık

                $data["img_id"] = $img_id; //


                $insert = $this->personel_model->insert($data); // modelden gelen insert fonksiyonuna data değişkenini gönderdik


                if ($insert) { // eğer insert işlemi başarılı ise
                    $alert = array(
                        "title" => "İşlem Başarılıdır",
                        "message" => "Ekleme işlemi başarılıdır",
                        "type" => "success"
                    );
                } else {
                    $alert = array( // eğer insert işlemi başarısız ise
                        "title" => "İşlem Başarısızdır",
                        "message" => "Ekleme işlemi Başarısızdır",
                        "type" => "danger"
                    );
                }
            } else {
                $alert = array( // eğer yükleme işlemi başarısız ise
                    "title" => "İşlem Başarısızdır",
                    "message" => "Resim Yüklenirken Bir Hata Oluştu",
                    "type" => "danger"
                );

            }
        } else {
            $alert = array( // eğer formdan gelen veriler boş ise
                "title" => "İşlem Başarısızdır",
                "message" => "Lütfen Boş Alan Bırakmayınız",
                "type" => "danger"
            );
        }
        $this->session->set_flashdata("alert", $alert); // alert değişkenini sessiona atadık
        redirect(base_url("personel")); // personel sayfasına yönlendirme işlemi
    }

    public function update_form($id)
    { // update_form fonksiyonu olmalıdır
        $where = ["id" => $id]; // id değişkenini where değişkenine atadık
        $personel = $this->personel_model->get($where); // modelden tek bir personel getirdik
        $viewData["personel"] = $personel; // viewData değişkenine personel değişkenini atadık

        $this->load->view("personel_duzenle", $viewData); // viewData değişkenini personel_duzenle sayfasına gönderdik
    }

    public function update($id)
    {

        $img = $_FILES["img_id"] ["name"];
        if ($img) {
            $config["upload_path"] = "uploads/"; // yükleme yapılacak klasör
            $config["allowed_types"] = "gif|png|jpg"; // yüklenecek dosya türleri

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("img_id");
            if ($upload) {
                $data = array(
                    "personel_ad" => $this->input->post("personel_ad"), # formdan gelen personel_ad değişkenini personel_ad değişkenine atadık
                    "email" => $this->input->post("email"), # formdan gelen email değişkenini email değişkenine atadık
                    "telefon" => $this->input->post("telefon"), # formdan gelen telefon değişkenini telefon değişkenine atadık
                    "departman" => $this->input->post("departman"), # formdan gelen departman değişkenini
                    "adres" => $this->input->post("adres"), # formdan gelen adres değişkenini adres değişkenine atadık
                    "img_id" => $this->upload->data("file_name") # formdan gelen img_id değişkenini img_id değişkenine atadık
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısızdır",
                    "message" => "Resim Yükleme İşlemi Başarısızdır",
                    "type" => "danger"
                );
                echo "resim yüklenirken bir hata oluştu";
            }

        } else {
            //resim yüklenmemiş
            $data = array(
                "personel_ad" => $this->input->post("personel_ad"), # formdan gelen personel_ad değişkenini personel_ad değişkenine atadık
                "email" => $this->input->post("email"), # formdan gelen email değişkenini email değişkenine atadık
                "telefon" => $this->input->post("telefon"), # formdan gelen telefon değişkenini telefon değişkenine atadık
                "departman" => $this->input->post("departman"), # formdan gelen departman değişkenini
                "adres" => $this->input->post("adres") # formdan gelen adres değişkenini adres değişkenine atadık
            );
        }

        $where = ["id" => $id];


        $update = $this->personel_model->update($where, $data); // modelden update fonksiyonunu çağırdık
        if ($update) {
            $alert = array(
                "title" => "İşlem Başarılıdır",
                "message" => "Güncellene Başarı İle Gerçekleştirildi",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısızdır",
                "message" => "Güncellene Gerçekleştirilemedi",
                "type" => "danger"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("personel"));
    }

    public function delete($id)
    {
        $where = array("id" => $id);
        $delete = $this->personel_model->delete($where);
        if($delete){
            $alert = array(
                "title" => "İşlem Başarılı",
                "message" => "Kayıt Başarı İle Silindi",
                "type" => "success"
            );
        }else{
            $alert = array(
                "title" => "İşlem Başarısızdır",
                "message" => "Silme İşlemi Gerçekleştirilemedi",
                "type" => "danger"
            );
        }
        $this->session->set_flashdata("alert", $alert); // alert değişkenini sessiona atadık
        redirect(base_url("personel")); // personel sayfasına yönlendirme işlemi

    }

    public function order($field = "id", $order = "ASC")
    {

        $list = $this->personel_model->order_by($field, $order);
        $viewData["list"] = $list; // viewData değişkenine list değişkenini atadık
        $this->load->view("personel_liste", $viewData); // viewData değişkenini personel_liste sayfasına gönderdik
    }

}
