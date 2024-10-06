<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ブログ詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-12 mx-auto">
                            <div class="flex flex-col text-center w-full mb-12">
                                <h1 class="sm:text-3xl text-2xl font-bold title-font mb-4 text-gray-900">ブログ詳細</h1>

                            </div>
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2 justify-between min-[420px]:justify-normal">
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="title" class="leading-7 text-sm text-gray-600 font-bold">タイトル</label>
                                            @if($post->title)
                                            <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                {{ $post->title }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="content" class="leading-7 text-sm text-gray-600 font-bold">本文</label>
                                            @if($post->content)
                                            <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-64 text-base outline-none text-gray-700 py-2 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                                                {{ $post->content }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <form method="get" action="{{ route('blogs.edit', ['id' => $post->id]) }}">
                                        <div class="p-2 w-full">
                                            <button class="flex mx-auto text-white bg-indigo-700 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-900 rounded sm:text-lg font-bold">編集する</button>
                                        </div>
                                    </form>
                                    <form id="delete_{{ $post->id }}" method="post" action="{{ route('blogs.destroy', ['id' => $post->id]) }}" class="min-[420px]:ml-4">
                                        @csrf
                                        <div class="p-2 w-full">
                                            <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this)" class="flex mx-auto text-white bg-red-700 border-0 py-2 px-8 focus:outline-none hover:bg-red-900 rounded sm:text-lg font-bold cursor-pointer">削除する</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </section>

                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';

            if (confirm('本当に削除していいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit()
            }
        }
    </script>
</x-app-layout>
