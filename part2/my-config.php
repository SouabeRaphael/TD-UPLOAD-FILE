
<?php
    const max_file_size = 10 * 1024 * 1024; // 10 Mo max
    const root = __DIR__."/";
    const formats = [
        "jpg" => "image/jpg",
        "jpeg" => "image/jpeg",
        "gif" => "image/gif",
        "png" => "image/png"
    ];
 
    // @@@
    // tableau des utilisateur pouvant ce connecter
    // @@@
    $users = [
        [
            'username'=> 'alexis',
            'password'=> 'ab4f63f9ac65152575886860dde480a1',
            'formula'=> '',
            'quota'=> 0,
        ],
        [
            'username'=> 'marc',
            'password'=> 'ab4f63f9ac65152575886860dde480a1',
            'formula'=> '',
            'quota'=> 0,
        ],
        [
            'username'=> 'andré',
            'password'=> 'ab4f63f9ac65152575886860dde480a1',
            'formula'=> '',
            'quota'=> 0,
        ]
 
    ];
?>