@extends('layouts.app')

@section('title', 'Detail Sesi Absensi')

@section('content')
    <div class="container mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Detail Sesi Absensi</h1>
            <p class="text-gray-600">Informasi lengkap tentang sesi absensi.</p>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <th scope="row"
                                    class="px-6 py-4 text-sm font-medium text-gray-900 text-left bg-gray-50 w-1/4">ID</th>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $attendanceSession->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="px-6 py-4 text-sm font-medium text-gray-900 text-left bg-gray-50">
                                    Nama</th>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $attendanceSession->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="px-6 py-4 text-sm font-medium text-gray-900 text-left bg-gray-50">
                                    Waktu Mulai</th>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $attendanceSession->start_time ? $attendanceSession->start_time->format('H:i') : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="px-6 py-4 text-sm font-medium text-gray-900 text-left bg-gray-50">
                                    Waktu Selesai</th>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $attendanceSession->end_time ? $attendanceSession->end_time->format('H:i') : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="px-6 py-4 text-sm font-medium text-gray-900 text-left bg-gray-50">
                                    Dibuat Pada</th>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $attendanceSession->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="px-6 py-4 text-sm font-medium text-gray-900 text-left bg-gray-50">
                                    Diperbarui Pada</th>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $attendanceSession->updated_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex items-center justify-end space-x-3">
                    <a href="{{ route('attendance-sessions.index') }}"
                        class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Kembali</a>
                    <a href="{{ route('attendance-sessions.edit', $attendanceSession->id) }}"
                        class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('attendance-sessions.destroy', $attendanceSession->id) }}" method="POST"
                        class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tipe sesi ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
