@extends('layouts.app')
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

@if($errors->any())
<div class="alert alert-danger alert-block">
	<button type="button" style="color:#fff;" class="close" data-dismiss="alert">x</button>
	<strong style="font-family: Palatino; font-size: 14px">{{$errors->first()}}</strong>
</div>
@endif

<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="dashboard-section-container message-container">
                <h4 class="title">Pesan Baru</h4>
                {{ Form::open(array('url' => 'message-chat/sent', 'files' => true, 'method' => 'post')) }}

                    <div class="form-group title-form">
                        <label>Kepada</label>
                        <span class="empty-warning hidden" id="title-warning">Required</span>
                        <div contenteditable="true" class="story-title">
                            <select class="itemName form-control" name="user_other_id"></select>
                        </div>
                    </div>

                    <div class="form-group title-form">
                        <label>Pesan</label>
                        <span class="empty-warning hidden" id="title-warning">Required</span>
                        <div contenteditable="true" class="story-title">
                            <textarea class="form-control" name="text"></textarea>
                        </div>
                    </div>

                    <button class='button button-primary' type='submit' name='save' id='save'><i class="fa fa-paper-plane" aria-hidden="true"></i> Kirim</button>
                {!! Form::close() !!}
            </div>
        </div><!-- .info -->
    </div><!-- .row -->
</div><!-- .single-course-title -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
	$('.itemName').select2({
		placeholder: 'Select an item',
		ajax: {
			url: '/select2-autocomplete-ajax',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
			return {
				results:  $.map(data, function (item) {
					return {
						text: item.name,
						id: item.id
					}
				})
			};
			},
			cache: true
		}
		});
		var input = document.getElementById("enter-submit");
	input.addEventListener("keyup", function(event) {
	  if (event.keyCode === 13) {
	   event.preventDefault();
	   document.getElementById("myBtn").click();
	  }
	});
</script>
<script type="text/javascript">
	var input = document.getElementById("enter-submit");
	input.addEventListener("keyup", function(event) {
	  if (event.keyCode === 13) {
	   event.preventDefault();
	   document.getElementById("myBtn").click();
	  }
	});
</script>
<script>
$(document).ready(function(){
  $("#this-chat1").click(function(){
    $("#this-chat-box1").toggle();
  });
});
</script>
@endsection