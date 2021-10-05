<?php

namespace App\Data;

/***
 * class User Profile dalam folder Data yaitu data Class untuk digunakan kembali
 * supaya mengurangi banyak kode berulang maka digunakan data Class.
 * sebagai pendekatan dalam metode OOP
 * 
 * Nama Tabel = User Profile
 */
class UserProfile
{
    /***
     * nama field = id_user_profile
     * 
     * digunakan sebagai Primary Key
     */
    public $idUserProfile;

    /***
     * nama field = first_name
     */
    public $firstName;

    /***
     * nama field = last_name
     */
    public $lastName;

    /***
     * nama field = alamat
     */
    public $alamat;

    /***
     * nama field = nomor_hp
     */
    public $nomorHp;

    /***
     * nama field = created_at
     */
    //public $dateCreated;

    /***
     * nama field = updated_at
     * 
     */
    //public $dateModified;

    /***
     * nama field = file_ktp
     */
    public $fileKtp;

    /***
     * nama field = file_ktp
     */
    public $fotoProfile;

    /***
     * nama field = file_ktp
     */
    public $nomorRekening;


    public function getFullName()
    {
        /***
         * fungsi untuk menggabungkan firstName dan lastName
         * jika salah satu variabel kosong maka akan mengembalikan username
         */

        if ($this->firstName == null || $this->lastName == null) {
            return $this->username;
        }

        $fullName = $this->firstName . ' ' . $this->lastName;

        return $fullName;
    }


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
            'id_user_profile' => $this->idUserProfile,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            /* 'created_at' => $this->dateCreated,
            'updated_at' => $this->dateModified, */
            'alamat' => $this->alamat,
            'nomor_hp' => $this->nomorHp,
            'file_ktp' => $this->fileKtp,
            'nomor_rekening' => $this->nomorRekening,
            'foto_profile' => $this->fotoProfile,
        );

        return $data;
    }
}
