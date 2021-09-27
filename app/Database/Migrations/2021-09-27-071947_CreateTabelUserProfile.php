<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTabelUserProfile extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id_user_profile'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'first_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '15',
				'null'           => true,
			],
			'last_name'       => [
				'type'              => 'VARCHAR',
				'constraint'        => '15',
				'null'           => true,
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
				'null'           => true,
			],
			'nomor_hp' => [
				'type'           => 'VARCHAR',
				'constraint'     => '13',
				'null'           => true,
			],
			'file_ktp' => [
				'type'           => 'VARCHAR',
				'constraint'	 => '100',
				'null'           => true,
			],
			'nomor_rekening' => [
				'type'           => 'VARCHAR',
				'constraint'	 => '16',
				'null'           => true,
			],
			'foto_profile'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
				'null'           => true,
			],
		]);
		$this->forge->addPrimaryKey('id_user_profile');
		$this->forge->createTable('user_profile');
	}

	public function down()
	{
		//
		$this->forge->dropTable('user_profile');
	}
}
