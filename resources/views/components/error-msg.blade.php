@props(['errorName'])
@error($errorName)
    <p class="text-red-500">{{ $message }}</p>
@enderror
