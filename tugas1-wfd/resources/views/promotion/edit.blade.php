@extends('base')

@section('content')
    

<form action="{{ route('promotion.update', ['promotion' => $promotion->id ]) }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto">
  @csrf
  @method('PUT')
  <h1 class="text-2xl font-bold mb-5">Edit promo</h1>
    <div class="mb-5">
      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Title</label>
      <input type="title" name="title" id="title" value="{{ $promotion->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input your title" required />
    </div>
    <div class="mb-5">
      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Description</label>
      <input type="text" name="description" id="description" value="{{ $promotion->description }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input your description" required />
    </div>
    <div class="mb-5">
      <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Image</label>
      <div class="relative">
        <input type="file" name="image" id="image" class="hidden" required />
        <label for="image" class="cursor-pointer bg-gray-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
          Choose File
        </label>
        <span id="file-name" class="ml-3 text-gray-500"></span>
      </div>
    </div>
    
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
    <a href="{{ route('promotion.index')}}">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button>
    </a>
</form>

<script>
  const fileInput = document.getElementById('image');
  const fileName = document.getElementById('file-name');

  fileInput.addEventListener('change', function () {
    fileName.textContent = this.files[0] ? this.files[0].name : '';
  });
</script>

@endsection