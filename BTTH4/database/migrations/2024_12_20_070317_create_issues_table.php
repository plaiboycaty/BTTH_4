<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Mã vấn đề báo cáo
            $table->foreignId('computer_id')->constrained('computers')->onDelete('cascade'); // Mã máy tính (khóa ngoại)
            $table->string('reported_by', 50)->nullable(); // Người báo cáo (tùy chọn)
            $table->dateTime('reported_date'); // Thời gian báo cáo
            $table->text('description'); // Mô tả vấn đề
            $table->enum('urgency', ['Low', 'Medium', 'High']); // Mức độ sự cố
            $table->enum('status', ['Open', 'In Progress', 'Resolved']); // Trạng thái xử lý
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
