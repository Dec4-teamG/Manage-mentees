<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My page') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('description.newcreate',$user->id) }}" method="GET" class="text-right">
                        @csrf
                        <button type="submit" class="mr-2 ml-2 text-sm bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2  focus:outline-none focus:shadow-outline">
                            追加
                        </button>
                    </form>
                    <form action="{{ route('description.editNew') }}" method="GET" class="text-right">
                        @csrf
                        <button type="submit" class="mr-2 ml-2 text-sm bg-gray-500 hover:bg-gray-400 text-white rounded px-4 py-2  focus:outline-none focus:shadow-outline">
                        編集
                        </button>
                    </form>       
                    <form class="mb-6" action="{{ route('evaluation.store') }}" method="POST">
                        @csrf
                        <input type= "hidden" name="user_id" value=<?php echo $user->id;?>>
                        <div class="flex flex-col mb-4">
                            <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="descroption">評価内容</label>
                            <select class="form-control" id="description" name="description">
                                <option hidden ></option>
                                @foreach ($descriptions as $description)
                                <option value=<?php echo $description;?>><?php echo $description;?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col mb-4">
                            <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="evaluation">Level</label>
                            <select class="border py-2 px-3 text-grey-darkest" type="text" name="evaluation" id="evaluation">
                                <option hidden ></option>
                                <option value=1>★☆☆☆☆</option>
                                <option value=2>★★☆☆☆</option>
                                <option value=3>★★★☆☆</option>
                                <option value=4>★★★★☆</option>
                                <option value=5>★★★★★</option>
                            </select>
                        </div>
                        @include('common/errors')
                        <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>