<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My page') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <img src="https://tori-dori.com/wp/wp-content/uploads/BP17-063036D.jpg" width="300" height="300" class="rounded-full">
        </div>
    </div>
    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3 class="text-left p-6 text-gray-900">Name</h3>
                <h3 class="text-center p-6 text-gray-900"><?php echo $employeeName;?></h3>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3 class="text-left p-6 text-gray-900">Department</h3>
                <h3 class="text-center p-6 text-gray-900"><?php echo $employeeDepartment;?></h3>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3 class="text-left p-6 text-gray-900">Profile</h3>
                @if ($employee->employee->profile != 'null')
                <h3 class="text-left p-6 text-gray-900">{{$employee->employee->profile}}</h3>
                @else
                <h3 class="text-left p-6 text-gray-900"></h3>
                @endif
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h3 class="text-left p-6 text-gray-900">Github</h3>
                @if ($employee->employee->github != 'null')
                <h3 class="text-left p-6 text-gray-900">{{$employee->employee->github}}</h3>
                @else
                <h3 class="text-left p-6 text-gray-900"></h3>
                @endif
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Evaluation") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Article") }}
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>
