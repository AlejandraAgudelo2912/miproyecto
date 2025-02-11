<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestionar Usuarios') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            @role('god')
            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">Asignar Roles</h3>

            <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                <thead>
                <tr class="bg-gray-200 dark:bg-gray-700">
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Usuario</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Correo</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Rol Actual</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="bg-gray-100 dark:bg-gray-800">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                            {{ $user->roles->pluck('name')->implode(', ') }}
                        </td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                            <form action="{{ route('users.assignRole') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                <select name="role" class="p-2 border rounded">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}" {{ $user->hasRole($role) ? 'selected' : '' }}>
                                            {{ ucfirst($role) }}
                                        </option>
                                    @endforeach
                                </select>

                                <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                    Asignar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p class="text-red-500">No tienes permiso para gestionar usuarios.</p>
                @endrole
        </div>
    </div>
</x-app-layout>
