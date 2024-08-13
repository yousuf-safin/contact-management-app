<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<div>
<form method="POST" action="{{ url('/contacts/'.$contact->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $contact->name }}" required>
    <input type="email" name="email" value="{{ $contact->email }}" required>
    <input type="text" name="phone" value="{{ $contact->phone }}">
    <textarea name="address">{{ $contact->address }}</textarea>
    <button type="submit">Update</button>
</form>

</div>
