<?php
class Personel_model extends CI_Model{
    public function get_all(){ // bütün personel listesini getirecek olan methot
        $result = $this->db->get("personel")->result(); // personel tablosundaki bütün kayıtları getirir
        return $result; // sonucu döndürür. result değişkenine sounucu döndürdük
    }

    public function get(){ // tek bir personel getirecek olan method (update işlemi gibi durumlarda tek kayıt getirmesi için kullanılır.)

    }

    public function insert(){ //Eklleme işlemi için kullanılacak metot

    }

    public function update(){// update işlemi için kullanılacak metot

    }

    public function delete(){ // silme işlemi için kullanılacak methot

    }

    public function order_by(){ // sıralama için kullanılacak metehot

    }
}