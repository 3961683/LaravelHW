

<form action="{{ route('form.handle') }}" method="post">

    @csrf
    <label for = "Name">Enter name</label>
    <div>
        <input type="text" id="name" name="name" required autofocus />
    </div>
    <button>Save</button>

</form>
