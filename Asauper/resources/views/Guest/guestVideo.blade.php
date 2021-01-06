<div class="align-center">
	@foreach($videos as $video)
		<div>
			<?php echo $video->video_link;?>
		</div>
		<br>
		<hr>
		<br>
	@endforeach
</div>