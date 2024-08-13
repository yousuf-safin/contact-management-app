<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<div class="form-container">
    <form method="POST" action="{{ url('/contacts') }}">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" required>
        
        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" placeholder="Phone">
        
        <label for="address">Address</label>
        <textarea id="address" name="address" placeholder="Address"></textarea>
        
        <button type="submit">Create</button>
    </form>
</div>


