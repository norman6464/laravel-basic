<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        // もう一度データベース（モデルの操作）の手順
        // 1.php artisan make:migration マイグレーションファイル名 --create=テーブル名
        // 2.マイグレーションファイルのup()内に自分が作成したいカラムを設定する
        // 3.php artisan migrateコマンドでマイグレーションをし、テーブルを作成
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            // unique制約は重複を許さない
            $table->integer('vendor_code')->unique();
            $table->string('vendor_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
