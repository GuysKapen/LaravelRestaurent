<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
@include('admin.admin-header')
<body>
<!-- container-scroller -->
<div class="container-scroller">
    @include('admin.navbar')

    <div class="flex flex-col p-16 w-full">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 w-full">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Phone
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Guest
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date Time
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                        @foreach($data as $reservation)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{$reservation->name}}</div>
                                    <div class="text-sm text-gray-500">{{$reservation->message}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$reservation->email}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$reservation->phone}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$reservation->guest}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$reservation->date}}</div>
                                    <div class="text-sm text-gray-500">{{$reservation->time}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="/food/update/{{$reservation->id}}"
                                       class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                    <a href="#" onclick="return confirm('Are you sure?')"
                                       class="text-red-600 hover:text-indigo-900">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@include('admin.admin-script')

</body>
</html>
