<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('AWS Blog') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-7/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="flex" action="{{ route('awsblog') }}" method="GET">
                        @csrf
                        <div class="flex-auto">
                            <input class="w-full border py-2 text-grey-darkest" type="text" name="keyword" id="keyword" value="{{ old('keyword') }}" placeholder="キーワードを入力してください">
                        </div>
                        @include('common.errors')
                        <div class="flex-auto">
                            <button type="submit" class="w-full py-2 m-auto font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <div class="flex w-full py-3 mt-6 font-medium tracking-widest text-white uppercase  overflow-hidden">
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('article')" :active="request()->routeIs('article')">
                        {{ __('Qiita') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('techblog')" :active="request()->routeIs('techblog')">
                        {{ __('Fusic Techblog') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('awsblog')" :active="request()->routeIs('awsblog')">
                        {{ __('AWS blog') }}
                    </x-nav-link>
                </div>
            </div>    
        </div>
    </div>

    @foreach ($awsblog as $aws)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black">
                        <a href="{{ $aws['permalink'] }}" target="_blank" rel="noopener noreferrer" class="underline">{{ $aws['title'] }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $awsblog->links() }}
</x-app-layout>