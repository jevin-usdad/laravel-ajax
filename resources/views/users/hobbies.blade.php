@forelse ($hobbies as $hobby)
    <label class="mr-4 cursor-pointer">
        <input type="checkbox" name="hobbies[]" value="{{ $hobby->id }}" />
        {{ $hobby->name }}
    </label>
    @if ($loop->iteration % 2 == 0)
        <br>
    @endif
@empty
    <p class="text-gray-500">No hobbies</p>
@endforelse
