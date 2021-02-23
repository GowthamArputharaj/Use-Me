<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Post..
        </h2>
    </x-slot>

    <div class="py-12 mb-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex items-center h-screen w-full bg-teal-lighter">
                <div class="w-full bg-white rounded shadow-lg p-8 m-4">
                    <div class="flex flex-col mb-4">
                    <label class="mb-2 uppercase font-bold text-md text-grey-darkest" for="title">Title</label>
                    <input class="border py-2 px-3 text-grey-darkest" type="text" name="title" id="title" value="{{ $post->title ?? '' }}">
                    </div>
                    <div class="flex flex-col mb-4">
                    <label class="mb-2 uppercase font-bold text-md text-grey-darkest" for="content">Content</label>
                    <textarea class="border py-2 px-3 text-grey-darkest" name="content" cols="30" rows="10"> {{ $post->title ?? '' }}</textarea>
                    </div>
                    <div class="flex flex-col mb-6">
                    <label class="mb-2 uppercase font-bold text-md text-grey-darkest" for="published">Published</label>
                    <input class="border py-2 px-3 text-grey-darkest" type="checkbox" name="published" id="" @if ($post->published)
                        checked="checked"
                    @endif>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
