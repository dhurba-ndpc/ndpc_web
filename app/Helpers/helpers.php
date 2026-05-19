<?php

use App\Models\FeatureAreas;
use App\Models\Notice;
use App\Models\PromotionMessage;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

if (!function_exists('getModels')) {

    function getModels(): array
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


 
if (!function_exists('isActiveMenu')) {
    function isActiveMenu($slug, $activeClass = 'active')
    {
        $slug = trim((string) $slug, '/');
        $current = Request::path();
        $current = $current === '/' ? '' : trim($current, '/');

        // Home page
        if ($slug === 'home' || $slug === '/') {
            return $current === '' ? $activeClass : '';
        }

        // Exact or nested match
        return ($current === $slug || Str::startsWith($current, $slug . '/'))
            ? $activeClass
            : '';
    }
}

if (!function_exists('isActiveParentMenu')) {
    function isActiveParentMenu($menu, $activeClass = 'active')
    {
        // Check parent itself
        if (isActiveMenu($menu->page_template, $activeClass) === $activeClass) {
            return $activeClass;
        }

        // Check child menus
        if ($menu->children && $menu->children->count() > 0) {
            foreach ($menu->children as $child) {
                if (isActiveMenu($child->page_template, $activeClass) === $activeClass) {
                    return $activeClass;
                }
            }
        }

        return '';
    }
}
