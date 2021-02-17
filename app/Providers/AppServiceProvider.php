<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('uang', function ($nominal) {
            return "Rp. <?php echo number_format($nominal, 2, ',', '.'); ?>";
        });
        Blade::directive('nominal', function ($nominal) {
            return "<?php echo number_format($nominal, 2, ',', '.'); ?>";
        });
    }
}
