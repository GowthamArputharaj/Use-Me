<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts Result
            <span><a class="font-normal text-sm absolute right-14 mx-3 px-3 py-2 bg-grey-400 shadow-inner shadow-md border border-grey-700 rounded" href="{{route('posts.create')}}">Create New Post</a></span>
        </h2>
    </x-slot>

    <div class="pb-12 pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="px-10 py-4 mb-1 bg-gray-50 rounded-lg border border-gray-200 shadow-inner">
                    <form action="{{ route('posts.search') }}" method="get" class="flex justify-between ">
                        <input class="border-none w-full" type="text" name="q" placeholder="Search within Database.." value="{{ old('q') }}">
                        <button class="mr-0 px-4 py-2 bg-blue-50 border border-blue-200 shadow shadow-lg shadow-inner">Search</button>
                    </form>
                </div>
                <div class="-mb-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    @if($posts)
                        @foreach ($posts as $key => $post)
                            <div class="mx-8 mb-4 bg-green-10 border border-green-20 shadow shadow-md px-8 py-6">
                                <div class="pt-4 flex justify-between">
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="text-md">
                                        Title : {{ $post->title ?? '-'}}
                                    </a>
                                    @if ($post->published)
                                        <span class="px-2 py-2 bg-green-50 border border-green-200 mr-0 min-w-18 max-w-18">Published</span>
                                    @else
                                        <span class="px-2 py-2 bg-red-50 border border-red-200 mr-4 min-w-18 max-w-18">Draft</span>
                                    @endif
                                    </span>
                                </div>
                                <div class="text-left pt-2 ">
                                    <span class="text-sm">
                                        {{ mb_substr($post->content ?? '', 0, 30) }}...
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="mx-6 bg-red-50 py-4 border border-red-200 shadow-md shadow-inner rounded mt-8 text-center">
                            <span class="text-lg capitalise text-center">
                                No post found
                            </span>
                        </div>
                    @endif
                    
                </div>
                @if (count($posts) > 0)
                    <div class="mt-4 mb-8 px-10 py-4 mb-2 rounded-lg border border-gray-200 shadow-inner ">
                        {{ $posts->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
