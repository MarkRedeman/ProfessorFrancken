<?php

declare(strict_types=1);

return [
    'menu' => [
        [
            'url' => '/study',
            'title' => 'Study',
            'subItems' => [
                ['url' => "/study/books", 'title' => 'Books', 'description' => 'Buy or sell second hand books', 'icon' => 'fas fa-book'],
                ['url' => "/study/research-groups", 'title' => 'Research Groups', 'description' => 'Find a research group for your bachelor or master thesis', 'icon' => 'fas fa-flask'],
                ['url' => "/study/representation/university-council", 'title' => 'University Council', 'description' => 'Read about the parties that represent students among the university', 'icon' => 'fas fa-user-tie'],
                ['url' => "/study/representation/faculty-council", 'title' => 'Faculty Council', 'description' => 'See who is representing students from the FSE', 'icon' => 'fas fa-person-booth'],
                ['url' => "/study/internationals", 'title' => 'Internationals', 'description' => 'Useful information about studying and living in Groningen', 'icon' => 'fas fa-globe-europe'],
            ],
            'icon' => 'graduation-cap',
        ],
        [
            'url' => '/association',
            'title' => 'Association',
            'subItems' => [
                ['url' => "/association/news", 'title' => 'News', 'description' => 'The latest news from the association', 'icon' => 'fas fa-newspaper'],
                ['url' => "/association/activities", 'title' => 'Activities', 'description' => 'Upcoming career, study and social activities', 'icon' => 'fas fa-calendar-week'],
                ['url' => "/association/history", 'title' => 'History', 'description' => 'Curious about the history of our association, read it here', 'icon' => 'far fa-clock'],
                ['url' => "/association/honorary-members", 'title' => 'Honorary members', 'description' => 'Francken knows two honnorary members: Francken and De Hosson', 'icon' => 'fas fa-award'],
                ['url' => "/association/boards", 'title' => 'Boards', 'description' => 'Current and previous board members', 'icon' => 'fas fa-user-tie'],
                ['url' => "/association/committees", 'title' => 'Committees', 'description' => 'Want to join a committee?', 'icon' => 'fas fa-users'],
                ['url' => "/association/francken-vrij", 'title' => 'Francken Vrij', 'description' => 'Our popular science magazine', 'icon' => 'fas fa-book-open']
            ],
            //    'icon' => 'beer',
            'icon' => 'coffee',
        ],
        [
            'url' => '/career',
            'title' => 'Career',
            'subItems' => [
                // Job prospects
                ['url' => "/career/job-openings", 'title' => 'Job openings', 'icon' => 'fas fa-search-dollar', 'description' => 'Curious about your job opportunities, check these job openings!'],
                ['url' => "/career/companies", 'title' => 'Company profiles', 'icon' => 'fas fa-building', 'description' => ''],
                ['url' => "/career/events", 'title' => 'Career events', 'icon' => 'fas fa-calendar-check', 'description' => '']
            ],
            'icon' => 'suitcase',
        ],
        [
            'url' => '/association/photos',
            'title' => 'Photos',
            'subItems' => [],
            'icon' => 'camera',
            'can' => 'view-albums',
        ],
    ],

    'admin-menu' => [
        [
            "name" => "Association",
            "url" => "association",
            "items" => [
                [
                    "name" => "News",
                    "url" => "news",
                    "works" => true,
                    "can" => "dashboard:news-read",
                ],
                [
                    "name" => "Activities",
                    "url" => "activities",
                    "works" => false,
                    "can" => "dashboard:activities-read",
                ],
                [
                    "name" => "Open registrations",
                    "url" => "registration-requests",
                    "works" => true,
                    "can" => "dashboard:registrations-read",
                ],
                [
                    "name" => "Members",
                    "url" => "members",
                    "works" => false,
                    "can" => "dashboard:members-read",
                ],
                [
                    "name" => "Boards",
                    "url" => "boards",
                    "works" => true,
                    "can" => "dashboard:board-members-read",
                ],
                [
                    "name" => "Committees",
                    "url" => "committees",
                    "works" => false,
                    "can" => "dashboard:committees-read",
                ],
                [
                    "name" => "Francken Vrij",
                    "url" => "francken-vrij",
                    "works" => true,
                    "can" => "dashboard:francken-vrij-read",
                ],
                [
                    "name" => "Symposium",
                    "url" => "symposia",
                    "works" => true,
                    "can" => "dashboard:symposia-read",
                ],
            ]
        ],
        [
            "name" => "Study",
            "url" => "study",
            "items" => [
                [
                    "name" => "Research Groups",
                    "url" => "research-groups",
                    "works" => false,
                    "can" => "dashboard:research-groups-read",
                ],
                [
                    "name" => "Books",
                    "url" => "books",
                    "works" => true,
                    "can" => "dashboard:books-read",
                ],
            ]
        ], [
            "name" => "Treasurer",
            "url" => "treasurer",
            "items" => [
                [
                    "name" => "Deductions",
                    "url" => "deductions",
                    "works" => true,
                    "can" => "board-treasurer",
                ],
            ]
        ], [
            "name" => "Extern",
            "url" => "extern",
            "items" => [
                [
                    "name" => "Companies",
                    "url" => "companies",
                    "works" => false,
                    "can" => "dashboard:companies-read",
                ],
                [
                    "name" => "Events",
                    "url" => "events",
                    "works" => false,
                ],
                [
                    "name" => "Jop openings",
                    "url" => "jop-openings",
                    "works" => false,
                    "can" => "dashboard:companies-read",
                ],
                [
                    "name" => "Factsheet",
                    "url" => "fact-sheet",
                    "works" => true,
                    "can" => "dashboard:fact-sheet-read",
                ]
            ]
        ], [
            "name" => "Committees",
            "url" => "committees",
            "items" => [
                [
                    "name" => "Adtcie",
                    "url" => "adtcie",
                    "works" => false,
                ],
                [
                    "name" => "Borrelcie",
                    "url" => "borrelcie",
                    "works" => false,
                ],
                [
                    "name" => "Francken Vrij",
                    "url" => "francken-vrij",
                    "works" => false,
                ],
                [
                    "name" => "Brouwcie",
                    "url" => "brouwcie",
                    "works" => false,
                ],
                [
                    "name" => "Fotocie",
                    "url" => "fotocie",
                    "works" => false,
                ],
            ]
        ], [
            "name" => "Compucie",
            "url" => "compucie",
            "items" => [
                [
                    "name" => "Accounts",
                    "url" => "accounts",
                    "works" => true,
                    "can" => "dashboard:accounts-read",
                ],
                [
                    "name" => "Settings",
                    "url" => "settings",
                    "works" => true,
                    "can" => "dashboard:settings-read",
                ],
                [
                    "name" => "Roles",
                    "url" => "roles",
                    "works" => true,
                    "can" => "dashboard:permissions-read",
                ],
                [
                    "name" => "Media",
                    "url" => "media",
                    "works" => true,
                    "can" => "dashboard:media-read",
                ],
                [
                    "name" => "Telescope",
                    "url" => "telescope",
                    "works" => true,
                    "can" => "dashboard:super-admin-read",
                ],
                [
                    "name" => "Horizon",
                    "url" => "horizon",
                    "works" => true,
                    "can" => "dashboard:super-admin-read",
                ],
            ]
        ]
    ]
];
