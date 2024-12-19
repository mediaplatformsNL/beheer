<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class UninstallPlugin extends Command
{
    protected $signature = 'uninstall:plugin {name}';
    protected $description = 'Deïnstalleer een plugin door service providers te verwijderen, configuraties bij te werken en migraties terug te draaien.';

    public function handle()
    {
        $pluginName = $this->argument('name');
        $pluginPath = base_path("plugins/{$pluginName}");

        if (!File::exists($pluginPath)) {
            $this->error("Plugin {$pluginName} bestaat niet.");
            return;
        }

        $this->unregisterServiceProvider($pluginName);
        $this->rollbackMigrations($pluginName, $pluginPath);
        $this->unregisterInConfig($pluginName);

        // Reset API configuratie
        $this->resetApiConfig($pluginName, $pluginPath);

        // Leeg de configuratiecache
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        $this->info("Configuratiecache geleegd.");
    }

    protected function unregisterServiceProvider($pluginName)
    {
        $providerClass = "plugins\\{$pluginName}\\{$pluginName}ServiceProvider";
        $appServiceProviderPath = app_path('Providers/AppServiceProvider.php');

        if (!File::exists($appServiceProviderPath)) {
            $this->error("AppServiceProvider.php bestaat niet.");
            return;
        }

        $content = File::get($appServiceProviderPath);

        // Verwijder de registratie van de provider
        $pattern = "\$this->app->register(\Plugins\\{$pluginName}\\{$pluginName}ServiceProvider::class);";
        $updatedContent = str_replace($pattern, '', $content);

        if ($updatedContent !== $content) {
            File::put($appServiceProviderPath, $updatedContent);
            $this->info("ServiceProvider {$providerClass} succesvol verwijderd.");
        } else {
            $this->warn("ServiceProvider {$providerClass} was niet geregistreerd.");
        }
    }

    protected function rollbackMigrations($pluginName, $pluginPath)
    {
        $migrationPath = "{$pluginPath}/migrations";

        if (File::exists($migrationPath)) {
            Artisan::call('migrate:rollback', ['--path' => "plugins/{$pluginName}/migrations"]);
            $this->info("Migraties teruggedraaid voor {$pluginName}");
        } else {
            $this->warn("Geen migraties gevonden voor {$pluginName}");
        }
    }

    protected function unregisterInConfig($pluginName)
    {
        $configPath = config_path('plugins.php');

        if (!File::exists($configPath)) {
            $this->error("Configbestand plugins.php bestaat niet.");
            return;
        }

        $config = File::get($configPath);

        // Verwijder de plugin uit de 'enabled' array
        $pattern = "/\n\s*'{$pluginName}' => true,\n/";
        $updatedConfig = preg_replace($pattern, '', $config);

        if ($updatedConfig !== $config) {
            File::put($configPath, $updatedConfig);
            $this->info("Plugin {$pluginName} verwijderd uit plugins.php.");
        } else {
            $this->warn("Plugin {$pluginName} was niet geregistreerd in plugins.php.");
        }
    }

    protected function resetApiConfig($pluginName, $pluginPath)
    {
        $configPath = "{$pluginPath}/config.php";

        if (!File::exists($configPath)) {
            $this->error("Configbestand voor plugin {$pluginName} bestaat niet.");
            return;
        }

        $configContent = File::get($configPath);

        // Vervang de 'has_api' en 'api_key' waarden
        $newConfigContent = preg_replace(
            [
                "/'has_api' => true,/",
                "/'api_key' => '.*',/"
            ],
            [
                "'has_api' => false,",
                "'api_key' => '',"
            ],
            $configContent
        );

        File::put($configPath, $newConfigContent);
        $this->info("API configuratie gereset voor plugin {$pluginName}.");
    }
} 