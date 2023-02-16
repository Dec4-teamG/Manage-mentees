<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My page') }}
        </h2>
    </x-slot>
    <div class="flex flex-row">
        <div class="py-6 flex-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <img src="https://tori-dori.com/wp/wp-content/uploads/BP17-063036D.jpg" width="500" height="500" class="rounded-full">
            </div>
        </div>
        <div class="flex-1">
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row">
                        <h3 class="text-left  p-6 text-gray-900">Name</h3>
                        <h3 class="text-left  p-6 text-gray-900">{{$employee->name}}</h3>
                    </div>
                </div>
            </div>
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row">
                        <h3 class="text-left p-6 text-gray-900">Department</h3>
                        @if ($employee->employee->department != 'null')
                        <h3 class="text-left p-6 text-gray-900">{{$employee->employee->department}}</h3>
                        @else
                        <h3 class="text-left p-6 text-gray-900"></h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex flex-row">
                            <h3 class="text-left p-6 text-gray-900">Profile</h3>
                            @if ($employee->employee->profile != 'null')
                            <h3 class="text-left p-6 text-gray-900">{{$employee->employee->profile}}</h3>
                            @else
                            <h3 class="text-left p-6 text-gray-900"></h3>
                            @endif
                        </div>
                        <form action="{{ route('mypage.editProfile',$employee->id) }}" method="GET" class="text-right">
                            @csrf
                            <button type="submit" class="mr-2 ml-2 text-sm bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2  focus:outline-none focus:shadow-outline">
                                更新
                            </button>
                        </form>       
                    </div>
                </div>
            </div>
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex flex-row">
                            <h3 class="text-left p-6 text-gray-900">Github</h3>
                            @if ($employee->employee->github != 'null')
                            <h3 class="text-left p-6 text-gray-900">{{$employee->employee->github}}</h3>
                            @else
                            <h3 class="text-left p-6 text-gray-900"></h3>
                            @endif
                        </div>
                        <form action="{{ route('mypage.editGithub',$employee->id) }}" method="GET" class="text-right">
                            @csrf
                            <button type="submit" class="mr-2 ml-2 text-sm bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2  focus:outline-none focus:shadow-outline">
                                更新
                            </button>
                        </form>       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Evaluation") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Article") }}
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>
