@php
    $comments = [
        (object)['username' => 'kiki', 'comment' => 'meow meow'],
        (object)['username' => 'lucy', 'comment' => 'woof woof'],
        (object)['username' => 'robocop', 'comment' => 'snort snort'],
        (object)['username' => 'buttMcbutt', 'comment' => 'no one asked me for my uneducated opinion but ima say it anyway because \'merica and freedom and i ain puttin\' a mask on for no one and the goverrmint puttin\' microchips in the vaccines. Sketti and guns!' ],
    ]
@endphp

@foreach ($comments as $comment )
    <article class="flex my-4">
            @include('partials.avatar', [$user = $post->user, 'class' => 'h-7 w-7'])

            <a href="#" class="mx-2 font-bold">
                {{ $comment->username }}
            </a>

        <span class="text-gray-600">
            {{ $comment->comment }}
        </span>
    </article>
@endforeach
