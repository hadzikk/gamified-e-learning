<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-navbar>
        <x-slot:profile_picture>{{ $profile_picture }}</x-slot:profile_picture>
    </x-navbar>

    <div class="container">
        <x-student-profile>
            <x-slot:profile_picture>{{ $profile_picture }}</x-slot:profile_picture>
            <x-slot:full_name>{{ $full_name }}</x-slot:full_name>
            <x-slot:username>{{ $username }}</x-slot:username>
            <x-slot:level>{{ $level }}</x-slot:level>
            <x-slot:description>{{ $description }}</x-slot:description>
        </x-student-profile>
        <x-student-activity></x-student-activity>
    </div>
</x-layout>