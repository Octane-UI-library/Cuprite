<?php

namespace App\Actions\Git;

use Illuminate\Support\Facades\Http;

class GitAction
{
    public function handle(): int
    {
        $owner = 'Octane-UI-library';
        $repo = 'Cuprite';

        $response = Http::get("https://api.github.com/repos/{$owner}/{$repo}");

        if ($response->successful()) {
            return $response->json()['stargazers_count'];
        }

        return 0;
    }
}
