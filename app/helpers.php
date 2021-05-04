<?php

if (!function_exists('authCustomer')) {
    function authCustomer()
    {
        return auth()->guard('customer')->user();
    }
}

if (!function_exists('orderTableHeader')) {

    function orderTableHeader($field, $tableHeaderText)
    {
        $currentRouteName = \Route::currentRouteName();
        $sortBy = request()->input('sort_by');
        $sortingDirection = request()->input('sorting_direction');
        $link = '<a href="' . route($currentRouteName, [
                'search' => request()->input('search'),
                'sort_by' => $field,
                'sorting_direction' =>
                    $sortBy == $field &&
                    $sortingDirection == 'desc' ? 'asc' : 'desc'
            ]) . '">' . $tableHeaderText;

        $icon = '<i class="fa fa-sort';
        if (!$sortBy && !$sortingDirection) {
            $icon .= '-down';
        } else {
            if ($sortBy == $field) {
                $icon .= $sortingDirection == 'asc' ? '-up' : '-down';
            }
        }
        $icon .= '"></i>';

        $link .= $icon . '</a>';


        return $link;
    }
}


