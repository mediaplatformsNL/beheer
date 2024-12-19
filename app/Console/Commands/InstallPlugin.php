<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class InstallPlugin extends Command
{
    protected $signature = 'install:plugin {name}';
    protected $description = 'Installeer een plugin door bestanden te kopiëren, service providers te registreren en migraties uit te voeren.';

    public function handle()
    {
        $pluginName = $this->argument('name');
        $pluginPath = base_path("plugins/{$pluginName}");

        if (!File::exists($pluginPath)) {
            $this->error("Plugin {$pluginName} bestaat niet.");
            return;
        }

        $this->registerServiceProvider($pluginName);
        $this->runMigrations($pluginName, $pluginPath);
        $this->registerInConfig($pluginName);

        // Genereer API-sleutel als de plugin een API heeft
        $this->generateApiKey($pluginName, $pluginPath);

        // Leeg de configuratiecache
        Artisan::call('config:cache');
        $this->info("Configuratiecache geleegd.");
    }

    protected function registerServiceProvider($pluginName)
    {
        $providerClass = "Plugins\\{$pluginName}\\{$pluginName}ServiceProvider";
        $appServiceProviderPath = app_path('Providers/AppServiceProvider.php');

        if (!File::exists($appServiceProviderPath)) {
            $this->error("AppServiceProvider.php bestaat niet.");
            return;
        }

        $content = File::get($appServiceProviderPath);

        // Controleer of de provider al is geregistreerd
        if (str_contains($content, $providerClass)) {
            $this->warn("ServiceProvider {$providerClass} is al geregistreerd.");
            return;
        }

        // Zoek de `register`-functie en voeg de registratie toe
        $pattern = '/public function register\(\)\s*\{/';
        $replacement = "public function register()\n    {\n        \$this->app->register(\\{$providerClass}::class);";

        $updatedContent = preg_replace($pattern, $replacement, $content, 1);

        if ($updatedContent) {
            File::put($appServiceProviderPath, $updatedContent);
            $this->info("ServiceProvider {$providerClass} succesvol geregistreerd.");
        } else {
            $this->error("Er is een fout opgetreden bij het registreren van de ServiceProvider.");
        }
    }


    protected function runMigrations($pluginName, $pluginPath)
    {
        $migrationPath = "{$pluginPath}/migrations";

        if (File::exists($migrationPath)) {
            Artisan::call('migrate', ['--path' => "plugins/{$pluginName}/migrations"]);
            $this->info("Migraties uitgevoerd voor {$pluginName}");
        } else {
            $this->warn("Geen migraties gevonden voor {$pluginName}");
        }
    }

    protected function registerInConfig($pluginName)
    {
        $configPath = config_path('plugins.php');

        if (!File::exists($configPath)) {
            $this->error("Configbestand plugins.php bestaat niet.");
            return;
        }

        $config = File::get($configPath);

        // Controleer of de plugin al geregistreerd is
        if (str_contains($config, "'{$pluginName}' => true")) {
            $this->warn("Plugin {$pluginName} is al geregistreerd in plugins.php.");
            return;
        }

        // Voeg de plugin toe aan de 'enabled' array
        $pattern = '/\'enabled\' => \[([\s\S]*?)\]/';
        $replacement = "'enabled' => [\n        '{$pluginName}' => true,\n$1]";

        $updatedConfig = preg_replace($pattern, $replacement, $config);

        if ($updatedConfig) {
            File::put($configPath, $updatedConfig);
            $this->info("Plugin {$pluginName} geregistreerd in plugins.php.");
        } else {
            $this->error("Er is een fout opgetreden bij het bijwerken van plugins.php.");
        }
    }

    protected function generateApiKey($pluginName, $pluginPath)
    {
        $configPath = "{$pluginPath}/config.php";

        if (!File::exists($configPath)) {
            $this->error("Configbestand voor plugin {$pluginName} bestaat niet.");
            return;
        }

        $configContent = File::get($configPath);
        $configArray = include $configPath;

        if (isset($configArray['has_api']) && $configArray['has_api'] === true) {
            $apiKey = Str::random(60);
            $newConfigContent = str_replace(
                "'api_key' => null,",
                "'api_key' => '{$apiKey}',",
                $configContent
            );
            File::put($configPath, $newConfigContent);
            $this->info("API-sleutel gegenereerd en opgeslagen voor plugin {$pluginName}.");
        }
    }
}
