<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSurveyTipePertanyaan extends Migration
{
	public function up()
	{
		//
		//
		$this->forge->addField([
			'id_type_pertanyaan'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],

			'id_survey_pertanyaan'   => [
				'type'           => 'INT',
				'constraint'     => 11
			],

			'deskripsi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '25',
			],
		]);
		$this->forge->addForeignKey('id_survey_pertanyaan', 'survey_pertanyaan', 'id_survey_pertanyaan');
		$this->forge->addPrimaryKey('id_type_pertanyaan');
		$this->forge->createTable('survey_tipe_pertanyaan');
	}

	public function down()
	{
		//
	}
}
