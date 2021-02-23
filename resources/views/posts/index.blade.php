<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
            <span><a class="font-normal text-sm absolute right-14 mx-3 px-3 py-2 bg-grey-400 shadow-inner shadow-md border border-grey-700 rounded" href="{{route('posts.create')}}">Create New Post</a></span>
        </h2>
    </x-slot>

    <div class="pb-12 pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="px-10 py-4 mb-1 bg-gray-50 rounded-lg border border-gray-200 shadow-inner grid grid-cols-2 ">
                    <span>{{auth()->user()->name}}</span>
                </div>
                <div class="-mb-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-grey-1000 shadow-md shadow-inner">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Content
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Edit
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @isset($posts)
                                @foreach ($posts as $key => $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $post->title ?? '-' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ mb_substr($post->content, 0, $strLen ?? 30) ?? '-' }}...</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($post->published)
                                                <span class="px-2 py-2 bg-primary btn btn-primary">Published</span>
                                            @else
                                                <span class="px-2 py-2 bg-danger btn btn-danger">Draft</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="px-6 py-2 bg-blue-50 border border-blue-100 text-sm text-blue-500">Edit</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form method="post" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-6 py-2 bg-red-50 border border-red-100 text-sm text-red-500">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            <!-- More items... -->
                            </tbody>
                        </table>

                        
                        </div>

                    </div>
                </div>
                <div class="mt-4 mb-8 px-10 py-4 mb-2 rounded-lg border border-gray-200 shadow-inner ">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
