<?php

use App\Data\UserProfile as User;
use CodeIgniter\Model;

class UserProfileModel extends Model
{
    //informasi tabel
    protected $table = 'user_profile';
    protected $primaryKey = 'id_user_profile';

    //pencatatan waktu dan tanggal
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    //informasi field
    protected $useAutoIncrement = true;
    protected $allowedFields = ['first_name', 'last_name', 'alamat', 'nomor_hp', 'file_ktp', 'nomor_rekening', 'foto_profile'];
    protected $validationRules = [];

    protected $builder;

    public function __construct()
    {
        $this->builder = $this->builder();
    }


    public function getProfileByUserId($idUser)
    {
        # code...
        return $this->doFind(true, $idUser);
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
}
