<?php

use App\Models\FeatureAreas;
use App\Models\Notice;
use App\Models\PromotionMessage;
use App\Models\Service;
use App\Models\TeamMember;

if (!function_exists('getModels')) {

    function getModels()
    {
        $customModels = [
            'LeadingTeam' => TeamMember::class,
            'BoardOfDirectors' => TeamMember::class,

            'Notice' => Notice::class,
            'Report' => Notice::class,

            'DarkBanner' => FeatureAreas::class,
            'MissionVision' => FeatureAreas::class,

            'Service' => Service::class,
            'Feature' => Service::class,

            'PromotionMessage' => PromotionMessage::class,
            'PlayStore' => PromotionMessage::class,
        ];

        $hiddenRealModels = [
            'TeamMember',
            'Notice',
            'FeatureAreas',
            'Service',
            'PromotionMessage',
            'TechnologySolutionSection'
        ];

        $models = array_keys($customModels);

        foreach (scandir(app_path('Models')) as $file) {

            if ($file === '.' || $file === '..') {
                continue;
            }

            $modelName = str_replace('.php', '', $file);

            if (in_array($modelName, $hiddenRealModels)) {
                continue;
            }

            $models[] = $modelName;
        }

        return array_values(array_unique($models));
    }
}