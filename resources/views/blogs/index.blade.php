<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ブログ一覧') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <form class="mb-6" method="get" action="{{ route('blogs.index') }}">
                            <input type="text" name="search" placeholder="タイトル検索">
                            <button class="text-white bg-indigo-700 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-900 rounded ml-1 font-bold">検索する</button>
                        </form>
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead class="text-sm sm:text-base">
                                <tr>
                                    <th class=" px-2 sm:px-4 py-3 title-font tracking-wider text-gray-900  bg-gray-100 rounded-tl rounded-bl">日時</th>
                                    <th class="px-2 sm:px-4 py-3 title-font tracking-wider text-gray-900  bg-gray-100">タイトル</th>
                                    <th class="px-2 sm:px-4 py-3 title-font tracking-wider text-gray-900  bg-gray-100">詳細</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs sm:text-base">
                                @foreach($posts as $post)
                                <tr>
                                    <td class=" border-t-2 border-gray-200 px-2 sm:px-4 py-3">{{ $post->created_at->format('Y年m月d日 H時i分') }}</td>
                                    <td class=" border-t-2 border-gray-200 px-2 sm:px-4 py-3">{{ $post->title }}</td>
                                    <td class=" border-t-2 border-gray-200 px-2 sm:px-4 py-3"><a class="text-blue-800 font-bold" href="{{ route('blogs.show', ['id' => $post->id]) }}">詳細を見る</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
