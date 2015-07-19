<?php
use Navarr\YouTube\AudioPlayer;

AudioPlayer::create(
    'xxxx',
    [
        'size' => AudioPlayer::SIZE_LARGE,
        'theme' => AudioPlayer::THEME_DARK,
        'hd',
        'loop',
        'autoplay',
        'progressbar',
        'timecode',
    ]
)->render();