<?php

class ApiAdmin extends ModelAdmin
{
    private static $menu_title = 'API';

    private static $url_segment = 'api';

    private static $managed_models = [
        'Board',
        'Thread',
        'Post'
    ];
}
