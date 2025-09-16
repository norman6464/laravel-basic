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
        // 外部キーとしてvendor_codeカラムを追加をする
        Schema::table('products', function (Blueprint $table) {
            // vendor_codeカラムを設定する
            $table->integer('vendor_code')->nullable();
            // vendor_codeカラムに外部キー制約を付与する（参照先はvendorsテーブルのvendor_codeカラムにする）
            $table->foreign('vendor_code')->references('vendor_code')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     */
    
    // こっちのdownメソッド自体はロールバッ時などに対して実行されるメソッド
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // ロールバック時にvendor_codeかラムの外部キー制約を削除する
            $table->dropForeign(['vendor_code']);
            // ロールバック時にvendor_codeカラムを削除する
            $table->dropColumn('vendor_code');
            
        });
    }
};
