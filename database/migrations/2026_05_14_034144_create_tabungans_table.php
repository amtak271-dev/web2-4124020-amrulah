public function up(): void
{
    Schema::create('tabungans', function (Blueprint $table) {
        $table->id();

        // Relasi ke santri
        $table->foreignId('santri_id')
              ->constrained('santris')
              ->cascadeOnDelete();

        // Jenis transaksi
        $table->enum('tipe', ['setor', 'tarik']);

        // Nominal transaksi
        $table->integer('jumlah');

        // Keterangan opsional
        $table->string('keterangan')->nullable();

        $table->timestamps();
    });
}