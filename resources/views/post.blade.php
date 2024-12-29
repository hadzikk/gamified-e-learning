<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-navbar>
        <x-slot:profile_picture>{{ $profile_picture }}</x-slot:profile_picture>
    </x-navbar>

    <div class="container">
        <x-student-task-detail></x-student-task-detail>
    </div>
</x-layout>