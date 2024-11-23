<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
{{--    <meta @csrf="csrf">--}}
    <title>Laravel is king</title>

</head>
<body>
<h1>Long Pooling chat</h1>
<div class="users">
    <ul class="user-list">
        @foreach($users as $user)
            <li>{{$user['name']}}</li>
        @endforeach
    </ul>
</div>
<form>
    <input id="text" type="text" name="massage">
    <button id="submit-btn"  type="submit">Send</button>
</form>
</body>
</html>
<script>
    const input = document.querySelector('#text');
    const button = document.querySelector('#submit-btn')
    const scrf = document.querySelector('meta[name="_token"]')

    button.addEventListener('click', e => {
        e.preventDefault()

        const responce = fetch('https://localhost:8001/message', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                'message': input.value
            })
            response.then(res => console.log(res.json()))

        })


            .then(response => console.log(response))
            .then(response => response.json())
            .then(data => console.log(data))

    })
</script>
