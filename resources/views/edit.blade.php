@extends('layouts.app')

@section('content')


	@if ($errors->any())
		<div class="w-4/5 m-auto">
			<ul>
				@foreach ($errors->all() as $error)
					<li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2x py-4" >
						{{ $error }}
					</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="w-4/5 m-auto text-left">
		<div class="py-15 ">
			<h1 class="text-6xl">
				Edit Task
			</h1>
		</div>
	</div>

	<div class="w-4/5 m-auto pt-20">
		<form
			action="/update/{{$task->id}}"
			method="post"
			enctype="multipart/form-data">
			@csrf  <!-- cross side request sugrery? -->
			
			<!-- <input
				type="text"
				name="title"
				placeholder="Task.."
				class="bg-transparent block border-b-2 w-full h-20 text-3xl outline-none"> -->

			<textarea
				name="taskText"
				placeholder="Task.."
				class="py-20 bg-transparent block border-b-2 w-full h60 text-3xl outline-none"
				>{{ $task->taskText}}
			</textarea>

			<button
				type="submit"
				class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
					Update Task
			</button>
		</form>
	</div>

@endsection