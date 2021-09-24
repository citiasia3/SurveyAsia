<?php

use App\Data\User;
use CodeIgniter\Model;

class SurveyUserModel extends Model
{
    //informasi tabel
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    //pencatatan waktu dan tanggal
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    //informasi field
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_user', 'username', 'email', 'password', 'first_name', 'last_name', 'role_id', 'is_active'];
    protected $validationRules = [];

    protected $builder;

    public function __construct()
    {
        $this->builder = $this->builder();
    }


    public function getAllUser()
    {
        # untuk menampilkan semua user
        return $this->builder->get();
    }


    public function getUserById(bool $singleResult, $idUser)
    {
        # code...
        return $this->doFind($singleResult, $idUser);
    }

    /**
     *  fungsi ini akan memasukkan user kedalam database
     * 
     * @param User $user berisi data user yang akan dimasukkan kedalam database
     * @return int mengembalikan user ID yang berhasil dibuat
     */
    public function insertUser(User $user)
    {
        return $this->insert($user->classToArray());
    }

    public function updateUser($idUser, User $user)
    {
        # code...
        return $this->update($idUser, $user->classToArray());
    }

    public function updateOrInsert(User $user)
    {
        # code...
        return $this->shouldUpdate($user);
    }

    public function deleteUser($id_user)
    {
        # code...
        return $this->delete($id_user);
    }

    public function getUserRole($id_user)
    {
        # code...
    }
}
