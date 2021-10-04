<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnIsActiveSurvey extends Migration
{
	public function up()
	{
		$this->forge->addColumn('survey', [
			'is_active' => [
				'type'		 => 'INT',
				'constraint' => 1,
			]
		]);
	}

	public function down()
	{
		$this->forge->dropColumn('survey', 'is_active');
	}
}
