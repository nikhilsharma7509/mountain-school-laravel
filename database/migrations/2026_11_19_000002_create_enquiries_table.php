<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('parent_name');
            $table->string('student_name');
            $table->string('class_applying_for', 100);
            $table->string('mobile', 15);
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['New', 'Contacted', 'Closed'])->default('New')->index();
            $table->enum('crm_status', ['Pending', 'Sent', 'Failed'])->default('Pending')->index();
            $table->text('crm_response')->nullable();
            $table->timestamps();

            $table->index(['mobile', 'class_applying_for', 'created_at'], 'idx_duplicate_enquiry_check');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
