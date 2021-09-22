<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Survey extends Migration
{
	public function up()
	{
		// $this->forge->addField([
		// 	'id_survey'          => [
		// 		'type'           => 'INT',
		// 		'constraint'     => 11,
		// 		'unsigned'       => true,
		// 		'auto_increment' => true,
		// 	],
		// 	'judul'       => [
		// 		'type'           => 'VARCHAR',
		// 		'constraint'     => '255',
		// 	],
		// 	'deskripsi'       => [
		// 		'type'              => 'TEXT',
		// 		'constraint'        => '',
		// 	],
		// 	'jumlah_responden' => [
		// 		'type'           => 'INT',
		// 		'constraint'     => '100',
		// 	],
		// 	'created_at' => [
		// 		'type'           => 'DATETIME',
		// 		'null'           => true,
		// 	],
		// 	'updated_at' => [
		// 		'type'           => 'DATETIME',
		// 		'null'           => true,
		// 	]
		// ]);
		// $this->forge->addPrimaryKey('id_survey');
		// $this->forge->createTable('survey');
	}

	public function down()
	{
		$this->forge->dropTable('survey');
	}
}
