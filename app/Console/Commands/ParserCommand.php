<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\VkController;

class ParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $vkController;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(VkController $vkController)
    {
        parent::__construct();
        $this->vkController = $vkController;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->vkController->getVkFeed();
    }
}
