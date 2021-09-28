<?php

namespace App\Controllers;

class Manage extends BaseController
{

    private $auth;

    public function __construct() {
        $this->auth = service('authorization');
    }

    public function index()
    {
        # code...
        /* $this->auth->createGroup('creator','Creator adalah actor yang bisa membuat survey dan template yang disimpan di question bank');
        $this->auth->createGroup('responden','Responden adalah actor yang mengisi survey dan mendapatkan komisi'); */
        //$this->auth->addUserToGroup(1,'creator');


        /* $this->auth->createPermission('user_free','Permission ini digunakan untuk user free.');

        $this->auth->createPermission('user_berlangganan','Permission ini digunakan untuk user yang sudah berlangganan.');

        $this->auth->createPermission('user_sekali_bayar','Permission ini digunakan untuk user sekali bayar.'); */

        //$this->auth->createGroup('fadil','contoh deskripsi');

        //$this->auth->addPermissionToGroup('manage_survey', 2);

        //$this->auth->;

        $data = [
            'title' => 'Group & Permission manager',
            'groups' => $this->auth->groups(),
            'permissions' => $this->auth->permissions(),
        ];

        //$this->prettyVarDump($data,'tes');

        return view('manage/index', $data);
    }

    public function usersInGroup($groupId)
    {
        # code...

        $data = [
            'title' => 'Users in group',
            'group' => $this->auth->group($groupId),
            'users' => $this->auth->usersInGroup($groupId)
        ];

        //$this->prettyVarDump($data, 'tes');

        return view('manage/users', $data);
    }
    
}
