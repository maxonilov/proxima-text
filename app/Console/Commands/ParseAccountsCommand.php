<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\Entity\AccountEntity;
use App\Services\ParseAccountService;
use Illuminate\Console\Command;

class ParseAccountsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new ParseAccountService())->map(function (AccountEntity $accountEntity) {
            User::query()->updateOrCreate([
                'name' => $accountEntity->getName()
            ], [
                'image'     => $accountEntity->getImage(),
                'followers' => $accountEntity->getFollowers(),
            ]);
        });

        return 0;
    }
}
