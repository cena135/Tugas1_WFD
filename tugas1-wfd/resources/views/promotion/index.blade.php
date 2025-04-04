@inject('Carbon', 'Illuminate\Support\Carbon')
@extends('base')

@section('content')

<div class="bg-white min-h-screen">
<nav class="bg-white border-gray-200 p-7 flex justify-between items-center">
    <span class="self-center text-2xl font-semibold whitespace-nowrap text-black">Alex Promotion</span>
    <a href="{{ route('promotion.create') }}">
        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Promo</button>
    </a>
</nav>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($listPromotion as $promotion)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            @if ($promotion->image_url !== null)
                <img class="rounded-t-lg" src="{{Storage::url($promotion->image_url)}}" alt="" />
            @endif
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $promotion->title }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $promotion->description }}</p>
                <small
                class="text-xs text-zinc-500 pt-1 my-3">{{ $Carbon::parse($promotion->updated_at)->format('d M Y H:i:s') }}</small>
                <br>
                <a href="{{route('promotion.edit', ['promotion' => $promotion->id ])}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5"> Edit
                </a>
                <a href="{{route('promotion.detail', ['id' => $promotion->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">
                    Read more
                </a>
                <form action="{{route('promotion.destroy', ['promotion' => $promotion->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 mt-4">X</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection