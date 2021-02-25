<?php

namespace Ornio\l10n\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TranslationFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'l10n:fetch-translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch translations from L10N app';

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
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        if(!$languages = config('l10n.languages')) {
            $this->error('No languages added');
            return;
        }

        if(!$token = config('l10n.token')) {
            $this->error('Token not provided!');
            return;
        }

        foreach ($languages as $language) {
            try {
                $body = (new Client())->get(config('l10n.url') . config('l10n.token') . '/localization/' . $language)->getBody();
                $data = (array) json_decode($body)->data->content;
                if ($data) {
                    foreach ($data as $key => $value) {
                        if (empty($value)) {
                            $data[$key] = $key;
                        }
                    }
                    if(!file_exists(base_path('resources/lang/' . $language))) {
                        mkdir(base_path('resources/lang/' . $language));
                    }
                    file_put_contents(base_path('resources/lang/' . $language .'/translations.php'), "<?php \n".'return('.var_export($data, true).');');
                    echo "Translation for language prefix " . $language . " added \n";
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
