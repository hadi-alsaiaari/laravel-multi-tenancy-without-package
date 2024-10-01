<?php

namespace App\Console\Commands\Landlord;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SystemSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'landlord:seed {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'System seeder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $class = $this->argument('class');
        Artisan::call('db:seed' , [
            '--class' => 'Database\\Seeders\\Landlord\\'.$class,
            '--database' => 'landlord'
        ]);
        $this->info(Artisan::output());
        return Command::SUCCESS;
    }
}
