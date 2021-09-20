<?php

namespace App\Data;

/***
 * folder Data digunakan sebagai data Class untuk digunakan kembali
 * supaya mengurangi banyak kode berulang sebagai pendekatan dalam metode OOP
 * 
 * Nama Tabel = Survey
 */
class Survey
{
    /***
     * nama field = id_survey
     * digunakan sebagai Primary Key
     */
    public $idSurvey;

    /***
     * nama field = judul
     */
    public $judul;

    /***
     * nama field = deskripsi
     */
    public $deskripsi;

    /***
     * nama field = jumlah_responden
     */
    public $jumlahResponden;

    /***
     * nama field = created_at
     */
    public $dateCreated;

    /***
     * nama field = updated_at
     * 
     */
    public $dateModified;

    /**
     * fungsi ini digunakan untuk mengkonversi data Class kedalam bentuk array
     * supaya bisa dicocokkan dengan nama field di database
     * */ 
    public function classToArray()
    {
        /** 
         * key = nama field 
         * value = nilai */
        $data = array(
            'id_survey' => $this->idSurvey,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'jumlah_responden' => $this->jumlahResponden,
            'created_at' => $this->dateCreated,
            'updated_at' => $this->dateModified
        );

        return $data;
    }
}
