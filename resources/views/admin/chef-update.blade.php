<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<base href="/public">
<html lang="en">
@include('admin.admin-header')
<body>
<!-- container-scroller -->
<div class="container-scroller">
    @include('admin.navbar')

    <div class="w-full p-12">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{url('/chef/update', $chef->id)}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        {{--  Name                       --}}
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Name
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span
                                        class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                        Name:
                                    </span>
                                    <input type="text" name="name" id="name"
                                           class="focus:ring-indigo-500 text-dark focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                           placeholder="Martin Gorge"
                                           value="{{$chef->name}}"
                                           required>
                                </div>
                            </div>
                        </div>
                        {{--  Speciality                      --}}
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="speciality" class="block text-sm font-medium text-gray-700">
                                    Speciality
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span
                                        class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">Speciality: </span>
                                    <input type="text" name="speciality" id="speciality"
                                           class="focus:ring-indigo-500 focus:border-indigo-500 text-dark flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                           placeholder="Enter speciality"
                                           value="{{$chef->speciality}}"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Description
                            </label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3"
                                          class="shadow-sm focus:ring-indigo-500 text-dark focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                          placeholder="Description">{{$chef->description}}</textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Brief description for your chef
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Old Photo
                            </label>
                            <div class="mt-1 flex items-center">
                                <span class="inline-block h-24 w-24 rounded-full overflow-hidden bg-gray-100">
                                    <img src="/chef-images/{{$chef->image}}" alt="{{$chef->image}}"/>
                                </span>
                                <button type="button"
                                        class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Change
                                </button>
                            </div>
                        </div>

                        {{--          Image              --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Chef profile image
                            </label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                         viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="image"
                                               class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a image</span>
                                            <input id="image" name="image" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@include('admin.admin-script')

</body>
</html>
