<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUsersTabel extends Migration
{
	public function up()
	{
		//

		$this->forge->addColumn('users',[
			'id_user_profile INT(11) UNIQUE' 
		]);

		$this->forge->addForeignKey('id_user_profile','user_profile','id_user_profile');
	}

	public function down()
	{
		//
	}
}
