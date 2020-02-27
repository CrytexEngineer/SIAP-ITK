<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
Use App\Role;

class CreateRolesTable extends Migration


{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('role_name');
            $table->timestamps();
        });
        $superadmin = Role::create(['role_name' => 'Super Admin']);
        $admin = Role::create(['role_name' => 'Admin']);
        $observer = Role::create(['role_name' => 'Observer']);
        $warek = Role::create(['role_name' => 'Wakil Rektor']);
        $dikjur = Role::create(['role_name' => 'Tendik Jurusan']);
        $diksat = App\Role::create(['role_name' => 'Tendik Pusat']);
        $kaprodi = Role::create(['role_name' => 'Ketua Prodi']);
        $kajur = Role::create(['role_name' => 'Kepala Jurusan']);
        $dosen = Role::create(['role_name' => 'Dosen Pengampu']);
        $mahasiswa=Role::create(['role_name'=>'Mahasiswa']);

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
