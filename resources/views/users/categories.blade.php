<option value="">Select Category</option>

@forelse ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
@empty
    <option value="" disabled>No categories</option>
@endforelse
