<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\OPD;

class CleanUnusedLogos extends Command
{
    protected $signature = "logos:clean";
    protected $description = "Hapus file logo di public/logos yang tidak digunakan oleh data OPD manapun";

    public function handle() {
        $usedLogos = OPD::whereNotNull('logo')->pluck('logo')->filter()->map(function ($path) {
            return realpath(public_path($path));
        })->filter()->toArray();

        $logoFiles = File::files(public_path('logos'));
        $deleted = 0;

        foreach ($logoFiles as $file) {
            if (!in_array($file->getRealPath(), $usedLogos)) {
                File::delete($file->getRealPath());
                $this->info("Deleted: " . $file->getFilename());
                $deleted++;
            }
        }

        $this->info("Selesai. Total file dihapus: $deleted");
    }
}
