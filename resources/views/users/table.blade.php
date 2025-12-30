@forelse ($users as $index => $user)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>
            <input type="checkbox" class="userCheckbox" value="{{ $user->id }}">
        </td>
        <td>{{ $user?->name ?? 'unknown' }}</td>
        <td>{{ $user?->contact_no ?? '-' }}</td>
        <td>
            {{ $user?->hobbies->pluck('name')->implode(', ') }}
        </td>
        <td>
            {{ $user?->categories->pluck('name')->implode(', ') }}
        </td>
        <td>
            <img src="{{ $user?->profile_pic ? asset('storage/' . $user->profile_pic) : asset('image/profile.jpeg') }}"
                class="h-[70px] w-[70px] object-cover">
        </td>
        <td>
            <a data-id="{{ $user?->id }}" class="editBtn text-blue-600 cursor-pointer">Edit</a> /
            <a data-id="{{ $user?->id }}" class="deleteBtn text-red-600 cursor-pointer">Delete</a>
        </td>
    </tr>
@empty
    <tr id="noDataRow">
        <td colspan="8" class="text-center py-4 text-gray-500 font-semibold">
            No data found
        </td>
    </tr>
@endforelse
