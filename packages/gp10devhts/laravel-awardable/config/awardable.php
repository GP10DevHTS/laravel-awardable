<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Award Categories
    |--------------------------------------------------------------------------
    |
    | Here you can define the default award categories that will be seeded
    | into the database when you run the `awardable:seed-categories`
    | command. You can add or remove categories as you wish.
    |
    */
    'default_categories' => [
        [
            'name' => 'Best Speaker',
            'slug' => 'best-speaker',
            'description' => 'Awarded to the best speaker.',
        ],
        [
            'name' => 'Best Adjudicator',
            'slug' => 'best-adjudicator',
            'description' => 'Awarded to the best adjudicator.',
        ],
        [
            'name' => 'Best Novice Speaker',
            'slug' => 'best-novice-speaker',
            'description' => 'Awarded to the best novice speaker.',
        ],
        [
            'name' => 'Spirit Award',
            'slug' => 'spirit-award',
            'description' => 'Awarded for outstanding sportsmanship and spirit.',
        ],
        [
            'name' => 'Best Team',
            'slug' => 'best-team',
            'description' => 'Awarded to the best team.',
        ],
        [
            'name' => 'Finalist',
            'slug' => 'finalist',
            'description' => 'Awarded to a finalist.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Allow Multiple Awards
    |--------------------------------------------------------------------------
    |
    | This option determines whether a model can receive the same award multiple
    | times. If set to false, a model can only receive a specific award
    | once.
    |
    */
    'allow_multiple_awards' => false,
];
