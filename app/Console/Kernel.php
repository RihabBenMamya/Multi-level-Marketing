<?php

namespace App\Console;

use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\HourlyUpdate::class,
        Commands\MonthlyPersonalScore::class,
        Commands\MonthlyTeamScore::class,
        Commands\MonthlyTeamBonuse::class,
        Commands\MonthlyReferralBonuse::class,
        Commands\MonthlyRankRevision::class,

    ];
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('hour:update')->everyThirtyMinutes();
        $schedule->command('month:PersonalScore')->monthly();
        $schedule->command('month:TeamScore')->monthly();
        $schedule->command('month:TeamBonuse')->monthly();
        $schedule->command('month:ReferralBonuse')->monthly();
        $schedule->command('month:RankRevision')->monthly();


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
