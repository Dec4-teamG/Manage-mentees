<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Qiita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('common.errors')
                    <form class="mb-6" action="{{ route('article.search') }}" method="GET">
                        @csrf
                        <div class="flex flex-col mb-4">
                            <input class="border py-2 px-3 text-grey-darkest" type="text" name="keyword" id="keyword" value="{{ old('keyword') }}" placeholder="キーワードを入力してください">
                        </div>
                        <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <div class="flex w-full py-3 mt-6 font-medium text-white uppercase  overflow-hidden">
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

    @foreach ($qiita as $q)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{$q->url}}" target="_blank" rel="noopener noreferrer" class="underline">{{ $q->title }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $qiita->links() }}
</x-app-layout>
