
<!-- resources/views/admin/partials/childOption.blade.php -->
<option value="{{ $child->id }}" {{ $child->id == $selected ? 'selected' : '' }}>
    {{ $prefix }} {{ $child->name }}
</option>
@if ($child->children)
    @foreach ($child->children as $child)
        @include('admin.partials.childOption', ['child' => $child, 'prefix' => $prefix . '--', 'selected' => $selected])
    @endforeach
@endif
