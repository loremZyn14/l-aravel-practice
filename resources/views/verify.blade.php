<form action="/verify-code" method="post">
    @csrf
    <input type="hidden" name="request_id" value="{{$requestID}}">
    <input type="text" name="code">
</form>
