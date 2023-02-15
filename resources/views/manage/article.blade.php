<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    @foreach ($qiita as $q)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                    <div><a href="{{$q->url}}" target="_blank" rel="noopener noreferrer" class="underline text-gray-900 dark:text-white">{{ $q->title }}</a></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
