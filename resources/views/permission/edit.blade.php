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
            @include('common.errors')
            <form class="mb-6" action="{{ route('permission.update',$employee->permission->user_id) }}" method="POST">
                @method('put')
                @csrf
                <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="user_id"></label>
                    <input type="hidden" id="user_id "name="user_id" value=<?php echo $employeeId;?>>
                <div class="flex flex-col mb-4">
                <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="deploy">deploy</label>
                    <select class="form-control" id="deploy" name="deploy">
                        <option value="nochoice" selected>選択してください</option>
                        <option value="team1">team1</option>
                        <option value="team2">team2</option>
                    </select>
                </div>
                <div class="flex flex-col mb-4">
                <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="status">status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="nochoice" selected>選択してください</option>
                        <option value="0">manager</option>
                        <option value="1">mentor</option>
                        <option value="2">mentee</option>
                        <option value="3">others</option>
                        </select>          
                </div>
                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                Update
                </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>