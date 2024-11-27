<x-main-layout>
    <div id="app">
        <app
            :auth="{{ json_encode(auth()->user()) }}">
        </app>
    </div>
</x-main-layout>