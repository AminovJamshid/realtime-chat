<x-main-layout>
    <x-users />

    @if(isset($user))
        <x-message :user="$user" :messages="$messages" />
    @endif
</x-main-layout>