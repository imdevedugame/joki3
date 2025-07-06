<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBuktiToPemesananHomestay extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pemesanan_homestay', [
            'file_bukti' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'status'
            ],
            'tanggal_upload' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'after'   => 'file_bukti'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('pemesanan_homestay', ['file_bukti', 'tanggal_upload']);
    }
}
