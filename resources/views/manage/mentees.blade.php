<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mentees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('common.errors')
                    <form class="mb-6" action="{{ route('mentee.search') }}" method="GET">
                        @csrf
                        <div class="flex mb-4">
                            <div class="py-6 flex-auto w-75">
                              <input class="border text-grey-darkest" type="text" name="keyword" id="keyword" value="{{ old('keyword') }}" placeholder="名前を入力してください">
                            </div>
                            <div class="flex-auto w-25">
                              <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                検索
                              </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">mentees</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mentees as $mentee)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  <a href="{{route('mentees.menteemypage', $mentee ->id)}}">
                  <h3 class="text-left font-bold text-lg text-grey-dark">{{$mentee->id}}</h3>
                  <h3 class="text-left font-bold text-lg text-grey-dark">{{$mentee->name}}</h3>
                  </a>
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
