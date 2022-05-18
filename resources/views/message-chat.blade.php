@extends('layouts.message')
@section('content')

<!-- Box right message -->
<div class="col-md-8">
    <div class="dashboard-body-block">
    <div class="dashbaord-messages-block">
        <div class="dashboard-section-container message-container">
        @if($check->user_id == Auth::user()->id)
          <h4 class="title">{{$name_2->name}}</h4>
        @elseif($check->user_other_id == Auth::user()->id)
          <h4 class="title">{{$name_1->name}}</h4>
        @endif
        <div class="section-body">
            <div class="messages chat-user">

            <div id="this-chat-box2" class="message-chat-box">
                <div>
                <p>Chat with Friend</p>
                </div>
            </div>

            <div id="this-chat-box1" class="message-chat-box">
              @foreach($conversations as $key => $conversation)
              @if($conversation->user_id == Auth::user()->id)
                <div class="reply-chat">
                <pre><p>{{$conversation->text}}</p></pre>
                </div>
                <br>
              @else
                <div class="chat-in">
                <pre><p>{{$conversation->text}}</p></pre>
                </div>
                <br>
              @endif
              @endforeach
            </div>

            </div>
            <div class="message-chat-box-reply">
            {!! Form::model($send_id,['method'=>'put', 'files'=> 'true', 'action'=>['HomeController@messageChatReply',$send_id]]) !!}
              <textarea class="form-control" name="text"></textarea>
            {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
  </div>
<!-- Box right message -->

	<!-- Trigger the modal with a button -->

	<!-- Modal -->
	<!-- <div id="chatchat" class="modal fade" role="dialog"> -->
	  <!-- <div class="modal-dialog"> -->

	    <!-- Modal content-->
	    <!-- <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Charli Maria</h4>
	      </div>
	      <div class="modal-body">
	        <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et doloreLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
	        <div class="text-center">
	        	<label>Balas Pesan</label>
	        	<textarea class="form-control"></textarea>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button class="btn btn-baca">Balas Pesan</button>
	      </div>
	    </div>

	  </div>
	</div> -->


@endsection
@section('js')
<script type="text/javascript">
  $('textarea').keyup(function (event) {
       if (event.keyCode == 13 && event.shiftKey) {
           var content = this.value;
           var caret = getCaret(this);
           this.value = content.substring(0,caret)+"\n"+content.substring(carent,content.length-1);
           event.stopPropagation();
           
      }else if(event.keyCode == 13)
      {
          $('form').submit();
      }
  });
  function getCaret(el) { 
    if (el.selectionStart) { 
      return el.selectionStart; 
    } else if (document.selection) { 
      el.focus(); 

      var r = document.selection.createRange(); 
      if (r == null) { 
        return 0; 
      } 

      var re = el.createTextRange(), 
          rc = re.duplicate(); 
      re.moveToBookmark(r.getBookmark()); 
      rc.setEndPoint('EndToStart', re); 

      return rc.text.length; 
    }  
    return 0; 
  }
</script>
@endsection