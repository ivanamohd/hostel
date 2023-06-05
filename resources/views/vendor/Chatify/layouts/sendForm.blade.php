<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <button class="emoji-button"></span><span class="fas fa-smile"></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll"
            placeholder="Type a message.."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>
    </form>
</div>