<?php
use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = [
                      'name'                 => 'Ariful Hassan',
                      'email'                => 'arifulhasan107@gmail.com',
                      'password'             => Hash::make(123456),
                      'phone'                => '01745367286',
                      'email_verified_at'    => now()
        ];
        Admin::create($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
