<!-- resources/views/tweet/index.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Permission Index') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">employee</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  <div class="flex flex-row">
                  <h3 class="text-left font-bold text-lg text-grey-dark flex-1">{{$employee->id}}</h3>
                  <h3 class="text-left font-bold text-lg text-grey-dark flex-1">{{$employee->name}}</h3>
                  @if($employee->employee->department != 'null')
                  <h3 class="text-left font-bold text-lg text-grey-dark flex-1">所属：{{$employee->employee->department}}</h3>
                  @else
                  <h3 class="text-left font-bold text-lg text-grey-dark flex-1">所属：未決定</h3>
                  @endif
                  @if($employee->employee->status != 'null')
                  <h3 class="text-left font-bold text-lg text-grey-dark flex-1">ステータス：{{$employee->employee->status}}</h3>
                  @else
                  <h3 class="text-left font-bold text-lg text-grey-dark flex-1">ステータス：未決定</h3>
                  @endif
                  <div class="flex">
                    <form action="{{ route('permission.edit',$employee->id) }}" method="GET" class="text-left">
                      @csrf
                      <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                        <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                      </button>
                    </form>
                  </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

