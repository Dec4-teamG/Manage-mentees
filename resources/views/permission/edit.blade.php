<!-- resources/views/permission/edit.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Permission Detail') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="mb-6">
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Id</p>
              <p class="py-2 px-3 text-grey-darkest" id="id">
                {{$employee->id}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Name</p>
              <p class="py-2 px-3 text-grey-darkest" id="name">
                {{$employee->name}}
              </p>
            </div>
              <form action="{{ route('department.create') }}" method="GET" class="text-right">
              @csrf
              <button type="submit" class="mr-2 ml-2 text-sm bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2  focus:outline-none focus:shadow-outline">
                追加
              </button>
              </form>
            <form class="mb-6" action="{{ route('permission.update',$employee->employee->user_id) }}" method="POST">
                @method('put')
                @csrf
                @include('common.errors')
                <input type="hidden" name="user_id" value=<?php echo $employeeId;?>>
                <input type="hidden" name="profile" value="null">
                <input type="hidden" name="github" value="null">
                <input type="hidden" name="image" value="null">
                <div class="flex flex-col mb-4">
                <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="department">department</label>
                    <select class="form-control" id="department" name="department">
                        <option value="nochoice" selected>選択してください</option>
                        @foreach ($departments as $department)
                        <option value=<?php echo $department;?>><?php echo $department;?></option>
                        @endforeach
                    </select>
                </div>
                @if($employee->employee->status != 'manager')
                <div class="flex flex-col mb-4">
                <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="status">status</label>
                    <select class="form-control" id="status" name="status">
                        <option value=<?php echo $employeeStatus;?> selected><?php echo $employeeStatus;?></option>
                        <option value="manager">manager</option>
                        <option value="mentor">mentor</option>
                        <option value="mentee">mentee</option>
                        <option value="other">other</option>
                    </select>          
                </div>
                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                Update
                </button>
                @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>