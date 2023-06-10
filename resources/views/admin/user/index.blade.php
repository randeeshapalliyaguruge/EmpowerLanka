<x-admin-layout>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the registered users in the system.</p>
            </div>
        </div>

        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">

                        <x-table class="mx-auto sm:px-6 lg:px-8 flex justify-center">
                            <x-slot name="head">
                                <x-th>User Name</x-th>
                                <x-th>First Name</x-th>
                                <x-th>Last Name</x-th>
                                <x-th>Email</x-th>
                                <x-th>Phone</x-th>
                                <x-th>Address</x-th>
                                <x-th>Registered Date</x-th>
                            </x-slot>
                            <x-slot name="body">

                                @foreach ($users as $user)
                                    <x-tr>
                                        <x-td>{{ $user->name }}</x-td>
                                        <x-td>{{ $user->first_name }}</x-td>
                                        <x-td>{{ $user->last_name }}</x-td>
                                        <x-td>{{ $user->email }}</x-td>
                                        <x-td>{{ $user->phone }}</x-td>
                                        <x-td>{{ $user->address }}</x-td>
                                        <x-td>{{ $user->created_at->format('d/m/Y h:ia') }}</x-td>
                                    </x-tr>
                                @endforeach
                            </x-slot>
                        </x-table>

                    </div>
                </div>
                <div class="p-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
