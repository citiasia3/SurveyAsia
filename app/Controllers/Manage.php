<?php

namespace App\Controllers;

class Manage extends BaseController
{

    private $auth;

    public function __construct()
    {
        $this->auth = service('authorization');
    }

    public function index()
    {
        # code...
        // $this->auth->createGroup('creator', 'Creator adalah actor yang bisa membuat survey dan template yang disimpan di question bank');
        // $this->auth->createGroup('responden', 'Responden adalah actor yang mengisi survey dan mendapatkan komisi');
        // $this->auth->addUserToGroup(1, 'responden');

        // $this->auth->createPermission('isi_survey', 'Memperbolehkan user untuk mengisi survey.');

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
    public function save()
    {
        $request = \Config\Services::request();
        $group_name = $request->getPost('group_name');
        $description = $request->getPost('description');
        $this->auth->createGroup($group_name, $description);
        return redirect()->to(base_url('manage'));
    }

    public function delete($id)
    {
        $this->auth->deleteGroup($id);
        return redirect()->to(base_url('manage'));
    }
    public function update()
    {
        $request = \Config\Services::request();
        $id = $request->getPost('id');
        $group_name = $request->getPost('group_name');
        $description = $request->getPost('description');
        $this->auth->updateGroup($id, $group_name, $description);
        return redirect()->to(base_url('manage'));
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
