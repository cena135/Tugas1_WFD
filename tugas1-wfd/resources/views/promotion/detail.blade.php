@extends('base')

@section('content')

<div class="w-full mx-auto px-4 sm:px-6 lg:px-0">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mx-auto max-md:px-2 ">
        <div class="img">
            <div class="img-box h-screen max-lg:mx-auto ">
                <img src="{{Storage::url($promotion->image_url)}}" alt=""
                    class="max-lg:mx-auto lg:ml-auto h-full object-cover">
            </div>
        </div>
        <div
            class="data w-full lg:pr-8 pr-0 xl:justify-start justify-center flex items-center max-lg:pb-10 xl:my-2 lg:my-5 my-0">
            <div class="data w-full max-w-xl">
                <h2 class="font-manrope font-bold text-3xl leading-10 text-gray-900 mb-2 capitalize">{{ $promotion->title }}</h2>
                <div class="flex flex-col sm:flex-row sm:items-center mb-6">
                </div>
                <p class="text-gray-500 text-base font-normal mb-5">
                    {{ $promotion->description }}
                </p>
                <a href="{{ route('promotion.index')}}">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back to home</button>
                </a>
            </div>
        </div>
        
    </div>
</div>
@endsection                                       