<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <title>chat room</title>
     <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
      <meta name="token" id="token" value="{{ csrf_token() }}">
  </head>
  <body>
    <div id="app">
      <h3>Chat Room</h3>
      <div class="container">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <chat-log :messages="messages"></chat-log>     
        <chat-composer v-on:messagesent="addMessage"></chat-composer>
      </div>     
    </div>
    <script src="js/app.js"></script>
  </body>
</html>
