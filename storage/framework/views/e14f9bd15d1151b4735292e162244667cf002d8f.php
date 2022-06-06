

<?php $__env->startSection('content'); ?>
create

<?php if($errors->any()): ?>
	<div class="w-4/5 m-auto">
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2x py-4" >
					<?php echo e($error); ?>

				</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
<?php endif; ?>

<div class="w-4/5 m-auto text-left">
	<div class="py-15 ">
		<h1 class="text-6xl">
			Create New Task
		</h1>
	</div>
</div>

<div class="w-4/5 m-auto pt-20">
	<form
		action="/"
		method="POST"
		enctype="multipart/form-data">
		<?php echo csrf_field(); ?>  <!-- cross side request sugrery? -->
		
		<!-- <input
			type="text"
			name="title"
			placeholder="Task.."
			class="bg-transparent block border-b-2 w-full h-20 text-3xl outline-none"> -->

		<textarea
			name="taskText"
			placeholder="Task.."
			class="py-20 bg-transparent block border-b-2 w-full h60 text-3xl outline-none"
			></textarea>

		<button
			type="submit"
			class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
				Submit Task
		</button>
	</form>
</div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_projects_demos\todo-br\resources\views/create.blade.php ENDPATH**/ ?>