public function up()
{
    Schema::table('manuals', function (Blueprint $table) {
        $table->unsignedBigInteger('views')->default(0);
    });
}

public function down()
{
    Schema::table('manuals', function (Blueprint $table) {
        $table->dropColumn('views');
    });
}
