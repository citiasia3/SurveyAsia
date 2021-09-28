<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IdCreator extends Migration
{
	public function up()
	{
		$this->forge->addColumn('survey', [
			'id_creator' => [
				'type'		 => 'INT',
				'constraint' => 11,
			]
		]);
	}

	public function down()
	{
		$this->forge->dropColumn('survey', 'id_creator');
	}
}
