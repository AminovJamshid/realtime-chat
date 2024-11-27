<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Laravel is king</title>
</head>
<body>
<h1>Realtime-chat App</h1>
<div class="users">
    <ul class="user-list">
        @foreach($users as $user)
            <li>{{$user['name']}}</li>
        @endforeach
    </ul>
</div>

<div class="messages" style="border: solid 1px">

</div>
<form>
    <input id="text" type="text" name="message">
    <button id="submit-btn" type="button">Send</button>
</form>
</body>
</html>
<script>
    const input = document.querySelector('#text');
    const button = document.querySelector('#submit-btn');
    const csrf = document.querySelector('meta[name="_token"]');

    button.addEventListener('click', e => {
        e.preventDefault();

        fetch('/message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf.content
            },
            body: JSON.stringify({
                'message': input.value,
                'receiver_id': 2
            })
        })
            .then(res => res.json())
            .then(data => console.log(data))
            .catch(err => console.error(err));
    });

    function renderMessages(messages){
        const container = document.querySelector('.messages')
        messages.map(message => {
            const li = document.querySelector('li')
            li.textContent = message.text
            container.appendChild(messages)
        })
    }
</script>
