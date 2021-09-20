<?php

namespace App\Data;

/***
 * class User dalam folder Data digunakan sebagai data Class untuk digunakan kembali
 * supaya mengurangi banyak kode berulang maka digunakan data Class.
 * sebagai pendekatan dalam metode OOP
 * 
 * Nama Tabel = User
 */
class User
{
    /***
     * nama field = id_user
     * 
     * digunakan sebagai Primary Key
     */
    public $idUser;

    /***
     * nama field = username
     */
    public $username;

    /***
     * nama field = first_name
     */
    public $firstName;

    /***
     * nama field = last_name
     */
    public $lastName;

    /***
     * nama field = email
     */
    public $email;

    /***
     * nama field = password
     * 
     * Field ini seharusnya menggunakan PASSWORD_HASH
     */
    public $password;

    /***
     * nama field = created_at
     */
    public $dateCreated;

    /***
     * nama field = updated_at
     * 
     */
    public $dateModified;

    /***
     * nama field = role_id
     * 
     * digunakan untuk menentukan role user
     */
    public $roleId;

    /***
     * nama field = is_active
     * 
     */
    public $isActive;


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
            'id_user' => $this->idUser,
            'username' => $this->username,
            'password' => $this->password,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'created_at' => $this->dateCreated,
            'updated_at' => $this->dateModified,
            'role_id' => $this->roleId,
            'is_active' => $this->isActive
        );

        return $data;
    }
}
