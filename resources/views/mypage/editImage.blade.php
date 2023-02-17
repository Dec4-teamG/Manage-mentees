<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My page') }}
        </h2>
    </x-slot>
    <div class="flex flex-row">
        <div class="py-6 flex-1">
            <form action="{{ route('mypage.updateImage',$employee->employee->id) }}" method="POST" class="text-right">
                @method('patch')
                @csrf
                <input type="file" name="image" enctype="multipart/form-data" value="https://2.bp.blogspot.com/-WKhyux3zjI8/XASwaSwkEGI/AAAAAAABQZ4/5csR5XWpXNoxbA-cvkPm-SdeSeab1lkNACLcBGAs/s800/computer_programming_woman.png">
                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    Update
                </button>
            </form>       
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
