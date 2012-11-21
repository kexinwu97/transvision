<?php

$use_template = true;
$page = $urls[$url['path']];
$extra = null;


switch ($url['path']) {
    case '/':
    case 'changelog.php':
        // Bootstrap l10n
        require_once INC . 'l10n-init.php';

        // Include Search Options
        require_once INC . 'search_options.php';

        // Import all strings for source and target locales
        require_once INC . 'cache_import.php';

        // Search process
        require_once INC . 'recherche.php';

        $view  = 'search_form.php';

        if ($web_service) {
            $view = 'webservice.php';
            $use_template = false;
        }
        break;

    case 'news':
        $view = 'changelog.php';
        break;

    case 'repocomparison':
    case 'repocomparizon':
        $view = 'repocomparison.php';
        break;

    case 'channelcomparison':
    case 'channelcomparizon':
        $view  = 'channelcomparison.php';
        $extra = '<h2 class="alert">experimental View</h2>';
        break;

    case 'accesskeys':
        $view  = 'accesskeys.php';
        $extra = '<h2 class="alert">experimental View</h2>';
        break;

    default:
        $view  = 'search.php';
        break;
}

if ($use_template) {
    ob_start();
    include VIEWS . $view;
    $content = ob_get_contents();
    ob_end_clean();
    // display the page
    require_once VIEWS .'template.php';
} else {
    include VIEWS . $view;
}