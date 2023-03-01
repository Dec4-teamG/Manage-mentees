<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My page') }}
        </h2>
    </x-slot>
    <div class="flex flex-row">
        <div class="py-6 flex-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <img src="https://tori-dori.com/wp/wp-content/uploads/BP17-063036D.jpg" width="700" height="500" class="rounded-full">
            </div>
            @if($employee->id == $login_user->id)
            <form action="{{ route('mypage.editImage',$employee->id) }}" method="GET" class="text-right">
                @csrf
                    <button type="submit" class="mr-2 ml-2 text-sm bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2  focus:outline-none focus:shadow-outline">
                        更新
                    </button>
            </form> 
            @endif      
        </div>
        <div class="flex-1">
            @include('common.errors')
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
            @if($employee->id == $login_user->id)
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex flex-row">
                            <h3 class="text-left p-6 text-gray-900">Password</h3>
                        </div>
                        <form action="{{ route('mypage.editPassword',$employee->id) }}" method="GET" class="text-right">
                            @csrf
                            <button type="submit" class="mr-2 ml-2 text-sm bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2  focus:outline-none focus:shadow-outline">
                                更新
                            </button>
                        </form>       
                    </div>
                </div>
            </div>
            @endif
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
                        @if($employee->id == $login_user->id)
                        <form action="{{ route('mypage.editProfile',$employee->id) }}" method="GET" class="text-right">
                            @csrf
                            <button type="submit" class="mr-2 ml-2 text-sm bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2  focus:outline-none focus:shadow-outline">
                                更新
                            </button>
                        </form> 
                        @endif      
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
                        @if($employee->id == $login_user->id)
                        <form action="{{ route('mypage.editGithub',$employee->id) }}" method="GET" class="text-right">
                            @csrf
                            <button type="submit" class="mr-2 ml-2 text-sm bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2  focus:outline-none focus:shadow-outline">
                                更新
                            </button>
                        </form> 
                        @endif      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        {{ __("Evaluation") }}
                        @if ($employee->evaluation != null)
                            @foreach($employee->evaluation as $des)
                            <div class="flex flex-row">
                                <p class="px-6">{{$des->description}}</p>
                                @if($des->evaluation == 1)
                                <p>★☆☆☆☆</p>
                                @elseif($des->evaluation == 2)
                                <p>★★☆☆☆</p>
                                @elseif($des->evaluation == 3)
                                <p>★★★☆☆</p>
                                @elseif($des->evaluation == 4)
                                <p>★★★★☆</p>
                                @elseif($des->evaluation == 5)
                                <p>★★★★★</p>
                                @endif
                                @if($login_user->employee->department == $employee->employee->department && $login_user->employee->status == 'mentor')
                                <form action="{{ route('evaluation.destroy',$des->id) }}" method="POST" class="text-left">
                                @method('delete')
                                @csrf
                                <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                    <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                                </form>
                                @endif
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
        </div>
    </div>
    @if($login_user->employee->department == $employee->employee->department && $login_user->employee->status == 'mentor')
        <div class="py-6">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-row">
                        <h3 class="text-left p-6 text-gray-900">評価</h3>
                    </div>
                    <form action="{{ route('evaluation.newcreate',$employee->id) }}" method="GET" class="text-right">
                        @csrf
                        <button type="submit" class="mr-2 ml-2 text-sm bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2  focus:outline-none focus:shadow-outline">
                            評価入力
                        </button>
                    </form>       
                </div>
            </div>
        </div>
    @endif

     
</x-app-layout>
