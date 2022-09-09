<?php
class Personel_model extends CI_Model{
    public function get_all(){ // bütün personel listesini getirecek olan methot
        $result = $this->db->get("personel")->result(); // personel tablosundaki bütün kayıtları getirir
        return $result; // sonucu döndürür. result değişkenine sounucu döndürdük
    }

    public function get($where){ // tek bir personel getirecek olan method (update işlemi gibi durumlarda tek kayıt getirmesi için kullanılır.)
        $result = $this->db->where($where)->get("personel")->row(); // personel tablosundaki tek kayıt getirir
        return $result;
    }

    public function insert($data){ //Eklleme işlemi için kullanılacak metot
        $insert = $this->db->insert("personel", $data); // personel tablosuna data değişkenini ekler, işlem sonucu insert değişkenine aktarıldı ve döndürüldü
        return $insert; // sonucu döndürür. insert değişkenine sounucu döndürdük
    }

    public function update($where, $data){// update işlemi için kullanılacak metot

        $update = $this->db->where($where)->update("personel",$data); // personel tablosundaki data değişkenini günceller, işlem sonucu update değişkenine aktarıldı ve döndürüldü

        return $update; // sonucu döndürür. update değişkenine sounucu döndürdük
    }

    public function delete($where){ // silme işlemi için kullanılacak methot
        $delete = $this->db->where($where)->delete("personel"); // personel tablosundaki kaydı siler, işlem sonucu delete değişkenine aktarıldı ve döndürüldü
        return $delete; // sonucu döndürür. delete değişkenine sounucu döndürdük
    }

    public function order_by(){ // sıralama için kullanılacak metehot

    }
}