@extends('layouts.app')

@section('content')

    

    @if(session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    @if (Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a
                href="\create"
                class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                Create new task
            </a>
        </div>
    @endif


    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Tasks for Day:
                </header>

                <!-- <div class="w-full p-6">
                    <p class="text-gray-700">
                        You are logged in!
                    </p>
                </div> -->

                @if (Auth::check())
                    <?php $isDevided = 1; ?>

                    @foreach ($tasks as $task)
                        <?php $isDevided += 1; ?>
                        <?php
                            if (($isDevided % 2)===0)
                            {
                        ?>
                                <div class="w-full p-6">
                        <?php
                            }
                            else
                            {
                        ?>
                                <div class=" bg-gray-100 w-full p-6">
                        <?php        
                            }
                        ?>
                                    <p class="text-gray-700">
                                        {{ $task->taskText }}
                                    </p>
                                    <span class="float-right ml-8">
                                        <form method="get" action="/dell/{{$task->id}} "
                                         accept-charset="UTF-8">
                                            {{csrf_field() }}
                                            <button type="submit"
                                                class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                                                Dellete 
                                            </button>
                                        </form>      
                                    </span>
                                    <span class="float-right">
                                        <form method="get" action="/edit/{{$task->id}} "
                                         accept-charset="UTF-8">
                                            {{csrf_field() }}
                                            <button type="submit" class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                                                Edit
                                            </button>
                                        </form>
                                    </span>
                                </div>

                    @endforeach
                @else
                    <div class="pt-15 w-4/5 m-auto space-y-4">
                        <a
                            href="\login"
                            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl space-y-4">
                            Please Login
                        </a>
                    </div>
                    <div class="pt-15 w-4/5 m-auto space-y-4"></div>
                @endif
            </section>
        </div>
    </main>
@endsection
